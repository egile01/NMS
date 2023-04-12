<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
     
    $query=mysqli_query($con, "insert into tblcontact(Name,Email,Message) value('$name','$email','$message')");
    if ($query) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | Contact</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/jquery.easydropdown.js"></script>
</head>
<body>
       
	<?php include_once('includes/header.php');?>
    <div class="login">
       <div class="wrap">
	    <ul class="breadcrumb breadcrumb__t"><a class="home" href="#">Home</a>  / Contact</ul>
		   <div class="content-top">
			   <form method="post">
					<div class="to">
                     	
                     	<input type="text" placeholder="Enter Your Name" required="true" name="name" class="text">
					 	
					</div>
				
					<div class="to">
					<input type="text" placeholder="Enter Your Email" required="true" name="email" class="text">
				</div>
					<div class="text">
	                   <textarea rows="10" placeholder="Your Message" required="true"name="message" style="border:solid 1px #000;" ></textarea>
	                </div>
	                <div class="submit">
	               		<input type="submit" value="Submit" name="submit">
	                </div>
               </form>

            </div>
            <hr />
<p style="font-size:28px;">Contact Details</p>
<hr />
				    	<?php
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
<table class="table table-bordered">

      <tr>
        <th><b>Address</b></th>
        <th><?php echo $row['PageDescription'];?></th>
      </tr>

      <tr>
        <th><b>Email</b></th>
        <th><?php echo $row['Email'];?></th>
      </tr>

            <tr>
        <th><b>Mobile Number</b></th>
        <th><?php echo $row['MobileNumber'];?></th>
      </tr>
    </tbody>
  </table>
<?php } ?>

       </div> 
    </div>
 <?php include_once('includes/footer.php');?>
</body>
</html>