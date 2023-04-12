<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $comname=$_POST['comname'];
    $address=$_POST['address'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from users where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo '<script>alert("This email or Contact Number already associated with another account")</script>';
    }
    else{
    $query=mysqli_query($con, "insert into users(FirstName, LastName,CompanyName,Address,Country,City, MobileNumber, Email, Password) value('$fname', '$lname','$comname','$address','$country','$city','$contno', '$email', '$password' )");
    if ($query) {
    
    echo '<script>alert("You have successfully registered")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Nursery Management System | Register </title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/jquery.easydropdown.js"></script>
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>
</head>
<body> 
	<?php include_once('includes/header.php');?>
          <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Create an Account</h4>
    		   <form method="post" name="signup" onsubmit="return checkpass();">
    			 <div class="col_1_of_2 span_1_of_2">
		   			 <div><input type="text" name="firstname" placeholder="Your First Name..." required="true" class="inputbox"></div>
		   			 <div><input type="text" name="lastname" placeholder="Your Last Name..." required="true" class="inputbox"></div>
		    			<div><input type="text" placeholder="Company Name" name="comname" class="inputbox"></div>
		    		
		    			<div><input type="password" name="password" placeholder="Enter password" required="true" class="inputbox"></div>
		    			<div><input type="password" name="repeatpassword" placeholder="Enter repeat password" required="true" class="inputbox"></div>
		    	 </div>
		    	  <div class="col_1_of_2 span_1_of_2">	

		    		<div><input type="text" placeholder="Address" name="address" class="inputbox"></div>
		    		<div><select id="country" name="country" class="frm-field required">
		            <option value="null">Select a Country</option>         
		            <option value="Åland Islands">Åland Islands</option>
		            <option value="Afghanistan">Afghanistan</option>
		            <option value="Albania">Albania</option>
		            <option value="Algeria">Algeria</option>
		            <option value="American Samoa">American Samoa</option>
		            <option value="Andorra">Andorra</option>
		            <option value="Angola">Angola</option>
		            <option value="Anguilla">Anguilla</option>
		            <option value="Antarctica">Antarctica</option>
		            <option value="Antigua And Barbuda">Antigua And Barbuda</option>
		            <option value="Argentina">Argentina</option>
		            <option value="Armenia">Armenia</option>
		            <option value="Aruba">Aruba</option>
		            <option value="Australia">Australia</option>
		            <option value="Austria">Austria</option>
		            <option value="Azerbaijan">Azerbaijan</option>
		            <option value="Bahamas">Bahamas</option>
		            <option value="Bahrain">Bahrain</option>
		            <option value="Bangladesh">Bangladesh</option>
		            <option value="Barbados">Barbados</option>
		            <option value="Belarus">Belarus</option>
		            <option value="Belgium">Belgium</option>
		            <option value="Belize">Belize</option>
		            <option value="Benin">Benin</option>
		            <option value="Bermuda">Bermuda</option>
		            <option value="Bhutan">Bhutan</option>
		            <option value="Bolivia">Bolivia</option>
		            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
		            <option value="Botswana">Botswana</option>
		            <option value="Bouvet Island">Bouvet Island</option>
		            <option value="Brazil">Brazil</option>
		            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
		            <option value="Brunei">Brunei</option>
		            <option value="Bulgaria">Bulgaria</option>
		            <option value="Burkina Faso">Burkina Faso</option>
		            <option value="Burundi">Burundi</option>
		            <option value="Cambodia">Cambodia</option>
		            <option value="Cameroon">Cameroon</option>
		            <option value="Canada">Canada</option>
		            <option value="Cape Verde">Cape Verde</option>
		            <option value="Cayman Islands">Cayman Islands</option>
		            <option value="Central African Republic">Central African Republic</option>
		            <option value="Chad">Chad</option>
		            <option value="Chile">Chile</option>
		            <option value="China">China</option>
		            <option value="Christmas Island">Christmas Island</option>
		            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
		            <option value="Colombia">Colombia</option>
		            <option value="Comoros">Comoros</option>
		            <option value="Congo">Congo</option>
		            <option value="Congo, Democractic Republic">Congo, Democractic Republic</option>
		            <option value="Cook Islands">Cook Islands</option>
		            <option value="Costa Rica">Costa Rica</option>
		            <option value="Ivory Coast">Cote D'Ivoire (Ivory Coast)</option>
		            <option value="Croatia">Croatia (Hrvatska)</option>
		            <option value="Cuba">Cuba</option>
		            <option value="Cyprus">Cyprus</option>
		            <option value="Czech Republic">Czech Republic</option>
		            <option value="Denmark">Denmark</option>
		            <option value="Djibouti">Djibouti</option>
		            <option value="Dominica">Dominica</option>
		            <option value="Dominican Republic">Dominican Republic</option>
		            <option value="East Timor">East Timor</option>
		            <option value="Ecuador">Ecuador</option>
		            <option value="Egypt">Egypt</option>
		            <option value="El Salvador">El Salvador</option>
		            <option value="Equatorial Guinea">Equatorial Guinea</option>
		            <option value="Eritrea">Eritrea</option>
		            <option value="Estonia">Estonia</option>
		            <option value="Ethiopia">Ethiopia</option>
		            <option value="Falkland Islands">Falkland Islands (Islas Malvinas)</option>
		            <option value="Faroe Islands">Faroe Islands</option>
		            <option value="Fiji Islands">Fiji Islands</option>
		            <option value="Finland">Finland</option>
		            <option value="France">France</option>
		            <option value="France, Metropolitan">France, Metropolitan</option>
		            <option value="French Guiana">French Guiana</option>
		            <option value="French Polynesia">French Polynesia</option>
		            <option value="French Southern Territories">French Southern Territories</option>
		            <option value="Gabon">Gabon</option>
x		            <option value="Georgia">Georgia</option>
		            <option value="Germany">Germany</option>
		            <option value="Ghana">Ghana</option>
		            <option value="Gibraltar">Gibraltar</option>
		            <option value="Greece">Greece</option>
		            <option value="Greenland">Greenland</option>
		            <option value="Grenada">Grenada</option>
		            <option value="Guadeloupe">Guadeloupe</option>
		            <option value="Guam">Guam</option>
		            <option value="Guatemala">Guatemala</option>
		            <option value="Guernsey">Guernsey</option>
		            <option value="Guinea">Guinea</option>
		            <option value="Guinea-Bissau">Guinea-Bissau</option>
		            <option value="Guyana">Guyana</option>
		            <option value="Haiti">Haiti</option>
		            <option value="Heard and McDonald Islands">Heard and McDonald Islands</option>
		            <option value="Honduras">Honduras</option>
		            <option value="Hong Kong S.A.R.">Hong Kong S.A.R.</option>
		            <option value="Hungary">Hungary</option>
		            <option value="Iceland">Iceland</option>
		            <option value="India">India</option>
		            <option value="Indonesia">Indonesia</option>
		            <option value="Iran">Iran</option>
		            <option value="Iraq">Iraq</option>
		            <option value="Ireland">Ireland</option>
		            <option value="Isle of Man">Isle of Man</option>
		            <option value="Israel">Israel</option>
		            <option value="Italy">Italy</option>
		            <option value="Jamaica">Jamaica</option>
		            <option value="Japan">Japan</option>
		            <option value="Jersey">Jersey</option>
		            <option value="Jordan">Jordan</option>
		            <option value="Kazakhstan">Kazakhstan</option>
		            <option value="Kenya">Kenya</option>
		            <option value="Kiribati">Kiribati</option>
		            <option value="Korea">Korea</option>
		            <option value="Korea, North">Korea, North</option>
		            <option value="Kuwait">Kuwait</option>
		            <option value="Kyrgyzstan">Kyrgyzstan</option>
		            <option value="Laos">Laos</option>
		            <option value="Latvia">Latvia</option>
		            <option value="Lebanon">Lebanon</option>
		            <option value="Lesotho">Lesotho</option>
		            <option value="Liberia">Liberia</option>
		            <option value="Libya">Libya</option>
		            <option value="Liechtenstein">Liechtenstein</option>
		            <option value="Lithuania">Lithuania</option>
		            <option value="Luxembourg">Luxembourg</option>
		            <option value="Macau S.A.R.">Macau S.A.R.</option>
		            <option value="Macedonia">Macedonia</option>
		            <option value="Madagascar">Madagascar</option>
		            <option value="Malawi">Malawi</option>
		            <option value="Malaysia">Malaysia</option>
		            <option value="Maldives">Maldives</option>
		            <option value="Mali">Mali</option>
		            <option value="Malta">Malta</option>
		            <option value="Marshall Islands">Marshall Islands</option>
		            <option value="Martinique">Martinique</option>
		            <option value="Mauritania">Mauritania</option>
		            <option value="Mauritius">Mauritius</option>
		            <option value="Mayotte">Mayotte</option>
		            <option value="Mexico">Mexico</option>
		            <option value="Micronesia">Micronesia</option>
		            <option value="Moldova">Moldova</option>
		            <option value="Monaco">Monaco</option>
		            <option value="Mongolia">Mongolia</option>
		            <option value="Montenegro">Montenegro</option>
		            <option value="Montserrat">Montserrat</option>
		            <option value="Morocco">Morocco</option>
		            <option value="Mozambique">Mozambique</option>
		            <option value="Myanmar">Myanmar</option>
		            <option value="Namibia">Namibia</option>
		            <option value="Nauru">Nauru</option>
		            <option value="Nepal">Nepal</option>
		            <option value="Netherlands">Netherlands</option>
		            <option value="Netherlands Antilles">Netherlands Antilles</option>
		            <option value="New Caledonia">New Caledonia</option>
		            <option value="New Zealand">New Zealand</option>
		            <option value="Nicaragua">Nicaragua</option>
		            <option value="Niger">Niger</option>
		            <option value="Nigeria">Nigeria</option>
		            <option value="Niue">Niue</option>
		            <option value="Norfolk Island">Norfolk Island</option>
		            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
		            <option value="Norway">Norway</option>
		            <option value="Oman">Oman</option>
		            <option value="Pakistan">Pakistan</option>
		            <option value="Palau">Palau</option>
		            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
		            <option value="Panama">Panama</option>
		            <option value="Papua new Guinea">Papua new Guinea</option>
		            <option value="Paraguay">Paraguay</option>
		            <option value="Peru">Peru</option>
		            <option value="Philippines">Philippines</option>
		            <option value="Pitcairn Island">Pitcairn Island</option>
		            <option value="Poland">Poland</option>
		            <option value="Portugal">Portugal</option>
		            <option value="Puerto Rico">Puerto Rico</option>
		            <option value="Qatar">Qatar</option>
		            <option value="Reunion">Reunion</option>
		            <option value="Romania">Romania</option>
		            <option value="Russia">Russia</option>
		            <option value="Rwanda">Rwanda</option>
		            <option value="Saint Helena">Saint Helena</option>
		            <option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
		            <option value="Saint Lucia">Saint Lucia</option>
		            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
		            <option value="Saint Vincent And The Grenadines">Saint Vincent And The Grenadines</option>
		            <option value="Samoa">Samoa</option>
		            <option value="San Marino">San Marino</option>
		            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
		            <option value="Saudi Arabia">Saudi Arabia</option>
		            <option value="Senegal">Senegal</option>
		         </select></div>		        
		          <div><input type="text" name="city" placeholder="City" class="inputbox"></div>
		         
		           	<div><input type="email" name="email" placeholder="Email address" required="true" class="inputbox"></div>
		         
		          	<div><input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required="true" class="inputbox"></div>
		          		
		          </div>
		     
		      <br>
                                          <button class="grey" type="submit" name="submit">REGISTER</button>
		   
		    <div class="clear"></div>
		    </form>
    	</div>
    </div>
    <div class="footer">
		
		
		<?php include_once('includes/footer.php');?>
		</div>
</body>
</html>