<?php session_start(); ?>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
    <title>Contact Us</title>
    
   
  </head>
  <body>
   
    <?php include 'header_file.php'?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Contact Form</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                       
                         <?php include'combo.php' ?>   
                          
                           
                       
                    </div>
                    
                   
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div class="woocommerce-info">Returning customer? <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Click here to login</a>
                            </div>

                            <form id="login-form-wrap" class="login collapse" method="post" action="pdff.php">


                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing  section.</p>

                                <p class="form-row form-row-first">
                                    <label for="username">Username or email <span class="required">*</span>
                                    </label>
                                    <input type="text" id="username" name="username" class="input-text" placeholder="Username" required>
                                </p>
                                <p class="form-row form-row-last">
                                    <label for="password">Password <span class="required">*</span>
                                    </label>
                                    <input type="password" id="password" name="password" class="input-text" placeholder="Password" required>
                                </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Login" name="login" class="button">
                                    <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                                </p>
                                <p class="lost_password">
                                    <a href="#">Lost your password?</a>
                                </p>

                                <div class="clear"></div>
                            </form>

                           

                                <div class="clear"></div>
                            </form>

                            <form enctype="multipart/form-data" action="phpp/email.php" class="checkout" method="POST" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>CONTACT FORM</h3>
                                            

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Name" id="billing_first_name" name="nam" class="input-text " required>
                                            </p>

                                           
                                            <div class="clear"></div>

                                            

                                            

                                           
                                           
                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="email" value="" placeholder="Email Address" id="billing_email" name="ema" class="input-text " required>
                                            </p>

                                            <div class="clear"></div>
<p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Subject <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Subject" id="billing_email" name="sub" class="input-text " required>
                                            </p>

                                            
                                                <div class="clear"></div>
                                                <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Message <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <textarea rows="10" cols="30" value="" placeholder="Type your message..." id="billing_email" name="msg" class="input-text " required></textarea>
                                            </p>
                                            </div>

                                        </div>
                                    </div>

                             <div class="form-row place-order">

                                            <input type="submit"  data-value="Place order" value="SEND" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                        </div>

                                    </div>

                                </div>




                                        <div class="clear"></div>

                                    </div>
                                    <div  style="padding-left:70%">
                                    <h3 style="color:#1abc9c"; font-family:"sans-serif">Contact Info</h3>
							<span>You can also contact on the following details.</span>
			      			<address>
								<p>email:<a href="">HHA.com</a></p>
								 <p>phone:  +92 090078601</p>
								<p>Aptech 11-B,North Karachi</p>
																	 	 	
							</address>
                            </div>
                                </div>
                            </form>

                        </div> 
                                        
                    </div>  
                                        
                </div>
                 
            </div>
        </div>
    </div>


    <?php include 'footer_file.php'?>
</body>
</html>
    