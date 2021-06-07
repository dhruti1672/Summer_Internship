<?php
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_2ac4574a1de363f3cf168ff5454",
                  "X-Auth-Token:test_223a5d327b86f8f324f264c3a70"));
require './class/atclass.php';
if(!isset($_SESSION['hid']))
{
    header("location:hotel-booking.php");
}
$sq= mysqli_query($connection, "select * from hotel_master where hotel_id='{$_SESSION['hid']}'") or die("error". mysqli_error($connection));
$row= mysqli_fetch_array($sq);
$q= mysqli_query($connection, "select * from booking_details where book_id='{$_SESSION['book_id']}'") or die("error". mysqli_error($connection));
$row1= mysqli_fetch_array($q);
$_SESSION['hotel_name']=$row['hotel_name'];
if(isset($_POST['submit']))
{

    $payload = Array(
        'purpose' => $row['hotel_name'],
        'amount' => $_SESSION['totatp'],
        'phone' => $row1['book_num'],
        'buyer_name' => $row1['book_fname']." ".$row1['book_lname'],
        'redirect_url' => 'http://localhost/ht_website/redirect.php',
        'send_email' => true,
        'send_sms' => true,
        'email' => $row1['book_mail'],
        'allow_repeated_payments' => false
    );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch); 
    $response= json_decode($response);

    header('location:'.$response->payment_request->longurl);
    die();


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    include './themepart/title.php';
    ?>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style1.css">
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

<div class="page-heading contact-heading header-text" style="background-image: url(assets/images/heading-4-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              
              <h2>Payment Process</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br/>
<!--Card-->
<div class="card shadow mb-5 bg-white rounded" style="align-content: center;">
    <!--Card-Body-->
    <form method="post">
    <div class="card-body">
        <!--Card-Title-->
        <p class="card-title text-center shadow mb-5 rounded">Payment Details</p>
       
        
        <div class="row text-center">
            <div class="col-sm-12"><h4>Hotel Name</h4>  </div>
        </div><br/>
        <div class="row text-center">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"> <input type="text" id="hname" name="hname" class="form-control text-center mb-4" value="<?php echo $row['hotel_name']; ?>" readonly="true">  </div>
        </div><br/>
        <div class="row text-center">
            <h5 class="col-sm-6">Check-In</h5>
            <h5 class="col-sm-6">Check-Out</h5>
            
        </div>
        <div class="row text-center">
            <h6 class="col-sm-6"><?php echo $row1['departure_date']; ?></h6>
             <h6 class="col-sm-6"><?php echo $row1['arrival_date']; ?></h6>
            
        </div>
        <div class="row text-center">
            <label class="col-sm-6">12:00 AM</label>
             <label class="col-sm-6">10:00 AM</label>
            
        </div><hr><br/>
        
        <!--Third Row-->
        <div class="row text-center">
            <div class="col-sm-12"><h4>Payment Summary</h4>  </div>
        </div><br/><br/>
        <div class="row text-center">
            <div class="col-sm-6"><h6>Your group</h6></div>
        
            <div class="col-sm-6"> <label><?php echo $row1['book_adult']; ?> adults, <?php echo $row1['book_child']; ?> children, and <?php echo $row1['book_infant']; ?> infant </label>  </div>
          
        </div><br/>
        <div class="row text-center">
            <h6 class="col-sm-6">Total Price</h6>
        
            <div class="col-sm-6"> <label><?php echo "INR ".$_SESSION['totatp'] ;?></label>  </div>
          
        
            
        </div>
        
    </div>
    <div class="col-sm-7">
    <input type="submit" class="btn btn-primary float-right mt-5" value="continue" name="submit">
</div>
</form>
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
