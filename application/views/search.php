<html>
<head>
<title> useless search engine </title>
</head>
<body>

<form method="GET"  >
<input type="text" name="search" />

</form> 
 <?php 

 if(isset($result))
  {		 

  	echo $num_rows . " Hohuse(s) Found </br>" ;
	  foreach($result as $row) 
	  {
	  	
		 echo $row->location ." "; 
		 echo $row->type ." ";
		 echo $row->price  . "</br>"; 
		 
		  
	  }
   ?>
<img src=<?= $row->image_url ?> >

  <?php
  }
  else
  {
	echo " Input your search parameter";  
  }

?>
</body>


</html>



		<!-- function uptest() 
		{
			if(isset($_POST['up']))
			{
				$config['upload_path'] ='./assets/uploads/' ;
				$config['allowed_types'] = 'png|jpg' ;
				$config['max_size'] ='20000' ;
				$config['encrypt_name'] =TRUE;

				$this->load->library('upload', $config);

				if(! $this->upload->do_upload('userfile'))
				{
					$this->load->view('upload', array('error'=>$this->upload->display_errors() ));
				}
				else
				{	
					$uploaded = $this->upload->data();
					$this->load->view('upload', array('error'  => base_url(). 'assets/uploads/'. $uploaded['file_name'] ));
				}
			}
			else
			{
				$this->load->view('upload', array('error' => ''));
			}
		} -->
			<!-- 
		 // public function senddetails () 
   //      {	
        	
		// 	$this->form_validation->set_rules('location','location', 'required');
		// 	$this->form_validation->set_rules('type','type', 'required');
		// 	$this->form_validation->set_rules('price','price', 'required|integer|greater_than[20000]');
		// 	$this->form_validation->set_rules('range','range', 'required');
		// 	$this->form_validation->set_rules('descripton','description', 'required');
		// 	// $this->form_validation->set_rules('main_image','Image','required');
			

			
		// 	if($this->form_validation->run() == FALSE ) 
		// 	{  
		// 		$this->load->view('room_form', array('message' => 'Fill the following form properly'));
		// 	}
		// 	else
		// 	{  
					
		// 				// $config['upload_path'] ='./assets/uploads/' ;
		// 				// $config['allowed_types'] = 'png|jpg' ;
		// 				// $config['max_size'] ='20000' ;
		// 				// $config['encrypt_name'] =TRUE;

		// 				// $this->load->library('upload', $config);
		// 				// if($this->upload->do_upload('main_image')) 
		// 				// {
		// 				// $uploaded = $this->upload->data();
		// 				// $image = base_url(). 'assets/uploads/'. $uploaded['file_name'];
		// 				// }
		// 				// else
		// 				// {

		// 				// }
					

		// 		$values= array (
		// 		'location' => $_POST['location'],
		// 		'type' => $_POST['type'],
		// 		'price' => $_POST['price'],
		// 		'search_description' => $_POST['type']." ". $_POST['range']." ". $_POST['location'],
		// 		'prange' => $_POST['range']	,
		// 		'image_url' => $_POST['type'],
		// 		'house_description' => $_POST['description']
						
		// 		);
				
		// 		if($this->MainModel->housedetails($values))
		// 		{
		// 		$this->load->view('room_form', array('message' => 'Details sent successfully'));
					
		// 		}
		// 		else
		// 		{
		// 		$this->load->view('room_form', array('message' => 'ERROR communicating with database'));
		// 		}
		// 	}
		// }
 -->