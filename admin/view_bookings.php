
<?php
session_start();
require '../class/atclass.php';
if(!isset($_SESSION['email']))
{
    header("location:login.php");
}

$q= mysqli_query($connection,"select * from booking_details order by book_id desc");
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
                    <h3 class="font-weight-bold" style="text-align: center">Booking Details</h3>
                 <br/>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Hotel Name</th>
                          <th>Name</th>
                          <th>Travelling for Work</th>
                          <th>Departure</th>
                          <th>Arrival</th>
                          <th>Number</th>
                          <th>Email</th>
                          <th>Infant</th>
                          <th>Child</th>
                          <th>Adult</th>
                                             
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                    while($row=mysqli_fetch_array($q))
                                    {
                                    $sc= mysqli_query($connection,"select * from hotel_master where hotel_id='{$row['hotel_id']}'") or die("error");
                                    while($row1=mysqli_fetch_array($sc))
                                    {
                                       
                           ?>
                           <tr>
                            <td><?php echo $row1['hotel_name']; ?></td> 
                            <?php 
                                    }
                            ?>
                               
                          
                          <td><?php if($row['book_title']==1)
                                    {
                                        echo"Mr. ".$row['book_fname'].$row['book_lname'];
                                    }
                                    elseif($row['book_title']==2)
                                    {
                                        echo"Mrs. ".$row['book_fname'].$row['book_lname']; 
                                    }
                                    else
                                    {
                                        echo"Miss. ".$row['book_fname'].$row['book_lname'];
                                    } ?>
                          </td>
                          <?Php
                          if($row['book_for_work']==0)
                          {
                              ?>
                          <td><label class="badge badge-danger">No<?php } else{ ?></label></td>
                          <td><label class="badge badge-success">Yes <?php } ?></label></td>
                                                                              
                          <td><?php echo $row['departure_date']; ?></td>
                          <td><?php echo $row['arrival_date']; ?></td>
                          <td><?php echo $row['book_cc'].$row['book_num']; ?></td>
                          <td><?php echo $row['book_mail']; ?></td>
                          <td><?php echo $row['book_infant']; ?></td>
                          <td><?php echo $row['book_child']; ?></td>
                          <td><?php echo $row['book_adult']; ?></td>
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
