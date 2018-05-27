<!DOCTYPE html>
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
               <center>

    <div class="room_form">
        <h3> <b class="fa fa-arrow-down" > Lets get started</b> <b class="fa fa-arrow-down"></b> </h3><br>
        <font style="color: white"><h4><?php echo $message ?></h4>  </font>
        <!-- <form action="" method="POST" enctype ="multipart/form-data"> -->
        <fieldset style="width: 500px; background-color: #cccccc;margin-bottom: 10px; border-radius: 5px; box-shadow: 2px 5px 4px; ">
        <legend style="background-color: #ffffff; width: 300px">    
             <h4><b>Tell us about your place</b></h4>
        </legend>
                   <?= form_open_multipart() ?> 
           <label for="need"></label>
            <select name="location" required >
                <option value="" disabled selected style="display: none; color: #6c757d ">location <i
                        class=" fa fa-arrow-down"></i></option>
                <option value="Aserifa" <?= set_select('location', 'Aserifa'); ?> >Aserifa</option>
                <option value="Mayfair" <?= set_select('location', 'Mayfair'); ?> >Mayfair</option>
                <option value="Ede-road" <?= set_select('location', 'Ede-Road'); ?> >Ede-Road</option>
                <option value="Ibadan-Road" <?= set_select('location', 'Ibadan-Road'); ?> >Ibadan-Road</option>
                <option value="Others" <?= set_select('location', 'Others' ); ?>> Others </option>
            </select> </br>
            <font style="color:red"><?php echo  form_error('location'); ?> </font> <p>

            <label for="need"></label>
            <select name="type" required>
                <option value="" disabled selected style="display: none; color: #6c757d ">House type <i
                        class="fa fa-arrow-down"></i>
                </option>
                <option value="Hostel" <?= set_select('type', 'Hostel' ); ?>>Hostel</option>
                <option value="Self-contain" <?= set_select('type', 'Self-contain' ); ?>>Self contain</option>
                <option value="Single-room" <?= set_select('type', 'Single-room' ); ?>>Single room</option>
                <option value="Flat" <?= set_select('type', 'Flat' ); ?>>Flat</option>
                <option value="BQ" <?= set_select('type', 'BQ' ); ?>>BQ</option>
            </select> </br>
            <font style="color:red"><?php echo  form_error('type'); ?> </font> <p>
        
            <input type="text" name= "price" placeholder="price" value="<?= set_value('price'); ?>" style="border-radius: 5px;"></br>
            <font style="color:red"><?php echo  form_error('price'); ?> </font> <p>
    
            <select name="range"   required>
                <option value="" disabled selected style="display: none; color: #6c757d ">Price range <i class=" fa fa-arrow-down"></i></option>
                 <option value="40-60k" <?= set_select('range', '40-60k' ); ?>>40,000 - 60,000</option>
                 <option value="60-80k" <?= set_select('range', '60-80k' ); ?>>60,000 - 80,000</option>
                 <option value="80-100k" <?= set_select('range', '80-100k' ); ?>>80,000 - 100,000</option>
                 <option value="100-120k" <?= set_select('range', '100-120k' ); ?>>100,000 - 120,000</option>
                 <option value="120-150k" <?= set_select('range', '120-150k' ); ?>>120,000 - 150,000</option>
                 <option value="150 above" <?= set_select('range', '150 above' ); ?>>150,000 and above</option>
                            
            </select> </br>
            <font style="color:red"><?php echo  form_error('range'); ?> </font> <p>

            <label for="need"></label>
            <select name="status" required>
                <option value="" disabled selected style="display: none; color: #6c757d ">House status <i
                        class="fa fa-arrow-down"></i>
                </option>
                <option value="available" <?= set_select('status', 'available' ); ?>>Available</option>
                <option value="not available" <?= set_select('status', 'non available' ); ?>>Not Available</option>
                
            </select> </br>
    <div >
        <label for="photo">Upload Cover image:</label> </br>
        <input type="file" name='main_image' required>
    </div> 
    <font style="color:red"><?php echo  form_error('main_image'); ?> </font> <p>

    <div  >
        <label for="photo">Upload Other images :</label><br>
        <input type="file" name='other_images[]' multiple required>
    </div>
    <div>
            <h5 style="padding-top:40px;"><label for="">Description:</label></h5>
            <textarea name="description" id="" cols="30" rows="3" placeholder="" required> <?php echo set_value('description'); ?></textarea> </br>
            <font style="color:red"><?php echo  form_error('description'); ?> </font> <p>
    
    </div> 
    <input type="submit" name="send" class="btn" value="Send details">


    <?= form_close(); ?>
    </fieldset>

   </div> 
       </center>

   <?php $this->load->view('footer'); ?>
</div>

</body>
</html>