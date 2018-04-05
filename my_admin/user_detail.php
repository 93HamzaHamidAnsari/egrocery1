
    
<?php
//include '../ajax.php';
session_start();
include "db.php";

//if (isset($_SESSION["nam"])) {
//       
//     
//       echo $_SESSION["nam"];
//       //session_unset();
//        $_SESSION["nam"]="";
//    }
//    elseif (isset ($_SESSION["pas"])) {
//   
//       echo $_SESSION["pas"];
//      // session_unset();
//       $_SESSION["pas"]="";
//}
//  elseif (isset ($_SESSION["email"])) {
//   
//       echo $_SESSION["email"];
//      // session_unset();
//       $_SESSION["email"]="";
//}
//  elseif (isset ($_SESSION["ph"])) {
//   
//       echo $_SESSION["ph"];
//      // session_unset();
//      $_SESSION["ph"]="";
//}
//  elseif (isset ($_SESSION["age"])) {
//   
//       echo $_SESSION["age"];
//       //session_unset();
//       $_SESSION["age"]="";
//}
//  elseif (isset ($_SESSION["cit"])) {
//   
//       echo $_SESSION["cit"];
//       //session_unset();
//       $_SESSION["cit"]="";
//}
//  elseif (isset ($_SESSION["cont"])) {
//   
//       echo $_SESSION["cont"];
//       //session_unset();
//      $_SESSION["cont"]="";
//}

$ulist="";
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
//  
	//strt of pagination
//    if (isset($_GET['pagess'])) 
//        {
//          $pags=$_GET['pagess'];
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
   // $st=$con->prepare("select * from login ORDER BY datee $pag,4");
   //unset($st);
   //
   
        //calling stored procedure for fetching user details,pass parameter where it is required ,and keep empty othres
    $evnt="fetching";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
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
    while ($ro=$st->fetch())
    {
       $id=$ro->id;
       $name=$ro->name;
       $ps=$ro->password;
       $ema=$ro->email;
       $phne=$ro->phone;
       $ag=$ro->age;
       $cit=$ro->city;
       $cont=$ro->country;
        //$dat=$ro->datee;
       $stat=$ro->status;
        
	  
        
         
       
       $dat=strftime("%b %d,%y",  strtotime($ro->datee));
       $ulist.=			
                "<tr><td><b>$id&nbsp;&nbsp;</b></td>"
               . "<td><b>$name</b>&nbsp;&nbsp;</td><td>$ps&nbsp;&nbsp;</td><td>$ema&nbsp;&nbsp;</td><td>&nbsp;&nbsp $phne &nbsp;&nbsp</td>"
               . "<td>$ag &nbsp;&nbsp;</td><td>$cit&nbsp;&nbsp</td>&nbsp;&nbsp;"
               . "<td>$cont &nbsp;&nbsp;</td><td>$dat &nbsp;&nbsp;</td>"
               // . "<td><a href='user_detail.php?updateid=$id'>Update</a> </td>"
                    . "<td><a href='#si".$id."' data-id='$id'  data-toggle='modal'  class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' >Update</a> </td>"
                  // . "<td><form method='post' action='?updateid=$id'><input type='hidden' name='updateid' value='$id'>"
               //. "<button type='submit' data-toggle='modal' data-target='#si'>Edit</button></form>  </td>"             
		 ."<td><a href='user_detail.php?deleteid=$id' class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' >delete</a></td>"
                     ."<td><a href='orders.php?uorders=$id' class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' >Orders</a></td>"
               . '        
                   
        <div id="si'.$id.'" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Sign Up</h4>
                        </div>
                          <div class="modal-body">
                              <form  action="userupdate_detail.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
     <div class="form-group">
    <b>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
    <input  class="form-control" type="text" name="name" id="name" size="64" value="'.$name.'" required><br><br>
      <b>Password</b>
      <input  class="form-control" type="text" name="pswd" id="pswd" size="64" value=" '.$ps.'" required><br><br>
      <b>Email  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        
            <input  class="form-control" type="email" name="email" id="email" size="64" value=" '.$ema.'" required><br><br>
        
        <b>Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
         <input  class="form-control" type="tel" name="phone" id="phone" size="67" value="'.$phne.'" required><br><br>
      <b>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        <input  class="form-control" type="text" name="age" id="age"  size="64" value="'.$ag.'" required><br><br>
      <b>City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        <input  class="form-control" type="text" name="city" id="city" size="64" value="'.$cit.'" required><br><br>
     <b>country &nbsp;&nbsp;&nbsp;</b>
        <input  class="form-control" type="text" name="country" id="country" size="64" value="'.$cont.'" required><br><br>
            <input  class="form-control" type="text" name="stat" id="country" size="64" value="'.$stat.'" required><br><br>
        <input  class="form-control" type="hidden" name="thisID" id="thisID" value="'.$id.'">
        <input  type="submit" name="button" id="submit" value="Update Your Account">
        
     </div>
    </form>
          </div>
                         <div class="modal-footer">
                          <a class="btn btn-primary" data-dismiss="modal">close</a> 
                          </div>
                          </div>
                         </div>
                         </div>     
     &nbsp
        </tr>';
              
           
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
     //echo '<script>alert("do u really want to delete this User <b>'.$_GET['deleteid'].'</b>? <a href="user_detail.php?yesdelete='.$_GET['deleteid'].'">yes </a>|<a href="user_detail.php"> No</a>");</script>';
    echo 'do u really want to delete this User <b>'.$_GET['deleteid'].'</b>? <a href="user_detail.php?yesdelete='.$_GET['deleteid'].'">yes </a>|<a href="user_detail.php"> No</a>';
     exit();
     
 }
 if (isset($_GET['yesdelete'])) {
    $del_id=$_GET['yesdelete'];
    //$del=("DELETE FROM `login` WHERE `id`='$del_id' LIMIT 1");
    //   $con->exec($del);
    unset($st);
    //calling stored procedure for deleting user details,pass parameter where it is required ,and keep empty othres
     $evn="delete";
    $a='';
    $logi="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($logi);
    $st->bindParam(1,$evn);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
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
    
    header('location:user_detail.php');
    exit();
}
?>
 


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Users Details</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table tr:nth-child(even) {
    background-color: #eee;
}
table tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
</style>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.6.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="egrocery/js/jquery.easing.1.3.min" type="text/javascript"></script>
<script type="text/javascript">
   //refreshing modal box
//    $( document ).ready(function() {
//    $('#si').on('hidden.bs.modal', function () {
//          $(this).removeData('bs.modal');
//    });
//});
 
    
    
//$(document).ready(function(){
//$("#submit").click(function() {
//    alert("sucess");
////    function updatedata()
////    {
//    var id=$('#thisID').val();
//var name= $('#name').val();
//var pswd=$('#pswd').val();
//var email=$('#email').val();
//var phone=$('#phone').val();
//var age=$('#age').val();
//var city=$('#city').val();
//var country=$('#country').val();
////document.getElementById("c").innerHTML=name;
//
//$.ajax({
//    
//type: "POST",
//url: "userupdate_detail.php",
//data:"id="+id+"&name="+name+"&pswd="+pswd+"&email="+email+"&phone="+phone+"&age="+age+"&city="+city+"&country="+country+,
////data: {id:id,name:name,pswd:pswd,email:email,phone:phone,age:age,city:city,country:country},
//success: function(){
//alert("sucess");
//}
//});
//    })
//});
//});
</script>
</head>

<body>
    
    
<div align="center" id="mainWrapper">
	<?php include_once("header_file.php"); ?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>User Detail</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    

  <div id="pageContent" class="product-content-right">
   
          
           <!--<select name='selec' onchange='ajx(this.value)'>-->
           <?php  
//              echo"<option>$name</option>"; 
//         $ajxx='<div id="txtHint"><b>Person info will be listed here...</b></div>';
//          
//        echo  '</select>';
        ?>
  	<div id="list" align="left" style="margin-left:24px;">
  	  <h2>User Details</h2>
          <?php include 'user_combo.php'; ?>
          
           <div class="product-pagination text-center">
               <!--<a href="#si" data-toggle="modal">update modal</a>--> 
               <!--<a href="#si" data-toggle="modal">aaa</a>-->
                        <nav>
                          <ul class="pagination">
           <!--EDIT Account-->
     

     </div>
          
          <div class="table-responsive"> 
              <table class="table" id='t01' cellspacing="0">
                <tr><th>ID &nbsp;&nbsp</th><th>Name &nbsp;&nbsp;</th><th>Password &nbsp;&nbsp;</th>
                <th>Email &nbsp;&nbsp;</th><th>&nbsp;&nbsp; Phone num. &nbsp;&nbsp;</th><th>Age &nbsp;&nbsp;
                </th><th>City&nbsp;&nbsp;</th><th>Country&nbsp;&nbsp;</th><th>Signup Date&nbsp;&nbsp;</th>
                <th>Update User</th>
		<th>Delete User</th>
                <th>Orders Details</th></tr>
  	 <?php
         //echo $sel."</select>";
          //echo $ajxx;
          echo $ulist;
                unset($st);?>
	 
               
          </table></br>
          </div>
  	</div>
  </div>
    </div>          
       <div class="row">
                <div class="col-md-12">
                   <div class="product-pagination text-center">
                       
                        <nav>
                          <ul class="pagination">
                          
     <?php
     unset($st); 
//	   //counting num of rows for pagination
//     $evn="fetch_user";
//     $pagi="call paginations(?)";
//     $st1=$con->prepare($pagi);
//    $st1->bindParam(1,$evn);
////$st1=$con->prepare("select count(*) from login");
//$st1->setFetchMode(PDO::FETCH_OBJ);
//$st1->execute();
//$num_row=$st1->fetchColumn();
//
//
//$b=$num_row/4;
//$b=  ceil($b);
//echo '  <li>   <a href="shop.html" aria-label="Previous">
//                <span aria-hidden="true">&laquo;</span>
//                </a>
//                </li>';
//for($i=1;$i<=$b;$i++)
//{
//   echo ' <li><a href="shop.php?pagess='.$i.'">'.$i.' </a></li>';
//   // echo "<a style='text-decoration:none' href='shop.php?pagess=$i'>$i </a>";
//}
//echo ' <li> <a href="health&beauty.html" aria-label="Next">
//            <span aria-hidden="true">&raquo;</span>
//            </a>
//            </li>';
//end of pagination
unset($st1);  
	   ?>
  
  </div>
  <?php include_once("footer_file.php"); ?>
</div>
</body>
</html>