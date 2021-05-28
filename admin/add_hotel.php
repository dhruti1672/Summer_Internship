<?php
 session_start();
 require '../class/atclass.php';
 
 if(isset($_POST['submit']))
 {
     $name= mysqli_real_escape_string($connection,$_POST['name']);
     $nights= mysqli_real_escape_string($connection,$_POST['nights']);
     $price= mysqli_real_escape_string($connection,$_POST['price']);
     $desc= mysqli_real_escape_string($connection,$_POST['desc']);
     $pack_id= mysqli_real_escape_string($connection,$_POST['package_id']);
        
    $insertquery = mysqli_query($connection, "INSERT INTO `hotel_master`( `package_id`, `hotel_name`, `hotel_night`, `hotel_price`, `hotel_address`) 
        VALUES('{$pack_id}','{$name}','{$nights}','{$price}','{$desc}')") or die("Error In Query" . mysqli_error($connection));

        if ($insertquery) {


      echo "<script>alert('Hotel Added Successfully.');window.location='add_hotel.php';</script>";
     
       
        }  
}
 
 
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
                  <h3 class="card-title">Add Hotel Information</h3>
                  <p class="card-description">
                    Hotel Information
                  </p>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Hotel Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2">Hotel Package Nights</label>
                      <input type="text" name="nights" class="form-control" id="exampleInputName1" placeholder="Total Nights">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName3">Hotel Price</label>
                      <input type="text" name="price" class="form-control" id="exampleInputName1" placeholder="Starting range">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Package Place</label>
                      <select class="form-control" name="package_id" id="exampleSelectGender">
                          <?php
                                    $sc= mysqli_query($connection,"select * from package_master") or die("error");
                                    while($row=mysqli_fetch_array($sc))
                                    {
                                        echo "<option value='{$row['package_id']}'>{$row['package_name']}</option>";
                                     }
                           ?>
                           
                        </select>
                      </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Hotel Address</label>
                      <textarea class="form-control" name="desc" id="exampleTextarea1" rows="2"></textarea>
                    </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
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
