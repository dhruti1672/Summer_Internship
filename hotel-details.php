<?php
    session_start();
    require './class/atclass.php';
    $hid=$_GET["hid"];
    
    if(!isset($_GET['hid']))
    {
        header("location:hotels.php");
    }
    if(isset($_POST['submit']))
    {
    
        $fname= mysqli_real_escape_string($connection,$_POST['fname']);
        $mail= mysqli_real_escape_string($connection,$_POST['mail']);
        $mess= mysqli_real_escape_string($connection,$_POST['mess']);

        $insertquery= mysqli_query($connection, "insert into contact_us(contact_name,contact_email,contact_mess) values('{$fname}','{$mail}','{$mess}')") or die("Error In Query".mysqli_error($connection));
          if($insertquery)
          {
              echo "<script>alert('Message Sent Successfully...')</script>";
          }
    }
    
    
    
    $q1=mysqli_query($connection, "select * from hotel_master where hotel_id='{$hid}'") or die("Error". mysqli_error($connection));
    
    $q2=mysqli_query($connection, "select * from img_master where hotel_id='{$hid}'") or die("Error". mysqli_error($connection));
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
                <h2>Hotel Details</h2>

              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div>
                <?php
                    $row= mysqli_fetch_array($q1);
                  ?>
                <img src="admin/upload/<?php echo $row['hotel_img']?>" alt="" class="img-fluid wc-image" style="width: 200%; height: 400px;">

            </div>
            <br>
      
          </div>

          <div class="col-md-6">
              <br/>
              <h3><?php echo $row['hotel_name']; ?></h3>
              <br/><br/>
               
               <p class="lead">
                  
                   <?php if($row['hotel_available']==1){ ?> 
                        <i class="fa fa-calendar"></i> Available &nbsp;&nbsp;
                  <?php } ?>
                   <?php if($row['hotel_available']==0){ ?>
                        <i class="fa fa-calendar"></i> Not Available &nbsp;&nbsp;
                   <?php } ?> 
                        <i class="fa fa-cube"></i> <?php echo $row['hotel_night']; ?> Night &nbsp;&nbsp; 
                    
                        <i class="fa fa-cube"></i>INR <?php echo $row['hotel_price']; ?> &nbsp;&nbsp; 
              </p>

              <br/><br/>
              <h6><i class="fa fa-map-marker"></i> <?php echo $row['hotel_address']; ?></a></h6>
              <br/><br/>
              <a href="<?php echo $row['hotel_add_url'] ?>" target="_blank"><button type="button" class="btn btn-danger" style="text-align:center">Show On Map</button></a> 
              <a href="hotel-booking.php?hid=<?php echo $row['hotel_id']; ?>"><button type="button" class="btn btn-danger" style="text-align:center">Book Now</button></a> <br/><br/>
               </div>
        </div>
      </div>
    </div>
    
     

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
               <h4>Hotel Images</h4><br/>
           
            <div class="row">
                
                   <?php
                          while ($row1 = mysqli_fetch_array($q2)) {
                              
                    ?>
              <div class="col-md-4">
                <div class="service-item">
                    <img src="admin/upload/<?php echo $row1['img_url']; ?>" alt="" class="img-fluid">
                </div>
              </div>
         
            <?php }?>
             
            </div>
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
