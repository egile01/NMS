<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['nmsuid']==0)) {
  header('location:logout.php');
  } else{ 

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
// Code for deleting product from wishlist
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from wishlist where id='$rid'");
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'wishlist.php'</script>";     
}
    ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | Wishlist</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
</head>
<body>
       
<?php include_once('includes/header.php');?>
         <div class="register_account">
           <div class="wrap">
    	     <h4 class="title">Wishlist</h4>
    	     <table>
						<tr>
							<th class="items">Image</th>
							<th class="items">Items Name</th>
							<th class="price">Price</th>
							<th class="total">Shipping</th>
							<th class="qnt">Quantity</th>
							<th class="total">Total</th>
							<th class="delete">Delete</th>
							<th class="delete">Add To Cart</th>
						</tr>
						<?php 
$userid= $_SESSION['nmsuid'];
$query=mysqli_query($con,"select tblproducts.ID as pid,tblproducts.productName,tblproducts.shippingCharge,tblproducts.productDescription,tblproducts.productPrice,tblproducts.productImage1,wishlist.ID as wid,wishlist.UserId,wishlist.ProductId,wishlist.postingDate  from wishlist join tblproducts on tblproducts.ID=wishlist.ProductId where wishlist.UserId='$userid'");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
?>
						<tr>
						
								<td><img src="admin/productimages/<?php echo $row['productImage1'];?>" height="150" alt=""></td>
								<td><?php  echo $row['productName'];?></td>
							
							<td class="price"><?php  echo $price=$row['productPrice'];?></td>
							<?php 
$totprice+=$price;
$cnt=$cnt+1;               
 ?>
							<td class="price"><?php  echo $shipping=$row['shippingCharge'];?></td>
							<?php 
$shippingtotal+=$shipping;
$cnt=$cnt+1;               
 ?>
							<td class="qnt">1</td>
							<td class="total"><?php  echo $total=$price+$shipping;?></td>
							
							<?php 
$grandtotal+=$total;
$cnt=$cnt+1;               
 ?>
							<td class="delete">
<a href="wishlist.php?delid=<?php echo $row['wid'];?>" class="ico-del" onclick="return confirm('Do you really want to Delete ?');">Delete</a></td>
							</td>

							<td><?php if($_SESSION['nmsuid']==""){?>
							<a href="login.php" class="grey">Add to cart</a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="pid" value="<?php echo $row['pid'];?>">   
<button type="submit" name="submit" class="grey">Add to Cart</button>
  </form> 
<?php } ?></td>
						</tr><?php $cnt++; } } else {?>
							<tr>
								<td colspan="7" style="text-align:center;color:red;font-size:20px;">Wishlist is empty</td>
							</tr>
						<?php } ?>
					</table>
					
    	   </div>
    	</div>

<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>