<?php
include 'db.php';
session_start();
//  if (preg_match('#[^A-Za-z0-9]#i', $_POST['pswd'])===1) {
//         $pswrd =  $_POST["pswd"]; 
//            // header("location:admin_login.php"); 
//        } else {
//              echo '<script>alert("invalid pswd");</script>';
//          exit();
//            }
 //$i=$_REQUEST["q"];
$nn=$_POST['name'];
   $pwd=$_POST['pswd'];
   $em=$_POST['email'];
   $pno=$_POST['phone'];
   $age=$_POST['age'];
   $ci=$_POST['city'];
   $co=$_POST['country'];
   $stat=$_POST['stat'];
   
   //$nam=  preg_match('/^[A-Za-z]{5,31}$/',$_POST['signin_name']);
////working ,from net
////[a-z0-9]means succes if any of alpha or numeric found alone or mixed ,but we need both for succsess so check them sepratly[a-z][0-9]but squence issue here
$nam= preg_match('/^[A-Za-z][A-Za-z0-9]{4,31}$/',$nn);
//use this
//use '|'for oor operator
$p=  preg_match('/[a-z][0-9]|[0-9][a-z]{5,31}/', $pwd);
$ph=  preg_match('/[0-9]{11,}/', $pno);
$a=  preg_match('/[0-9]/', $age);
$cit= preg_match('/^[A-Za-z][A-Za-z0-9]{4,31}$/',$ci);
$cont= preg_match('/^[A-Za-z][A-Za-z0-9]{4,31}$/',$co);
//if (!$nam) 
//    {
//    echo  $_SESSION["nam"]="<script>alert('name should contain atleast 5 and max 31 chars')</script>";
//    //session_unset();
//    header("location:user_detail.php");
//    exit();
//   }
//   elseif (!$p) {
//     echo "<script>alert('password should contain atleast 5 and max 31 chars')</script>";
//     // session_unset();
//      header("location:user_detail.php");
//    exit();
//   }
//   elseif (!filter_var($em,FILTER_VALIDATE_EMAIL)) {
//        echo $_SESSION["email"]="<script>alert('invalid email')</script>";
//     // session_unset();
//      header("location:user_detail.php");
//    exit();
//   }
//   elseif (!$ph) {
//      echo "<script>alert('phone should contain atleast 11 digits')</script>";
//     // session_unset();
//     header("location:user_detail.php");
//    exit();
//   }
//   elseif (!$a) {
//     echo $_SESSION["age"]="<script>alert('age should contain only digits')</script>";
//     // session_unset();
//     header("location:user_detail.php");
//    exit();
//   }
//   elseif (!$cit) {
//     echo $_SESSION["cit"]="<script>alert('city should be alphanumeric')</script>";
//      //session_unset();
//     header("location:user_detail.php");
//    exit();
//   }
//   elseif (!$cont) {
//     echo $_SESSION["cont"]="<script>alert('conuntry should be alphanumeric')</script>";
//      ///session_unset();
//      header("location:user_detail.php");
//    exit();
//   }
//   
//
// else {
//       
   if (isset($_POST['thisID'])) {
//if (isset($_REQUEST["q"])){
   //    $i=$_REQUEST["q"];
   $id=$_POST['thisID'];
   //echo $id;
  // $update=$con->prepare("update login set name='$nam',password='$pswrd',email='$em',phone='$ph',age='$ages',city='$ci',country='$co' where id=$id");
    //calling stored procedure for updating user details on the basis of id for updating,pass parameter where it is required ,and keep empty othres
   $dat=  date("Y-m-d H:i:s"); 
   $evnt="update";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$nn);
    $st->bindParam(3,$pwd);
    $st->bindParam(4,$id);
    $st->bindParam(5,$em);
    $st->bindParam(6,$pno);
    $st->bindParam(7,$age);
    $st->bindParam(8,$ci);
    $st->bindParam(9,$co);
    $st->bindParam(10,$dat);
    $st->bindParam(11,$stat);
     $st->bindParam(12,$a);    
   $st->execute();
   //echo 'agaya'.$id."<br>";
     // echo $_SESSION['update']=$st->rowCount()." rows updated";
    header("location:user_detail.php");
        exit();
   } 
 //}
?>
