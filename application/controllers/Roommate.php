<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Roommate extends CI_Controller 
	 {
		public function __construct()
		 {
			
			parent :: __construct ();
			$this->load->model('MainModel');
			$this->load->helper(array('form', 'url', 'file'));
			$this->load->library('form_validation');
			$this->load->library('email');
			#$this->load->library('encrypt');
		}
		
		public function index ()
		{
			

			if(isset($_GET['go'])  && ( !empty($_GET['type']) && !empty($_GET['location']) && !empty($_GET['price'])     )) 		
			
			{
	            $type = $_GET['type'];
				$price = $_GET['price'];
				$location = $_GET['location'];
                
                $pr = $location." ". $price." ".$type." available" ;

                $this->load->view('collection', array(
                	'values' => $this->MainModel->manual($pr),
                	'num_rows' => $this->MainModel->manual_rows($pr))
                	) ;					
			}
			else if( isset($_GET['go']) && ( empty($_GET['type']) OR empty($_GET['location']) OR empty($_GET['price'])  ) )	
			{ 
				$this->load->view('index', array(
					'message' => "<font style='color:red'> You must select all three search Parameters </font> ",
					'latest' => $this->MainModel->latest()
					) );

			}

			else
			{
			$this->load->view('index', array('message'=> "<font style='color:black'> Find You The Perfect Room </font>",					
                	'latest' => $this->MainModel->latest(),

				));	
			}
		}
		
		public function signup() 
		{
			if(isset($_SESSION['client_uname']))
			{
				redirect('roommate/collection');
			}
			else
			{

			$this->form_validation->set_rules('fname', 'firstname', 'required|trim|alpha',
			array ('alpha' => 'Your firstname must contain aplphabets only',
			 	   'required' => 'The firstname field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('lname', 'lastname', 'required|trim|alpha', 
			array ('alpha' => 'Your lastname must contain aplphabets only',
			 		'required' => 'The lastname field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('email','email','required|trim|valid_email|is_unique[usertable.email]',
			array ('is_unique' => 'Sorry, it seems the email is already registered',
			 		'valid' => 'That`s not a valid email address',
			 		'required' => 'The email field cannot be empty'
			 		)

			);

			$this->form_validation->set_rules('uname','username','required|trim|is_unique[usertable.username]',
			array ('is_unique' => 'Sorry, it seems the Username is already registered',
			 		'required' => 'The Username field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('password','password','alpha_numeric_spaces|required|min_length[5]',
			array ('min_length' => 'Sorry, your possword can not be lass than 5 characters',
			 		'required' => 'The Password field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('vword','verify','required|matches[password]',
			array ('matches' => 'Sorry, your password verify doesn`t match',
			 		'required' => 'The Password field cannot be empty'
			 		)
			);

			$this->form_validation->set_rules('number','Phone number','required|trim|min_length[11]|max_length[13]'
			
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
					if($this->MainModel->signup($values)) 
					{
						$this->session->set_flashdata('done','Your sign up was successful, now you can login below');
						redirect('roommate/login');
				    }
					else
					{
						echo "ko signup";
					}
				 
					
			}
			 
			}

		}

	
		// public function send ()
		// {

		// 	$this->form_validation->set_rules('location', 'firstname', 'required');
		// 	$this->form_validation->set_rules('type', 'lastname', 'required');
		// 	$this->form_validation->set_rules('price','email','required');
		// 	$this->form_validation->set_rules('range','username','required' );
		// 	$this->form_validation->set_rules('description','password', 'required' );

			
		// 	if($this->form_validation->run() == FALSE) 
		//     {
		// 		$this->load->view('room_form', array('message'=>'refill form properly'));				
		// 	}
		// 	else 
		// 	{

		// 				$config['upload_path'] ='./assets/uploads/' ;
		// 				$config['allowed_types'] = 'png|jpg' ;
		// 				$config['max_size'] ='20000' ;
		// 				$config['encrypt_name'] =TRUE;

		// 				$this->load->library('upload', $config);
		// 				if($this->upload->do_upload('main_image')) 
		// 				{
		// 				$uploaded = $this->upload->data();
		// 				$image = base_url(). 'assets/uploads/'. $uploaded['file_name'];
		// 				}
		// 				else
		// 				{
		// 				echo $this->upload->display_errors();
		// 				}

		// 		$values= array //the name of the array here and the argument in the model can ofcourse be different
		// 		(
		// 		'location'=> $_POST['location'],
		// 		'price'=> $_POST['price'],
		// 		'type'=> $_POST['type'],
		// 		'search_description'=> $_POST['location']." ". $_POST['range']." " .$_POST['type'],
		// 		'prange'=> $_POST['range'],
		// 		'image_url' => $image,
		// 		'house_description'=> $_POST['description']
		// 		); 	
		// 			if($this->MainModel->housedetails($values)) 
		// 			{
		// 			$this->load->view('room_form', array('message' => 'Details sent successfully, edit your valuues to send new details'));				    }
		// 			else
		// 			{
		// 			$this->load->view('room_form', array('message' => 'ERROR communicating with our database, Contact the developer and try again'));
		// 			}
				 
					
		// 	}
		// }

		public function search () 
		{    
			
 			if(isset($_GET['search']) && $_GET['search'] !== '' )
			{
				$search_pr = $_GET['search'];
				$one= $this->MainModel->search_db($search_pr);
				$two = $this->MainModel->search_rows($search_pr);
				$this->load->view('collection',array ('values' => $one, 'num_rows' => $two ));

					
					
				
			}	
			else 
			{
				
				$this->load->view('search');
			}
		}


		public function show() 
		{	
			if(isset($_GET['id']) && isset($_GET['marker']) )
			{
				$marker = $_GET['marker'];
				$id = $_GET['id'];
				$data['details'] = $this->MainModel->select($id);
				$data['others'] = $this->MainModel->select_others($marker);
				$this->load->view('collection_images', $data);
			}
			else
			{
				redirect('roommate/collection');
			}
			

		}

		public function collection() 
		{
			$this->load->view('collection_all', 
				array('values'=>$this->MainModel->collection_all(),
						'num_rows'=> $this->MainModel->collection_count()
					));
		
		}

		public function request()
		{
			if(isset($_SESSION['client_uname']) && isset($_POST['request'])){
					$agent_name = $_POST['agent'];
					$agent_details= $this->MainModel->getAgentDetails($agent_name);
				//And Two months later James Doesnt Understand his codes - sad

				foreach ($agent_details as $row )
				{
					$data['name']= $row->firstname." ".$row->lastname ;
					$data['number'] = $row->number;	
					$agent_rname = $row->lastname;
					$agent_email = $row->email;
				}
				//oh Ive seen what i did there , the line above sends agent details to the next page
					$price = $_POST['price'];
					$location = $_POST['location'];
					$type = $_POST['type'];
					$image = $_POST['image'];
					$price = $_POST['price'];
					$checker = $_POST['checker'];

					$this->form_validation->set_rules('checker','checker', 'is_unique[request.checker]',
						array('is_unique' => 'Seems You have already Placed a pending request, calmly wait for a call from the agnet in charge')
						);

					if($this->form_validation->run() )
					{
						$requestValues = array(
												'agent_name' => $agent_name,
												'client_name' => $_SESSION['client_name'],
												'location' => $location,
												'type' => $type,
												'image' => $image,
												'price' => $price,
												'checker' =>$checker,
												'client_number' => $_SESSION['client_number'],
												'checked' => 0
											  ); 
					
						if($this->MainModel->sendRequest($requestValues))
						{
							$mail = 'Hello'. $agent_rname .', Someone just requested for one of your hostels at Seekhostel.com Follow the link and check out the request http://seekhostel.com/admin/view_request '; 
							$this->email->from('fjhhames@gmail.com', 'Seekhostel');
							$this->email->to($agent_email);
							$this->email->subject('YOU HAVE A PENDING REQUEST');
							$this->email->message($mail);

							$this->email->send();
							

							$this->load->view('requestsent', $data);
						}
						else
						{	
							$data['error'] = 'There was an issue sending your request, please report this in the contact form below';
							$this->load->view('requestsent', $data);
						}
					}
					else
					{
							$data['error'] = 'Seems You have already Placed a pending request, calmly wait for a call from the agnet in charge';
							$this->load->view('requestsent', $data);
					}


		}
		else
		{
			redirect('roommate/login');
		}


		}


		public function login() 
		{
			if(isset($_SESSION['client_uname'])) {
				redirect('roommate/index');
			}
			else{
				if(isset($_POST['login']))
				{
					$this->form_validation->set_rules('username', 'username', 'required|trim');
					$this->form_validation->set_rules('password', 'password', 'required');
				if($this->form_validation->run())
				{	
				$username = $_POST['username'];
				$password = $_POST['password'];

				if ($this->MainModel->login_user($username))
				{
					foreach ($this->MainModel->login_user($username) as $key )
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
				  				$_SESSION['client_uname'] = $username;
				  				$_SESSION['client_number'] = $number;
				  				$_SESSION['client_name'] = $fname." ".$lname ;
				  				$_SESSION['email'] = $email;
				  				$_SESSION['login'] = TRUE;
				  				if(isset($_SESSION['referred']))
				  				{
				  				$referred_from = $_SESSION['referred'];
				  				$referred_from = 'roommate/'.$referred_from;
				  				redirect($referred_from);
				  				}
				  				else
				  				{
				  					redirect('roommate/collection');
				  				}

				  			}
				  			else
				  			{
				  				$data['alert'] = 'Invalid Username or Password';
								$this->load->view('userlogin', $data);
				  			}


				}
				else 
				{
					$data['alert'] = 'Invalid Username or Password';
					$this->load->view('userlogin', $data);
				}

			}
			else
			{
				$data['alert'] = '';
				$this->load->view('userlogin', $data);
			}
 			}
 			else{
 				$data['alert'] = '';
				$this->load->view('userlogin', $data);
 			}
 			}




		} 

	

		function confirm ()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
				if($this->form_validation->run())
				{
					$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usertable.email]',
						array('is_unique' => "")
														);
						if($this->form_validation->run() ==FALSE )
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
								$this->MainModel->insert_confirm($values,$email);
							
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

				foreach ($this->MainModel->select_user($email) as $row )
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
								if($this->MainModel->insert_confirm($values, $email))
								{
									echo "password changed successfully";
									$_SESSION['client_uname'] = $username;
				  					$_SESSION['client_number'] = $number;
				  					$_SESSION['client_name'] = $fname." ".$lname ;
				  					$_SESSION['email'] = $email;
				  					$_SESSION['login'] = TRUE;
				  					if(isset($_SESSION['referred']))
				  					{
				  						$referred_from = $_SESSION['referred'];
				  						$referred_from = 'roommate/'.$referred_from;
				  						redirect($referred_from);
				  					}
				  					else
				  					{
				  						$data['message'] = "Your Password reset was successful, And You're automatically
				  						 logged in already";
				  						$this->load->view('empty', $data);
				  					}
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

		function contact_us ()
		{
			if(isset($_POST['message']) )
			{
				$values = array(
					'name' => $_POST['name'],
					'email' => $_POST['email'],
					'message' => $_POST['message']
					);

					if($this->MainModel->contact($values))
					{
						$data['message'] = "Your contact message has been received,We'll send a reply to your email ASAP. Thanks</br> 
											For instant contact you can call the contact number below";
						$this->load->view('empty',$data);
					}
					else
					{	
						$data['message'] = "Unable to connect to database, try again later";
						$this->load->view('empty', $data);
					}

			}
			else
			{
				$this->load->view('empty');
			}

		}


  } 
  ?>