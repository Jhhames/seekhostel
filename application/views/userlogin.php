<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=<?= base_url("assets/boot/bootstrap.min.css"); ?> >
    <link rel="stylesheet" href=<?= base_url("assets/font-awesome-4.7.0/css/font-awesome.min.css") ?> >
    <link rel="stylesheet" href=<?= base_url("assets/css/main.css") ?> >

    <title>room-mates</title>
</head>
<body>
<div class="content">
   <?php $this->load->view('header') ?>
<center>
         <font style="color: white"> <?php
                    if($this->session->flashdata('done') == NULL )
                    {
                        // echo $this->session->flashdata('done');
                    }
                    else
                    {
                        echo $this->session->flashdata('done');
                    }

            ?> </font>    

<div style="margin-top: 100px; margin-bottom: 200px;background-color: black;color: white; width: 500px; height: auto;
            padding-top: 20px; padding-bottom: 40px; padding-left:5px; padding-right: 5px; box-shadow: 3px 3px 4px black;
    ">
    <center>
          
    <div style="background-color:white;color:black; width: 150px;height: 30px; text-shadow: 2px 2px 3px black ">

    <h5><a href="<?= base_url('index.php/admin') ?>"> 
    <i style="color:black;" class="fa fa-user" > </i> </a> &nbsp; User Login</h5>
    </div> 
    </center>
    <hr color="white">

    <form method="POST">
    <b class="fa fa-user">  Username</b> <br> 
    <input style="width: 350px" type="text" name="username" placeholder="Enter username" value="<?= set_value('username') ?>" required> </br>
    <font style="color:red"><?php echo  form_error('username'); ?> </font> <p>
    <b class="fa fa-key"> Password </b> <br>
    <input style="width: 350px" type="password" name="password" placeholder="Enter password" required>
    <font style="color:red"><?php echo  form_error('password'); ?> </font></p>
    <font style="color:red"><?=  $alert ?> </font></p>
    <input style="width: 350px" type="submit" name="login" value="Login" class="btn btn-primary" >
    </form>

<i> <span style="color: white;"><a style="color: white;" href="<?= base_url('index.php/roommate/confirm') ?>"> Forgot password??</a> </span></i><br>
<span> Not registered yet??</span><i> <a style="color: white;" href=<?= base_url('index.php/roommate/signup'); ?> > Signup </a></i>
</div>
</center>
 
<footer style="background-color: #1d2124">
        <div >
            <?php $this->load->view('footer')  ?>
</div>
<script src=<?= base_url("assets/js/main.js") ?>></script>
<script src=<?= base_url("assets/js/myjquery.js") ?> ></script>
<script src= <?=  base_url("assets/boot/popper.js") ?> </script>
<script src= <?= base_url("assets/boot/jquery.js") ?> ></script>
<script src=<?= base_url("assets/boot/bootstrap.js") ?> ></script>
</body>
</html>