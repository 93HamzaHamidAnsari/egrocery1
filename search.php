
<?php session_start(); ?>
<!--<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
/*   // $row{
     //   color:#1abc9c;
    //}*/
    </style>
   
<title>Untitled Document</title>-->
<?php
//echo '<a style="padding-left:90%" href="shop.php" >Back </a>';
//using function for removing extra spaces,slashes and any other hacking or special characters,
//NOTE:all func from this file will take strings only,so this func for strings only 
include "validate.php";
//end of including file

//checks user is login or not
//session_start();
//$names=$_SESSION['nam'];
//session_start();
//$pwd=$_SESSION['pass'];
//if(!isset($names) && !isset($pwd))
//{
//	header("Location:login.php");	
//}
//end checking

//ajx(str);
if (isset($_REQUEST["q"])) {
    $q=  $_REQUEST["q"];
//}

//if (isset($_POST['combo'])) {
//    $ser=validates($_POST['combo']);
//}
// else {
//    $ser=validates($_GET['combo']);
//}


                        include 'my_admin/db.php';
                       
                          //$st=$con->prepare("select pid,pname,price,type,expiry from product where  pname LIKE'%$ser%'");
                         $evnt="search";
                        $a='';
                        $stp="call product(?,?,?,?,?,?,?,?,?)";  
                        $st=$con->prepare($stp);
                        $st->bindParam(1,$evnt);
                        $st->bindParam(2,$a);
                        $st->bindParam(3,$q);
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
                               $id=  $ro->pid;
                                $pn= $ro->pname;
                                 $pr=$ro->price;
                                 $tp=$ro->type;
                                 $exp=$ro->expiry;
                            }
                        //  include 'header_file.php';
                          ?>
                           <form method='post' action='add_to_cart.php'>
                          <h2 style='color:#1abc9c'><?php echo $pn ?></h2><br>
                             
                         <div class='table-responsive'> 
                   <table class='table'>
                   <tr>
			<td> <img src='img/<?php echo $id ?>.jpeg' height='100px' width='100px'/></td> 	
                        <td> <p><b>Price:</b><?php echo $pr ?></p>
			<p><b>Type</b>:<?php echo $tp ?></p>
			<p><b>Best Before</b>:<?php echo $exp ?></p>                 
			 <input type='hidden' name='myid' value='<?php echo  $id?>'/>
                            <input type='submit' name='myi' id='butto' value='Add to Cart'>
                            </td>
                            </table>
                            </div>
                               <br>
                        </form> 
     
			<!--//echo 	"<img src='img/$row[0].jpeg' height='150px' width='200px'/> ";-->
                    <?php
}
                         // include 'footer_file.php';
			
//			else
//		{
//			session_start();
//			$_SESSION['fail']="product not found";
//			
//			header('Location:egrocery/contact.php');
//		}
		
		
	

?>
<!--</head>

<body>
<form method="POST" action="">
    
<a  href="../login - Copy/logout.php" name="l"> Logout</a>
</form>
</body>
</html>-->