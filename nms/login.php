<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from users where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['nmsuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
  
    echo "<script>alert('Invalid Details.');</script>";
    }
  }
?>
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
					<h4 class="title">New Customers</h4>
					<p>One time registarion is required.</p>
					<div class="button1">
					   <a href="register.php"><input type="submit" name="Submit" value="Create an Account"></a>
					 </div>
					 <div class="clear"></div>
				</div>
				<div class="col_1_of_login span_1_of_login">
				<div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
					<div id="loginbox" class="loginbox">
						<form action="" method="post" name="login" id="login-form">
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Registered Email or Contact Number</label>
						      <input type="text" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true" class="inputbox">
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      
						       <input type="password" name="password" placeholder="Enter password" required="true" class="inputbox">
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="forgot-password.php">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" name="login" class="button" value="Login"><div class="clear"></div>
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
</html>