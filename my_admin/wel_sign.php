<?php
session_start();
//recieving typed name
//$q=$_REQUEST["q"];
//it will save original value ,b/c after preg_match $nam will save 0 or 1 but no name
 $nn=$_POST['signin_name'];
 $pwd=$_POST['pswd'];
 $em=$_POST['email'];
$pno=$_POST['pnum'];
$age=$_POST['agee'];
$cit=$_POST['cityy'];
$contry=$_POST['cntry'];
$n="";
//$nam=  preg_match('/^[A-Za-z]{5,31}$/',$_POST['signin_name']);
////working ,from net
////[a-z0-9]means succes if any of alpha or numeric found alone or mixed ,but we need both for succsess so check them sepratly[a-z][0-9]but squence issue here
$nam= preg_match('/^[A-Za-z][A-Za-z0-9 ]{4,31}$/',$nn);
//use this
//use '|'for oor operator
$p=  preg_match('/[a-z][0-9]|[0-9][a-z]{5,31}/', $pwd);
$ph=  preg_match('/[0-9]{11,}/', $pno);
$a=  preg_match('/[0-9]/', $age);
if (!$nam) 
    {
    $_SESSION["nam"]="<script>alert('name should contain atleast 5 and max 31 chars')</script>";
    echo 'name issue';
    header("location:admin_login.php");
    exit();
   }
   elseif (!$p) {
      $_SESSION["pas"]="<script>alert('password should contain atleast 5 and max 31 chars')</script>";
      echo "pass issue";
      header("location:admin_login.php");
    exit();
   }
   elseif (!filter_var($em,FILTER_VALIDATE_EMAIL)) {
        $_SESSION["email"]="<script>alert('invalid email')</script>";
      echo "email issue";
      header("location:admin_login.php");
    exit();
   }
   elseif (!$ph) {
      $_SESSION["ph"]="<script>alert('phone should contain atleast 11 digits')</script>";
      echo "ph issue";
      header("location:admin_login.php");
    exit();
   }
   elseif (!$a) {
      $_SESSION["age"]="<script>alert('age should contain only digits')</script>";
      echo "age issue";
      header("location:admin_login.php");
    exit();
   }
 else {
    
     
    // $nr=preg_replace('#[^A-Za-z0-9]#i','',$nn);
    // echo $pwd;
      //$nn=$_POST['signin_name'];



$h="";
$con=new PDO("mysql:host=localhost;dbname=portal","root","");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //$con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
 $ev="fetching";
                $a='';
                    $sign_exist="call signup(?,?,?,?,?,?,?,?,?)";
               $st=$con->prepare($sign_exist);
                $st->setFetchMode(PDO::FETCH_OBJ);
                $st->bindParam(1, $ev, PDO::PARAM_STR);
                $st->bindParam(2, $nn,  PDO::PARAM_STR);
                $st->bindParam(3, $a,  PDO::PARAM_STR);
                $st->bindParam(4, $a,  PDO::PARAM_STR);
                $st->bindParam(5, $a,  PDO::PARAM_STR);
                $st->bindParam(6, $a,  PDO::PARAM_STR);
                $st->bindParam(7, $a,  PDO::PARAM_STR);
                $st->bindParam(8, $a,  PDO::PARAM_STR);
                $st->bindParam(9, $a , PDO::PARAM_STR);

//$st=$con->prepare("select * from login where name like '$q%' ");
$st->setFetchMode(PDO::FETCH_OBJ);
$st->execute();
while($row=$st->fetch())
{
    //$id=$row->id;
       
	//returning name 
	 $n=$row->name;
       
      //echo  $row->name;
        $ps=$row->password;
      
}
 
//}
// catch (PDOException $e)
// {
//     $e->getMessage();
// }
//	
 
      //checking user name match with name in database or not  
 
        if ($n==$nn) 
            {
            $_SESSION["namexist"]="<script>alert('$nn already exist')</script>"; 
            //echo 'al exist';
              header("location:admin_login.php");
              exit();
            }
        else {
    

               // try {

//    //calling store procedure for signup,inserting user detail first time
//by unseting last exwcuted database variable we'll be able to run nxt  query without buffer error
                 unset($st);
                       
                   $evnt="signin";
                      $dte=date('Y-m-d H:i:s');
                   $signupp="call signup(?,?,?,?,?,?,?,?,?)";
                   //$sql=$con->prepare("insert into login(name,password,email,phone,age,city,country,datee) values(:nam,:pwd,:emai,:phne,:ages,:cit,:cntr,:datess)");
                   $sql=$con->prepare($signupp);
                    //$dte=  getdate();
                    $sql->bindParam(1, $evnt, PDO::PARAM_STR);
                   $sql->bindParam(2, $nn, PDO::PARAM_STR);
                   $sql->bindParam(3, $pwd,  PDO::PARAM_STR);
                    $sql->bindParam(4, $em,  PDO::PARAM_STR);
                 $sql->bindParam(5, $pno,  PDO::PARAM_STR);
                 $sql->bindParam(6, $age,  PDO::PARAM_INT);
                 $sql->bindParam(7, $cit,  PDO::PARAM_STR);
                  $sql->bindParam(8, $contry,  PDO::PARAM_STR);
                    $sql->bindParam(9, $dte ,  PDO::PARAM_STR);

                
                $sql->execute();
               //fetching last inserted id
              //$id=$con->lastInsertId();
                $ev="fetching";
                $a='';
                    $sign_exist="call signup(?,?,?,?,?,?,?,?,?)";
               $st=$con->prepare($sign_exist);
                $st->setFetchMode(PDO::FETCH_OBJ);
                $st->bindParam(1, $ev, PDO::PARAM_STR);
                $st->bindParam(2, $nn,  PDO::PARAM_STR);
                $st->bindParam(3, $a,  PDO::PARAM_STR);
                $st->bindParam(4, $a,  PDO::PARAM_STR);
                $st->bindParam(5, $a,  PDO::PARAM_STR);
                $st->bindParam(6, $a,  PDO::PARAM_STR);
                $st->bindParam(7, $a,  PDO::PARAM_STR);
                $st->bindParam(8, $a,  PDO::PARAM_STR);
                $st->bindParam(9, $a , PDO::PARAM_STR);

//$st=$con->prepare("select * from login where name like '$q%' ");
$st->setFetchMode(PDO::FETCH_OBJ);
$st->execute();
while($row=$st->fetch())
{
    $id=$row->id;
       
	//returning name 
//	 $n=$row->name;
       
      //echo  $row->name;
  //      $ps=$row->password;
      
}
 
                
                
                
                
                
               $_SESSION["adm_id"]= $id;
                $_SESSION['admin']=$nn;
                $_SESSION['pwd']=$pwd;
                echo 'insert';
                header('location:../shop.php?pro=dairy&pages=1');
                 exit();
//                 }
//                 
// catch (PDOException $er)
// {
//     $er->getMessage();
// }
            } 
 }


?>