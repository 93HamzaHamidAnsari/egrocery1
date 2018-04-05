<?php?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Grocery</span></h2>
                        <p>eGrocery is a site where any one can buy grocery items of their daily use.We will provide shipping services as well in no time.</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="myacount.php">My account</a></li>
                            <li><a href="myacount.php">Order history</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="contactt.php">Vendor contact</a></li>
                            <li><a href="index.php">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                           <li><a href="shop.php?pro=dairy&pages=1">Dairy Products</a></li>
                            <li><a href="shop.php?pro=pulses&pages=1">Pulses</a></li>
                            <li><a href="shop.php?pro=grocery&pages=1">Grocery</a></li>
                            <li><a href="shop.php?pro=Health&Beauty&pages=1">Health & Beauty</a></li>
                            <li><a href="shop.php?pro=detergent&pages=1">Detergent</a></li>

                            <li class="active"><a href="aboutus.php">About Us</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 eGrocery. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="" target="_blank">HHA</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   <!--login modal box ,it will appear when user click on picture before login-->
<div id="log" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Login</h4>
                        </div>
                          <div class="modal-body">
                         <form role="form">
                         <div class="form-group">
                         <label class="glyphicon glyphicon-user">Username</label>
                         <input type="text" class="form-control">
                         </div>
                         <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control">
                         </div>
                         <button class="btn btn-info glyphicon glyphicon-log-in" type="submit"> Login</button>
                         </form>
                         </div>
                         <div class="modal-footer">
                          <a class="btn btn-primary" data-dismiss="modal">close</a> 
                          </div>
                          </div>
                         </div>
                         </div>
                         
         <!--end of login modal box--> 
         
             <!--signin modal box ,it will appear when user click on picture before login-->
<div id="sign" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Sign In</h4>
                        </div>
                          <div class="modal-body">
                         <form role="form">
                         <div class="form-group">
                         <label class="glyphicon glyphicon-user">Username</label>
                         <input type="text" class="form-control">
                         </div>
                         <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control">
                         </div>
                         <div class="form-group">
                         <label class="glyphicon glyphicon-envelope">Email Address</label>
                         <input type="email" class="form-control">
                         </div>
                         <div class="form-group">
                         <label class="glyphicon glyphicon-phone">Phone Num</label>
                         <input type="text" class="form-control">
                         </div>
                         <button class="btn btn-info glyphicon glyphicon-log-in" type="submit"> Sign In</button>
                         </form>
                         </div>
                         <div class="modal-footer">
                          <a class="btn btn-primary" data-dismiss="modal">close</a> 
                          </div>
                          </div>
                         </div>
                         </div>
                         
         <!--end of signin modal box--> 
             
   
   <?php //echo date("Y-m-d H:i:s") ?>
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>
