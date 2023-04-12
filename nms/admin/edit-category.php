<?php session_start();
include_once('includes/config.php');
//For Adding categories
if(isset($_POST['submit']))
{
$category=$_POST['category'];
$description=$_POST['description'];
$id=intval($_GET['id']);
$sql=mysqli_query($con,"update tblcategory set CategoryName='$category',CategoryDescription='$description' where ID='$id'");
echo "<script>alert('Category Details updated');</script>";
echo "<script>window.location.href='manage-categories.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Nursery Management System - Edit category</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from tblcategory where ID='$id'");
while($row=mysqli_fetch_array($query))
{
?>	                            	
<form  method="post">                                
<div class="row">
<div class="col-2">Category Name</div>
<div class="col-4"><input type="text" value="<?php echo  htmlentities($row['CategoryName']);?>"  name="category" class="form-control" required></div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Category Description</div>
<div class="col-4"><textarea placeholder="Enter category Name"  name="description" class="form-control" required><?php echo  htmlentities($row['CategoryDescription']);?></textarea></div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
</div>

</form>
<?php } ?>
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
