<?php
include 'db.php';


if (isset($_REQUEST["q"])) {
    $q=$_REQUEST["q"];
    $evnt="fetchname";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$q);
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
	  
        
         
       
       $dat=strftime("%b %d,%y",  strtotime($ro->datee));
       echo			
                "<table class='table' id='t01' cellspacing='0'>
                <tr><th>ID &nbsp;&nbsp</th><th>Name &nbsp;&nbsp;</th><th>Password &nbsp;&nbsp;</th>
                <th>Email &nbsp;&nbsp;</th><th>&nbsp;&nbsp; Phone num. &nbsp;&nbsp;</th><th>Age &nbsp;&nbsp;
                </th><th>City&nbsp;&nbsp;</th><th>Country&nbsp;&nbsp;</th><th>Signup Date&nbsp;&nbsp;</th>
                <th>Update User</th>
		<th>Delete User</th></tr>"
               . "<tr><td><b>$id&nbsp;&nbsp;</b></td>"
               . "<td><b>$name</b>&nbsp;&nbsp;</td><td>$ps&nbsp;&nbsp;</td><td>$ema&nbsp;&nbsp;</td><td>&nbsp;&nbsp $phne &nbsp;&nbsp</td>"
               . "<td>$ag &nbsp;&nbsp;</td><td>$cit&nbsp;&nbsp</td>&nbsp;&nbsp;"
               . "<td>$cont &nbsp;&nbsp;</td><td>$dat &nbsp;&nbsp;</td>"
                 . "<td><a href='#si".$id."' data-toggle='modal' >Update</a></td>"
		 ."<td><a href='user_detail.php?deleteid=$id' >delete</a></td></tr>"
               . "</table>";
               
    }
}
?>