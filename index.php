<?php
session_start();
require './class/atclass.php';

if(isset($_POST['submit']))
{
    
    $fname= mysqli_real_escape_string($connection,$_POST['fname']);
    $mail= mysqli_real_escape_string($connection,$_POST['mail']);
    $mess= mysqli_real_escape_string($connection,$_POST['mess']);
    
    $insertquery= mysqli_query($connection, "insert into contact_us(contact_name,contact_email,contact_mess) values('{$fname}','{$mail}','{$mess}')") or die("Error In Query".mysqli_error($connection));
      if($insertquery)
      {
          echo "<script>alert('Message sent Successfully...')</script>";
      }
}


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
                <a href="package-details.php?eid=<?php echo $row['package_id']; ?>"><img src="admin/upload/<?php echo $row['package_img']; ?>" Style="width: 100%; max-height:200px; " alt=""></a>
              <div class="down-content">
                <a href="package-details.php?eid=<?php echo $row['package_id']; ?>"><h4><?php echo $row['package_name']; ?></h4></a>

                <h6>Rs. <?php echo $row['package_from']; ?></h6>

                <p><?php echo substr($row['package_desc'], 0, 100)?></p>
                <a href="package-details.php?eid=<?php echo $row['package_id']; ?>"><button type="button" class="btn btn-danger">View More</button></a> <br/><br/>
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
              <a href="hotels.php">view more<i class="fa fa-angle-right"></i></a>
            </div>
          </div>
         <div class="row">
            <?php
               while ($row = mysqli_fetch_array($q1)) {
                   
               
            ?>
          <div class="col-md-4">
            <div class="product-item">
                <a href="hotel-details.php?eid=<?php echo $row['hotel_id']; ?>"><img src="admin/upload/<?php echo $row['hotel_img']; ?>" Style="width: 100%; max-height:200px; " alt=""></a>
              <div class="down-content">
                <a href="hotel-details.php?eid=<?php echo $row['hotel_id']; ?>"><h4><?php echo $row['hotel_name']; ?></h4></a>

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
<div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Send us a Message</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                        <input type="text" class="form-control" id="name" name="fname" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                        <input type="text" class="form-control" id="email" name="mail" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  
                  <div class="col-lg-12">
                    <fieldset>
                        <textarea  rows="6" class="form-control" id="message" name="mess" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                        <button type="submit" id="form-submit" class="filled-button" name="submit">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
<!--          <div class="col-md-4">
            <img src="assets/images/team_01.jpg" class="img-fluid" alt="">

            <h5 class="text-center" style="margin-top: 15px;">John Doe</h5>
          </div>-->
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