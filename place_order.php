<?php
session_start();
include 'my_admin/db.php';
$sql="";
//if not login,then need to login fst
//not working but no need of it
//if (!isset($_SESSION['admin']) || !isset($_SESSION['pwd'])) {
//    header("location:my_admin/admin_login.php");
//    exit();
//}

//if cart is empty then he/she cant place order and redirect to shop page
if (isset($_SESSION['cart_array'])==NULL) {
    header("location:shop.php?pro=dairy&pages=1");
    exit();
}
?>


<?php

//echo $pn=$_SESSION['pnamess'];




//data inserting for order detail in order_detail table

//sessions come from add to cart page
$_SESSION['cart_array'];
//$pn=$_SESSION['pnamess'];
//$prr=$_SESSION['unit_price'];
//$prr= $_SESSION['total_price'];
foreach ($_SESSION['cart_array'] as $each_item)
{
    $item_id=$each_item['item_id'];
    $item_quant=$each_item['quantity'];
    
 
   $evnt="fetch_for";
   $fetching="call product(?,?,?,?,?,?,?,?,?)";
   $st=$con->prepare($fetching);
   $a='';
   $st->bindParam(1,$evnt);
   $st->bindParam(2,$a);
   $st->bindParam(3,$a);
   $st->bindParam(4,$a);
   $st->bindParam(5,$a);
   $st->bindParam(6,$a);
   $st->bindParam(7,$a);
   $st->bindParam(8,$a);
   $st->bindParam(9,$item_id);
    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute();
		while($row =$st->fetch())
		{
			$pn = $row->pname;
			$prr = $row->price;
			//$details = $row->details;
                          
                        //$_SESSION['pnamess']=$product_name;
                        //$_SESSION['unit_price']=$price;
		}
    
         //calling stored procedure for inserting user order in order_details table,pass parameter where it is required ,and keep empty othres
    $evnt="insert";
    $a='';
    $login="call order_details(?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$pn);
    $st->bindParam(3,$prr);
    $st->bindParam(4,$each_item['quantity']);
    $st->bindParam(5,$_SESSION['adm_id']);
    $st->bindParam(6,$each_item['item_id']);
     $st->execute();
        }

?>



<?php

//updating product table according to its quantity,it will subtract quantity of product from quantity of ordered product or order_detail table
//it will manage stock of product

$user_id=$_SESSION['adm_id'];
foreach ($_SESSION['cart_array'] as $each_item)
{
    $item_id=$each_item['item_id'];
    $item_quant=$each_item['quantity'];
    
    $evnt="update_quant";
   $fetching="call product(?,?,?,?,?,?,?,?,?)";
   $st=$con->prepare($fetching);
   $a='';
   $st->bindParam(1,$evnt);
   $st->bindParam(2,$a);
   $st->bindParam(3,$a);
   $st->bindParam(4,$a);
   $st->bindParam(5,$a);
   $st->bindParam(6,$a);
   $st->bindParam(7,$a);
   $st->bindParam(8,$a);
   $st->bindParam(9,$item_id);
    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute();
              //$st=$con->prepare("update product INNER JOIN order_detail ON product.pname=order_detail.product SET product.quantity=product.quantity-order_detail.quantity WHERE product.pid='".$item_id."'");
             // $st->execute();
 }


?>



<?php
//DATA INSERTING IN PAYMENT TABLE

//this function will get ip address of user via $_SERVER['REMOTE_ADDR']
//$_SERVER['HTTP_X_FORWADED_FOR'] AND $_SERVER['HTTP_CLIENT_IP'] WILL GET REAL IP ADDRES OF USER IF HE USES PROXY 

function  getip()
{
    $ip=$_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWADED_FOR'])) 
        {
        $ip=$_SERVER['HTTP_X_FORWADED_FOR'];
        }
        return $ip;
 }
 $ip_addr=getip();
 
 //now inserting all
$date_now=  getdate();
  $payment_meth=$_POST['payment_method'];

 //calling stored procedure for inserting user payment detail in payment table,pass parameter where it is required ,and keep empty othres
    $evnt="insert";
    $a='';
    $login="call payment(?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$_SESSION['adm_id']);
    $st->bindParam(3,$_SESSION['net_amountt']);
    $st->bindParam(4,$payment_meth);
    $st->bindParam(5,$a);
    $st->bindParam(6,$a); 
    $st->bindParam(7,$a); 
    $st->execute();
?>


<?php
//data inserting for shipping in shipping_info table
$cont=$_POST['billing_country'];
$fnam=$_POST['billing_first_name'];
$lnam=$_POST['billing_last_name'];
$addr=$_POST['billing_address_2'];
$city=$_POST['billing_city'];
$email= preg_replace('#[^A-Za-z0-9]#i','', $_POST['billing_email']);
$phone= preg_replace('#[0-9]#i','',$_POST['billing_phone']);;
$uid= $_SESSION['adm_id'];

//echo $_SESSION['cart_array'];
//echo $each_item;
//echo $pnam=$product_name;
 
// $st=$con->prepare("insert into shipping_info(fname,lname,address,country,city,phone,email,uid,order_date) values(:fn,:ln,:adr,:co,:ci,:ph,:ema,:uid,'".  getdate()."')");
// $st->bindParam(":fn", $fnam, PDO::PARAM_STR);
// $st->bindParam(":ln",$lnam,  PDO::PARAM_STR);
//  $st->bindParam(":adr", $addr, PDO::PARAM_STR);
// $st->bindParam(":co",$cont,  PDO::PARAM_STR);
// $st->bindParam(":ci", $city, PDO::PARAM_STR);
// $st->bindParam(":ph",$phone,  PDO::PARAM_STR);
//  $st->bindParam(":ema", $email, PDO::PARAM_STR);
// $st->bindParam(":uid",$uid,  PDO::PARAM_INT);
// $st->bindParam(":od",  getdate());
 
//calling stored procedure for inserting user shipping info in shipping_info table,pass parameter where it is required ,and keep empty othres
    $evnt="insert";
    $a='';
    $login="call shipping_info(?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$uid);
    $st->bindParam(3,$fnam);
    $st->bindParam(4,$lnam);
    $st->bindParam(5,$addr);
    $st->bindParam(6,$cont);
    
    $st->bindParam(7,$city);
    $st->bindParam(8,$phone);
    $st->bindParam(9,$email);
    $st->bindParam(10,$a);
    $st->execute();

//cart session and data will remove after place the order
    if (isset($st)) {
       unset($_SESSION["cart_array"]);
       unset($_SESSION['net_amountt']);
       unset($_SESSION['total_item']);
}
$_SESSION["done"]= '<script>alert("order has been placed")</script>';
header("location:myacount.php");
exit();

?>
