<?php
 session_start();
 require '../class/atclass.php';
 $eid=$_GET["eid"];
if(!isset($_GET['eid']))
{
    header("location:view_package.php");
}


 if($_POST)
 {
     $name= mysqli_real_escape_string($connection,$_POST['name']);
     $avail= mysqli_real_escape_string($connection,$_POST['avail']);
     $nights= mysqli_real_escape_string($connection,$_POST['nights']);
     $flight= mysqli_real_escape_string($connection,$_POST['flight']);
     $price= mysqli_real_escape_string($connection,$_POST['price']);
     $desc= mysqli_real_escape_string($connection,$_POST['desc']);
     
    $updateq = mysqli_query($connection, "UPDATE `package_master` SET `package_name`='{$name}',`package_available`='{$avail}',`package_nights`='{$nights}',`flight_include`='{$flight}',`package_from`='{$price}',`package_desc`='{$desc}' WHERE package_id='{$eid}'") or die("Error In Query" . mysqli_error($connection));

        if ($updateq) {


      echo "<script>alert('Package Updated Successfully.');window.location='view_package.php';</script>";
     
       
        }  

 }
  $q= mysqli_query($connection,"select * from package_master where package_id='{$eid}'"); 

 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
  include './themepart/title.php';
  ?>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/ht-logo.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
      include './themepart/navbar.php';
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php
          include './themepart/sidebar.php';
      ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
           
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Update Package Information</h3>
                  <p class="card-description">
                    Package Information
                  </p>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <?php
                            $row= mysqli_fetch_array($q)
                            
                        ?>
                        <input type="hidden" name="packid" value="<?php  $row['package_id'];?>">
                      <label for="exampleInputName1">Package Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" value="<?php  echo $row['package_name'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2">Package Nights</label>
                      <input type="text" name="nights" class="form-control" id="exampleInputName1"  value="<?php echo $row['package_nights'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName3">Package Starting Range</label>
                      <input type="text" name="price" class="form-control" id="exampleInputName1" value="<?php echo $row['package_from'];?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Availability</label>
                      <select class="form-control" name="avail" id="exampleSelectGender">
                         
                          <option value="1" <?php
                          if($row['package_available']==1) {echo "selected";}?>>Yes</option>
                            <option value="0" <?php
                          if($row['package_available']==0) {echo "selected";}?>>No</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="exampleSelectFlight">Flights Included</label>
                      <select class="form-control" name="flight" id="exampleSelectGender">
                          <option value="1" <?php
                          if($row['flight_include']==1) {echo "selected";}?> >Yes</option>
                            <option value="0"<?php
                          if($row['flight_include']==0) {echo "selected";}?>>No</option>
                        </select></div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                            <textarea class="form-control" name="desc" id="exampleTextarea1" rows="4" ><?php echo $row['package_desc'];?></textarea>
                    </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                      <button type="reset" class="btn btn-light" onclick="window.location='view_package.php'">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
              include './themepart/footer.php';
        ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
