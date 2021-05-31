<?php
    session_start();
    require './class/atclass.php';
    $eid=$_GET["eid"];
    
    if(!isset($_GET['eid']))
    {
        header("location:packages.php");
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
    
    
    $q= mysqli_query($connection, "select * from package_master where package_id='{$eid}'") or die("Error". mysqli_error($connection));
    $q1=mysqli_query($connection, "select * from hotel_master where package_id='{$eid}'") or die("Error". mysqli_error($connection));
    
    $q2=mysqli_query($connection, "select * from img_master") or die("Error". mysqli_error($connection));
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
                <h2>Package Details</h2>

              <h4>Various Available Hotels</h4>
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
                    $row= mysqli_fetch_array($q);
                  ?>
                <img src="admin/upload/<?php echo $row['package_img']?>" alt="" class="img-fluid wc-image" style="width: 200%; height: 500px;">
               
            </div>
            <br>
<!--            <div class="row">
              <div class="col-sm-4 col-6">
                <div>
                  <img src="assets/images/product-1-370x270.jpg" alt="" class="img-fluid">
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-6">
                <div>
                  <img src="assets/images/product-2-370x270.jpg" alt="" class="img-fluid">
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-6">
                <div>
                  <img src="assets/images/product-3-370x270.jpg" alt="" class="img-fluid">
                </div>
                <br>
              </div>
            </div>-->
          </div>

          <div class="col-md-6">
              
              <h3><i class="fa fa-map-marker"></i> <?php echo $row['package_name']; ?></h3>
               <br/>
               
               <p class="lead">
                  
                   <?php if($row['package_available']==1){ ?> 
                        <i class="fa fa-calendar"></i> Available &nbsp;&nbsp;
                  <?php } ?>
                   <?php if($row['package_available']==0){ ?>
                        <i class="fa fa-calendar"></i> Not Available &nbsp;&nbsp;
                   <?php } ?> 
                        <i class="fa fa-cube"></i> <?php echo $row['package_nights']; ?> &nbsp;&nbsp; 
                   <?php if($row['flight_include']==1){ ?>
                        <i class="fa fa-calendar"></i> Flight Included &nbsp;&nbsp;
                   <?php } ?>
                   <?php if($row['flight_include']==0){ ?> 
                        <i class="fa fa-calendar"></i> Flight Not Included &nbsp;&nbsp;
                   <?php } ?> 
              </p>

              <br>

              <p><?php
                    
                    echo $row['package_desc'];
                  ?>
              </p>   

              
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="section-heading" style="border: 0">
          <h2>Available Hotel's</h2>
        </div>

        <div class="table-responsive">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
               <thead>
                    <tr>
                         <th>Name</th>
                         <th>Address</th>
                         <th>Nights</th>
                         <th>Price</th>
                    </tr>
               </thead>
               
               <tbody>
                    <?php
                          while ($row1 = mysqli_fetch_array($q1)) {
                              
                              
                  ?>
                      
                    <tr>
                         <td><?php echo $row1['hotel_name']; ?></td>
                         <td><?php echo $row1['hotel_address']; ?></td>
                         <td><?php echo $row1['hotel_night']; ?> Nights</td>
                         <td>INR <?php echo $row1['hotel_price'];  ?></td>
                    </tr>
                          <?php } ?>
               </tbody>
          </table>
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
