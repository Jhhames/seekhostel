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
    <?php 
    $data['num_new'] = $this->MainModel->count_unread($_SESSION['username']);
    
    $this->load->view('header_agent',$data) ?>
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
  }
?>


        <div class="other_images" style="height: auto;">
            <h2>Other images</h2>
            <?php 

          if(isset($others) )
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
          else if(empty($others))
          {
            echo "<font style='color:white'>No images uploaded </font>";

          }

          ?>
        </div>

    </div>
<center>
<form style="clear:both;" action=<?= base_url('index.php/admin/edit') ?> method="GET">
  <input type="hidden" name="id" value=<?= $_GET['id'] ?> > 
  <input type="submit" name="request" class="btn btn-success" value="Edit details">

       
</form>
</center>

<?php $this->load->view('footer') ?>
</div>


</body>
</html>

<?php

if(isset($_POST['log'])) 

{

    session_destroy();

    redirect('admin/index');

}

?>

