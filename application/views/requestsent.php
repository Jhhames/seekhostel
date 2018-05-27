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


 <div class="card" style="box-shadow: 2px 3px 4px;margin-left: 5px;  margin-top: 15px; margin-bottom:10px; margin-right: 30px; width: 300px;height: 300px" >
 
                <div class="card-body" style="background-color: #ffffff; border:0px; padding-top: 3px; background-color: #e8e8e8; ">
                    <div class="w3-container w3-center">
                        <?php
                            if(isset($error)){
                                echo $error. "<br>";
                        ?>
                                  <button style="border-radius: 10px" class="btn btn-info" onclick="document.getElementById('id01').style.display='block'">View Agent Details
                    </button>
                         <div id="id01" style="clear: both; opacity: 1.0; display: none; ">
                               <span onclick="document.getElementById('id01').style.display='none'" class="close"
                                         title="Close Modal" style="cursor:pointer;"> &times;</span>
                                <table>
                                    <tr> <td>Name : </td> <td> <?= $name ?></td> </tr>
                                    <tr> <td>Phone Number : </td> <td> <?= $number ?> </td> </tr>
                                </table>
                            
                             
                         </div>
                         <?php 
                            }
                            else{


                         ?>

                        <font> Dear <?= $_SESSION['client_name'] ?>, your request has been sent succesfully, expect a call from our
                        agent very soon or you can contact the agent yourself; you can check his details below
                        </font><br>

                    <button style="border-radius: 10px" class="btn btn-info" onclick="document.getElementById('id01').style.display='block'">View Agent Details
                    </button>
                         <div id="id01" style="clear: both; opacity: 1.0; display: none; ">
                               <span onclick="document.getElementById('id01').style.display='none'" class="close"
                                         title="Close Modal" style="cursor:pointer;"> &times;</span>
                                <table>
                                    <tr> <td>Name : </td> <td> <?= $name ?></td> </tr>
                                    <tr> <td>Phone Number : </td> <td> <?= $number ?> </td> </tr>
                                </table>
                            
                             
                         </div>

                         <?php 
                            }
                         ?>
                    </div>

                </div>

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