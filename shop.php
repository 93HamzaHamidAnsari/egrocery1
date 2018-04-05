<?php
session_start();
include("header_file.php"); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Shop</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
//<script>
// 
//$(document).ready(
//function(){
//    $("#t").click(
//function(){
//        $(this).hide();
//    });
//});
 // var x=<script>document.getElementById("t").disabled=true</scrpt>;
 </script>
 <?php
 //session_start();
//msg if stock not available and redirect to this page from add to cart page
 if (isset($_SESSION["stock"])) {
     echo $_SESSION["stock"];
    // session_unset();
     $_SESSION["stock"]="";
 }

 ?>
</head>

<body>
<!--<div align="center" id="mainWrapper">-->
	
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
//$pagi=1;
include 'my_admin/db.php';
//pop up message if product is not available as per demand
if (isset($_SESSION['pn']))
{
    $pname1=$_SESSION['pn'];
    echo "<script>alert('shortage of'".$pname1."');</script>";
}
 else {
    $_SESSION['pn']="";
}
$tp="";   
$dynamic_detail='';
//$pag="";
 try {
     
//    $con=new PDO("mysql:host=localhost;dbname=portal",'root','');
//    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //strt of pagination
    if (isset($_GET['pages'])) 
        {
          $pags=$_GET['pages'];
                if($pags!=="" || $pags!=="1")
                {

                   
                  $pag= ($pags*4)-4; 
                }
                 else 
                {
                   $pag= 0; 
                }
        }
//        if ($pagi) 
//        {
//           $pags=$pagi;
//                if($pags!=="" || $pags!=="1")
//                {
//
//                   
//                  $pag= ($pags*4)-4; 
//                }
//                 else 
//                {
//                   $pag= 0; 
//                }
//        }
    
        //$st=$con->prepare("select * from product limit $pag,4");\\

        
  //calling stored procedure for fetching data of products on the basis of category or type
   
  if (isset($_GET['pro'])) {
      $type=$_GET['pro'];
      $tp="pro";
  }
//  else if (isset($_GET['puls'])) {
//      $type=$_GET['puls'];
//      $tp="puls";
//  }
//  else if (isset($_GET['h&b'])) {
//      $type=$_GET['h&b'];
//      $tp="h&b";
//  }
//  else if (isset($_GET['groc'])) {
//      $type=$_GET['groc'];
//      $tp="groc";
//  }
//   else if (isset($_GET['detr'])) {
//      $type=$_GET['detr'];
//      $tp="detr";
//  }
   $evnt="fetch";
   $fetching="call product(?,?,?,?,?,?,?,?,?)";
   $st=$con->prepare($fetching);
   $a='';
   $st->bindParam(1,$evnt);
   $st->bindParam(2,$pag);
   $st->bindParam(3,$a);
   $st->bindParam(4,$a);
   $st->bindParam(5,$type);
   $st->bindParam(6,$a);
   $st->bindParam(7,$a);
   $st->bindParam(8,$a);
   $st->bindParam(9,$a);
   $st->setFetchMode(PDO::FETCH_OBJ);
   $st->execute();
   
        
   ?>
    
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               
<?php
    while ($r=$st->fetch())
    {
    $id=$r->pid;
    $pn=$r->pname;
    $pr=$r->price;
    $q=$r->quantity;
    $d=$r->details;
    $t=$r->type;
    $exp=$r->expiry;
  //  $dat=  strftime("%b %d,%y",  strtotime($r->date_added));
//  if ($q<=0) {
//       <img src="img/'.$id.'.jpeg" alt="img" width="150" height="50" style="border:1px solid green" align="left">
//   echo "  ";
//  }
   echo ' <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                      <div class="single-product">
                      <div class="product-f-image">
                        <a  href="add_to_cart.php?myid='.$id.'">
                              <img src="img/'.$id.'.jpeg" alt="img"  style="border:1px solid green">
                       </a>
                          <div class="product-hover">
                                        <a href="add_to_cart.php?myid='.$id.'" class="add-to-cart-link">
                                        <i class="fa fa-shopping-cart"></i>Add to Cart </a>';
                                       ?> 
                                        <a href="#sig" data-toggle="modal" onclick='ajx("<?php echo $pn?>","search.php","shint")' class="view-details-link"><i class="fa fa-link"></i>  See details</a>
           <?php
                     echo '  </div>
                        </div>
                        </div>
                        <h2><a href="add_to_cart.php?myid='.$id.'">'.$pn.'</a></h2>
                           
                        <div class="product-carousel-price">
                            <ins>'.$pr.'</ins> 
                        </div>  
                        
                        <div class="product-option-shop">
                        <form method="post" action="add_to_cart.php?myid='.$id.'">
                        <input type="hidden" name="myid" value="'.$id.'">
                            <input type="submit" name="submit" id="butto" value="Add to Cart">
                          </form>'?>
                                        
                            <!--<a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="add_to_cart.php?myid='.$id.'">Add to cart</a>-->
            <?php          
                                   echo '</div>                       
                    </div>
                </div>
                </div>';

 } 
 
?>
            <!--</div></div></div>-->
    
    <?php
} 
     
    catch (PDOException $ex) {
        echo $ex->getMessage();
}
        
?>

    
 <!--<a href="#sig" data-toggle="modal" onclick='ajx("<?php // echo $pn ;?>","search.php","shint")' class="view-details-link"><i class="fa fa-link"></i>  See details</a>-->
  <!--pagination-->
                <div class="row">
                <div class="col-md-12">
                   <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                          
              
 <?php  
 //by unseting it,it is clear and ready for nxt query and will not generte error (general error:2014)
  unset($st);
   //counting num of rows for pagination
  
 //calling pagination stored procedure for counting num of rows
  $evn="fetch_pro_type";
  $pagng="call paginations(?,?)";
  $st1=$con->prepare($pagng);
  $st1->bindParam(1,$evn);
  $st1->bindParam(2,$type);
//$st1=$con->prepare("select count(*) from product");
$st1->setFetchMode(PDO::FETCH_OBJ);
//$st1->setFetchMode(PDOStatement::FetchAll());
$st1->execute();
$num_row=$st1->fetchColumn();



//echo "<br/><br/>";
$b=$num_row/4;
$b=  ceil($b);
echo '  <li>   <a href="shop.php?pro=dairy&pages=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
                </li>';
for($i=1;$i<=$b;$i++)
{
       //$pagi=$i;
   echo ' <li><a href="shop.php?pro='.$t.'&pages='.$i.'">'.$i.' </a></li>';

   // echo "<a style='text-decoration:none' href='shop.php?pagess=$i'>$i </a>";
}
echo ' <li> <a href="shop.php?pro=detergent&pages=1" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
            </li>';

//end of pagination
?>
                    
                          </ul>
                        </nav>                        
                    </div>
  <!--</div>-->
    </div>
            </div>
</div> </div></div>
<div width="50%" id="sig" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Product</h4>
                        </div>
    <div class='modal-body'>
    <span id="shint"></span>
    </div>
     <div class='modal-footer'> 
                         <a class='btn btn-primary' data-dismiss='modal'>close</a> 
                          </div>
                          </div>
                         </div>
                         </div>
<?php
//$p="nido";
//echo '<a href="#sig" data-toggle="modal" value="nido" onclick="ajx(this.value,"search.php","shint")">jhjhk</a>';
//?>

<!--<a href="#sig" data-toggle="modal" onclick='ajx(this.value,"search.php","shint")'>jbl</a>-->
<?php include("footer_file.php"); ?>
   
<!--</div>-->
</body>
</html>


