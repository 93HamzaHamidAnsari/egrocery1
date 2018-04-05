<?php
 session_start();
 
 if(!isset($_SESSION['admin']) || !isset($_SESSION['pwd']))
{
    //session_destroy();
   // echo 'invalid adress';
    
        header('location:my_admin/admin_login.php');
	//header("location: admin_index.php");
	exit();
}
 
 require('mysql_table.php');
// $name="";
$pid=$_GET['invoice'];
  $np=$_SESSION['net_amountt'];

class PDF extends PDF_MySQL_Table
{
function Header()
{ $name=$_SESSION['admin'];
$d=date("Y-m-d H:i:s");
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Invoice',0,1,'C');
        $this->Cell(0,1,"$d",0,1,'R');
        $this->Cell(0,1,"Name:$name",0,1,'L');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}



//Connect to database
mysql_connect('localhost','root','');
mysql_select_db('portal');




$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
//$pdf->Table('select * from order_detail where customer_id="'.$pid.'"');
//$pdf->AddPage();
//Second table: specify 3 columns
//$pdf->AddCol('id',20,'','C');
$pdf->AddCol('product',40,'product');
$pdf->AddCol('price',40,'price','R');
$pdf->AddCol('quantity',20,'Quantity','R');
$prop=array('HeaderColor'=>array(100,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
//calling stored procedure for fetchng order detail of user
$stp='call order_details("fetch","","","",'.$pid.',"")';

$pdf->Table($stp,$prop);


$con= new PDO("mysql:host=localhost;dbname=portal","root","");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//calling stored procedure for fetchng total amount of user
$stp1="call payment(?,?,?,?,?,?,?)";
$evnt="fetch_total";
$a="";

//$st=$con->prepare('SELECT SUM(payment.total_payment)as Total_Amount FROM payment WHERE payment.customer_id='.$pid.'');
$st=$con->prepare($stp1);
$st->bindParam(1, $evnt);
$st->bindParam(2, $pid);
$st->bindParam(3, $a);
$st->bindParam(4, $a);
$st->bindParam(5, $a);
$st->bindParam(6, $a);
$st->bindParam(7, $a);
$st->setFetchMode(PDO::FETCH_OBJ);
$st->execute();
    
$pdf->Ln(11);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,0,"Total Amount:".$st->fetchColumn()."",0,1,'C');
$pdf->Output();



// require ('fpdf/fpdf.php');
// $pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',16);
//          //  include 'my_admin/db.php';
//$con= new PDO("mysql:host=localhost;dbname=portal","root","");
//$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $st=$con->prepare("select * from order_detail where customer_id=2");
//     $st->setFetchMode(PDO::FETCH_OBJ);
//    $st->execute();
//    $pdf->SetTextColor(100,100,10);
//     $pdf->Cell(0,10,"Welcome hamza",1,1,'C');
//     while ($ro=$st->fetch())
//     {
//        $pname=$ro->product;
//        $pr=$ro->price;
//        $quan=$ro->quantity;
//
//         $pdf->Cell(95,10,"Product Name",1,0);
//         $pdf->Cell(95,10,$pname,1,1);
//         $pdf->Cell(95,10,"Product Price",1,0);
//         $pdf->Cell(95,10,$pr,1,1);
//         $pdf->Cell(95,10,"Product Quantity",1,0);
//         $pdf->Cell(95,10,$quan,1,1);
//      
//
//     }
//$pdf->Output();
//$un=$_POST['username'];
//$p=$_POST['password'];
//$pn=$_SESSION['pnamess'];
//$prr=$_SESSION['unit_price'];


?>