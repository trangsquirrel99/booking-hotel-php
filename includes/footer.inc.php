<?php
    require('dbh.inc.php');
    if(isset($_POST['submit'])){
        $name= mysqli_real_escape_string($conn,$_POST['name']);
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $phone = $_POST['phone'];
        $mes = mysqli_real_escape_string($conn,$_POST['message']);
        $sql = "INSERT INTO feedback (Ten,Phone,Email,Message,Trangthai) VALUES ('$name','$phone','$email','$mes','0')";
        $stmt= $conn -> prepare($sql);
        $stmt->execute();
    }
         ?>
        <footer class="spacer bg-dark" style="padding:50px 0; margin-top: 60px;">
                <div class="container">
                    <div class="row">
                         <div class="col-3">'
                    <h4 style="color:white;">Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="#">Loại phòng</a></li>        
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Dịch vụ</a></li>
                        <li><a href="includes/loginAdmin.inc.php">Đăng nhập Admin</a></li>
                    </ul>
                </div>
                <div class="col-5">       
                        <h4 style="color:white;">Write to us</h4>
                        <!-- <label style="color: <?php echo $color; ?>">
                            <?php
                                echo $error;
                            ?>
                        </label> -->
                        <form role="form" method="post">
                            <div class="form-group">    
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                            <input type="phone" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                            <textarea type="text" class="form-control" name="message" placeholder="Message" rows="4" required></textarea>
                            </div>  
                            <input type="submit" class="btn btn-primary" value="Send" name="submit">
                        </form>
                </div>              
                 
                 <div class="col-4" align="center">
                    <h4 style="color:white;">Be Social With Us</h4>
                    
                    <div class="social">
                    <a href="http://www.facebook.com"><i class="fab fa-facebook-square fa-2x" data-toggle="tooltip" data-placement="top" data-original-title="facebook"></i></a>
                    <a href="http://www.instagram.com"><i class="fab fa-instagram fa-2x"  data-toggle="tooltip" data-placement="top" data-original-title="instragram"></i></a>
                    <a href="http://www.twitter.com"><i class="fab fa-twitter-square fa-2x" data-toggle="tooltip" data-placement="top" data-original-title="twitter"></i></a>
                    <a href="http://www.pinterest.com"><i class="fab fa-pinterest-square fa-2x" data-toggle="tooltip" data-placement="top" data-original-title="pinterest"></i></a>
                    <a href="http://www.tumblr.com"><i class="fab fa-tumblr-square fa-2x" data-toggle="tooltip" data-placement="top" data-original-title="tumblr"></i></a>
                    <a href="http://www.youtube.com"><i class="fab fa-youtube-square fa-2x" data-toggle="tooltip" data-placement="top" data-original-title="youtube"></i></a>
                    </div>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container-->    
    
    <!--/.footer-bottom--> 
</footer>
<!-- <a href="index.php" class="toTop scroll"><i class="fas fa-angle-up fa-3x"></i></a>
 --> 