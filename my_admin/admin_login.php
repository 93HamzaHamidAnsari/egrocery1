 
<?php 
session_start(); 

 if (isset($_SESSION["nam"])) {
       
     
       echo $_SESSION["nam"];
       session_unset();//or $_session["nam"]="";
    }
    elseif (isset ($_SESSION["pas"])) {
   
       echo $_SESSION["pas"];
       session_unset();
}
  elseif (isset ($_SESSION["email"])) {
   
       echo $_SESSION["email"];
       session_unset();
}
  elseif (isset ($_SESSION["ph"])) {
   
       echo $_SESSION["ph"];
       session_unset();
}
  elseif (isset ($_SESSION["age"])) {
   
       echo $_SESSION["age"];
       session_unset();
}
  elseif (isset ($_SESSION["cit"])) {
   
       echo $_SESSION["cit"];
       session_unset();
}
  elseif (isset ($_SESSION["cont"])) {
   
       echo $_SESSION["cont"];
       session_unset();
}

elseif (isset ($_SESSION["namexist"])) {
 echo $_SESSION["namexist"];
       session_unset();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>

<body>

<div align="center" id="mainWrapper">
		<?php include_once("header_file.php"); ?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Login </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  <div id="pageContent">
  	<div align="left" style="margin-left:24px;">
  	  <h2>Please Log In To Manage the Store </h2>
          
          
          <form id="form1" name="form1" method="post" action="admin_login1.php">
              <p>User Name:<br><input type="text" name="username" id="password" size="40" required></p>
              <p> Password:<br><input type="password" name="password" id="passowrd" size="40" required></p>
      <p><input type="submit" name="button" id="button" value="Log In"></p>
      </form>
          
          <a href="#sign" data-toggle="modal"> Sign In</a>
          
          <?php include 'ajax.php'; ?>
             <!--signin modal box ,it will appear when user click on picture before login-->
<div id="sign" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Sign Up</h4>
                        </div>
                          <div class="modal-body">
                              <form role="form" method="post" action="wel_sign.php">
                         <div class="form-group">
                         <label class="glyphicon glyphicon-user">Username</label>
                         <input type="text" onkeyup="ajx(this.value,'aj_signin.php','txthint')" name="signin_name" class="form-control">
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
                             <label class="">City</label><br>
                         <select name="cityy" style="width:200px">
                             <option value="Select any one...">Select any one...</option>
                             <option value="Karachi">Karachi</option>
                             <option value="Lahore">Lahore</option>
                             <option value="Dubai">Dubai</option>
                             <option value="London">London</option>
                         </select>
                         </div>      
                          <div class="form-group">
                              <label class="">Country</label><br>
                         <select name="cntry" width="200px">
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
          
  	</div>
  </div>
  <?php include_once("footer_file.php"); ?>
</div>
</body>
</html>
