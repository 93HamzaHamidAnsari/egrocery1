<?php
session_start();
include "db.php";
//$con="";
$s=1;
if(!isset($_SESSION['admin']) || !isset($_SESSION['pwd']) || $_SESSION['stats']!=$s)
{
    session_destroy();
   // echo 'invalid adress';
    
        header('location:admin_login.php');
	//header("location: admin_index.php");
	exit();
}

//fething values from form
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['details'])) {
    
        $pid = mysql_real_escape_string($_POST['thisID']);
	$name = mysql_real_escape_string($_POST['name']);
	$price = mysql_real_escape_string($_POST['price']);
	$type = mysql_real_escape_string($_POST['type']);
	$expir = mysql_real_escape_string($_POST['expiry']);
	$details = mysql_real_escape_string($_POST['details']);
        $qn = mysql_real_escape_string($_POST['quant']);
	try {
    //$con=new PDO("mysql:host=localhost;dbname=portal",'root','');
       // $update=$con->prepare("update product set pname='$name',price='$price',type='$type',details='$details',expiry='$expir' where pid=$pid");
       
             //calling stored procedure for updating data of products
            
    $evntt="update";
    $a='';
    $fetching="call product(?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($fetching);
    $st->bindParam(1,$evntt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$name);
    $st->bindParam(4,$price);
    $st->bindParam(5,$type);
    $st->bindParam(6,$expir);
    $st->bindParam(7,$details);
    $st->bindParam(8,$qn);
    //product id
    $st->bindParam(9,$pid);  
    $st->execute();
       // echo $update->rowCount()." rows updated";
        }
 catch (PDOException $ers)
 {
     $ers->getMessage();
 }
}
if ($_FILES['fileField']['tmp_name']!="")
  {
    $newnam="$pid.jpeg";
    move_uploaded_file($_FILES['fileField']['tmp_name'], "../img/$newnam");
    //to stop refreshing and inserted again problem
		header("location: inventory_list.php");
		exit();
  }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inventory Edit</title>

</head>

<body>
<div align="center" id="mainWrapper">
	<?php include_once("header_file.php"); ?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Inventory Edit</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  <div id="pageContent">
  <div align="right" style="margin:32px;"><a href="inventory_list.php#inventoryForm">+ Add New Inventory Item</a></div>
  	<div align="left" style="margin-left:24px;">
  	  <!--<h2>Inventory list</h2>-->
  	  <?php// echo $plist; ?>
  	</div>
    
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>Add New Inventory Item Form</h3>
    

  </div>
  <?php include_once("footer_file.php"); ?>
</div>
</body>
</html>
