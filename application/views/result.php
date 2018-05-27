
<?php 
  if(isset($result))
  {
	  foreach($result as $row) 
	  {
		 echo $row->location; 
		 echo $row->type;
		 echo $row->price; 
		  
	  }
  }
 
  else
  {
	echo "No houses yet";  
  }

?>