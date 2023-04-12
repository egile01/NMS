<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['nmsuid']==0)) {
  header('location:logout.php');
  } else{ 

    ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | Order Details</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
       
<?php include_once('includes/header.php');?>
         <div class="register_account">
           <div class="wrap">
    	   
    	     <h4 class="title">
#<?php echo $oid=$_GET['orderid'];?> Order Details
    </h4>

    <?php
//Getting Url
$link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 

// Getting order Details
$userid= $_SESSION['nmsuid'];
$ret=mysqli_query($con,"select OrderTime,Status from tblorderaddresses where UserId='$userid' and Ordernumber='$oid'");
while($result=mysqli_fetch_array($ret)) {
?>

<p style="color:#000"><b>Order #</b><?php echo $oid?></p>
<p style="color:#000"><b>Ordet Date : </b><?php echo $od=$result['OrderTime'];?></p>
<p style="color:#000"><b>Ordet Status :</b> <?php if($result['Status']==""){
    echo "Not Accept Yet";
} else {
echo $result['Status'];
}?> &nbsp;&nbsp;&nbsp;

<a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo $oid;?>');" title="Track order" style="color:red" class="btn-grey"> Track order
</a></p>

<?php } ?>
<!-- Invoice -->
<p>
 <a href="javascript:void(0);" onClick="popUpWindow('invoice.php?oid=<?php echo $oid;?>&&odate=<?php echo $od;?>');" title="Order Invoice" style="color:red" class="btn-grey">  Invoice</a></p>
 <br>
    	     <table border="2" class="table table-responsive">
					<tr style="font-size: 20px;color: blue; border-width: 3px;">
						<th>Order ID</th>
							<th>Image</th>
							<th>Items Name</th>
							<th>Price</th>
							<th>Shipping</th>
							<th>Quantity</th>
							<th>Total</th>
							<th>Payment Method</th>
							
						</tr>
						<?php 
$userid= $_SESSION['nmsuid'];
$query=mysqli_query($con,"select tblproducts.ID,tblproducts.productName,tblproducts.shippingCharge,tblproducts.productDescription,tblproducts.productPrice,tblproducts.productImage1,orders.id,orders.UserId,orders.PId,orders.IsOrderPlaced,orders.OrderNumber,orders.PaymentMethod from orders join tblproducts on tblproducts.ID=orders.PId where orders.UserId='$userid' and orders.OrderNumber='$oid'");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
?>
						<tr>
							<td><?php echo $row['OrderNumber'];?></td>
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
							<td class="price"><?php  echo $row['PaymentMethod'];?></td>
			
						</tr><?php $cnt++; } }?>
					</table>
			


				<div class="total-count" style="padding-top: 30px;">
					<h4>Subtotal: $<?php  echo $totprice;?></h4>
					<p>+shippment: $<?php  echo $shippingtotal;?></p>
					<h3>Total to pay: <strong>$<?php echo $grandtotal;?></strong></h3>
					<a href="javascript:void(0);" onClick="popUpWindow('cancelorder.php?oid=<?php echo $oid;?>');" title="Cancel this order" style="color:red" class="btn-grey">Cancel this order </a>
				</div>
			
    	   </div>
    	</div>
<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>