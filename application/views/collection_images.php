<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=<?= base_url("assets/boot/bootstrap.min.css"); ?> >
    <link rel="stylesheet" href=<?= base_url("assets/font-awesome-4.7.0/css/font-awesome.min.css") ?> >
    <link rel="stylesheet" href=<?= base_url("assets/css/main.css") ?> >
    <title>SeekHostel</title>
</head>
<body>
<div class="content">
    <?php $this->load->view('header') ?>
    <div class="details" style="">
        <div class="row" style="margin-top: 5px; height:355px; ">
            <div class="col-md-4">
<?php
    foreach ($details as $row) {
        
  ?>
                 <img src=<?= $row->image_url ?> alt="" style="height:350px; width:455px; margin-left: 5px; margin-top: 5px;" >
            </div>
            <div class="col-md-4" style="background-color: #e8e8e8">
                <div class="beside_image">
            <p>Price: <?= $row->price ?> </p>
            <p>Location: <?= $row->location ?> </p>
            <p>House type: <?= $row->type ?> </p>
            <p> <?= strtoupper($row->status) ?> </p>


        </div>
            </div>
            <div class="col-md-4" style="background-color: #e8e8e8;" >
                <div style="padding-top: 50px; ">
                
            <h2>Description</h2>
        <pre style="height: 250px; overflow: scroll; ">
        <p> <?= $row->house_description ?> </p>
        </pre>
        </div>
            </div>
        </div>
    
<?php
    $stats = $row->status;
  }
?>


        <div class="other_images" style="height: auto;">
            <h2>Other images</h2>
          <?php 

          if(isset($others))
          {
            foreach ($others as $row) {
              ?>

 <div class="card" style="box-shadow: 2px 3px 4px;margin-left: 5px;  margin-top: 15px; margin-bottom:10px; margin-right: 20px; width: 280px;height: 300px; float: left; " >
 
                  <div class="card-body" style="background-color: #ffffff; padding: 0px 0px 0px 0px; border:0px; width: 280px; height: 300px; ">
                    <div class="w3-container w3-center">
                        <img src="<?= $row->name ?>" style="height: 300px; width: 280px;" >
                    </div>

                </div>

        </div>
             <?php 
          } 
          }
          else if($others == '')
          {
            echo "<font style='color:white'>No images uploaded </font>";
          }

          ?>
        </div>

    </div>
<center>

  
<?php
if($stats == 'available' ){  
    foreach ($details as $row ) {
          
?>
<form style="clear:both;" action=<?= base_url('index.php/roommate/request') ?> method="POST">
            <?php 
                $_SESSION['referred'] = basename($_SERVER['REQUEST_URI']);
            ?>
    <input type="hidden" name="agent" value=<?= $row->agent ?> >
    <input type="hidden" name="id" value=<?= $row->id ?> >
    <input type="hidden" name="image" value=<?= $row->image_url ?> >
    <input type="hidden" name="price" value=<?= $row->price ?> >
    <?php 
    if(isset($_SESSION['client_uname'])){

    ?>
    <input type="hidden" name="checker" value=<?= $row->id.$_SESSION['client_uname'] ?> >
    <?php
    }
    ?>
    <input type="hidden" name="type" value=<?= $row->type ?> >
    <input type="hidden" name="location" value=<?= $row->location ?> >
    <input type="submit" name="request" class="btn btn-success" value="Request Apartment">
       <font style="color:red"><?php echo  form_error('checker'); ?> </font> <p>

       
</form>
<?php
}
}
else
{
    
}
?>
</center>

<?php $this->load->view('footer') ?>
</div>


</body>
</html>
<?php
if(isset($_POST['log'])) 
{   
    if(isset($_SESSION['client_uname']))
    {
        $this->session->sess_destroy();
        redirect('roommate/index');
    }
    else
    {
        redirect('roommate/login');
    }
    
}
?>