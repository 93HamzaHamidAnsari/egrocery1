<?php

session_start();
include ("validate.php");
include 'db.php';
$s=1;
if(!isset($_SESSION['admin']) || !isset($_SESSION['pwd']) || $_SESSION['stats']!=$s)
{
    session_destroy();
   // echo 'invalid adress';
    
        header('location:admin_login.php');
	//header("location: admin_index.php");
	exit();
}
//inserting data into database
if (isset($_POST['name'])) {
    
   $pna= mysql_real_escape_string(validates($_POST['name']));
	$pric = mysql_real_escape_string(validates($_POST['price']));
	$typ = mysql_real_escape_string(validates($_POST['type']));
	$expire = mysql_real_escape_string(validates($_POST['expiry']));
	$detail = mysql_real_escape_string(validates($_POST['details']));
        $qn = mysql_real_escape_string(validates($_POST['quant']));
//   $s=$con->prepare("select name from product where pname=$pna'");
//   $s->setFetchMode(PDO::FETCH_OBJ);
//   $s->execute();
//   if ($rr=$s->fetch()) {
//     echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
//		exit();
//   }
//   $con=new PDO("mysql:host=localhost;dbname=mystore",'root','');
//    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sqls=$con->prepare("insert into product (pname,price,type,expiry,details)"
//            . " values(:name,:pric,:typp,:exp,:detailss)");
//      $sqls->bindParam(':name', $pna,  PDO::PARAM_STR);
//    $sqls->bindParam(':pric', $pric,  PDO::PARAM_INT);
//      $sqls->bindParam(':typp', $typ,  PDO::PARAM_STR);
//   $sqls->bindParam(':exp', $expire,  PDO::PARAM_STR);
//   $sqls->bindParam(':detailss', $detail,  PDO::PARAM_STR);
   //$sqls->bindParam(':datee',getdate(),  PDO::PARAM_NULL);
    
      //calling stored procedure for inserting data of products
    $evnt="insert";
    $a='';
    $fetching="call product(?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($fetching);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$pna);
    $st->bindParam(4,$pric);
    $st->bindParam(5,$typ);
    $st->bindParam(6,$expire);
    $st->bindParam(7,$detail);
    $st->bindParam(8,$qn);
    $st->bindParam(9,$a);    
    $st->execute();
    $newid=$con->lastInsertId();
  // $newid=mysql_insert_id();
   $newname="$newid.jpeg";
   move_uploaded_file($_FILES['fileField']['tmp_name'], "../img/$newname");
   header('location:inventory_list.php');
   exit();
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php include_once("header_file.php"); ?>
<a name="inventoryForm" id="inventoryForm"></a>
    <h3>Add New Inventory Item Form</h3>
    
    
  </div>
  <?php include_once("footer_file.php"); ?>
</body>
</html>