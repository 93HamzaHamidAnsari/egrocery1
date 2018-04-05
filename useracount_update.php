<?php
include 'my_admin/db.php';
session_start();
if(isset($_SESSION['admin'])==NULL || !isset($_SESSION['pwd']))
{
    //session_destroy();
   // echo 'invalid adress';
    
        header('location:my_admin/admin_login.php');
	//header("location: admin_index.php");
	exit();
}?>

<?php
$nam=$_POST['name'];
   $pswrd=$_POST['pswd'];
   $em=$_POST['email'];
   $ph=$_POST['phone'];
   $ages=$_POST['age'];
   $ci=$_POST['city'];
   $co=$_POST['country'];
   if (isset($_POST['thisID'])) {
       
   $id=$_POST['thisID'];
   //$update=$con->prepare("update login set name='$nam',password='$pswrd',email='$em',phone='$ph',age='$ages',city='$ci',country='$co' where id=$id");
    //calling stored procedure for updating user details on the basis of id for updating,pass parameter where it is required ,and keep empty othres
     $evnt="update";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$nam);
    $st->bindParam(3,$pswrd);
    $st->bindParam(4,$id);
    $st->bindParam(5,$em);
    $st->bindParam(6,$ph);
    $st->bindParam(7,$ages);
    $st->bindParam(8,$ci);
    $st->bindParam(9,$co);
    $st->bindParam(10,$a);
    $st->bindParam(11,$a);
     $st->bindParam(12,$a);       
   
   
   $st->execute();
       // $_SESSION['update']=$update->rowCount()." rows updated";
        header("location:myacount.php");
        exit();
   }   
?>