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
    <?php $this->load->view('header') ?>
    <div>
        <div class="after-head">
            <div class="option">
                <span><h2 style="font-family:Roboto Mono ;"> <?php if(isset($message)){ echo $message;}  ?> </h2>
                </span>
                
                <div class="search">
                    <!-- <form action="need" class="need">
                        <label for="need"></label>
                        <select name="need">
                            <option value="" disabled selected style="display: none; color: #6c757d ">What do you need
                            </option>
                            <option value="0">I need a room</option>
                            <option value="1">I have a room</option>
                        </select>
                    </form> -->
                    <form action="" method="GET" class="need" style="padding-left: 70px;">
                        <label for="need"></label>
                        <select name="location">
                            <option value="" disabled selected style="display: none; color: #6c757d ">location <i
                                    class=" fa fa-arrow-down"></i></option>
                            <option value="Aserifa" <?= set_select('location', 'Aserifa'); ?> >Aserifa</option>
                            <option value="Mayfair" <?= set_select('location', 'Mayfair'); ?> >Mayfair</option>
                            <option value="Ede-road" <?= set_select('location', 'Ede-Road'); ?> >Ede-Road</option>
                            <option value="Ibadan-Road" <?= set_select('location', 'Ibadan-Road'); ?> >Ibadan-Road</option>
                            <option value="Others" <?= set_select('location', 'Others'); ?> > Others </option>
                        </select>
                   
                        <label for="need"></label>
                        <select name="type">
                            <option value="" disabled selected style="display: none; color: #6c757d ">House type
                            </option>
                            <option value="Hostel" <?= set_select('type', 'Hostel'); ?>>Hostel</option>
                            <option value="Self-contain" <?= set_select('type', 'Self-contain'); ?>>Self contain</option>
                            <option value="Single-room" <?= set_select('type', 'Single-room'); ?>>Single room</option>
                            <option value="Flat" <?= set_select('type', 'Flat'); ?>>Flat</option>
                            <option value="BQ" <?= set_select('type', 'BQ'); ?>>BQ</option>
                        </select>
                     <?= form_error('type') ?> 
                        <label for="need"></label>
                        <select name="price" id="need">
                            <option value="" disabled selected style="display: none; color: #6c757d ">price range
                            </option>
                         <option value="40-60k" <?= set_select('price','40-60k' ) ?> >40,000 - 60,000</option>
                        <option value="60-80k" <?= set_select('price','60-80k' ) ?> >60,000 - 80,000</option>
                        <option value="80-100k" <?= set_select('price','80-100k' ) ?> >80,000 - 100,000</option>
                        <option value="100-120k" <?= set_select('price','100-120k' ) ?> >100,000 - 120,000</option>
                       <option value="120-150k" <?= set_select('price','120-150k' ) ?> >120,000 - 150,000</option>
                       <option value="150 above" <?= set_select('price','150 above' ) ?> >150,000 and above</option>
                        </select>
                        <?= form_error('price') ?>

                    <div style="padding-left: 2%" class="need">
                        <a style="color: white">
                            <button name = "go" class="btn btn-primary" style="border-radius:60px;  ">
                                <i class="fa fa-arrow-right need" style=""></i>
                            </button>
                        </a>
                      </div>  
                    </form>
                </div>


            </div>
        </div>
    </div>
    <div style="background-color: #e9e9e9; text-align: right; padding-right: 15px; font-weight: strong;">
		<div style="float: left; padding-left: 15px;">
		<B>  <?= date("g:i A"); ?> </B>	
		<!--B>  <?PHP
		    $date = date_default_timezone_get();
		    echo date("H:i A", $date);
		
		?> </B-->	
		</div>
		<div>
		<B> <?= date("l,F d, Y"); ?></B>
		</div>

       
                 
    </div>
   
    <!---- carousel------>
    <div class="caros">
        <div class="caro">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src=<?= base_url("assets/css/image/img-sign2.jpg") ?>>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src= <?= base_url("assets/css/image/img-sign3.jpg") ?>>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src=<?= base_url("assets/css/image/img-sign4.jpg")  ?> >
                </div>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
        <div class="caro-text ">
            <h3 style="color: blue;">Find Your Perfect Room</h3>
            <p><span style="font-size: 30px; font-weight: strong; font-family: courier new; color: blue;">SEEKHOSTEL</span>.com is a room seeker which covers hostels around OAU. SeekHostel.com is dedicated to getting you the best of accomodation for affordable prices. let us help you find the perfect hostel for you and your folks
				find your perfect hostel by: </p>
				<ul>
					<li>searching by clicking on the box above and selecting the options you want (i.e searching for the kind of hostel you want). </li>
					<li>Or by clicking on view collection at the top to see all types of hostels</li>
				<li>Click on view to see further details on the hostel.</li>
				<li>After seeing the hostel of your choice, make it yours by requesting for it below and follow the instructions.
				Then the hostel is YOURSSSSS!!!!!!!!!!!!!!!!</li>
				</ul>
        </div>
        <div style="padding-top: 65px; text-align: center;  padding-bottom: 10px;">
            <a href="<?= base_url('index.php/roommate/signup') ?>">
                <button  class="btn btn-primary" style="padding-left: 20px; padding-right: 20px;">
                    <span style="font-size: 20px;">Join for free</span>
                </button>
            </a>
        </div>
    </div>
        <h2 style="color: white; text-align: center; padding-top: 10px;">Latest Uploads</h2>
        <div class="row" style="padding-left: 90px;padding-bottom: 5px;">
            <?php foreach ($latest as $row) : ?>
             
             <form style="width:280px;  " name="db_values" id="db_values" method="GET" action=<?= base_url('index.php/Roommate/show') ?>  >
<input type="hidden" value="<?= $row->id ?>" name="id">
<input type="hidden" value="<?= $row->marker ?>" name=marker > 
          <div class="card" style="box-shadow: 2px 3px 4px;  margin-top: 5px; margin-bottom: 5px; margin-right: 20px;" >
 
                  <div class="card-body" style="background-color: #e9e9e9; border:0px; padding-top: 3px; background-color: #e8e8e8; ">
                    <img src=<?= $row->image_url  ?> alt="Norway" style=" height: 200px; width: 200px;">
                    <div class="w3-container w3-center">
                        Price: <?= $row->price ?> <br>
                        Location: <?= $row->location ?> <br>
                        House type: <?= $row->type ?><br>
                        Status: <?= strtoupper($row->status) ?><br>
                        <input class="btn btn-primary" type="submit" value="View" >
                        
                    </div>

                </div>

        </div>
        </form>
        <?php endforeach; ?>
    </div>
    <div style="padding-top: 15px; text-align: center;  padding-bottom: 10px;">
    <form action="<?= base_url('index.php/roommate/collection') ?>">
    <button class="btn btn-info" > View More </button>
    </form>
    </div>
    <footer style="background-color: #1d2124">
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
