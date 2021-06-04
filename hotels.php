<?php
session_start();
require './class/atclass.php';

$q= mysqli_query($connection, "select * from hotel_master order by hotel_id desc") or die("error in query". mysqli_error($connection));

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
              <h2>Hotel's</h2>
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
                <a href="hotel-details.php"><img src="admin/upload/<?php echo $row['hotel_img']; ?>" Style="width: 100%; max-height:200px; " alt=""></a>
              <div class="down-content">
                <a href="hotel-details.php?hid=<?php echo $row['hotel_id']; ?>"><h4><?php echo $row['hotel_name']; ?></h4></a>

                <h6>Rs. <?php echo $row['hotel_price']; ?></h6>

                <p><?php echo substr($row['hotel_address'], 0, 100)?></p>
                <a href="hotel-details.php?hid=<?php echo $row['hotel_id']; ?>"><button type="button" class="btn btn-danger">View More</button></a> <br/><br/>
                <small>
                    <?php
                    if($row['hotel_available']==1)
                    {
                    ?>
                    <strong title="Available"><i class="fa fa-calendar"></i> Available</strong> <?php } else {?> 
                    <strong title="Available"><i class="fa fa-calendar"></i> Not Available</strong> <?php }?> &nbsp;&nbsp;&nbsp;&nbsp;
                    <strong title="Nights"><i class="fa fa-cube"></i> <?php echo $row['hotel_night']; ?> Nights</strong> <br/>
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

   


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
