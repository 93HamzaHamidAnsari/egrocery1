<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>


<script>

</script>
</head>
</html>
<?php
session_start();

include "db.php";
$plist="";
//$con="";
$sqls="";
$pag="";
$s=1;
if(!isset($_SESSION['admin']) || !isset($_SESSION['pwd']) || $_SESSION['stats']!=$s)
{
    session_destroy();
   // echo 'invalid adress';
    
        header('location:admin_login.php');
	//header("location: admin_index.php");
	exit();
}
   // try {
//   $con=new PDO("mysql:host=localhost;dbname=portal",'root','');
//    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//strt of pagination
    if (isset($_GET['pagess'])) 
        {
          $pags=$_GET['pagess'];
                if($pags!=="" || $pags!=="1")
                {

                   
                  $pag= ($pags*4)-4; 
                }
                 else 
                {
                   $pag= 0; 
                }
        }
    
    //$st=$con->prepare("select * from product ORDER BY pid limit $pag,4");
     //calling stored procedure for fetching data of products
    $evnt="fetch_inventory";
    $a='';
    $ptype="dairy";
    $fetching="call product(?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($fetching);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$pag);
    $st->bindParam(3,$a);
    $st->bindParam(4,$a);
    $st->bindParam(5,$a);
    $st->bindParam(6,$a);
    $st->bindParam(7,$a);
    $st->bindParam(8,$a);
    $st->bindParam(9,$a);    
    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute();
    while ($ro=$st->fetch())
    {
       $id=$ro->pid;
       $pname=$ro->pname;
       $pr=$ro->price;
       $detl=$ro->details;
       $typs=$ro->type;
       $quan=$ro->quantity;
       $exdatee=strftime("%b %d,%y",  strtotime($ro->expiry));
       $plist.=
                "<tr><td><b>$id&nbsp;&nbsp;</b></td><td> <img src='img/$id.jpeg' style='border:1px solid green'height='50px' width='100px'/>&nbsp;&nbsp;</td>"
               . "<td><b>$pname</b>&nbsp;&nbsp;</td><td>$pr&nbsp;&nbsp;</td><td>$typs&nbsp;&nbsp;</td><td>$detl&nbsp;&nbsp;</td>"
               . "<td>$exdatee&nbsp;&nbsp;</td>&nbsp;&nbsp<td>&nbsp<b>$quan</b> &nbsp;&nbsp;</td>"
               . "<td><a href='#si".$id."' data-toggle='modal' class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow'>Edit</a></td>&nbsp;&nbsp;"
               . "<td>&nbsp;&nbsp;<a href='inventory_list.php?deleteid=$id' class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' >Delete</a><td>"
               . '<div id="si'.$id.'" class="modal fade" role="dialog">
                   

                    <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Product Update</h4>
                        </div>
                          <div class="modal-body">
                              <form  action="inventory_edit.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
     <div class="form-group">
         
            <table  width="90%" cellpadding="6">
      <tr>
        <td width="21%"><b>Product Name</b>:</td>
        <td width="79%"><input class="form-control" type="text" name="name" id="nam" size="64" value="'.$pname.'"></td>
      </tr>
      <tr>
        <td><b>Product Price</b>:</td>
        <td><input type="text" class="form-control" name="price" id="pric" size="62" value="'.$pr.'"></td>
      </tr>
      <tr>
        <td><b>Type</b>:</td>
        <td>
        <select name="type" id="typ" class="form-control">
        <option value="'.$typs.'">'.$typs.'</option>
        <option value="Clothing">Clothing</option>
        <option value="Dairy">Dairy</option
        ><option value="Health & beauty">Health & beauty</option>
        <option value="Daal">Dall</option>
        <option value="Tea">Tea</option>
        <option value="Kitchen">Kitchen</option>
        <option value="Tea">Ghee</option>
        <option value="Kitchen">Oil</option>
        <option value="Tea">Grocery</option>
        <option value="Kitchen">Rice</option>
        </select>
        </td>
      </tr>
      <tr>
        <td><b>Expiry</b>:</td>
        <td>
            <input type="datetime-local" class="form-control" name="expiry" id="exp" size="64" value="'.$exdatee.'">
        
        </td>
      </tr>
      <tr>
        <td><b>Product Details</b>:</td>
        <td><textarea name="details" class="form-control" id="detail" cols="64" rows="5" value="">'.$detl.'</textarea></td>
      </tr>
      <tr>
        <td><b>Product Quantity</b>:</td>
        <td><input type="text" class="form-control" name="quant" id="pric" size="62" value="'.$quan.'"></td>
      </tr>
      <tr>
        <td><b>Product Image</b>:</td>
        <td><input type="file" class="form-control" name="fileField" id="fileFiel"></td>
      </tr>
      <tr></tr>
      <tr>
         <td><input type="hidden" name="thisID" value="'.$id.'">
             <input type="submit"  name="button" id="butto" value="Update This Item Now"></td>
        
       
      </tr>
    </table>
            
        </div>
    </form>
          </div>
                         <div class="modal-footer">
                          <a class="btn btn-primary" data-dismiss="modal">close</a> 
                          </div>
                          </div>
                         </div>
                         </div>     
     &nbsp</tr>';
               
    }
//    }
// catch (PDOException $e)
// {
//     $e->getMessage();
// }


//else
//{
//	$plist = "You have no products listed in your store yet.";
//}

 //deleting items
 if (isset($_GET['deleteid'])) {
     echo 'do u really want to delete this product <b>'.$_GET['deleteid'].'</b>? <a href="inventory_list.php?yesdelete='.$_GET['deleteid'].'">yes </a>|<a href="inventory_list.php"> No</a>';
     exit();
     
 }
 if (isset($_GET['yesdelete'])) {
    $del_id=$_GET['yesdelete'];
   // $del=("DELETE FROM `product` WHERE `pid`='$del_id' LIMIT 1");
   // $con->exec($del);
   
    //calling stored procedure for deleting data of products
    $evnt="delete";
    $a='';
    $fetching="call product(?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($fetching);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
    $st->bindParam(4,$a);
    $st->bindParam(5,$a);
    $st->bindParam(6,$a);
    $st->bindParam(7,$a);
    $st->bindParam(8,$a);
    //id of product
    $st->bindParam(9,$del_id);    
    $st->execute();
    //unlink the image from server
	$pictodelete = ("../img/$id_to_delete.jpeg");
        if (file_exists($pictodelete)) {
            unlink($pictodelete);
        }
    header('location:inventory_list.php');
    exit();
}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inventory List</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
<!--<style>

th, td {
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color:#FFF;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
</style>-->
</head>

<body>
<div align="center" id="mainWrapper">
	<?php include_once("header_file.php"); ?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Inventory</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  <div id="pageContent">
  <div align="right" style="margin:32px;"><a href="#si" data-toggle="modal"> + Add New Inventory Item</a></div>
    <!--add inventory modal box-->
  <div id="si" class="modal fade" role="dialog">
                   

                    <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Product Update</h4>
                        </div>
                          <div class="modal-body">
  <form action="insert.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
         <div class="form-group">
    <table width="90%" cellpadding="6">
      <tr>
        <td width="21%"><b>Product Name</b>:</td>
        <td width="79%"><input type="text" class="form-control" name="name" id="name" size="64" required></td>
      </tr>
      <tr>
        <td><b>Product Price</b>:</td>
        <td> <input type="text" class="form-control" name="price" id="price" size="62" required></td>
      </tr>
      <tr>
        <td width="21%"><b>Type</b>:</td>
        <td width="79%">
        <select name="type" id="typ" width="50%" class="form-control" required>
        <option value="Select any one...." >Select any one....</option>
        <option value="Clothing">Clothing</option>
        <option value="Dairy">Dairy</option
        ><option value="Health & beauty">Health & beauty</option>
        <option value="Daal">Dall</option>
        <option value="Tea">Tea</option>
        <option value="Kitchen">Kitchen</option>
        <option value="Tea">Ghee</option>
        <option value="Kitchen">Oil</option>
        <option value="Tea">Grocery</option>
        <option value="Kitchen">Rice</option>
        </select>
        </td>
      </tr>
      <tr>
        <td><b>Expiry</b>:</td>
        <td>
            <input type="datetime-local" class="form-control" name="expiry" id="exp" size="64" value="" required>
        
        </td>
      </tr>
      <tr>
        <td><b>Product Details</b>:</td>
        <td><textarea name="details" class="form-control" id="detail" cols="64" rows="5" required></textarea></td>
      </tr>
      <tr>
        <td><b>Product Quantity</b>:</td>
        <td> <input type="text" class="form-control" name="quant" id="price" size="62" required></td>
      </tr>
      <tr>
        <td><b>Product Image</b>:</td>
        <td><input type="file" class="form-control" name="fileField" id="fileFiel" required></td>
      </tr>
      <tr>
        
        <td><input type="submit"  name="button" id="button" value="Add This Item Now" required></td>
      </tr>
    </table>
    </form>
                              </div>
                         <div class="modal-footer">
                          <a class="btn btn-primary" data-dismiss="modal">close</a> 
                          </div>
                          </div>
                         </div>
                         </div>  
  </div>
  <!--end of modal-->
    
  	<div id="list" align="left" style="margin-left:24px;">
  	  
            
            <h2>Inventory list</h2>
          <div class="table-responsive"> 
              <table class="table" id='t01'>
               <tr><th>PID &nbsp;&nbsp</th><th>Image &nbsp;&nbsp;</th><th>Name</th><th>Price &nbsp;&nbsp;</th>
               <th>Type &nbsp;&nbsp;</th><th>Detail &nbsp;&nbsp;</th><th>Expiry &nbsp;&nbsp;
               </th><th>Quantity &nbsp;&nbsp;</th><th>Edit&nbsp;&nbsp;</th><th>Delete&nbsp;&nbsp;</th></tr>
  	  <?php echo $plist;
  ?> </table></br>
          </div>
               <div class="row">
                <div class="col-md-12">
                   <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
<?php  
unset($st);
	  //counting num of rows for pagination
$a="";
$evn="fetch_pro";
$pagi="call paginations(?,?)";
$st1=$con->prepare($pagi);
 $st1->bindParam(1,$evn);
 $st1->bindParam(2,$a);
$st1->setFetchMode(PDO::FETCH_OBJ);
$st1->execute();
$num_row=$st1->fetchColumn();



$b=$num_row/4;
$b=  ceil($b);
 echo '  <li>   <a href="inventory_list.php?pagess=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
                </li>';
for($i=1;$i<=$b;$i++)
{
   echo ' <li><a href="inventory_list.php?pagess='.$i.'">'.$i.' </a></li>';
   // echo "<a style='text-decoration:none' href='shop.php?pagess=$i'>$i </a>";
}
echo ' <li> <a href="inventory_list.php?pagess='.$b.'" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
            </li>';
//end of pagination
	  
	   ?>
         
  	</div>
    
      </div>
    </div>
  </div>
  </div>
</div>
    
  <?php include_once("footer_file.php"); ?>
</div>
</body>
</html>