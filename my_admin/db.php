<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
//function  db($query)
//{
try{
	$con=new PDO("mysql:host=localhost;dbname=portal",'root','');
	$con->setAttribute(Pdo::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       // $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
      
        //$st=$con->prepare($query);
}
catch(PDOEXCEPTION $e)
{
	echo $e->getMessage();
}
//}
?>


</body>
</html>