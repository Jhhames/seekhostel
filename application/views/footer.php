            <footer class="site-footer" style="clear: both; background-color: #191919">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget" style="color: white; font-size: 16px">
                                <ul class="address" type="none">
                                    <li><h3 class="widget-title">Get to us @</h3></li>
                                    <li style="padding-right: 3px"><i class="fa fa-phone"></i>  08175914858</li>
                                    <li style="padding-right: 3px"><i class="fa fa-envelope"></i> codehut@seekhostel.com </li>
                                </ul>
                            </div>
                            <div style="padding-top: 30px">
                                <a href="#" class="fa fa-facebook"
                               style="color: white; font-size: 20px; padding-left: 30px; padding-right: 10px"></a>
                            <a href="#" class="fa fa-twitter"
                               style="color: white; font-size: 20px;  padding-right: 10px"></a>
                            <a href="#" class="fa fa-instagram"
                               style="color: white; font-size: 20px;  padding-right: 10px"></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget" style="color: white; font-size: 16px">
                                <ul class="bullet" type="none">
                                    <li><a href="" style="color: white; ">Services</a></li>
                                    <li><a href="<?= base_url('index.php/roommate/collection') ?>" style="color: white; ">Collection </a></li>
                                    <li><a href="#" style="color: white; ">About us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget">
                                <h3 class="widget-title">Contact us</h3>
                                <form action="<?= base_url('index.php/roommate/contact_us') ?>" method="POST" class="contact-form">
                                    <div class="row">
                                        <div class="col-md-6"><input type="text"
                                        <?php
                                            if(isset($_SESSION['client_name']))
                                            {
                                                ?>
                                                value = "<?= $_SESSION['client_name'] ?>"
                                                <?php
                                            }
                                            else
                                            {

                                            }
                                         ?>
                                         name="name" placeholder="Your name..."  ></div>
                                        <div class="col-md-6"><input type="text"
                                             <?php
                                            if(isset($_SESSION['client_name']))
                                            {
                                                ?>
                                                value = "<?= $_SESSION['email'] ?>"
                                                <?php
                                            }
                                            else
                                            {

                                            }
                                         ?>
                                         name="email" placeholder="Email..."   ></div>
                                    </div>

                                    <textarea name="message" placeholder="Your message..." required="required" style="height: 30px"></textarea><br>
                                    <input type="submit" value="send message" role="button" class="btn btn-primary" >
                                </form>
                            </div>
                        </div>
                    </div>

                    <p style="text-align: center; color: white;">Copyright &copy;<b> CodeHut</b>&trade; 2017  . All right reserved</p>
                </div>