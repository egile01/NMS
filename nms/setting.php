<?php
session_start();
//error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['nmsuid']==0)) {
  header('location:logout.php');
  } else{ 
if(isset($_POST['change']))
{
$userid=$_SESSION['nmsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query1=mysqli_query($con,"select id from users where id='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query1);
if($row>0){
$ret=mysqli_query($con,"update users set Password='$newpassword' where id='$userid'");

echo '<script>alert("Your password successully changed.")</script>';
} else {
echo '<script>alert("Your current password is wrong.")</script>';

}

}
    ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | User Profile</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body>
    
	<?php include_once('includes/header.php');?>
        <div class="login">
          	<div class="wrap">
				
				<div class="col_1_of_login span_1_of_login">
				<div class="login-title">
	           		<h4 class="title">Change Password</h4>
					<div id="loginbox" class="loginbox">
						<form  method="post" name="changepassword" onsubmit="return checkpass();">
							
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Current Password</label>
						      
						      <input type="password" name="currentpassword" placeholder="Current Password" required="true" class="inputbox">
						    </p>
						   
						    <p id="login-form-username">
						      <label for="modlgn_username">New Password</label>
						      
						      <input type="password" name="newpassword" placeholder="New Password" required="true" class="inputbox">
						    </p>
						    <p id="login-form-username">
						      <label for="modlgn_username">Confirm Password</label>
						      <input type="password" name="confirmpassword" required="true" class="inputbox" placeholder="Confirm Password">
						    </p>
						 
						    <div class="remember">
							   
							    <input type="submit" name="change" class="button" value="Save Change"><div class="clear"></div>
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