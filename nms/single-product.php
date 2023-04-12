<?php
session_start();
error_reporting(0);
include('includes/config.php');


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
<title>Nursery Management System | Single Product Details</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- start details -->
<script src="js/slides.min.jquery.js"></script>
   <script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 360,
					thumb_image_height: 360,
					source_image_width: 900,
					source_image_height: 900,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>	
</head>
<body>
       
	<?php include_once('includes/header.php');?>
<div class="mens">    
  <div class="main">
     <div class="wrap">
     	<ul class="breadcrumb breadcrumb__t"><a class="home" href="index.php">Home</a> / Single Product Details</ul>
     	<?php
$pid=$_GET['pid'];
                    
$ret=mysqli_query($con,"select * from tblproducts
join tblcategory on tblcategory.ID=tblproducts.category
 where tblproducts.ID='$pid' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="admin/productimages/<?php echo $row['productImage1'];?>" class="img-responsive" />
									<img class="etalage_source_image" src="admin/productimages/<?php echo $row['productImage1'];?>" class="img-responsive" title="" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="admin/productimages/<?php echo $row['productImage2'];?>" class="img-responsive" />
								<img class="etalage_source_image" src="admin/productimages/<?php echo $row['productImage2'];?>" class="img-responsive" title="" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="admin/productimages/<?php echo $row['productImage3'];?>" class="img-responsive"  />
								<img class="etalage_source_image" src="admin/productimages/<?php echo $row['productImage3'];?>" class="img-responsive"  />
							</li>
				
						</ul>
						 <div class="clearfix"></div>
	            </div>
		         <div class="desc1 span_3_of_2">
		         	<h3 class="m_3"><?php echo $row['productName'];?></h3>
		             <p class="m_5">$<?php echo $row['productPrice'];?></p>

					 		<br>
					<span class="m_link">Product info. </span>
				     <p class="m_text2"><?php echo $row['productDescription'];?> </p>
				     <p class="m_text2"><b>Category:</b> <?php echo $row['CategoryName'];?> </p>
				     <p class="m_text2"><b>Product Weight:</b> <?php echo $row['productweight'];?> </p>
				      <p class="m_text2"><b>Shipping Charge:</b> <?php echo $row['shippingCharge'];?> </p>
			     </div>

<div style="margin-left:30%;">
<?php if($_SESSION['nmsuid']==""){?>
<a href="login.php"><button  class="grey">Add to cart</button></a>
<?php } else {?>
<form method="post"> 	
 <input type="hidden" name="pid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="submit" class="grey">Add to Cart</button>
  </form> 
<?php } ?>
           <?php if($_SESSION['nmsuid']==""){?>
							<a href="login.php"><button  class="grey">Wishlist</button></a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="wpid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="wsubmit" class="grey"> Wishlist </button>
  </form> 
<?php } ?>
</div>
			   <div class="clear"></div>	
	    <div class="clients">
	   

	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
     </div>
     <div class="toogle">
     	<h3 class="m_3">Product Details</h3>
     	<p class="m_text"><?php echo $row['productDescription'];?>.</p>
     </div>
     <div class="toogle">
     	<h3 class="m_3">Product Instruction</h3>
     	<p class="m_text"><?php echo $row['productInstruction'];?>.</p>
     </div>
      </div><?php } ?>
			<div class="rsingle span_1_of_single">
				<h5 class="m_1">Categories</h5>
					
					<ul class="kids">
						<?php
$ret=mysqli_query($con,"select * from tblcategory");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
						<li><a href="products.php?cid=<?php  echo $row['ID'];?>&&catname=<?php  echo $row['CategoryName'];?>"><?php  echo $row['CategoryName'];?></a></li><?php } ?>
						
					</ul>
          
		     
		       <script src="js/jquery.easydropdown.js"></script>
		      </div>
		      <div class="clear"></div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
	
	<?php include_once('includes/footer.php');?>
	
		
</body>
</html>