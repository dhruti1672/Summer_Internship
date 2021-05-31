<?php
    session_start();
    require '../class/atclass.php';
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
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
     include './themepart/navbar.php';
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    
      <!-- partial:partials/_sidebar.html -->
      <?php
          include './themepart/sidebar.php';
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome Admin!</h3>
                  <h6 class="font-weight-normal mb-0">Good to see you...Have a great day.</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white " type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> <?php
 
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    echo $date;
?>
                    </button>
                    
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                          <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>
                            <?php 
                            $city="Gujarat";
                            $country="IN"; //Two digit country code
                            $url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&units=metric&cnt=7&lang=en&appid=197c23e55712fcf11a8bbf4ce711a06c";
                            $json=file_get_contents($url);
                            $data=json_decode($json,true);
                            //Get current Temperature in Celsius
                            echo $data['main']['temp']."<sup>C</sup>";
                            
                            ?></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Gujarat</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                        <?php 
                                            
                                            $counter1  = mysqli_query($connection, "select count(package_id) from package_master") or die(mysqli_error($connection));
                                            $counterdata = mysqli_fetch_array($counter1);

                                            
                                            
                        ?>
                        <a href="view_package.php" style="text-decoration: none; color: white;"><p class="mb-4">Total Package</p></a>
                      <p class="fs-30 mb-2"><?php  echo $counterdata[0];?></p>
                      <br/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                          <?php 
                                            
                                            $counter1  = mysqli_query($connection, "select count(hotel_id) from hotel_master") or die(mysqli_error($connection));
                                            $counterdata = mysqli_fetch_array($counter1);
                        ?>
                        <a href="view_hotel.php" style="text-decoration: none; color: white;"><p class="mb-4">Total Hotel</p></a>
                      <p class="fs-30 mb-2"><?php echo $counterdata[0]; ?></p>
                      <br/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                          <?php 
                                            
                                            $counter1  = mysqli_query($connection, "select count(blog_id) from blog_master") or die(mysqli_error($connection));
                                            $counterdata = mysqli_fetch_array($counter1);
        
                        ?>
                        <a href="view_blog.php" style="text-decoration: none; color: white;"><p class="mb-4">Number of Blogs</p></a>
                      <p class="fs-30 mb-2"><?php echo $counterdata[0]; ?></p>
                      <br/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                        <?php 
                                            
                                            $counter1  = mysqli_query($connection, "select count(contact_id) from contact_us") or die(mysqli_error($connection));
                                            $counterdata = mysqli_fetch_array($counter1);
        
                        ?>
                        <a href="client_enquiry.php" style="text-decoration: none; color: white;"><p class="mb-4">Number of Enquiry</p></a>
                      <p class="fs-30 mb-2"><?php echo $counterdata[0]; ?></p>
                     <br/> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Top Packages</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Package Name</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Flights Included</th>
                          
                        </tr>  
                      </thead>
                      <tbody>
                          <?php
                            $q= mysqli_query($connection,"select * from package_master order by package_id desc") or die("Error in Query". mysqli_error($connection));
                            while ($row = mysqli_fetch_array($q)) {
                                
                            
                        ?>
                        <tr>
                            <td><?php echo $row['package_name'];?></td>
                            <td class="font-weight-bold"><?php echo $row['package_from'];  ?></td>
                        
                          <?php if($row['package_available']==1) {?>
                          <td class="font-weight-medium"><div class="badge badge-success">Available <?php } ?></div></td>
                          <?php if($row['package_available']==0) {?>
                            <td class="font-weight-medium"><div class="badge badge-danger">Not Available <?php } ?></div></td>
                          <?php if($row['flight_include']==1) {?>
                          <td class="font-weight-medium"><div class="badge badge-success">Included <?php } ?></div></td>
                          <?php if($row['flight_include']==0) {?>
                            <td class="font-weight-medium"><div class="badge badge-danger">Not Included <?php } }?></div></td>
                        
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                         <div class="list-wrapper px-3">
                      <p class="card-title">Enquiries</p>
                      <div class="charts-data">
                        <div class="mt-3">
                          <?php  
                            $q= mysqli_query($connection,"select * from contact_us order by contact_id desc");
                            while ($row1 = mysqli_fetch_array($q)) {
    

                         ?> 
                         
                          <div class="d-flex justify-content-between align-items-center">
                            
                              <textarea class="form-control" rows="4"><?php echo $row1['contact_mess'];  ?></textarea>
                          </div>
                         <?php } ?>
                        </div>
                     
                      </div>  
                    </div>
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
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

