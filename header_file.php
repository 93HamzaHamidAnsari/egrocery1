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
    
<!--    ajax code for signup,it will show suggestion msg if user already exist-->
<script>
//function showHint(str) {
//    if (str.length == 0) {
//        document.getElementById("txtHint").innerHTML = "";
//        return;
//    } else {
//        var xmlhttp = new XMLHttpRequest();
//        xmlhttp.onreadystatechange = function() {
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
//            }
//        };
//        xmlhttp.open("GET", "signup.php?q=" + str, true);
//        xmlhttp.send();
//    }
//}
</script>
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="myacount.php"><i class="fa fa-user"></i><?php if (isset($_SESSION['admin'])){
                                                                                    echo $_SESSION['admin']."'s";}
                                                                                    else {echo "My";}?> Account</a></li>
                            
                            <?php 
                            
                            if (isset($_SESSION['admin'])==NULL && isset($_SESSION['pwd'])==NULL) 
                                {
                                    echo '<li><a href="#sign" data-toggle="modal"><i class="fa fa-user"></i> Sign In</a></li>
                                            <li><a href="#log" data-toggle="modal"><i class="fa fa-user"></i> Login</a></li>';
                                } 
                           else 
                               {                                                   
                           
                            echo '<li><a href="logout.php" data-toggle=""><i class="fa fa-user"></i> Logout</a></li>';
                               }                          
                           ?>
                            <li><a href="add_to_cart.php"><i class="fa fa-user"></i><?php if (isset($_SESSION['admin'])){
                                                                                    echo $_SESSION['admin']."'s";}
                                                                                    else {echo "My";}?> Cart</a></li>
                            <li><a href="checkout.php"><i class="fa fa-user"></i> Checkout</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">PKR </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"  href=""><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php">e<span>Grocery</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="add_to_cart.php">Cart - <span class="cart-amunt"><?php if (isset($_SESSION['net_amountt'])==NULL) {
                                                                                    echo $_SESSION['net_amountt']=0;} else {
                                                                                     echo $_SESSION['net_amountt'];}?>PKR</span> 
                            <i class="fa fa-shopping-cart"></i> <span class="product-count">
 <?php if (isset($_SESSION['total_item'])==NULL) { echo $_SESSION['total_item']=0;} else {echo $_SESSION['total_item'];}?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                          
                          
              <li class="dropdown ">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">Shop page<span class="caret"></span></a>
        
        <ul class="dropdown-menu">
     
              <li><a href="shop.php?pro=dairy&pages=1">Dairy Products</a></li>
              <li><a href="shop.php?pro=pulses&pages=1">Pulses</a></li>
              <li><a href="shop.php?pro=grocery&pages=1">Grocery</a></li>
              <li><a href="shop.php?pro=Health&Beauty&pages=1">Health & Beauty</a></li>
              <li><a href="shop.php?pro=detergent&pages=1">Detergent</a></li>
     
          </ul>
        </li>
                    
        <li><a href="add_to_cart.php">Cart</a></li>
        <li ><a href="checkout.php">Checkout</a></li>
                       
        <li><a href="contactt.php">Contact</a></li>
        <li class=""><a href="aboutus.php">About Us</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> 
  <!-- End mainmenu area -->
    
    
    <!--login modal box ,it will appear when user click on picture before login-->
<div id="log" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Login</h4>
                        </div>
                          <div class="modal-body">
                              <form role="form" method="post" action="my_admin/admin_login1.php">
                         <div class="form-group">
                         <label class="glyphicon glyphicon-user">Username</label>
                         <input type="text" name="username" class="form-control">
                         </div>
                         <div class="form-group">
                         <label>Password</label>
                         <input type="password" name="password" class="form-control">
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
         <?php include 'ajax.php'; ?>
             <!--signin modal box ,it will appear when user click on picture before login-->
<div id="sign" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Sign Up</h4>
                        </div>
                          <div class="modal-body">
                              <form role="form" method="post" action="my_admin/wel_sign.php">
                         <div class="form-group">
                         <label class="glyphicon glyphicon-user">Username</label>
                         <input type="text" onkeyup="ajx(this.value,'my_admin/aj_signin.php','txthint')" name="signin_name" class="form-control">
                         </br><p><b>Suggestions</b>: <span id="txthint"></span></p>
                         </div>
                         <div class="form-group">
                         <label>Password</label>
                         <input type="password" name="pswd" class="form-control">
                         </div>
                         <div class="form-group">
                         <label class="glyphicon glyphicon-envelope">Email Address</label>
                         <input type="email" name="email" class="form-control">
                         </div>
                         <div class="form-group">
                         <label class="glyphicon glyphicon-phone">Phone Num</label>
                         <input type="tel" name="pnum" class="form-control">
                         </div>
                          <div class="form-group">
                         <label class="">Age</label>
                         <input type="text" name="agee" class="form-control">
                         </div>
                         <div class="form-group">
                         <label class="">City</label>
                         <select name="cityy" width="200px" class="form-group">
                             <option value="Select any one...">Select any one...</option>
                             <option value="Karachi">Karachi</option>
                             <option value="Lahore">Lahore</option>
                             <option value="Dubai">Dubai</option>
                             <option value="London">London</option>
                         </select>
                         </div>      
                          <div class="form-group">
                         <label class="">Country</label>
                         <select name="cntry" width="200px" class="form-group">
                             <option value="Select any one...">Select any one...</option>
                             <option value="Karachi">Pakistan</option>
                             <option value="Lahore">UAE</option>
                             <option value="UK">UK</option>
                         </select>
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
    

