<div class="header-top">
       <div class="wrap"> 
              <div class="header-top-left">
                  
                     <a href="index.php"> <h5 style="padding-top: 20px;padding-bottom: 10px;font-size: 20px;">Nursery Management System</h5></a>
                   
                    
                    <div class="clear"></div>
             </div>
             <div class="cssmenu">
                <ul>
                     <?php if (strlen($_SESSION['nmsuid']>0)) {?>
                    <li class="active"><a href="cart.php">Cart</a></li> |
                    <li><a href="wishlist.php">Wishlist</a></li> |
                    <li><a href="checkout.php">Checkout</a></li> |
                    
                    <li><a href="logout.php">Logout</a></li><?php }?>
                    <?php if (strlen($_SESSION['nmsuid']==0)) {?> 
                    <li><a href="login.php">Log In</a></li> |
                    <li><a href="register.php">Sign Up</a></li><?php }?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap">
            <div class="header-bottom-left">
                
                <div class="menu">
                <ul class="megamenu skyblue">
            <li class="active grid"><a href="index.php">Home</a></li>
            <?php if (strlen($_SESSION['nmsuid']>0)) {?>
            <li><a class="color4" href="#">My Account</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                              
                                <ul>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="setting.php">Setting</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                   
                                </ul>   
                            </div>                          
                        </div>
                        
                        
                      </div>
                    </div>
                </li> 
                 <li><a class="color6" href="my-orders.php">My Orders</a></li><?php }?>              
                <li><a class="color5" href="#">Category</a>
                <div class="megapanel">
                    <div class="col1">
                            <div class="h_nav">
                                
                                <ul>
                                    <?php
                                    $ret=mysqli_query($con,"select * from tblcategory");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                   
                                    <li><a href="products.php?cid=<?php  echo $row['ID'];?>&&catname=<?php  echo $row['CategoryName'];?>"><?php  echo $row['CategoryName'];?></a></li><?php } ?>
                                   
                                </ul>   
                            </div>                          
                        </div>
                    </div>
                </li>
                <li><a class="color6" href="about.php">About Us</a></li>
                <li><a class="color7" href="contact.php">Contact Us</a></li>
                      <?php if (strlen($_SESSION['nmsuid']==0)) {?>
                         <li><a class="color7" href="admin/">Admin login</a></li>
                     <?php } ?>
               
            </ul>
            </div>
        </div>
       <div class="header-bottom-right">
        
      <div class="tag-list">
        
        <ul class="icon1 sub-icon1 profile_img">
            <?php
                            $userid= $_SESSION['nmsuid'];
$ret2=mysqli_query($con,"select sum(tblproducts.shippingCharge+tblproducts.productPrice) as total,COUNT(orders.PId) as totalp from orders join tblproducts on tblproducts.ID=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
$resultss=mysqli_fetch_array($ret2);

?>
            <li><a class="active-icon c2" href="#"> </a>
                <ul class="sub-icon1 list">
                    <li><h3><?php echo $resultss['totalp'];?> Products</h3><a href="cart.php"></a> </li>
                    <li><p>Total Price:  $<?php echo $resultss['total'];?></p></li>
                </ul>
            </li>
        </ul>
        
        <ul class="last"><li><a href="cart.php">Cart(<?php echo $resultss['totalp'];?>)  $<?php echo $resultss['total'];?></a></li></ul>
      </div>
    </div>
     <div class="clear"></div>
     </div>
    </div>
    <style type="text/css">
    table, th, td {
  border: 1px solid;
    padding: 15px;

}
</style>