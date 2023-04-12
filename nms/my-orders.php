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
<title>Nursery Management System | My Orders</title>

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
    	     
    	     	<div class="table table-bordered">
					<table>
						<tr>
                                    <th style="width:100px;">#</th>
                                <th>Order ID</th>
                                <th>Order Date and Time</th>
                                <th>Order Status</th>
                                <th>Track Order</th>
                                <th>Action</th>
                                </tr>
					<tr>
                                    <?php
                                   $userid= $_SESSION['nmsuid'];
 $query=mysqli_query($con,"select * from  tblorderaddresses  where UserId='$userid'");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>
               <tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row['Ordernumber'];?></td>
<td><p><b>Order Date :</b> <?php echo $row['OrderTime']?></p></td>  
<td><?php $status=$row['Status'];
if($status==''){
 echo "Waiting for confirmation";   
} else{
echo $status;
}

                                                    ?>  </td>   
<td>

 <a  href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['Ordernumber']);?>');" title="Track order">Track Order</a></td>
<td><a href="order-detail.php?orderid=<?php echo $row['Ordernumber'];?>" class="btn btn-primary">View Details</a></td>       
</tr><?php $cnt++; } ?>
					</table>
				</div>

    	   </div>
    	</div>
<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>