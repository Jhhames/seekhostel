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
     <?php if(isset($values)) { ?>
   <h4 style="color: white;">  <?= $num_rows. " Houses found in our database by you"; ?> </h4> 
<?php 

    foreach ($values as $row) {
?>
       
 <form style="width:350px; margin-right: 30px;margin-left: 30px;float: left; " name="db_values" id="db_values" method="GET" action=<?= base_url('index.php/admin/show') ?>  >
<input type="hidden" value="<?= $row->id ?>" name="id">
<input type="hidden" value="<?= $row->marker ?>" name=marker > 


<!-- <input type="hidden" value= <?= $row->image_url ?> name="image"> 
 -->    
<div class="card" style="box-shadow: 2px 3px 4px;  margin-top: 5px; margin-bottom: 5px; margin-right: 30px;" >
 
                  <div class="card-body" style="background-color: #ffffff; border:0px; padding-top: 3px; background-color: #e8e8e8; ">
                    <img src=<?= $row->image_url  ?> alt="Norway" style="height: 300px;  width: 284px;">
                    <div class="w3-container w3-center">
                        <p>Price: <?= $row->price ?> </p>
                        <p>Location: <?= $row->location ?> </p>
                        <p>House type: <?= $row->type ?></p>
                        <p>Status: <?= strtoupper($row->status) ?></p>
                        <input class="btn btn-primary" type="submit" value="View" >
                        
                    </div>

                </div>
              
       </form>     
        </div>
<?php
   }
    }
   else
   {

   }
?>
</div>

<footer style="background-color: #1d2124; clear: both;">
        <div >
            <footer class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget" style="color: white; font-size: 16px">
                                <ul class="address" type="none">
                                    <li><h3 class="widget-title">Our address</h3></li>
                                    <li>blaa blaa blaa</li>
                                    <li><i class="fa fa-map-marker"></i> address</li>
                                    <li style="padding-right: 3px"><i class="fa fa-phone"></i> telephone</li>
                                    <li style="padding-right: 3px"><i class="fa fa-envelope"></i> mailing address</li>
                                </ul>
                            </div>
                            <div style="padding-top: 30px">
                                <a href="#" class="fa fa-facebook"
                               style="color: white; font-size: 20px; padding-left: 30px; padding-right: 10px"></a>
                            <a href="#" class="fa fa-twitter"
                               style="color: white; font-size: 20px;  padding-right: 10px"></a>
                            <a href="#" class="fa fa-instagram"
                               style="color: white; font-size: 20px;  padding-right: 10px"></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget" style="color: white; font-size: 16px">
                                <ul class="bullet" type="none">
                                    <li><a href="#" style="color: white; ">Why us</a></li>
                                    <li><a href="#" style="color: white; ">Terms of service</a></li>
                                    <li><a href="#" style="color: white; ">Services</a></li>
                                    <li><a href="<?= base_url('index.php/roommate/collection') ?>" style="color: white; ">Collection </a></li>
                                    <li><a href="#" style="color: white; ">About us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <h3 class="widget-title">Contact us</h3>
                                <form action="#" class="contact-form">
                                    <div class="row">
                                        <div class="col-md-6"><input type="text" placeholder="Your name..." ></div>
                                        <div class="col-md-6"><input type="text" placeholder="Email..."  ></div>
                                    </div>

                                    <textarea name="" placeholder="Your message..." style="height: 30px"></textarea><br>
                                    <input type="submit" value="send message" role="button" class="btn btn-primary" >
                                </form>
                            </div>
                        </div>
                    </div>

                    <p class="colophon" style="text-align: center">Copyright 2017 homies. All right reserved</p>
                </div><!-- .container 
            </footer> <!-- .site-footer -->

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
    redirect('admin/index');
}
?>


