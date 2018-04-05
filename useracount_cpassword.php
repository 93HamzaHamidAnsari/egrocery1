<?php
include 'my_admin/db.php';
if(!isset($_SESSION['admin']) || !isset($_SESSION['pwd']))
{
    //session_destroy();
   // echo 'invalid adress';
    
        header('location:my_admin/admin_login.php');
	//header("location: admin_index.php");
	exit();
}
$pas=$_POST['pass'];
$cpas=$_POST['cpass'];

$uid=$_POST['thisID'];
if ($pas===$cpas) {
   // $update=$con->prepare("update login set password='$cpas' where id=$uid");
       
    //calling stored procedure for updating user password only on the basis of id for updating,pass parameter where it is required ,and keep empty othres
     $evnt="update";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$cpas);
    $st->bindParam(4,$id);
    $st->bindParam(5,$a);
    $st->bindParam(6,$a);
    $st->bindParam(7,$a);
    $st->bindParam(8,$a);
    $st->bindParam(9,$a);
    $st->bindParam(10,$a);
    $st->bindParam(11,$a);
     $st->bindParam(12,$a);    
    $st->execute();
        //echo "<script>alert('Password has been changed');</script>";
        header("location:myacount.php");
        exit();

        //echo $update->rowCount()." rows updated";
}
 else {
    echo 'password not match';
}

?>

