    <header>
        <div>
            <div class="nav">
			<div style="float: left;">
              <a href=<?= base_url('index.php/roommate') ?>>  <h2 style="padding-left: 20px; font-family: courier new;"> SE<span style="color:white;">EK</span><span style="color: #82ca9a">HO</span><span style="color: #9D81B3">ST</span>EL <i
                        class="fa fa-home"></i></h2> </a> 
						</div>
						<div>
						<nav>
                   








                    <ul type="none" style="display: flex; padding-left: 520px;">
                        <li> <?php
                        if(isset($_SESSION['client_uname'])){
                            ?>
                            <i style="color: #e9e9e9;" class="fa fa-user-o">
                           <?php echo strtoupper($_SESSION['client_uname']);
                        } else{
                            echo "";
                        }

                        ?> </i></li>
                        <li>
                            <form style="display:none;"  id="searchbox" name="searchbox" action="<?= base_url('index.php/roommate/search') ?>">
                                <input style="width:200px;" placeholder="Search location/type" type="text" name="search"> 
                            </form>

                        </li>
                        <li><a href="#"><i onclick="document.getElementById('searchbox').style.display='block'" class="fa fa-search"></i></a></li>
                        <li><a href=<?= base_url('index.php/roommate/collection') ?> > <font style="font-family: Tangerine"> View Collection</font> </a></li>
                        <li>
                        <form method="POST">
                            <button  style="border-radius: 10px" name="log" >
                            <?php
                                if(isset($_SESSION['client_uname']))
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

    <?php
if(isset($_POST['log'])) 
{   
    if(isset($_SESSION['client_uname']))
    {
        session_destroy();
        redirect('roommate/index');
    }
    else
    {
        redirect('roommate/login');
    }
    
}
?>