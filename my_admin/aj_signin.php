<?php
//recieving typed name
$q=$_REQUEST["q"];
include 'db.php';
//it will save original value ,b/c after preg_match $nam will save 0 or 1 but no name
 //$nn=$_POST['signin_name'];
// $pwd=$_POST['pswd'];
//$nam=  preg_match('/^[A-Za-z]{5,31}$/',$_POST['signin_name']);
////working ,from net
////[a-z0-9]means succes if any of alpha or numeric found alone or mixed ,but we need both for succsess so check them sepratly[a-z][0-9]but squence issue here
////$nam= preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/',$nn);
////use '|'for oor operator
//$p=  preg_match('/[a-z][0-9]|[0-9][a-z]+/', $pwd);

$h="";

 $ev="fetch";
                $a='';
                    $sign_exist="call signup(?,?,?,?,?,?,?,?,?)";
               $st=$con->prepare($sign_exist);
                $st->setFetchMode(PDO::FETCH_OBJ);
                $st->bindParam(1, $ev, PDO::PARAM_STR);
                $st->bindParam(2, $q,  PDO::PARAM_STR);
                $st->bindParam(3, $a,  PDO::PARAM_STR);
                $st->bindParam(4, $a,  PDO::PARAM_STR);
                $st->bindParam(5, $a,  PDO::PARAM_STR);
                $st->bindParam(6, $a,  PDO::PARAM_STR);
                $st->bindParam(7, $a,  PDO::PARAM_STR);
                $st->bindParam(8, $a,  PDO::PARAM_STR);
                $st->bindParam(9, $a , PDO::PARAM_STR);
//$st=$con->prepare("select * from login where name='".$q."'");
//$st=$con->prepare("select * from login where name like '$q%' ");
$st->setFetchMode(PDO::FETCH_OBJ);
$st->execute();
while($row=$st->fetch())
{
	//returning name 
	echo  $h=$row->name.",";
       //$h="<a href='$h'>$h</a>";
      //echo  $row->name;
        $p=$row->password;
      
}

      //checking user name match with name in database or not  
 if ($h==NULL) 
            {
     echo 'you can use this';
                     exit();
            }
        else {
                echo 'already exist';
                exit();
        }
//      



?>