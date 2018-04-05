<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
    <title>My Account</title>
    
   <?php 
            session_start();
            include 'my_admin/db.php';
         
            if (isset($_SESSION['admin'])==NULL || isset($_SESSION['pwd'])==NULL ) {
              header("location:my_admin/admin_login.php");
              exit();
          }  
          
         //message if order has been placed
          if (isset($_SESSION["done"])) {
              echo $_SESSION["done"];
              $_SESSION["done"]="";
              //session_unset();
          }
         //  function  getip()
//{
//    $ip=$_SERVER['REMOTE_ADDR'];
//    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//        $ip=$_SERVER['HTTP_CLIENT_IP'];
//    }
//    elseif (!empty($_SERVER['HTTP_X_FORWADED_FOR'])) 
//        {
//        $ip=$_SERVER['HTTP_X_FORWADED_FOR'];
//        }
//        return $ip;
// }
//echo $ip_addr=getip();
            ?>
    <style>
table  {
    width:100%;
}
table, th, td  {
    border: 1px solid black;
    border-collapse: collapse;
}
 th, td {
    padding: 5px;
    text-align: left;
}
table  tr:nth-child(even) {
    background-color: #eee;
}
table #t01 tr:nth-child(odd) {
   background-color:#fff;
}
table th {
    background-color: black;
    color: white;
}
</style>
  </head>
  <body>
   
    <?php include 'header_file.php'?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>My Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
      
   <?php 
          
 
    
       $id=$_SESSION['adm_id'];

   
           echo '&nbsp;&nbsp;&bull;<a href="myacount.php?order='.$id.'">My Orders</a></br>';
              echo '&nbsp;&nbsp;&bull;<a href="pdff.php?invoice='.$id.'">Get Invoice</a></br>';
          echo '&nbsp;&nbsp;&bull;<a href="myacount.php?detail='.$id.'">Account Details</a></br>';
            echo '&nbsp;&nbsp;&bull;<a href="myacount.php?edit='.$id.'">Edit Account</a></br>';
            echo '&nbsp;&nbsp;&bull;<a href="myacount.php?pass='.$id.'">Change Password</a></br>';
              echo '&nbsp;&nbsp;&bull;<a href="myacount.php?delete='.$id.'">Delete Account</a>';
             // $_SESSION['cart_array'];

//foreach ($_SESSION['cart_array'] as $each_item)
//{
//    echo $each_item['item_id']."and".$each_item['quantity']."<br>";
//}echo "a". $pn=$_SESSION['pnamess'];
//  $na=$_SESSION['net_amountt'];
//  echo $na;?>
      
        <!--Order details-->
        
        <?php
        $odet="";
     if (isset($_GET['order'])) {
        $order_det_id=$_GET['order'];
     //$st=$con->prepare("select * from order_detail where customer_id=$order_det_id");
     
     //calling stored procedure for inserting user order in order_details table,pass parameter where it is required ,and keep empty othres
    $evnt="fetch";
    $a='';
    $login="call order_details(?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
    $st->bindParam(4,$a);
    //user id,required for fetchng his order specifically
    $st->bindParam(5,$order_det_id);
    $st->bindParam(6,$a);
    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute();
   
     while ($ro=$st->fetch())
     {
        $product=$ro->product;
       $price=$ro->price;
       $quant=$ro->quantity;
      // $cid=$ro->customer_id;
        $odet.="<tr>
               <td><b>$product</b>&nbsp;&nbsp;</td><td>$price&nbsp;&nbsp;</td><td>$quant&nbsp;&nbsp;</td>
                   </tr> "; 
         
     }
  ?>
         
      <table id='t01'>
                <tr><th>Product Name &nbsp;&nbsp;</th><th>Price &nbsp;&nbsp;</th>
                <th>Quantity &nbsp;&nbsp;</th>
                </tr>
                     
        <?php  
        echo $odet."</br>";
        ?>
                
        </table>
        <?php
     }
        
        ?>
        
        <!--getting invoice pdf-->
        <?php
        
//        if (isset($_GET['invoice'])) {
//            
//            header("location:pdff.php");
//            exit();
//        }
        ?>
        
      <!--account details-->
    <?php
 if (isset($_GET['detail'])) {
     $acc_det_id=$_GET['detail'];
     //$st=$con->prepare("select * from login where id=$acc_det_id");
     
      //calling stored procedure for fetching user details on the basis of id for updatong,pass parameter where it is required ,and keep empty othres
    $evnt="fetch_for_update";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
    //user id for fethning his detAIL
    $st->bindParam(4,$acc_det_id);
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
     while ($ro=$st->fetch())
     {
        $name=$ro->name;
       $ps=$ro->password;
       $ema=$ro->email;
       $phne=$ro->phone;
	   $ag=$ro->age;
	   $cit=$ro->city;
	   $cont=$ro->country;
         
     }
  echo   $detail="<table id='t01'>
                <tr><th>Name &nbsp;&nbsp;</th><th>Password &nbsp;&nbsp;</th>
                <th>Email &nbsp;&nbsp;</th><th>&nbsp;&nbsp; Phone num. &nbsp;&nbsp;</th><th>Age &nbsp;&nbsp;
                </th><th>City&nbsp;&nbsp;</th><th>Country&nbsp;&nbsp;</th>
                
               
               <tr>
               <td><b>$name</b>&nbsp;&nbsp;</td><td>$ps&nbsp;&nbsp;</td><td>$ema&nbsp;&nbsp;</td><td>&nbsp;&nbsp $phne &nbsp;&nbsp</td>
               <td>$ag &nbsp;&nbsp;</td><td>$cit&nbsp;&nbsp</td>&nbsp;&nbsp;
               <td>$cont &nbsp;&nbsp;</td></tr>
                    </table></br>";
  

 }
    ?>
        <!--Change Password-->
        
        <?php
      if (isset($_GET['pass'])) {
          $pas_id=$_GET['pass']; 
        ?>
        <form action="useracount_cpassword.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
    <b>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
    <input type="password" name="pass" id="nam" size="64" value="" placeholder="Password" required><br><br>
      <b>Confirm Password</b>
      <input type="password" name="cpass" id="p" size="64" value="" placeholder="Confirm Password" required><br><br>
       <input type="hidden" name="thisID" value="<?php echo $pas_id; ?>">
        <input type="submit" name="button" id="butto" value="Change Password">
      
        </form>
        
      <?php } ?>
      
      <!--delete details-->
    
      <?php 
    if (isset($_GET['delete'])) {
         echo '</br></br>do u really want to delete your account? <a href="myacount.php?yesdelete='.$_GET['delete'].'">yes </a>|<a href="myacount.php"> No</a>';
     exit();
     
                                }
 if (isset($_GET['yesdelete'])) {
    $del_id=$_GET['yesdelete'];
    $del=("DELETE FROM `login` WHERE `id`='$del_id' LIMIT 1");
    $con->exec($del);
    
    //calling stored procedure for deleting user details,pass parameter where it is required ,and keep empty othres
     $evn="delete";
    $a='';
    $logi="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($logi);
    $st->bindParam(1,$evn);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
    //user id for delete his details
    $st->bindParam(4,$del_id);
    $st->bindParam(5,$a);
    $st->bindParam(6,$a);
    $st->bindParam(7,$a);
    $st->bindParam(8,$a);
    $st->bindParam(9,$a);
    $st->bindParam(10,$a);
    $st->bindParam(11,$a);
    $st->bindParam(12,$a);
    $st->execute();
    //unlink the image from server
//	$pictodelete = ("../img/$id_to_delete.jpeg");
//        if (file_exists($pictodelete)) {
//            unlink($pictodelete);
//        }
    header('location:my_admin/admin_login.php');
    exit();
}
     ?>
      
      <!--EDIT Account-->
      <?php
      
     if (isset($_GET['edit'])) {
         $eid=$_GET['edit'];
        //$st=$con->prepare("select * from login where id=$eid");
        
        //calling stored procedure for fetching user details on the basis of id for updatong,pass parameter where it is required ,and keep empty othres
    $evnt="fetch_for_update";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
    //user id for fethning his detAIL
    $st->bindParam(4,$eid);
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
     while ($ro=$st->fetch())
     {
           $idd=$ro->id;
           $name=$ro->name;
           $pswd=$ro->password;
           $email=$ro->email;
           $phone=$ro->phone;
	   $age=$ro->age;
	   $city=$ro->city;
	   $country=$ro->country;
         
     }
?>          
     
     <form action="useracount_update.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
    <b>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
    <input type="text" name="name" id="nam" size="64" value="<?php echo $name ?>" required><br><br>
      <b>Password</b>
      <input type="text" name="pswd" id="p" size="64" value="<?php echo $pswd ?>" required><br><br>
      <b>Email  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        
            <input type="email" name="email" id="exp" size="64" value="<?php echo $email ?>" required><br><br>
        
        <b>Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
         <input type="tel" name="phone" id="exp" size="67" value="<?php echo $phone ?>" required><br><br>
      <b>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        <input type="text" name="age" id="age"  size="64" value="<?php echo $age ?>" required><br><br>
      <b>City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        <input type="text" name="city" id="age" size="64" value="<?php echo $city ?>" required><br><br>
     <b>country &nbsp;&nbsp;&nbsp;</b>
        <input type="text" name="country" id="age" size="64" value="<?php echo $country ?>" required><br><br>
        <input type="hidden" name="thisID" value="<?php echo $idd ; ?>">
        <input type="submit" name="button" id="butto" value="Update Your Account">
      
    
    </form>
     &nbsp;
        
   <?php   
      } //echo $_SESSION['update'];  
      ?>
    <?php include 'footer_file.php'?>
</body>
</html>