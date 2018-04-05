<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="search.php"> </form>
  <?php 
                          include 'my_admin/db.php';
                          include 'ajax.php';
                         //$st=$con->prepare("select pname from product");
                         //calling stored procedure for fetching data of products
                            $evnt="fetch_for_search";
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
                            $st->bindParam(9,$a);    
                            $st->setFetchMode(PDO::FETCH_OBJ);
                            $st->execute();
   ?>
    
                          
      <select   onchange='ajx(this.value,"search.php","shint")'  class='country_to_state country_select' id='serc' name='combo' style='width:300px' style='height:500px'  class='input-text'>
          <a href="#sig" data-toggle='modal'><option name='opt' id='opt' selected='selected'> Choose one...</option></a>
                                 <?php //echo "<option name='opt' id='opt' selected='selected'>Choose one...</option>";  
                                 //$i=0;
                           while ($ro=$st->fetch())
                            {
                               $pn=$ro->pname;
                          echo " <a href='#sig'  data-toggle='modal'><option name='optt' id='optt'>$pn</option></a>";
                     // $i++;
                          }
                          ?>
       </select>   
    
   
   
    
    <div style="width: 25%;">
    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="#sig" data-toggle='modal' width='20px'>Search</a>		
    </div>
<!--    <select name="a">-->
    <!--<a href='#sig' data-toggle='modal' onclick="ajx('<?php //echo $pn ;?>','search.php','shint')" > <option name="a"><?php //echo  $pn ?></option></a>--> 
    <!--</select>-->
    
    
<!--<input type="submit" value="Search" name="se"></form>-->
    
    <div width="50%" id="sig" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h4>Product</h4>
                        </div>
    <div class='modal-body'>
    <span id="shint"></span>
    </div>
     <div class='modal-footer'> 
                         <a class='btn btn-primary' data-dismiss='modal'>close</a> 
                          </div>
                          </div>
                         </div>
                         </div>
    <!--<img style="align-content: center;" />-->
    <!--<p style='text-align: center;'>alklk</p>-->

</body>
</html>