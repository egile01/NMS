<?php
session_start();
error_reporting(0);

include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | About</title>

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
				<ul class="breadcrumb breadcrumb__t"><a class="home" href="index.php">Home</a>  / About</ul>
				<div class="section group">
				   
				    <div class="cont span_2_of_about">
				    	<?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
				       <h3><?php  echo $row['PageTitle'];?></h3>
					   	<p><?php  echo $row['PageDescription'];?>.</p><?php } ?>
					   
		   <!-- Add fancyBox main JS and CSS files -->
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>
           </div>
		   <div class="clear"></div>	
		  </div>
	</div>	
   </div>  
    <?php include_once('includes/footer.php');?>
     
</body>
</html>