<?php
session_start();
require '../class/atclass.php';
if(!isset($_SESSION['email']))
{
    header("location:login.php");
}

$q= mysqli_query($connection,"SELECT * FROM `payment_ master` order by pay_id desc");

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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/ht-logo.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <?php
      include './themepart/navbar.php';
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.php -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <?php
        include './themepart/sidebar.php';
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
              
              <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold" style="text-align: center">Hotel Display</h3>
                 <br/>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Hotel Name</th>
                          <th>Client Name</th>
                          <th>Payment ID</th>
                          <th>Status</th>
                          <th>Request ID</th>
                          
                         
                        </tr>
                      </thead>
                      <tbody>
                          
                          
                          
                       <?php
                          
                          while ($row = mysqli_fetch_array($q)) {
                              $q1= mysqli_query($connection, "SELECT * FROM `booking_details` WHERE book_id='{$row['book_id']}'") or die(mysqli_error($connection));
                              while ($row1 = mysqli_fetch_array($q1)) {
                                  $q2= mysqli_query($connection, "SELECT * FROM `hotel_master` WHERE hotel_id='{$row1['hotel_id']}'") or die(mysqli_error($connection));
                                  while ($row2 = mysqli_fetch_array($q2)) {
                                  
                              
                       ?>
                        <tr>
                            <td><?php echo $row2['hotel_name']; ?></td>
                              <?php } ?>
                            <td><?php echo $row1['book_fname']; ?></td>
                              <?php } ?>
                            <td><?php echo $row['payment_id']; ?></td>
                            <td><?php echo $row['pay_status']; ?></td>
                            <td><?php echo $row['pay_request_id']; ?></td>
                          </tr>
                             <?php } ?> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
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
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
