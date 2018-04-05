
          
       <?php
       include 'my_admin/db.php';
       $ajx_nam=$_REQUEST['user'];
       if (isset($ajx_nam)) {
           
       
  	echo '<div id="list" align="left" style="margin-left:24px;">
  	  <h2>User Details</h2>
          <div class="table-responsive"> 
              <table class="table" id="t01" cellspacing="0">
                <tr><th>ID &nbsp;&nbsp</th><th>Name &nbsp;&nbsp;</th><th>Password &nbsp;&nbsp;</th>
                <th>Email &nbsp;&nbsp;</th><th>&nbsp;&nbsp; Phone num. &nbsp;&nbsp;</th><th>Age &nbsp;&nbsp;
                </th><th>City&nbsp;&nbsp;</th><th>Country&nbsp;&nbsp;</th><th>Signup Date&nbsp;&nbsp;</th>
                <th>Update User</th>
		<th>Delete User</th></tr>';
  	
          $evnt="fetchname";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$ajx_nam);
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
     		
          echo      "<tr><td><b>$id&nbsp;&nbsp;</b></td>"
               . "<td><b>$name</b>&nbsp;&nbsp;</td><td>$ps&nbsp;&nbsp;</td><td>$ema&nbsp;&nbsp;</td><td>&nbsp;&nbsp $phne &nbsp;&nbsp</td>"
               . "<td>$ag &nbsp;&nbsp;</td><td>$cit&nbsp;&nbsp</td>&nbsp;&nbsp;"
               . "<td>$cont &nbsp;&nbsp;</td><td>$dat &nbsp;&nbsp;</td>"
                 . "<td><a href='user_detail.php?updateid=$id' >Update</a></td>"
		 ."<td><a href='user_detail.php?deleteid=$id' >delete</a></td></tr></table>";
               
    }
         //echo $sel."</select>";
       }     //echo $ajxx;
       // echo $ulist;
       ?>       
   <!--EDIT Account-->
      <?php
unset($st);
     if (isset($_GET['updateid'])) {
         $eid=$_GET['updateid'];
       // $st=$con->prepare("select * from login where id=$eid");
     
         //calling stored procedure for fetching user details on the basis of id for updatong,pass parameter where it is required ,and keep empty othres
     $evnt="fetch_for_update";
    $a='';
    $login="call login(?,?,?,?,?,?,?,?,?,?,?,?)";
    $st=$con->prepare($login);
    $st->bindParam(1,$evnt);
    $st->bindParam(2,$a);
    $st->bindParam(3,$a);
    $st->bindParam(4,$eid);
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
         $idd=$ro->id;
        $name=$ro->name;
       $pswd=$ro->password;
       $email=$ro->email;
       $phone=$ro->phone;
	   $age=$ro->age;
	   $city=$ro->city;
	   $country=$ro->country;
         
     }
     unset($st);
?>          
   </br>
   
   
 <form action="userupdate_detail.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
     <div class="form-group">
    <b>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
    <input  class="form-control" type="text" name="name" id="nam" size="64" value="<?php echo $name ?>" required><br><br>
      <b>Password</b>
      <input  class="form-control" type="text" name="pswd" id="p" size="64" value="<?php echo $pswd ?>" required><br><br>
      <b>Email  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        
            <input  class="form-control" type="email" name="email" id="exp" size="64" value="<?php echo $email ?>" required><br><br>
        
        <b>Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
         <input  class="form-control" type="tel" name="phone" id="exp" size="67" value="<?php echo $phone ?>" required><br><br>
      <b>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        <input  class="form-control" type="text" name="age" id="age"  size="64" value="<?php echo $age ?>" required><br><br>
      <b>City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
        <input  class="form-control" type="text" name="city" id="age" size="64" value="<?php echo $city ?>" required><br><br>
     <b>country &nbsp;&nbsp;&nbsp;</b>
        <input  class="form-control" type="text" name="country" id="age" size="64" value="<?php echo $country ?>" required><br><br>
        <input  class="form-control" type="hidden" name="thisID" value="<?php echo $idd ; ?>">
        <input type="submit" name="button" id="butto" value="Update Your Account">
      
     </div>
    </form>
              
     &nbsp;
        
   <?php   
      } //echo $_SESSION['update'];  
      ?>


  </div>
  <?php include_once("footer_file.php"); ?>
</div>
</body>
</html>