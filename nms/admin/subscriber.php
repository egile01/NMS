<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
//Code for deletion
if($_GET['del']){
$catid=$_GET['id'];
mysqli_query($con,"delete from tblsubscriber where ID ='$catid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='subscriber.php'</script>";
          }

  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>Nursery Management System- Subscriber Details</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
 <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
       <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Subscriber Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Subscriber Details</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Subscriber Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                  <th>S.NO</th>
                   <th>Email</th>
                  <th>Subscribing Date</th>
                  
                </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                  <th>S.NO</th>
              
                   <th>Email</th>
                  <th>Subscription Date</th>
                  <th>Action</th>
                  
                </tr>
                                    </tfoot>
                                    <tbody>
<?php
$ret=mysqli_query($con,"select * from tblsubscriber");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 

                                <tr class="gradeX">
                  <td><?php echo $cnt;?></td>
                  
                  <td><?php  echo $row['Email'];?></td>
                 
                  <td><?php  echo $row['DateofSub'];?></td>
                  <td>  <a href="subscriber.php?id=<?php echo $row['ID']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
                </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>