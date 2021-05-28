<?php
 session_start();
 require '../class/atclass.php';
 $eid=$_GET["eid"];
if(!isset($_GET['eid']))
{
    header("location:view_hotel.php");
}


 if($_POST)
 {
     $name= mysqli_real_escape_string($connection,$_POST['name']);
     $add= mysqli_real_escape_string($connection,$_POST['add']);
     $nights= mysqli_real_escape_string($connection,$_POST['nights']);
     $pack_id= mysqli_real_escape_string($connection,$_POST['pack_id']);
     $price= mysqli_real_escape_string($connection,$_POST['price']);
     $f=$_FILES['img'];
     $file = $_FILES['img']['name'];
        
    if($f['type']=="image/jpeg" || $f['type']=="image/png")
    {
            move_uploaded_file($_FILES['img']['tmp_name'], "upload/" . $file);  

           $updateq = mysqli_query($connection, "UPDATE `hotel_master` SET `hotel_name`='{$name}',`package_id`='{$pack_id}',`hotel_address`='{$add}',`hotel_night`='{$nights}',`hotel_price`='{$price}',`hotel_img`='{$file}' WHERE hotel_id='{$eid}'") or die("Error In Query" . mysqli_error($connection));

            if ($updateq) {

               echo "<script>alert('Hotel Updated Successfully.');window.location='view_hotel.php';</script>";

            }  

     }
     else {
        echo "<script>alert('only jpeg and png image is allowed');window.location='view_hotel.php';</script>";
    }
 }
  $q= mysqli_query($connection,"select * from hotel_master where hotel_id='{$eid}'"); 

 
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
                  <h3 class="card-title">Update Hotel Information</h3>
                  <br/>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <?php
                            $row= mysqli_fetch_array($q);
                            
                             $q1= mysqli_query($connection, "select * from package_master ") or die("error". mysqli_error($connection));   
                             
                        ?>
                        <input type="hidden" name="packid" value="<?php  $row['hotel_id'];?>">
                      <label for="exampleInputName1">Hotel Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" value="<?php  echo $row['hotel_name'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2">Total Nights</label>
                      <input type="text" name="nights" class="form-control" id="exampleInputName1"  value="<?php echo $row['hotel_night'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName3">Hotel Price</label>
                      <input type="text" name="price" class="form-control" id="exampleInputName1" value="<?php echo $row['hotel_price'];?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Package Name</label>
                      <select class="form-control" name="pack_id" id="exampleSelectGender">
                         <?php while ($row1= mysqli_fetch_array($q1)) {
                                
                            ?>
                          <option value="<?php echo $row1['package_id']?>"><?php echo $row1['package_name']?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputName2">Hotel Address</label>
                      <input type="text" name="add" class="form-control" id="exampleInputName1"  value="<?php echo $row['hotel_address'];?>">
                    </div>
                    <div class="form-group">
                      <label>upload Image</label>
                      <input type="file" name="img" class="file-upload-default" >
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                   
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                      <button type="reset" class="btn btn-light" onclick="window.location='view_hotel.php'">Cancel</button>
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
