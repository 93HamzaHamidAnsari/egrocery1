<?php
session_start();
include 'my_admin/db.php';
//echo $_SESSION['a']="asd";
//if the user attempts to add something to the cart from the product page

//quantity and id for insertinfg in database
//$fruit=array(0 => array("item_id" => "apple", "quantity" => 589));
//
//echo $fruit[0]["quantity"];
//foreach($_SESSION['cart_array'] as $each_item) 
//		{
//	echo $each_item["item_id"]." and ".$each_item["quantity"]."<br/>";		
//		}
//$qnt1="a";
//$qnt_subt=1;
//if (isset($_SERVER["REQUEST_METHOD"])=="post") {
    
//$_POST["submit"]="";
if(isset($_POST['myid']) || isset($_GET['myid']))
{  
    if (isset($_POST['myid'])) {
         $pid = $_POST['myid'];
    }
    elseif (isset ($_GET['myid'])) {
 $pid=$_GET['myid'];   
}
  // $_POST["myid"]=NULL;
  echo $pid;
    //check for stock available or not via subtracting from quantity given by user from quant in database
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
   $st->bindParam(9, $pid);
    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute();
		while($row =$st->fetch())
		{
			$pn = $row->pname;
                        $qnt1=$row->quantity;
                       
                      echo $pn;
                        if ($qnt1<1)
                            {
                             $_SESSION["stock"]= '<script>alert("stock not available")</script>';
                             
                             header('location: shop.php?pro=Dairy&pages=1');
                             //exit use to termninate b/c if we not use it ,it will go down and run whole page code when page load rather rediret or not
                             exit();
                            }
// else {
//                            echo $qnt_subt;
//                            echo $pn;
//                          
//}
			
		}
	
   
	$wasFound = false;
	$i = 0;
      
	//If the cart session variable is not set or cart array is empty
	if(!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1)
	{
		//Run if the cart is empty or not set
		$_SESSION['cart_array'] = array(0 => array("item_id" => $pid, "quantity" => 1));
                     
        }
	else
	{
		//Run if the cart has at least one item in it
		foreach($_SESSION['cart_array'] as $each_item)
		{
			$i++; //this $i hold the numeric representation of which associative array within multi-dimensional array is passing through loop
			
                        while(list($key, $value) = each($each_item))
			{
				if($key == "item_id" && $value == $pid)
                                     {
                                    //assign quantity and increment before adding in session array and subtract it from quant from database 
                                    //which will alert before adding in session array if product quant is not enough
                                    $q=$each_item["quantity"];
                                    $q++;
                                    
                       //check for stock available or not via subtracting from quantity given by user from quant in database
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
                       $st->bindParam(9, $pid);
                        $st->setFetchMode(PDO::FETCH_OBJ);
                        $st->execute();
                        while($row =$st->fetch())
                        {
			$pn = $row->pname;
                        $qnt1=$row->quantity;
                        $qnt1-=$q;
                        
                        if ($qnt1 <1) 
                            {
                           // $_SESSION["stock_inc"]='<script>alert("stock not available for quantity inc")</script>';
                            $_SESSION["stock"];
                            header('location: shop.php?pro=dairy&pages=1');
                             //exit use to termninate b/c if we not use it ,it will go down and run whole page code when page load rather rediret or not
                             exit();
                            }
                                    
                        }           
					//array_splice: remove a portion of the array and replace it with something else
					//array_splice(array &$input, int $offset , int length, replacement)
					array_splice($_SESSION['cart_array'], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					$wasFound = true;
                                        

			
                                    }
	
			}
		}
                      
		
                // $_SESSION['item']=$i001
                ////foreach close
		//may be for adding same item again in cart
		if($wasFound == false)
		{
			//Push one or more elements onto the end of array
			array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		}
                    //$qnt_subt-=1;
	}
        

       
         
	header('location: add_to_cart.php');
	exit();
}
//}
?>

<?php
//empty shopping cart
if(isset($_GET['cmd']) && $_GET['cmd']=="emptycart")
{
	unset($_SESSION["cart_array"]);
         unset($_SESSION['net_amountt']);
          unset($_SESSION['total_item']);
          //b/c of $_GET we redirect page ,when we relod or click on back button we get this value via link again and it will do its previous work which may cause
          //problem,E.g:after empty cart if we add cart again and back again then i will found this 'get' link again and it will remove my cart unwnantedly
          //always alert with $_GET
          header("location:add_to_cart.php");
          exit();
}
?>

<?php
//if user chooses to adjust item quantity
if(isset($_POST['item_to_adjust']) && $_POST['item_to_adjust']!="")
{
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i','', $quantity); //to stop value in decimal places
	if($quantity >= 100)
	{
		$quantity = 99;
	}
	else if($quantity < 1)
	{
		$quantity = 1;
	}
	else if($quantity == "")
	{
		$quantity = 1;
	}
	
	$i = 0;
		foreach($_SESSION['cart_array'] as $each_item)
		{
			$i++; //this $i hold the numeric representation of which associative array within multi-dimensional array is passing through loop
			while(list($key, $value) = each($each_item))
			{
				if($key == "item_id" && $value == $item_to_adjust)
				{
                                    //check for stock available or not via subtracting from quantity given by user from quant in database
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
                       $st->bindParam(9, $item_to_adjust);
                        $st->setFetchMode(PDO::FETCH_OBJ);
                        $st->execute();
                        while($row =$st->fetch())
                        {
			$pn = $row->pname;
                        $qnt1=$row->quantity;
                        $qnt1-=$quantity;
                    
                        if ($qnt1 <1)
                            {
                           // $_SESSION["stock_inc"]='<script>alert("stock not available for quantity inc")</script>';
                            $_SESSION["stock"];
                            header('location: shop.php?pro=dairy&pages=1');
                             //exit use to termninate b/c if we not use it ,it will go down and run whole page code when page load rather rediret or not
                             exit();
                            }
                        }//end of check
                                    
					//array_splice: remove a portion of the array and replace it with something else
					//array_splice(array &$input, int $offset , int length, replacement)
					array_splice($_SESSION['cart_array'], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
			
                                }
		}
             }//foreach close
//		header('location: add_to_cart.php');
//		exit();
}
?>



<?php

//render the cart for the user to view

$_SESSION['total_item']=0;
$cartOutput = "";
$cartTotal = 0;
$t="";
if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1)
{
	$cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
}
else
{
	$i=0;
	$net_amount=0;
	foreach($_SESSION["cart_array"] as $each_item)
	{	
		$item_id = $each_item['item_id'];
		//$sql = mysql_query("SELECT * FROM `product` WHERE `id`='$item_id LIMIT 1'");
                try {
//    $con=new PDO("mysql:host=localhost;dbname=portal",'root','');
//    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   // $st=$con->prepare("select * from product where pid='$item_id LIMIT 1'");
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
			$product_name = $row->pname;
			$price = $row->price;
			$details = $row->details;
                          //array_push(   $_SESSION['pnamess'], $product_name);
                        //$_SESSION['pnamess']=$product_name;
                       // $_SESSION['unit_price']=$price;
		}
		
		$quantity = $each_item['quantity'];
		$totalPrice = $price * $each_item['quantity'];
               // array_push(  $_SESSION['total_price'], $totalPrice);
               // $_SESSION['total_price']=$totalPrice;
		//$cartTotal = $cartTotal + $totalPrice;
		$net_amount+=$totalPrice;
               
                $_SESSION['net_amountt']=$net_amount;
			
		//dynamic table row
		$cartOutput .= '<tr>';
		//$cartOutput .= '<td><a href="shop.php?id='.$item_id.'">'.$product_name.'</a><br><img src="img/'.$item_id.'.jpeg" alt="'.$product_name.'" width="40" height="52" border="1"/></td>';
		$cartOutput .= '<td><a href="#">'.$product_name.'</a><br><img src="img/'.$item_id.'.jpeg" alt="'.$product_name.'" width="40" height="52" border="1"/></td>';
                $cartOutput .= '<td>'.$product_name.'</td>';
                $cartOutput .= '<td>'.$details.'</td>';
		$cartOutput .= '<td>'.$price.'</td>';
		$cartOutput .= '<td><form action="add_to_cart.php" method="post">
		<input name="quantity" type="text" value="'.$quantity.'" size="1" maxlength="2">
		<input name="adjustBtn'.$item_id.'" type="submit" value="change">
		<input name="item_to_adjust" type="hidden" value="'.$item_id.'">
		</form></td>';
		//$cartOutput .= '<td>'.$quantity.'</td>';
		$cartOutput .= '<td>'.$totalPrice.'</td>';
		$cartOutput .= '<td><form action="add_to_cart.php" method="post">'
                        . '<input name="deleteBtn'.$item_id.'" type="submit" value="X">'
                        . '<input name="index_to_remove" type="text" value="'.$i.'"></form></td>';
               
                
		$cartOutput .= '<tr>';
               
		$i++;
                $_SESSION['total_item']=$i;
	}
        
        catch (PDOException $ex) {
        echo $ex->getMessage();
}

	
        }

}
//$b=array(2,1);
//echo array_sum($b);
//echo $_SESSION['item'];;
?>
<?php

if(isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "")
{
	$key_to_remove = $_POST['index_to_remove'];
	//echo 'Index - '.$key_to_remove.' : Count -';
	
	if(count($_SESSION["cart_array"]) <= 1)
	{
		unset($_SESSION["cart_array"]);
	}
	else
	{
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]); //reset the index from zero
		//echo count($_SESSION["cart_array"]);
                
	}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
    <title>Cart</title>
    
   
  </head>
  <body>
   
    
    <?php include 'header_file.php'?>
      <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products <?php //echo $_SESSION['admin'] ?></h2>
                         <?php include'combo.php' ?>   
                          
                    </div>
                    
                    </div>
                
    <div class="col-md-8">
                    <div class="product-content-right">
                        
                         
                            <table cellspacing="0" class="shop_table cart">
                                    
                                        <tr>
                                           
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                             <th class="product-name">Product Detail</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Cancel</th>
                                        
                                        </tr>
                           
                                     <p><?php echo $cartOutput ;
                                   
     
                                     ?></p>
                             
                                          <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                     
                                                        
                                        
                                         </div>
                                        </td>
                                        </tr>
                                     
                                </table>
                                  <form method="post" action="checkout.php"> 
                                 <input type="submit" value="Proceed to Checkout" name="proceed" class="checkout-button button alt wc-forward"/>
                        
                                              </form>
                                                </div>
                            <div class="cart-collaterals">
                                <a href="add_to_cart.php?cmd=emptycart" style="font-size: 22px"><b>Click here to Empty Your Shopping Cart</b></a>

                            
                            </div>


                            <div class="cart_totals ">
                                <h2 style="color:#1abc9c">Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount"><?php  
                                                    if (isset($net_amount)) {
                                                        echo $net_amount;
                                                    }
                                                    else {echo $net_amount=0;}
                                             ?>PKR</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount"><?php echo  $net_amount?>PKR</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
    </div>
            </div>
            </div>
      </div>
  
                
   <?php include 'footer_file.php'?>
   
  </body>
</html>

