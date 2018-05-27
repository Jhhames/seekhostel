<?php 
defined('BASEPATH') OR exit('no direct script access allowed');
class Admin extends CI_controller 
{
	public function __construct()
	{
		parent :: __construct();
		$this->load->Model('MainModel');
		$this->load->helper(array('form', 'url', 'file'));
		$this->load->library('form_validation');
		$this->load->library('email');
		#$this->load->library('session');
	} 

	public function index()   {
if(isset($_SESSION['username']))
{
		redirect('admin/home');
}
else
{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if($this->form_validation->run())
		{	
			$username = $_POST['username'];
			$password = $_POST['password'];

			if ($this->MainModel->login($username))
			{
				foreach ($this->MainModel->login($username) as $key )
				  {
					$hash = $key->password;
					$fname = $key->firstname;
					$lname = $key->lastname;
					$email = $key->email;
					$number = $key->number;
				  }
				  	$decrypt = password_verify($password, $hash);
				  		if($decrypt)
				  		{
				  			$_SESSION['firstname'] = $fname;
				  			$_SESSION['lastname'] = $lname;
				  			$_SESSION['username'] = $username;
				  			$_SESSION['email'] = $email;
				  			$_SESSION['number'] = $number;
				  			$_SESSION['login'] = TRUE;
				  			$data['house']= $this->MainModel->counthouse($username);
				  			redirect('admin/home');

				  		}
				  		else
				  		{
				  			$data['alert'] = 'Invalid Username or Password';
							$this->load->view('adminlogin', $data);
				  		}


			}
			else 
			{
				$data['alert'] = 'Invalid Username or Password';
				$this->load->view('adminlogin', $data);
			}

		}
		else
		{
			$data['alert'] = '';
			$this->load->view('adminlogin', $data);
		}
 }
		
	}

	public function send () {
		if(isset($_SESSION['username']))
		{
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
			$this->form_validation->set_rules('price','Price','required');
			$this->form_validation->set_rules('range','range','required' );
			$this->form_validation->set_rules('description','description', 'required' );
			$this->form_validation->set_rules('status','House status', 'required' );

			
			if($this->form_validation->run() == FALSE) 
		    {
				$this->load->view('room_form', array('message'=>' '));				
			}
			else 
			{

						$marker = random_string('alnum', 12);
						//single image handler 
						$config['upload_path'] ='./assets/uploads/' ;
						$config['allowed_types'] = 'png|jpg' ;
						$config['max_size'] ='20000' ;
						$config['encrypt_name'] =TRUE;

						$this->load->library('upload', $config);
						if($this->upload->do_upload('main_image')) 
						{
						$uploaded = $this->upload->data();
						$image = base_url(). 'assets/uploads/'. $uploaded['file_name'];
						}
						else
						{
						echo $this->upload->display_errors();
						}

						//multiple images handler 
						$dataInfo = array();
   						$files = $_FILES;
    					$cpt = count($_FILES['other_images']['name']);
    
    					// $images = "";
    					for($i=0; $i<$cpt; $i++)
   						{           
        				$_FILES['other_images']['name']= $files['other_images']['name'][$i];
        				$_FILES['other_images']['type']= $files['other_images']['type'][$i];
        				$_FILES['other_images']['tmp_name']= $files['other_images']['tmp_name'][$i];
        				$_FILES['other_images']['error']= $files['other_images']['error'][$i];
        				$_FILES['other_images']['size']= $files['other_images']['size'][$i];    
        
        						$config['upload_path'] = './assets/uploads/';
    							$config['allowed_types'] = 'gif|jpg|png';
    							$config['max_size']      = '0';
    							$config['overwrite']     = FALSE;
    							$config['encrypt_name'] = TRUE;
    							$config['max_filename'] = 10;

        						$this->load->library('upload', $config);

        						if( ! $this->upload->do_upload('other_images'))
       							{
        							echo $this->upload->display_errors();
       							}
       							else
        						{
        						$dataInfo[] = $this->upload->data();
       							}

        						$url= base_url(). 'assets/uploads/'.$dataInfo[$i]['file_name'];

        							$values = array(
        								'marker' => $marker,
        								'name' => $url
        								);

        							$this->MainModel->send_others($values);

        						// $images = $images."<img src=$url height='300px' width='280px'> "; 
           				}

				$values= array //the name of the array here and the argument in the model can ofcourse be different
				(
				'location'=> $_POST['location'],
				'price'=> $_POST['price'],
				'type'=> $_POST['type'],
				'search_description'=> $_POST['location']." ". $_POST['range']." " .$_POST['type']." ".$_POST['status'],
				'prange'=> $_POST['range'],
				'image_url' => $image,
				'house_description'=> $_POST['description'],
				'agent' => $_SESSION['username'],
				'status' => $_POST['status'],
				'marker' => $marker
				); 	
					if($this->MainModel->housedetails($values)) 
					{
					$this->load->view('room_form', array('message' => 'Details sent successfully, edit your valuues to send new details'));				    }
					else
					{
					$this->load->view('room_form', array('message' => 'ERROR communicating with our database, Contact the developer then try again'));
					}
				 
					
			}
		}else
		{
			redirect('admin/index');
		}
		}

	public function home ()
	{
		 if (isset($_SESSION['username']))
		{
			$agentid = $_SESSION['username'];
		$this->load->view('adminprofile',array('house'=> $this->MainModel->counthouse($agentid)));
		}
		else
		{
			redirect('admin/index');
		}
	}	

	public function signup() {
			
			$this->form_validation->set_rules('fname', 'firstname', 'required|alpha',
			array ('alpha' => 'Your firstname must contain aplphabets only',
			 	   'required' => 'The firstname field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('lname', 'lastname', 'required|alpha', 
			array ('alpha' => 'Your lastname must contain aplphabets only',
			 		'required' => 'The lastname field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('email','email','required|valid_email|is_unique[admintable.email]',
			array ('is_unique' => 'Sorry, it seems the email is already registered',
			 		'valid' => 'That`s not a valid email address',
			 		'required' => 'The email field cannot be empty'
			 		)

			);

			$this->form_validation->set_rules('uname','username','required|is_unique[usertable.username]',
			array ('is_unique' => 'Sorry, it seems the Username is already registered',
			 		'required' => 'The Username field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('password','password','required|min_length[5]',
			array ('min_length' => 'Sorry, your possword can not be lass than 5 characters',
			 		'required' => 'The Password field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('vword','verify','required|matches[password]',
			array ('matches' => 'Sorry, your password verify doesn`t match',
			 		'required' => 'The Password field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('number','Phone number','required|min_length[11]|max_length[13]'
			
			);
			
			if($this->form_validation->run() == FALSE) 
		    {
				$this->load->view('signup', array('message'=>'Unable to send info, refill form properly'));				
			}
			else 
			{


				$values= array //the name of the array here and the argument in the model can ofcourse be different
				(
				'firstname'=> $_POST['fname'],
				'lastname'=> $_POST['lname'],
				'email'=> $_POST['email'],
				'username'=> $_POST['uname'],
				'password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
				'number' => $_POST['number']
				); 	
					if($this->MainModel->signupadmin($values)) 
					{
					redirect('admin/index');
				    }
					else
					{
						echo "ko signup";
					}
				 
					
			}
			 
		}
public function ad_collection() {
	if(isset($_SESSION['username'])) 
	{
		$username= $_SESSION['username'];
			$this->load->view('collection_agent',
				array('values'=>$this->MainModel->collection_agent($username),
					'num_rows'=> $this->MainModel->counthouse($username)
				)
				);
	}else
	{
		redirect('admin/index');
	}
			
			
	}



	public function view_request() 
	{
	
	 	if(isset($_SESSION['username'])){
	 		if($this->MainModel->select_request($_SESSION['username']))
	 		{
	 			$data['num_new'] = $this->MainModel->count_unread($_SESSION['username']);
	 			$data['values'] = $this->MainModel->select_request($_SESSION['username']);
	 			$this->load->view('agent_request', $data);
	 			$this->MainModel->read_request($_SESSION['username']);

	 		}
	 		else
	 		{
	 			echo "Unable to select request";
	 		}
	 	}
	 	else
	 	{
	 		redirect('admin/index');
	 	}

	 }

	 function show () 
	 {
	 	if(isset($_SESSION['username']) && isset($_GET['id']) && isset($_GET['marker']) )
	 	{
	 		$id= $_GET['id'];
	 		$marker = $_GET['marker'];
			$data['details'] = $this->MainModel->select($id);
			$data['others'] = $this->MainModel->select_others($marker);
	 		$this->load->view('collection_view_agent', $data);
	 	}
	 	else
	 	{
	 		redirect('admin/index');
	 	}
	 	
	 }

	 function edit () 
	 {
	 	if(isset($_GET['id']) && isset($_SESSION['username']))
	 	{
	 		$id = $_GET['id'];
		    $data['result'] = $this->MainModel->select($id);

		
	 		$this->form_validation->set_rules('location', 'Location', 'required|trim');
			$this->form_validation->set_rules('type', 'Type', 'required|trim');
			$this->form_validation->set_rules('price','Price','required|trim');
			$this->form_validation->set_rules('range','range','required|trim' );
			$this->form_validation->set_rules('description','description', 'required|trim' );
			$this->form_validation->set_rules('status','House status', 'required|trim' );

	 	if($this->form_validation->run())
	 	{
	 		$new_det = array(
	 			'location' => $_POST['location'], 
	 			'type' => $_POST['type'], 
	 			'price' => $_POST['price'], 
	 			'prange' => $_POST['range'], 
	 			'house_description' => $_POST['description'], 
	 			'status' => $_POST['status']

	 			);
	 		if($this->MainModel->edit_details($new_det,$id))
	 		{
	 			$data['message'] ='Update successful';
	 			$data['result'] = $this->MainModel->select($id);
	 			$this->load->view('room_edit', $data);
	 		}
	 		else
	 		{
	 			$data['message'] ='Update not so successful';
	 			$this->load->view('room_edit', $data);

	 		}
	 	}
	 	else
	 	{
	 		$data['message'] = 'Update the details of this house';
	 		$this->load->view('room_edit',$data);
	 	}
	 	
	 }
	
	else
	{
		redirect('admin/index');
	}
  }

 function confirm ()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
				if($this->form_validation->run())
				{
					$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admintable.email]',
						array('is_unique' => "")
														);
						if($this->form_validation->run() == FALSE )
						{
							$email = $_POST['email'];
							$confirm_code = random_string('alnum', 32);

							$mail = "You have sent a request to reset your password for $email,
							click the link below to complete your reset
							http://www.seekhostel.com/roommate/confirm_password?email=$email&h=$confirm_code";
							$this->email->from('codehut@seekhostel.com', 'Seekhostel');
							$this->email->to($email);
							$this->email->subject('PASSWORD RESET');
							$this->email->message($mail);

								
							
							if($this->email->send())
							{
								$values = array('confirm' => $confirm_code);	
								$this->MainModel->insert_confirm_admin($values,$email);
								
								$data['message'] = "You password recovery mail has been sent successfully
								to $email";
								$this->load->view('empty', $data);
							}
							else
							{
								$data['alert'] = "Unable to send email, try again <br> If this persists, contact us below";
								$this->load->view('forgot', $data);
							}
														

						}
						else
						{
							$data['alert'] = "Sorry, it seems this Email isn't registered";
							$this->load->view('forgot', $data);

						}
				
				}
				else
				{
					$data['alert'] = "";
					$this->load->view('forgot', $data);
				}


			
		}

		function confirm_password()
		{
			if(isset($_GET['email']) && isset($_GET['h']))
			{
				$email = $_GET['email'];
				$confirm_code = $_GET['h'];

				foreach ($this->MainModel->select_agent($email) as $row )
				{
					$conf_code = $row->confirm; 
					$fname = $row->firstname;
					$lname = $row->lastname;
					$email = $row->email;
					$number = $row->number;
					$username = $row->username;
				}

					if($conf_code == $confirm_code)
					{
						$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
						$this->form_validation->set_rules('confirm','Password confirm', 'required|matches[password]');
							if($this->form_validation->run())
							{
								$values = array('password' => PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT));
								if($this->MainModel->insert_confirm_admin($values, $email))
								{
									$_SESSION['firstname'] = $fname;
				  					$_SESSION['lastname'] = $lname;
				  					$_SESSION['username'] = $username;
				  					$_SESSION['email'] = $email;
				  					$_SESSION['number'] = $number;
				  					$_SESSION['login'] = TRUE;
				  					$data['house']= $this->MainModel->counthouse($username);
				  					$data['message'] = "Your Password reset was successful, And You're automatically
				  						 logged in already <br>
				  						 <a href=".base_url('index.php/admin/home') .">ADMIN HOME </a>
				  						 ";

				  					$this->load->view('empty',$data);
								}
								else
								{
									$data['alert'] = "couldnt connect to database please try again later";
									$this->load->view('remember', $data);
								}
							}
							else
							{
								$data['alert'] = "";
								$this->load->view('remember',$data);
							}

						
					}
					else
					{
						show_404();
					}
			}
			else
			{
				show_404();
			}



		}


}

