    <header>
        <div>
            <div class="nav">
            <div style="float: left;">
              <a href=<?= base_url('index.php/roommate') ?>>  <h2 style="padding-left: 20px; font-family: courier new;"> SE<span style="color:white;">EK</span><span style="color: #82ca9a">HO</span><span style="color: #9D81B3">ST</span>EL <i
                        class="fa fa-home"></i></h2> </a> 
                        </div>
                       
                   

<div style="float: right;">
                    <nav style="float: right">
                    <ul type="none" style="display:flex; width: auto; margin-left: 400px;margin-right: 1px; " >
                    <a href="<?= base_url('index.php/admin/view_request') ?>">
                        <li>
                        
                        <?php
                        if($num_new == 0)
                        {
                            ?>
                            <span class="fa fa-envelope-open"> </span>
                        <?php 
                        }
                        else
                        { 
                        ?>                                                   
                            <span class="fa fa-envelope" ></span>
                            <span
                            class="badge"
                            style="background-color: red;border-radius: 9099px; font-weight: italic; font-size: 10px; margin-left:-10px;">
                            <?= $num_new ?>
                            </span>
                        <?php
                        }
                         ?>    
                    </a>    
                        </li>                        
                        <li>

                        <a href="<?= base_url('index.php/admin/home') ?>" class="fa fa-user-o"> <?php
                        if(isset($_SESSION['username'])){
                            echo strtoupper($_SESSION['username']);
                        } else{
                            echo "USER";
                        }

                        ?> </a>
                           
                        </li>                        
                        <li>
                            <form style="display:none;"  id="searchbox" name="searchbox" action="<?= base_url('index.php/roommate/search') ?>">
                                <input style="width:200px;" placeholder="Search location/type" type="text" name="search"> 
                            </form>

                        </li>
                        <li><a href="#"><i onclick="document.getElementById('searchbox').style.display='block'" class="fa fa-search"></i></a></li>
                        <li><a href=<?= base_url('index.php/admin/send') ?> >Rent out a room</a></li>
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
        </div>
    </header> 