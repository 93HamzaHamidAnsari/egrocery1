<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="search.php">
  <?php 
                          include 'db.php';
                          include 'ajax.php';
                         //$st=$con->prepare("select pname from product");
                         //calling stored procedure for fetching data of user
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
   
   ?>
    
                          
      <select  onchange="ajx(this.value,'user_detail_ajx.php','shint')"  class='country_to_state country_select' id='serc' name='combo' style='width:300px' style='height:500px'  class='input-text'>
            <option name='opt' id='opt' selected='selected'> Choose one...</option>
                                 <?php //echo "<option name='opt' id='opt' selected='selected'>Choose one...</option>";  
                                 //$i=0;
                           while ($ro=$st->fetch())
                            {
                          echo " <option name='optt' id='optt'>$ro->name</option>";
                     // $i++;
                          }
                          ?>
       </select>            
    <span id="shint"></span>	   
   
</form>
</body>
</html>