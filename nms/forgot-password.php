<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];
$password=md5($_POST['newpassword']);
        $query=mysqli_query($con,"select id from users where  Email='$email' and MobileNumber='$contactno' ");
        
    $ret=mysqli_num_rows($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
      $query1=mysqli_query($con,"update users set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
       if($query1)
   {
echo "<script>alert('Password successfully changed');</script>";

   }
     
    }
    else{
    
      echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
  }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | Forgot Password</title>

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
						      <label for="modlgn_username">Registered Email</label>
						     
						      <input type="text" class="inputbox" name="email" placeholder="Enter Your Email" required="true">
						    </p>
						    <p id="login-form-username">
						      <label for="modlgn_username">Contact Number</label>
						     
						      <input type="text" class="inputbox" name="contactno" placeholder="Contact Number" required="true" pattern="[0-9]+">
						    </p>
						    
						    <p id="login-form-password">
						      <label for="modlgn_passwd">New Password</label>
						      
						       <input type="password" class="inputbox" id="newpassword" name="newpassword" placeholder="New Password">
						    </p>
						     <p id="login-form-password">
						      <label for="modlgn_passwd">Confirm Password</label>
						      <input type="password" class="inputbox" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="login.php">Login </a></label>
							   </p>
							    <input type="submit" name="submit" class="button" value="Reset"><div class="clear"></div>
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