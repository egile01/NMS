<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['nmsuid']==0)) {
  header('location:logout.php');
  } else{ 

//placing order

if(isset($_POST['placeorder'])){
//getting address
$fnaobno=$_POST['flatbldgnumber'];
$street=$_POST['streename'];
$area=$_POST['area'];
$lndmark=$_POST['landmark'];
$city=$_POST['city'];
$zipcode=$_POST['zipcode'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$paymode=$_POST['paymode'];
$userid=$_SESSION['nmsuid'];
//genrating order number
$orderno= mt_rand(100000000, 999999999);
$query="update orders set OrderNumber='$orderno',IsOrderPlaced='1',PaymentMethod='$paymode' where UserId='$userid' and IsOrderPlaced is null;";
$query.="insert into tblorderaddresses(UserId,Ordernumber,Flatnobuldngno,StreetName,Area,Landmark,City,Zipcode,Phone,Email,PaymentMethod) values('$userid','$orderno','$fnaobno','$street','$area','$lndmark','$city','$zipcode','$phone','$email','$paymode');";

$result = mysqli_multi_query($con, $query);
if ($result) {

echo '<script>alert("Your order placed successfully. Order number is "+"'.$orderno.'")</script>';
echo "<script>window.location.href='my-orders.php'</script>";

}
}    

 }   ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | Login</title>

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
        <div class="login">
          	<div class="wrap">
				<div class="col_1_of_login span_1_of_login">
				<table border="2" class="table table-responsive">
					<tr style="font-size: 20px;color: blue; border-width: 3px;">
							<th>Image</th>
							<th>Items Name</th>
							<th>Price</th>
							<th>Shipping</th>
							<th>Quantity</th>
							<th>Total</th>
							
						</tr>
						<?php 
$userid= $_SESSION['nmsuid'];
$query=mysqli_query($con,"select tblproducts.ID,tblproducts.productName,tblproducts.shippingCharge,tblproducts.productDescription,tblproducts.productPrice,tblproducts.productImage1,orders.id,orders.UserId,orders.PId,orders.IsOrderPlaced  from orders join tblproducts on tblproducts.ID=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
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
							
						</tr><?php $cnt++; }  ?>
					</table>
				</div>
				<div class="col_1_of_login span_1_of_login">
				<div class="login-title">
	           		<h4 class="title">Billing Details</h4>
					<div id="loginbox" class="loginbox">
						<form action="" method="post" name="login" id="login-form">
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Flat or Building Number *</label>
						      <input type="text" name="flatbldgnumber" placeholder="Flat or Building Number" required="true" class="inputbox">
						    </p>
						    <p id="login-form-username">
						      <label for="modlgn_username">Street Name *</label>
						      <input type="text" name="streename" placeholder="Street Name" required="true" class="inputbox">
						    </p>
						    <p id="login-form-username">
						      <label for="modlgn_username">Area *</label>
						      <input type="text" name="area" placeholder="Area" required="true" class="inputbox">
						    </p>
						    <p id="login-form-username">
						      <label for="modlgn_username">Zip/Postal Code *</label>
						      <input type="text" name="zipcode" maxlength="6"  placeholder="Zip/Postal Code" required="true" class="inputbox">
						    </p>
						     <p id="login-form-username">
						      <label for="modlgn_username">Landmark if any</label>
						      <input type="text" name="landmark"  placeholder="Landmark if any" class="inputbox">
						    </p>
						    <p id="login-form-username">
						      <label for="modlgn_username">Phone</label>
						      <input type="text" name="phone" maxlength="10" pattern="[0-9]+"  placeholder="Phone" class="inputbox">
						    </p>
						    <p id="login-form-username">
						      <label for="modlgn_username">Email Address</label>
						      <input type="text" name="email"  placeholder="Email Address" class="inputbox" required="true">
						    </p>
						    <p id="login-form-username">
						      <label for="modlgn_username">Payment Method</label>
						      
						      <select class="inputbox" name="paymode" required="true">
                                    	<option value="">Choose Payment Mode</option>
                                    	<option value="Debit Card">Debit Card</option>
                                    	<option value="Credit Card">Credit Card</option>
                                    	<option value="Cash on Delivery">Cash on Delivery</option>
                                    	<option value="E-Wallet">E-Wallet</option>
                                    </select>
						    </p>
						   <h4>Subtotal: $<?php  echo $totprice;?></h4>
					<p>+shippment: $<?php  echo $shippingtotal;?></p>
					<h3>Total to pay: <strong>$<?php echo $grandtotal;?></strong></h3>
							    <input type="submit" name="placeorder" class="button" value="PLACE ORDER"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
					</div>
			    </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
    
		
		<?php include_once('includes/footer.php');?>
		
</body>
</html><?php } ?>