
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
<title>Nursery Management System || Products</title>

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
</head>
<body>
    
	<?php include_once('includes/header.php');?>
<div class="mens">    
  <div class="main">
     <div class="wrap">
		<div class="cont span_2_of_3">
		  	<h2 class="head"><?php echo $_GET['catname'];?></h2>

			<div class="top-box">
				<?php
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }
 
	$total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 
 
	$result_count = mysqli_query($con,"SELECT COUNT(ID) As total_records FROM tblproducts where category='$cid'");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1
            $cid=intval($_GET['cid']);         
$ret=mysqli_query($con,"select * from tblproducts where category='$cid' LIMIT $offset, $total_records_per_page");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
			 <div class="col_1_of_3 span_1_of_3"> 
			 	
			   <a href="single-product.php?pid=<?php  echo $row['ID'];?>">
				<div class="inner_content clearfix">
					<div class="product_image">
						<a href="single-product.php?pid=<?php  echo $row['ID'];?>"><img src="admin/productimages/<?php echo $row['productImage1'];?>" width="280" height="150" alt=""></a>
					</div>
                    <!-- <div class="sale-box"><span class="on_sale title_shop">New</span></div>	 -->
                    <div class="price">
					   <div class="cart-left">
							<p class="title"><?php echo $row['productName'];?></p>
							<div class="price1">
							  <span class="actual">$<?php echo $row['productPrice'];?></span>
							</div>
						</div>
						 <div style="margin-top: 5%;">
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
				<h5 class="m_1">Categories</h5>
					
					
					<ul class="kids"><?php
                                    $ret=mysqli_query($con,"select * from tblcategory");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
						<li><a href="products.php?cid=<?php  echo $row['ID'];?>&&catname=<?php  echo $row['CategoryName'];?>"><?php  echo $row['CategoryName'];?></a></li><?php } ?>
						
					</ul>
		
		      </div>
			<div class="clear"></div>
			<div class="pagination">
<ul>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}
 
	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
 
        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>
 
			</div>
			</div>
		   </div>
		</div>
		<script src="js/jquery.easydropdown.js"></script>
	<?php include_once('includes/footer.php');?>
</body>
</html>