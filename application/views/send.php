<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href=<?=base_url("assets/boot/bootstrap.min.css") ?>>
    <link rel="stylesheet" href=<?=base_url("assets/font-awesome-4.7.0/css/font-awesome.min.css") ?>>
    <link rel="stylesheet" href=<?= base_url("assets/css/main.css") ?>>
    <title>homies</title>
</head>
<body style="background-color: #ffffff">
<div class="content">
      <header>
        <div>
            <div class="nav">
                <h2 style="padding-left: 20px"><a href="index.html">H<span style="color:white;">O</span><span style="color: #82ca9a">O</span><span style="color: #9D81B3">O</span>MIES <i
                        class="fa fa-home"></i></a></h2>                <nav>
                    <ul type="none">
                        <li><a href="<?= base_url('index.php/admin/home') ?>" class="fa fa-user-o"> 
                        <?php  
                               if(isset($_SESSION['username'])){ 
                                    echo strtoupper($_SESSION['username']) ;
                                }
                                else
                                {
                                    echo "USER";
                                }

                        ?> </a></li>
                        <li>
                            <form style="display:none;"  id="searchbox" name="searchbox" action="<?= base_url('index.php/roommate/search') ?>">
                                <input style="width:200px;" placeholder="Search location/type" type="text" name="search"> 
                            </form>

                        </li>
                        <li><a href="#"><i onclick="document.getElementById('searchbox').style.display='block'" class="fa fa-search"></i></a></li>
                        <li><a href=<?= base_url('index.php/admin/send') ?> >Rent out a room/ Room mates</a></li>
                        <li>
                        <form method="POST">
                            <button  style="border-radius: 10px" name="log"  >
                            <?php
                                if(isset($_SESSION['username']))
                                    {
                                        echo 'Logout';
                                    }
                                else 
                                {
                                    echo 'Login';
                                }
                            ?>
                            </button>
                          </form>  
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header> 
    <div class="form-input">
        <h2>Signup</h2>
        <form action="" class="d-form" method="POST">
                                 
                        <select name="location" id="need" >
                            <option value="" disabled selected style="display: none; color: #6c757d ">location <i class=" fa fa-arrow-down"></i></option>
                            <option Value="ede">Ede road</option>
                            <option Value="mayfair">Mayfair</option>
                            <option Value="Aserifa">Aserifa</option>
                        </select> 
						<font style="color:red"><?php echo  form_error('location'); ?> </font> <p> 
						
            
						<select name="type" id="need">
                            <option value="" disabled selected style="display: none; color: #6c757d ">Houstel type <i class=" fa fa-arrow-down"></i></option>
                            <option Value="BQ"> BQ</option>
                            <option Value="flat"> Flat</option>
                            <option Value="hostel"> Hostel</option>
                            <option Value="self"> Self contain</option>
                        </select> 
						<font style="color:red"><?php echo  form_error('type'); ?> </font> <p>
					
          <input type="text" placeholder="Price of house" name="price"  value="<?php echo set_value('price'); ?>"><br>
                        <select name="range" id="need" >
                            <option value="" disabled selected style="display: none; color: #6c757d ">Price range <i class=" fa fa-arrow-down"></i></option>
                            <option Value="30 - 40k">30 - 40k </option>
                            <option Value="40 - 80k"> 40 - 80k</option>
                            
                        </select> 
                        
			<font style="color:red"><?php echo  form_error('price'); ?> </font> <p>
            <button type="submit" name="signup">
                Sign up
            </button>
        </form>
    </div>
	
</div>
<script src="boot/jquery.js"></script>
<script src="boot/popper.js"></script>
<script src="boot/bootstrap.js"></script>
</body>
</html>