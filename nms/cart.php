<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['nmsuid']==0)) {
  header('location:logout.php');
  } else{ 
// Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from orders where id='$rid'");
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'cart.php'</script>";
}
    ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | Cart</title>

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
    	     
    	     <table border="2" class="table table-responsive">
					<tr style="font-size: 20px;color: blue; border-width: 3px;">
							<th>Image</th>
							<th>Items Name</th>
							<th>Price</th>
							<th>Shipping</th>
							<th>Quantity</th>
							<th>Total</th>
							<th>Delete</th>
							
						</tr>
						<?php 
$userid= $_SESSION['nmsuid'];
$query=mysqli_query($con,"select tblproducts.ID,tblproducts.productName,tblproducts.shippingCharge,tblproducts.productDescription,tblproducts.productPrice,tblproducts.productImage1,orders.id as oid,orders.UserId,orders.PId,orders.IsOrderPlaced  from orders join tblproducts on tblproducts.ID=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
?>
						<tr>
							<td width="300"><img src="admin/productimages/<?php echo $row['productImage1'];?>" height="150" width="200" alt=""></td>
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
								<a href="cart.php?delid=<?php echo $row['oid'];?>" class="ico-del" onclick="return confirm('Do you really want to Delete ?');">Delete</a></td>
						</tr><?php $cnt++; } }else {?>
							<tr>
								<td colspan="7" style="text-align:center;color:red;font-size:20px;">Cart is empty</td>
							</tr>
						<?php } ?>
					</table>
					<?php if($num>0):?>


				<div class="total-count" style="padding-top: 30px;">
					<h4>Subtotal: $<?php  echo $totprice;?></h4>
					<p>+shippment: $<?php  echo $shippingtotal;?></p>
					<h3>Total to pay: <strong>$<?php echo $grandtotal;?></strong></h3>
					<hr />
					<a href="checkout.php" class="button">
					<input type="submit" name="Submit" class="grey" value="Finalize and pay"></a>
				</div>
			<?php endif;?>
    	   </div>
    	</div>
<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>