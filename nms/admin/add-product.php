<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  }
  else{
//For Adding Products
if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    
    $productname=$_POST['productName'];
    $productweight=$_POST['productweight'];
    $productprice=$_POST['productprice'];
    $productdescription=$_POST['productDescription'];
    $productinstruction=$_POST['productinstruction'];
    $productscharge=$_POST['productShippingcharge'];
    $productavailability=$_POST['productAvailability'];

    $productimage1=$_FILES["productimage1"]["name"];
    $productimage2=$_FILES["productimage2"]["name"];
    $productimage3=$_FILES["productimage3"]["name"];
$extension1 = substr($productimage1,strlen($productimage1)-4,strlen($productimage1));
$extension2 = substr($productimage2,strlen($productimage2)-4,strlen($productimage2));
$extension3 = substr($productimage3,strlen($productimage3)-4,strlen($productimage3));
//Renaming the  image file
$imgnewfile1=md5($productimage1.time()).$extension1;
$imgnewfile2=md5($productimage2.time()).$extension2;
$imgnewfile3=md5($productimage3.time()).$extension3;
$addedby=$_SESSION['aid'];


    move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/".$imgnewfile1);
    move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/".$imgnewfile2);
    move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/".$imgnewfile3);
$sql=mysqli_query($con,"insert into tblproducts(category,productName,productweight,productPrice,productDescription,productInstruction,shippingCharge,productAvailability,productImage1,productImage2,productImage3,addedBy) values('$category','$productname','$productweight','$productprice','$productdescription','$productinstruction','$productscharge','$productavailability','$imgnewfile1','$imgnewfile2','$imgnewfile3','$addedby')");
echo "<script>alert('Product Added added successfully');</script>";
echo "<script>window.location.href='manage-products.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Nursery Management System|| Add Product</title>
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
                        <h1 class="mt-4">Add Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post" enctype="multipart/form-data">                                
<div class="row">
<div class="col-2">Category Name</div>
<div class="col-4">
<select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($con,"select * from tblcategory");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['ID'];?>"><?php echo $row['CategoryName'];?></option>
<?php } ?>
</select>    
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Name</div>
<div class="col-4"><input type="text"    name="productName"  placeholder="Enter Product Name" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Weight</div>
<div class="col-4"><input type="text"    name="productweight"  placeholder="Enter Product Weight" class="form-control" required>

</div>
</div>



<div class="row" style="margin-top:1%;">
<div class="col-2">Product Price After Discount(Selling Price)</div>
<div class="col-4"><input type="text"    name="productprice"  placeholder="Enter Product Price" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Description</div>
<div class="col-4"><textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="form-control"></textarea>
</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-2">Product Instruction</div>
<div class="col-4"><textarea  name="productinstruction"  placeholder="Enter Product Instruction" rows="6" class="form-control"></textarea>
</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-2">Product Shipping Charge</div>
<div class="col-4"><input type="text"    name="productShippingcharge"  placeholder="Enter Product Shipping Charge" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Availability</div>
<div class="col-4"><select   name="productAvailability"  id="productAvailability" class="form-control" required>
<option value="">Select</option>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
</select>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Featured Image</div>
<div class="col-4"><input type="file" name="productimage1" id="productimage1"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Product Image 2</div>
<div class="col-4"><input type="file" name="productimage2"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-2">Product Image 3</div>
<div class="col-4"><input type="file" name="productimage3"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
</div>

</form>
                            </div>
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
<?php }  ?>