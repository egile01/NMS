<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['sub']))
  {
   
    $email=$_POST['email'];
 
     
    $query=mysqli_query($con, "insert into tblsubscriber(Email) value('$email')");
    if ($query) {
   echo "<script>alert('Your subscribe successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

if(isset($_POST['submit']))
{
$pid=$_POST['pid'];
$userid= $_SESSION['nmsuid'];
$query=mysqli_query($con,"insert into orders(UserId,PId) values('$userid','$pid') ");
if($query)
{
 echo "<script>alert('Product has been added in to the cart');</script>";
 echo "<script type='text/javascript'> document.location ='cart.php'; </script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}

if(isset($_POST['wsubmit']))
{
$wpid=$_POST['wpid'];
$userid= $_SESSION['nmsuid'];
$query=mysqli_query($con,"insert into wishlist(UserId,ProductId) values('$userid','$wpid') ");
if($query)
{
 echo "<script>alert('Product has been added to the wishlist');</script>";
 echo "<script type='text/javascript'> document.location ='wishlist.php'; </script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | Home Page</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
    <link rel="stylesheet" href="css/fwslider.css" media="all">
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/css3-mediaqueries.js"></script>
    <script src="js/fwslider.js"></script>
<!--end slider -->
<script src="js/jquery.easydropdown.js"></script>
</head>
<body>
     
	<?php include_once('includes/header.php');?>
  <!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
                    <img src="images/banner.jpg" width='200' height='300' alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h4 class="title">Happiness is availing great offers on Nursery</h4>
                        <!-- /Text title -->
                        
                        <!-- Text description -->
                        <p class="description">Nursery</p>
                        <!-- /Text description -->
                    </div>
                </div>
                 <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
                <img src="images/banner1.jpg" width='200' height='300' alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h4 class="title">Happiness is availing great offers on Nursery </h4>
                        <p class="description">diam nonummy nibh euismod</p>
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
    <!--/slider -->
<div class="main">
	<div class="wrap">
		<div class="section group">
		  <div class="cont span_2_of_3">
		  	<h2 class="head">Featured Products</h2>
			<div class="top-box">
<?php

                    
$ret=mysqli_query($con,"select * from tblproducts  order by  ID desc limit 5");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
			 <div class="col_1_of_3 span_1_of_3" style="height:400px"> 
			 	
			   <a href="single-product.php?pid=<?php  echo $row['ID'];?>">
				<div class="inner_content clearfix">
					<div class="product_image">
						<a href="single-product.php?pid=<?php  echo $row['ID'];?>">
							<img src="admin/productimages/<?php echo $row['productImage1'];?>" width="300" height="150" alt=""></a>
					</div>
                    <!-- <div class="sale-box"><span class="on_sale title_shop">New</span></div>	 -->
                    <div class="price">
					   <div class="cart-left">
							<p class="title"><?php echo $row['productName'];?></p>
							<div class="price1">
							  <span class="actual">$<?php echo $row['productPrice'];?></span>
							</div>
						</div>
<div style="margin-top:40%;" align="center">
<?php if($_SESSION['nmsuid']==""){?>
<a href="login.php"><button  class="grey">Add to cart</button></a>
<?php } else {?>
<form method="post"> 	
 <input type="hidden" name="pid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="submit" class="grey">Add to Cart</button>
  </form> 
<?php } ?>
</div>
					

						<div class="clear"></div>

					 </div>	

                   </div>
                   <div style="margin-left: 5%;">
                   <?php if($_SESSION['nmsuid']==""){?>
							<a href="login.php"><button  class="grey">Wishlist</button></a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="wpid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="wsubmit" class="grey"> Wishlist </button>
  </form> 
<?php } ?>
</div>
                 </a>
				</div><?php } ?>
				<div class="clear"></div>
			</div>	
			
					 						 			    
		  </div>
			<div class="rsidebar span_1_of_left">
				<!-- <div class="top-border"> </div> -->
				 
           <!-- <div class="top-border"> </div>
			<div class="sidebar-bottom">
			    <h2 class="m_1">Newsletters<br> Signup</h2>
			    <p class="m_text">Subscribe now and get nusery offer every week in your inbox</p>
			    <div class="subscribe"> -->
					 <!-- <form method="post">
					  
					    <input type="email" name="email" placeholder="Your email address" class="textbox">
					    <input type="submit" name="sub" value="Subscribe">
					 </form> -->
	  			</div>
			</div>
	    </div>
	   <div class="clear"></div>
	</div>
	</div>
	</div>
   <?php include_once('includes/footer.php');?>
</body>
</html>