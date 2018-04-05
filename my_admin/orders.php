<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
    <title>Orders Details</title>
<?php

 session_start();
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
                        <h2>Orders Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
      <?php
          $odet="";
          if (isset($_GET['uorders'])) {
        $order_det_id=$_GET['uorders'];
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
       $pid=$ro->product_id;
       $cid=$ro->customer_id;
        $odet.="<tr>
               <td><b>$product</b>&nbsp;&nbsp;</td>"
                . "<td>$price&nbsp;&nbsp;</td>"
                . "<td>$quant&nbsp;&nbsp;</td>"
                  . "<td>$pid&nbsp;&nbsp;</td>"
                      . "<td>$cid&nbsp;&nbsp;</td>"
                     . "<td><a href='?cnfrm=$cid&pro=$pid&pri=$price' height='5%' class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' >Confirm</a></td>
                   </tr> "; 
         
     }
          
  ?>
         
      <table id='t01'>
                <tr><th>Product Name &nbsp;&nbsp;</th>
                    <th>Price &nbsp;&nbsp;</th>
                <th>Quantity &nbsp;&nbsp;</th>
                 <th>Product Id &nbsp;&nbsp;</th>
                  <th>User Id &nbsp;&nbsp;</th>
                  <th>Confirm Orders&nbsp;&nbsp;</th>
                </tr>
                     
        <?php  
        echo $odet."</br>";
        ?>
                
        </table>
      <br>
      <a href='orders.php?cnfrm_all=<?php echo $cid ?>' height='5%' class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' >Confirm All</a>
        <?php
     
          }
     
     if (isset($_GET["cnfrm_all"])) {
         $ci=$_GET["cnfrm_all"];
        echo '<br><b><p style="font-size:32px">Do u really want to confirm?<a href="orders.php?yes_cnfrm='.$ci.'">Yes</a>|<a href="orders.php?uorders='.$ci.'">No</a></p></b>';
        //echo "<script>alert('Do u really want to confirm?<a href='orders.php?yes_cnfrm=$ci'>Yes</a>|<a href='orders.php'>No</a>');</script>";
            
     }
     
     if (isset($_GET["yes_cnfrm"])) {
$ycid=$_GET["yes_cnfrm"];

     
         //calling stored procedure for deleting user order in order_details table,pass parameter where it is required ,and keep empty othres
    $evnt="delete";
    $a='';
    $login="call order_details(?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
    $st->bindParam(4,$a);
    //user id,required for fetchng his order specifically
    $st->bindParam(5,$ycid);
    $st->bindParam(6,$a);
    //$st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute();
    unset($st);
    
    
    //calling stored procedure for deleting user payment record from payment table,pass parameter where it is required ,and keep empty othres
    $evnt="delete";
    $a='';
    $login="call payment(?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$ycid);
    $st->bindParam(3,$a);
    $st->bindParam(4,$a);
    //user id,required for fetchng his order specifically
    $st->bindParam(5,$a);
    $st->bindParam(6,$a);
    $st->bindParam(7,$a);
    //$st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute();
     unset($st);
     
     //calling stored procedure for deleting user shipping info in shipping_info table,pass parameter where it is required ,and keep empty othres
    $evnt="delete";
    $a='';
    $login="call shipping_info(?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$ycid);
    $st->bindParam(3,$a);
    $st->bindParam(4,$a);
    $st->bindParam(5,$a);
    $st->bindParam(6,$a);
    
    $st->bindParam(7,$a);
    $st->bindParam(8,$a);
    $st->bindParam(9,$a);
    $st->bindParam(10,$a);
    $st->execute();
  echo "<script>alert('records deleted successfully')</script>";
   // header("location:user_detail.php");
    exit();
     }
     
     
     //cnfrm for single product
     
     if (isset($_GET["cnfrm"]) && isset($_GET["pro"])) {
         $cnid=$_GET["cnfrm"];
         $pro_id=$_GET["pro"];
         $pro_pri=$_GET["pri"];
         
         //calling stored procedure for deleting user single order in order_details table,pass parameter where it is required ,and keep empty othres
    $evnt="delete_one";
    $a='';
    $login="call order_details(?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
    $st->bindParam(4,$a);
    //user id,required for fetchng his order specifically
    $st->bindParam(5,$cnid);
    $st->bindParam(6,$pro_id);
//    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute();
    unset($st);
    
    //calling stored procedure for deleting user payment record from payment table,pass parameter where it is required ,and keep empty othres
    $evnt="update_one";
    $a='';
    $login="call payment(?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$cnid);
    $st->bindParam(3,$a);
    $st->bindParam(4,$a);
    //user id,required for fetchng his order specifically
    $st->bindParam(5,$a);
    $st->bindParam(6,$a);
    $st->bindParam(7,$pro_pri);
//    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute();
     unset($st);
      echo "<script>alert('records deleted successfully')</script>";
   // header("location:user_detail.php");
    exit();
     }
        ?>
        

      <br>



<?php include 'footer_file.php'?>
</body>
</html>
