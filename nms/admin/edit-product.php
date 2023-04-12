<?php session_start();
include_once('includes/config.php');
//For Adding Products
if(isset($_POST['submit']))
{

    $pid=intval($_GET['id']);
    $category=$_POST['category'];
    $productname=$_POST['productName'];
    $productweight=$_POST['productweight'];
    $productprice=$_POST['productprice'];
    $productdescription=$_POST['productDescription'];
    $productinstruction=$_POST['productinstruction'];
    $tblproductscharge=$_POST['productShippingcharge'];
    $productavailability=$_POST['productAvailability'];
    $updatedby=$_SESSION['aid'];

$sql=mysqli_query($con,"update tblproducts set category='$category',productName='$productname',productweight='$productweight',productPrice='$productprice',productDescription='$productdescription',productInstruction='$productinstruction',shippingCharge='$tblproductscharge',productAvailability='$productavailability' where ID='$pid'");
echo "<script>alert('Product details updated successfully');</script>";
echo "<script>window.location.href='manage-products.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Nursery Management System || Update Products</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
   <script>
function getSubcat(val) {
    $.ajax({
    type: "POST",
    url: "get_subcat.php",
    data:'cat_id='+val,
    success: function(data){
        $("#subcategory").html(data);
    }
    });
}
</script>   

    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Products</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">


<?php 
$pid=intval($_GET['id']);
$query=mysqli_query($con,"select tblproducts.ID as pid,tblproducts.productImage1,tblproducts.productImage2,tblproducts.productImage3,tblproducts.productName,tblcategory.categoryName,tblproducts.CreationDate,tbladmin.UserName,tblcategory.ID as catid,tblproducts.productweight,tblproducts.productPrice,tblproducts.productAvailability,tblproducts.productDescription,tblproducts.productInstruction,tblproducts.shippingCharge from tblproducts join tblcategory on tblproducts.category=tblcategory.ID join tbladmin on tbladmin.ID=tblproducts.addedBy where  tblproducts.ID='$pid' order by pid desc");
while($row=mysqli_fetch_array($query))
{
?>                                 
<form  method="post" enctype="multipart/form-data">                                
<div class="row">
<div class="col-2">Category Name</div>
<div class="col-6">
<select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
<option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['categoryName']);?></option> 
<?php $ret=mysqli_query($con,"select * from tblcategory");
while($result=mysqli_fetch_array($ret))
{?>

<option value="<?php echo $result['ID'];?>"><?php echo $result['categoryName'];?></option>
<?php } ?>
</select>    
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Name</div>
<div class="col-6"><input type="text"    name="productName"  value="<?php echo htmlentities($row['productName']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Weight</div>
<div class="col-4"><input type="text"    name="productweight"  placeholder="Enter Product Weight" class="form-control" required value="<?php echo htmlentities($row['productweight']);?>">

</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-2">Product Price After Discount(Selling Price)</div>
<div class="col-6"><input type="text"    name="productprice"  value="<?php echo htmlentities($row['productPrice']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Description</div>
<div class="col-6"><textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="form-control"><?php echo $row['productDescription'];?></textarea>
</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-2">Product Instruction</div>
<div class="col-4"><textarea  name="productinstruction"  placeholder="Enter Product Instruction" rows="6" class="form-control"><?php echo $row['productDescription'];?></textarea>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Shipping Charge</div>
<div class="col-6"><input type="text"    name="productShippingcharge"  value="<?php echo htmlentities($row['shippingCharge']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Availability</div>
<div class="col-6"><select   name="productAvailability"  id="productAvailability" class="form-control" required>
<?php $pa=$row['productAvailability'];
if($pa=='In Stock'):
?>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
<?php else: ?>
<option value="Out of Stock">Out of Stock</option>    
<option value="In Stock">In Stock</option>
<?php endif; ?>
</select>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Featured Image</div>
<div class="col-6"><img src="productimages/<?php echo htmlentities($row['productImage1']);?>" width="250"><br />
    <a href="change-image1.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Image 2</div>
<div class="col-6"><img src="productimages/<?php echo htmlentities($row['productImage2']);?>" width="250"><br />
    <a href="change-image2.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-2">Product Image 3</div>
<div class="col-6"><img src="productimages/<?php echo htmlentities($row['productImage3']);?>" width="250"><br />
    <a href="change-image3.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
</div>

</form>
      
      <?php } ?>                      </div>
                        </div>
                    </div>
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
