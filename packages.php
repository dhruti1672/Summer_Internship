<?php
session_start();
require './class/atclass.php';

$q= mysqli_query($connection, "select * from package_master order by package_id desc") or die("error in query". mysqli_error($connection));

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <?php
   include './themepart/title.php';
   ?>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <?php
   include './themepart/header.php';
   ?>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>All Kind Of</h4>
              <h2>Packages</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
            <?php
               while ($row = mysqli_fetch_array($q)) {
                   
               
            ?>
          <div class="col-md-4">
            <div class="product-item">
                <a href="package-details.php"><img src="admin/upload/<?php echo $row['package_img']; ?>" Style="width: 100%; max-height:200px; " alt=""></a>
              <div class="down-content">
                <a href="package-details.php"><h4><?php echo $row['package_name']; ?></h4></a>

                <h6>Rs. <?php echo $row['package_from']; ?></h6>

                <p><?php echo substr($row['package_desc'], 0, 100)?></p>
                <a href=""><button type="button" class="btn btn-danger">View More</button></a> <br/><br/>
                <small>
                    <?php
                    if($row['package_available']==1)
                    {
                    ?>
                    <strong title="Available"><i class="fa fa-calendar"></i> Available</strong> <?php } else {?> 
                    <strong title="Available"><i class="fa fa-calendar"></i> Not Available</strong> <?php }?> &nbsp;&nbsp;&nbsp;&nbsp;
                    <strong title="Nights"><i class="fa fa-cube"></i> <?php echo $row['package_nights']; ?> Nights</strong> <br/>
                     <?php
                    if($row['flight_include']==1)
                    {
                    ?>
                     <strong title="Flight included"><i class="fa fa-plane"></i> Flight included</strong> <?php } else {?>
                    
                    <strong title="Flight included"><i class="fa fa-plane"></i> Flight Not included</strong> <?php } ?>
                </small>
              </div>
            </div>
          </div>
<?php
               }
?>
         

          <div class="col-md-12">
            <ul class="pages">
                <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

   <?php
   include './themepart/footer.php';
   ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
