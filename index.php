<?php
session_start();
require './class/atclass.php';

$q= mysqli_query($connection, "select * from package_master order by package_id desc limit 3") or die("error in query". mysqli_error($connection));
$q1= mysqli_query($connection, "select * from hotel_master order by hotel_id desc limit 3") or die("error in query". mysqli_error($connection));
$q2= mysqli_query($connection, "select * from blog_master order by blog_id desc limit 3") or die("error in query". mysqli_error($connection));
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
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            
            <h2>Unwind By The Sea...</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            
            <h2>Life's A Beach,Find ur Wave</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            
            <h2>Seas The Day!</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Top Packages</h2>
              <a href="packages.php">view more<i class="fa fa-angle-right"></i></a>
            </div>
          </div>
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
                    <strong title="Available"><i class="fa fa-calendar"></i> Available</strong> <?php } else{?> 
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
         
         </div>
      </div>
    </div>

   <div class="latest-products">
      <div class="container">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Top Hotels</h2>
              <a href="packages.php">view more<i class="fa fa-angle-right"></i></a>
            </div>
          </div>
         <div class="row">
            <?php
               while ($row = mysqli_fetch_array($q1)) {
                   
               
            ?>
          <div class="col-md-4">
            <div class="product-item">
                <a href="package-details.php"><img src="admin/upload/<?php echo $row['hotel_img']; ?>" Style="width: 100%; max-height:200px; " alt=""></a>
              <div class="down-content">
                <a href="package-details.php"><h4><?php echo $row['hotel_name']; ?></h4></a>

                <h6>Rs. <?php echo $row['hotel_price']; ?></h6>
                
                <p><?php echo $row['hotel_address']; ?></p>
                
                <small>
                    <strong title="Nights"><i class="fa fa-cube"></i> <?php echo $row['hotel_night']; ?> Nights</strong> <br/>
                </small>
              </div>
            </div>
          </div>
<?php
               }
?>
         
         </div>
      </div>
    </div>

    <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest blog posts</h2>

              <a href="blog.php">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
<?php
while ($row = mysqli_fetch_array($q2)) {


?>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
                <a href="<?php echo $row['blog_url'];?>" target="_blank" class="services-item-image"><img src="admin/upload/<?php echo $row['blog_img'];?>" style="width:100%; height: 200px;" class="img-fluid" alt=""></a>

              <div class="down-content">
                  <h4><a href="<?php echo $row['blog_url'];?>" target="_blank"><?php echo $row['blog_name'];?></a></h4>
               
              </div>
            </div>
          </div>
<?php } ?>     
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