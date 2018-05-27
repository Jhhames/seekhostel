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
      <?php 
       $data['num_new'] = $this->MainModel->count_unread($_SESSION['username']);
       $this->load->view('header_agent', $data) ?>
    <div style="display: inline;">
     <center> <h4 style="color: white;">
         <?php
            if($num_new == 0)
            {

            }
            else
            {

        ?>
        <?php
            echo $num_new. " new request";
            }
        ?>
      
    </h4> </center>
<?php 

    foreach ($values as $row) {
?>
       


  <?php
    if($row->checked == 0 )
    {
      ?>

<div style="width:350px; margin-right: 30px;margin-left: 30px;float: left; ">

<div class="card" style="box-shadow: 2px 3px 4px;  margin-top: 5px; margin-bottom: 5px; margin-right: 30px;" >
 
                  <div class="card-body" style="background-color: #ffffff; border:0px; padding-top: 3px; background-color: #e8e8e8; ">
                    <img src=<?= $row->image ?> alt="Norway" style="height: 300px;  width: 284px;">
                    <div class="w3-container w3-center">
                      <b>  <p>Price: <?= $row->price ?> </p>
                        <p>Location: <?= $row->location ?> </p>
                        <p>House type: <?= $row->type ?></p>
                        <p>Client : <?= $row->client_name ?></p>
                        <p>Number : <?= $row->client_number ?></p>
                      </b>
                    </div>

                </div>
              
       </div>     
        </div>
     <?php   
    }
    else {


  ?>


<div style="width:350px; margin-right: 30px;margin-left: 30px;float: left; ">

<div class="card" style="box-shadow: 2px 3px 4px;  margin-top: 5px; margin-bottom: 5px; margin-right: 30px;" >
 
                  <div class="card-body" style="background-color: #ffffff; border:0px; padding-top: 3px; background-color: #e8e8e8; ">
                    <img src=<?= $row->image ?> alt="Norway" style="height: 300px;  width: 284px;">
                    <div class="w3-container w3-center">
                        <p>price: <?= $row->price ?> </p>
                        <p>Location: <?= $row->location ?> </p>
                        <p>House type: <?= $row->type ?></p>
                        <p>Client : <?= $row->client_name ?></p>
                        <p>Number : <?= $row->client_number ?></p>
                        
                    </div>

                </div>
              
       </div>     
        </div>
<?php

 } 
  }
 ?>
</div>

<footer style="background-color: #1d2124; clear: both;">
        <div >
<?php $this->load->view('footer') ?>

        </div>
    </footer>
</div>
<script src=<?= base_url("assets/js/main.js") ?>></script>
<script src=<?= base_url("assets/js/myjquery.js") ?> ></script>
<script src= <?=  base_url("assets/boot/popper.js") ?> </script>
<script src= <?= base_url("assets/boot/jquery.js") ?> ></script>
<script src=<?= base_url("assets/boot/bootstrap.js") ?> ></script>
</body>
</html>
<?php
if(isset($_POST['log'])) 
{
    session_destroy();
    redirect('roommate/index');
}
?>


