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


 <div class="card" style="box-shadow: 2px 3px 4px;margin-left: 5px;  margin-top: 15px; margin-bottom:10px; margin-right: 30px; width: 300px;height: 300px" >
 
                  <div class="card-body" style="background-color: #ffffff; border:0px; padding-top: 3px; background-color: #e8e8e8; ">
                    <div class="w3-container w3-center">
                        <b> Name</b> : <?= $_SESSION['firstname']." ". $_SESSION['lastname'] ?> </br>
                        <b> Email</b> : <?= $_SESSION['email'] ?> <br>
                        <b> Username</b> : <?= $_SESSION['username'] ?> <br>
                        <b> Phone Number</b> : <?= $_SESSION['number'] ?> <br>
                        <b> Number of Houses </b> :<?= $house ?> 
                        <form action="<?php echo base_url('index.php/admin/ad_collection') ?>"> 
                        <input class="btn btn-primary" type="submit" value="View Houses" >
                        </form>
                        <!-- <form action="<?= base_url('index.php/admin/view_request') ?>">
                        <button class="btn btn-primary"> View Requests </button>
 -->                        </form>
                    </div>

                </div> 

        </div>
<?php $this->load->view('footer') ?>

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