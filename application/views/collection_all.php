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
     <?php if(isset($values)) { ?>
   <h4 style="color: white;">  <?= $num_rows. " Houses found based in our database"; ?> </h4> 
<div class="row" style="padding-left: 100px;padding-bottom: 5px;">
            <?php foreach ($values as $row) : ?>
             
             <form style="width:350px;  " name="db_values" id="db_values" method="GET" action=<?= base_url('index.php/Roommate/show') ?>  >
<input type="hidden" value="<?= $row->id ?>" name="id">
<input type="hidden" value="<?= $row->marker ?>" name=marker > 
<!--  
<input type="hidden" value="<?= $row->location ?>" name="location"> 
<input type="hidden" value="<?= $row->price ?>" name="price"> 
<input type="hidden" value="<?= $row->type ?>" name="type"> 
<input type="hidden" name="description"  value= "<?= $row->house_description ?>" > 
<input type="hidden" name="agent"  value= "<?= $row->agent ?>" > 
<input type="hidden" value="<?= $row->image_url ?>" name="image"> 
<input type="hidden" value="<?= $row->status ?>" name="status"> 
 -->
            <div class="card" style="box-shadow: 2px 3px 4px;  margin-top: 5px; margin-bottom: 5px; margin-right: 30px;" >
 
                  <div class="card-body" style="background-color: #ffffff; border:0px; padding-top: 3px; background-color: #e8e8e8; ">
                    <img src=<?= $row->image_url  ?> alt="Norway" style=" height: 300px; width: 284px;">
                    <div class="w3-container w3-center">
                        <p>Price: <?= $row->price ?> </p>
                        <p>Location: <?= $row->location ?> </p>
                        <p>House type: <?= $row->type ?></p>
                        <p>Status: <?= strtoupper($row->status) ?></p>
                        <input class="btn btn-primary" type="submit" value="View" >
                        
                    </div>

                </div>

        </div>
        </form>
        <?php endforeach; ?>
                        <?php
   
    }
   else
   {

   }
?>
</div>

    <footer style="background-color: #1d2124">
        <div >
<?php $this->load->view('footer') ?>

        </div>
    </footer>
</div>
<script src=<?= base_url("assets/js/main.js") ?>></script>
<script src=<?= base_url("assets/js/myjquery.js") ?> ></script>
<script src= <?=  base_url("assets/boot/popper.js") ?> ></script>
<script src= <?= base_url("assets/boot/jquery.js") ?> ></script>
<script src=<?= base_url("assets/boot/bootstrap.js") ?> ></script>
</body>
</html>


