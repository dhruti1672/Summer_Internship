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
          echo "<script>alert('Record Inserted Successfully...')</script>";
      }
}
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
    <div class="page-heading contact-heading header-text" style="background-image: url(assets/images/heading-4-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Location on Maps</h2>
            </div>
          </div>
          <div class="col-md-8">

            <div id="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.866073922945!2d72.5618660147045!3d23.028689084949995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84f9cf0730b5%3A0xf60d9248c96bba07!2sMithakhali%20Six%20Rd%2C%20Maharashtra%20Society%2C%20Ellisbridge%2C%20Ahmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1622003597503!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>About our office</h4>
              <p>Our Office is at central location in Ahmedabad. It is located near C.G. Road.<br><br>Mithakhali, Ahmedabad - 380006 </p>
              <ul class="social-icons">
                  <li><a href="https://www.facebook.com/hellytours/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://instagram.com/hellytours?igshid=z71c1b3anch0" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://api.whatsapp.com/message/HA363EF3MKPCD1" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                <li><a href="mailto:hellytours@gmail.com" target="_blank"><i class="fa fa-envelope-o"></i></a></li>
              </ul>
            </div>
          </div>
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
