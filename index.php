<?php session_start();
 include 'my_admin/db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
    <title>e Grocery</title>
    
   
  </head>
  <body>
   
    <?php include 'header_file.php'?>
    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are awesome</h2>
                                                <p>We make it easy for every one.Each grocery item can buy online now.No need to go market.Just click on one button!</p>
                                                
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are great</h2>
                                                <p>Shop every regular routine things without any hasitation.You will trust and pleased on our quality service!</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are superb</h2>
                                                <p>Each grocery item can buy online now just click on one button and your order will be prvided on time.</p>
                                                
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>3 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
<!--    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            
                           <?php
                           
                                    //<img src="img/pulses/chana-dal-yelloww.png" alt="">
                                     //calling stored procedure for fetching data of products
//   $evnt="fetch_for_search";
//   $fetching="call product(?,?,?,?,?,?,?,?,?)";
//   $st=$con->prepare($fetching);
//   $a='';
//   $st->bindParam(1,$evnt);
//   $st->bindParam(2,$a);
//   $st->bindParam(3,$a);
//   $st->bindParam(4,$a);
//   $st->bindParam(5,$a);
//   $st->bindParam(6,$a);
//   $st->bindParam(7,$a);
//   $st->bindParam(8,$a);
//   $st->bindParam(9,$a);
//   $st->setFetchMode(PDO::FETCH_OBJ);
//   $st->execute();
//   
////      <form method="post" action="add_to_cart.php?myid='.$id.'">
////                                            <input type="submit" value="ADD TO CART"/><input type="hidden" name="myi" value=""/>
////                                            </form>  
////    
//    while ($r=$st->fetch())
//    {
//    $id=$r->pid;
//    $pn=$r->pname;
//    $pr=$r->price; 
//    
//    echo '      <div class="single-product">
//                                <div class="product-f-image">
//                             <img src="img/'.$id.'.jpeg" alt="img"/>
//                                    <div class="product-hover">
//                                        <a href="add_to_cart.php?myid='.$id.'" class="add-to-cart-link">Add to Cart
//                                        
//                                            <i class="fa fa-shopping-cart"></i> </a>
//                                        <a href="search.php?combo='.$pn.'" class="view-details-link"><i class="fa fa-link"></i> See details</a>
//                                    </div>
//                                </div>
//                                
//                                <h2><a href="single-product.html">'.$pn.'</a></h2>
//                                
//                                <div class="product-carousel-price">
//                                    <ins>'.$pr.'</ins> 
//                                </div> 
//                            </div>';
   // }?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  End main content area -->
    
<!--    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Brands</h2>
                        <div class="brand-list">
                            <img src="img/LOGO/images.png" alt="">
                            <img src="img/LOGO/downloadd.png" alt="">
                            <img src="img/LOGO/download (1)s.png" alt="">
                            <img src="img/LOGO/imagess.png" alt="">
                            <img src="img/LOGO/download (2)a.png" alt="">
                            <img src="img/LOGO/downloaddd.png" alt="">
                            <img src="img/LOGO/download (1)sa.png" alt="">
                                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top Sellers</h2>
                        <a href="" class="wid-view-more">View All</a>
                       
                        <?php
                        include 'ajax.php';
                        //fetchng 4 products here
                         $evnt="fetch";
   $fetching="call product(?,?,?,?,?,?,?,?,?)";
   $st=$con->prepare($fetching);
   $a='';
   $type="dairy";
   $pag=2;
   $st->bindParam(1,$evnt);
   $st->bindParam(2,$pag);
   $st->bindParam(3,$a);
   $st->bindParam(4,$a);
   $st->bindParam(5,$type);
   $st->bindParam(6,$a);
   $st->bindParam(7,$a);
   $st->bindParam(8,$a);
   $st->bindParam(9,$a);
   $st->setFetchMode(PDO::FETCH_OBJ);
   $st->execute();
   
        
    
    while ($r=$st->fetch())
    {
    $id=$r->pid;
    $pn=$r->pname;
    $pr=$r->price; 
    
    echo '                <div class="single-wid-product">
                            <form method="post" action="search.php">'?>
                            <h2><a href="#sig" data-toggle="modal" onclick='ajx("<?php echo $pn?>","search.php","shint")' class="view-details-link"> <img src="img/<?php  echo $id?>.jpeg" alt="img" class="product-thumb"></a>
                            <h2><a href="#sig" data-toggle="modal" onclick='ajx("<?php echo $pn?>","search.php","shint")' class="view-details-link"><?php  echo $pn ?></a></h2>
                         <?php
            echo '                           </form>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>'.$pr.'</ins>
                            </div>                            
                        </div>';
    }
                                
       ?>
                   
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recently Viewed</h2>
                        <a href="#" class="wid-view-more">View All</a>
                      <?php  
                       $evnt="fetch";
   $fetching="call product(?,?,?,?,?,?,?,?,?)";
   $st=$con->prepare($fetching);
   $a='';
   $pag=2;
   $type="pulses";
   $st->bindParam(1,$evnt);
   $st->bindParam(2,$pag);
   $st->bindParam(3,$a);
   $st->bindParam(4,$a);
   $st->bindParam(5,$type);
   $st->bindParam(6,$a);
   $st->bindParam(7,$a);
   $st->bindParam(8,$a);
   $st->bindParam(9,$a);
   $st->setFetchMode(PDO::FETCH_OBJ);
   $st->execute();
   
        
    
    while ($r=$st->fetch())
    {
    $id=$r->pid;
    $pn=$r->pname;
    $pr=$r->price; 
    
                             echo '  <div class="single-wid-product">'
                            ?>
                            <h2><a href="#sig" data-toggle="modal" onclick='ajx("<?php echo $pn?>","search.php","shint")' class="view-details-link"> <img src="img/<?php  echo $id?>.jpeg" alt="img" class="product-thumb"></a>
                            <h2><a href="#sig" data-toggle="modal" onclick='ajx("<?php echo $pn?>","search.php","shint")' class="view-details-link"><?php  echo $pn ?></a></h2>
                         <?php
            echo '            
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>'.$pr.'</ins>
                            </div>                            
                        </div>';
                        
    }
                              ?>

                    </div>
                </div>
           
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top New</h2>
                        <a href="#" class="wid-view-more">View All</a>
                        
                        <?php
   $evnt="fetch";
   $fetching="call product(?,?,?,?,?,?,?,?,?)";
   $st=$con->prepare($fetching);
   $a='';
   $type="grocery";
   $pag=1;
   $st->bindParam(1,$evnt);
   $st->bindParam(2,$pag);
   $st->bindParam(3,$a);
   $st->bindParam(4,$a);
   $st->bindParam(5,$type);
   $st->bindParam(6,$a);
   $st->bindParam(7,$a);
   $st->bindParam(8,$a);
   $st->bindParam(9,$a);
   $st->setFetchMode(PDO::FETCH_OBJ);
   $st->execute();
   
        
    
    while ($r=$st->fetch())
    {
    $id=$r->pid;
    $pn=$r->pname;
    $pr=$r->price; 
    
                echo '       <div class="single-wid-product">'
    ?>
                            <h2><a href="#sig" data-toggle="modal" onclick='ajx("<?php echo $pn?>","search.php","shint")' class="view-details-link"> <img src="img/<?php  echo $id?>.jpeg" alt="img" class="product-thumb"></a>
                            <h2><a href="#sig" data-toggle="modal" onclick='ajx("<?php echo $pn?>","search.php","shint")' class="view-details-link"><?php  echo $pn ?></a></h2>
                         <?php
            echo '            
                            
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>'.$pr.'</ins> 
                            </div>                            
                        </div>';
    }    ?>

                    </div>
                </div>
                </div>
            </div>
        </div>
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
    <!-- End product widget area -->
  
   <?php include 'footer_file.php'?>
  
</body>
</html>
    