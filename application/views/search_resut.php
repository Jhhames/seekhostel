<html>
<head>
<title> useless search engine </title>
</head>
<body>

<form method="GET"  >
<select name="type" >
	<option value="flat"> Flat</option>
	<option value="self"> Self contain </option>
</select>

<select name="price" >
	<option value="30 - 40k"> 30 - 40k </option>
	<option value="40 - 80k"> 40 - 80k  </option>
</select>
<select name="location" > 
	<option value="mayfair"> Mayfair </option>
	<option value="ede"> Ede road </option>
</select>	
<input type ="submit" name ="go" value ="go" />
</form> 

<?php 

 if(isset($values))
  {		 

  	echo $num_rows . " Houhse(s) Found </br>" ;
	  foreach($values as $row) 
	  {
	  	
		 echo $row->location ." "; 
		 echo $row->type ." ";
		 echo $row->price  . "</br>"; 
		 
		  
	  }
  }
  else
  {
	echo " Input your search parameter";  
  }

?>

</body>
</html>