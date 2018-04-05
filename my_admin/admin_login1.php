<?php
session_start();
include 'db.php';
//$_SESSION['err']=$er;
//if (!isset($_SESSION['admin']) && !isset($_SESSION['pwd'])) {
//    echo '<script>alert($_SESSION["err"])</script>';
//}
if(!isset($_SESSION['admin']) || !isset($_SESSION['pwd']))
{
        header('location:admin_login.php');
	//header("location: admin_index.php");
	exit();
}
// else {
//    header('location:admin_login.php');
//    exit();
//}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $admin = preg_replace('#[^A-Za-z0-9]#i','', $_POST["username"]);
	$pwd = preg_replace('#[^A-Za-z0-9]#i','', $_POST["password"]);
        //preg_match chck input equal to pateren or not .if no then return false or '0' may not return orignal ans
//        if (preg_match('[^0-9]', $_POST["password"])==FALSE) {
//          echo '<script>alert("invalid email");</script>';
//          exit();
//            // header("location:admin_login.php"); 
//        } else {
//             $pwd =  $_POST["password"]; 
//            }

try {
   
//for admin 
    
   
    //$st=$con->prepare("select id, name,password,status from login where name='$admin' and password='$pwd'");
    
     //calling stored procedure for login,will check a/c to name and pwd
    $evnt="login";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$admin);
    $st->bindParam(3,$pwd);
    $st->bindParam(4,$a);
    $st->bindParam(5,$a);
    $st->bindParam(6,$a);
    $st->bindParam(7,$a);
    $st->bindParam(8,$a);
    $st->bindParam(9,$a);
    $st->bindParam(10,$a);
    $st->bindParam(11,$a);
    $st->bindParam(12,$a);
$st->setFetchMode(PDO::FETCH_OBJ);
$st->execute();
while ($r=$st->fetch())
{
    $adm_id=$r->id;
    $namee=$r->name;
    $psd=$r->password;
    $statsus=$r->status;
    
    $_SESSION['adm_id']=$adm_id;
    $_SESSION['admin']=$namee;
    $_SESSION['pwd']=$psd;
    $_SESSION['stats']=$statsus;
    
}








if ($admin==$_SESSION['admin'] && $pwd==$_SESSION['pwd']&& $_SESSION['stats']==1) {
    header('location:admin_index.php');
    exit();
}

elseif ($admin==$_SESSION['admin'] && $pwd==$_SESSION['pwd']) {
header('location:../shop.php?pro=dairy&pages=1');
    //header('location:admin_index.php');
    exit();
}
else
     {
   // header('location:../shop.php');
     header('location:admin_login.php');
     exit();
      }

}
catch (PDOException $ex) {
    $ex->getMessage();
}}


 
 






//else
//	{
//		echo 'That information is incorrect, try again <a href="admin_login.php">Click Here</a>';
//		exit();
//	}
?>


