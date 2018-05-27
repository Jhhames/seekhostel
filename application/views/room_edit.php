<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=<?= base_url("assets/boot/bootstrap.min.css"); ?> >
    <link rel="icon" href="<?= base_url('assets/css/image/download.jpg')?>">
    <link rel="stylesheet" href=<?= base_url("assets/font-awesome-4.7.0/css/font-awesome.min.css") ?> >
    <link rel="stylesheet" href=<?= base_url("assets/css/main.css") ?> >
    <title>room-mates</title>
</head>
<body>
<div class="content">
      <?php 
       $data['num_new'] = $this->MainModel->count_unread($_SESSION['username']);
       $this->load->view('header_agent', $data) ?>       
        <center>
           <h3>Lets get started</h3><br>
         <font style="color: white;">  <?= validation_errors() ?>  </font>
          </center>
       
         <center>
        <fieldset style="border-radius: 4px; background-color:#cccccc;margin-bottom: 20px; width: 800px;box-shadow: 2px 5px 4px; ">
        <legend style=" width: 400px; background-color: white;">   <font style="color:black"> <h4> <?php echo $message ?></h4> </font>  </legend>


    

        <?php foreach ($result as $row) : ?>
        
           <form method="POST" >
           <input type="hidden" name="id" value="<?= $row->id ?>">
           
            <select name="location" >
                <option value="<?= $row->location ?>"  selected="true" style="display: none; color: #6c757d "><?= $row->location ?> <i
                        class=" fa fa-arrow-down"></i></option>
                <option value="Aserifa"  >Aserifa</option>
                <option value="Mayfair"  >Mayfair</option>
                <option value="Ede road"  >Ede-Road</option>
                <option value="Ibadan Road"  >Ibadan-Road</option>
                <option value="Others" > Others </option>
            </select>


            <select name="type">
                <option value="<?= $row->type ?>"  selected="true" style="display: none; color: #6c757d "><?= $row->type ?><i
                        class="fa fa-arrow-down"></i>
                </option>
                <option value="Hostel" >Hostel</option>
                <option value="Self contain" >Self contain</option>
                <option value="Single room">Single room</option>
                <option value="Flat" >Flat</option>
                <option value="BQ" >BQ</option>
            </select> 
        
            <input type="text"  name= "price" placeholder="price" value="<?= $row->price ?>" style="border-radius: 5px;width: 150px; height:40px;"> 

    
            <select name="range" id="need" required>
                <option value="<?= $row->prange ?> "  selected="true" style="display: none; color: #6c757d"> <?= $row->prange ?> <i class=" fa fa-arrow-down"></i></option>
                 <option value="40-60k" >40,000 - 60,000</option>
                 <option value="60-80k" >60,000 - 80,000</option>
                 <option value="80-100k" >80,000 - 100,000</option>
                 <option value="100-120k" >100,000 - 120,000</option>
                 <option value="120-150k" >120,000 - 150,000</option>
                 <option value="150 above">150,000 and above</option>
                            
            </select> 
       
            <select name="status">
                <option value="<?= $row->status ?> "  selected="true" style="display: none; color: #6c757d "><?= $row->status ?><i
                        class="fa fa-arrow-down"></i>
                </option>
                <option value="available">Available</option>
                <option value="not available" >Not Available</option>
                
            </select>

<br>  
            <h5 style="margin-top:30px; width: 200px; border-radius:5px; opacity: 0.6; background-color: white;"><label for="">Description</label></h5>
            <textarea name="description" id="" cols="30" style="width:750" rows="3" placeholder=""> <?= $row->house_description ?></textarea>    <br>   
            <input type="submit" class="btn btn-primary" name="send"  value="Send details">


    <?= form_close(); ?>


<?php endforeach; ?>
  </fieldset>
</center>
   <?php $this->load->view('footer'); ?>
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