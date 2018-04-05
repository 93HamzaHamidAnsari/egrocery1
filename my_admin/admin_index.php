<?php
session_start();
$s=1;
if(!isset($_SESSION['admin']) || !isset($_SESSION['pwd']) || $_SESSION['stats']!=$s)
{
    session_destroy();
   // echo 'invalid adress';
    
        header('location:admin_login.php');
	//header("location: admin_index.php");
	exit();
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Store Area</title>

</head>

<body>
<div align="center" id="mainWrapper">
	<?php include_once("header_file.php"); ?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Admin Panel <?php //echo $_SESSION['stats'] ."/".$_SESSION['pwd'] ?></h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  <div id="pageContent">
  	<div align="left" style="margin-left:24px;">
            
  	  <h2>Hello store manager, what would you like to do today?<?php //echo $_SESSION['stats'].$_SESSION['admin'];?></h2>
  	  <p><a href="inventory_list.php?pagess=1">Manage inventory</a><br>
              <a href="user_detail.php">Manage Users</a></p></br>
                <!--<a href="user_detail.php">Orders Details</a></p>-->          
          
  	</div>
  </div>
  <?php include_once("footer_file.php"); ?>
</div>
</body>
</html>