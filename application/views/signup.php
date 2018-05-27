<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href=<?=base_url("assets/boot/bootstrap.min.css") ?>>
    <link rel="stylesheet" href=<?=base_url("assets/font-awesome-4.7.0/css/font-awesome.min.css") ?>>
    <link rel="stylesheet" href=<?= base_url("assets/css/main.css") ?>>
    <title>homies</title>
</head>
<body style="background-color: #ffffff">
<div class="content">
   <?php $this->load->view('header') ?>
    <br>
    <div style="margin: auto; margin-bottom: 100px;background-color: black;color: white; width: 500px; height: auto;
            padding-top: 20px; padding-bottom: 40px; padding-left:5px; padding-right: 5px; box-shadow: 3px 3px 4px black;
    ">
    
        <div style="background-color:white;color:black; width: 150px;height: 40px; text-shadow: 2px 2px 3px black;margin: auto; "><center> <h2>Sign Up</h2> </center>
        </div><hr color="white">
       <center> <form action=""  method="POST" style="padding-top: 10px; margin: auto;">
           <input type="text" placeholder="Firstname" name="fname" style="width: 400px" required  value="<?php echo set_value('fname'); ?>"><br>
			<font style="color:red"><?php echo  form_error('fname'); ?> </font> <br>
			
           <input type="text" placeholder="Lastname" name="lname" style="width: 400px" required value="<?php echo set_value('lname'); ?>"><br>
			<font style="color:red"><?php echo  form_error('lname'); ?> </font> <br>
            
		   <input type="email" placeholder="E-mail" name="email" required style="width: 400px" value="<?php echo set_value('email'); ?>"><br>
			<font style="color:red"><?php echo  form_error('email'); ?> </font> <br>
            
		   <input type="text" placeholder="Username" required  name="uname" style="width: 400px" value="<?php echo set_value('uname'); ?>"><br>
			<font style="color:red"><?php echo  form_error('uname'); ?> </font> <br>
            
		   <input type="password" placeholder="password" required name="password" style="width: 400px" ><br>
			<font style="color:red"><?php echo  form_error('password'); ?> </font> <br>
            
		   <input type="password" placeholder="Verify Password" required name="vword" style="width: 400px" ><br>
      <font style="color:red"><?php echo  form_error('vword'); ?> </font> <br>
          
      <input type="text" placeholder="Mobile Number" name="number" required style="width: 400px"  value="<?php echo set_value('number'); ?>"><br>
			<font style="color:red"><?php echo  form_error('number'); ?> </font> <br>
            <input type="submit" name="Signup" class="btn btn-normal">
        </form>
   </center>
	
</div>
<?php $this->load->view('footer') ?>
</div>

<script src="boot/jquery.js"></script>
<script src="boot/popper.js"></script>
<script src="boot/bootstrap.js"></script>
</body>
</html>