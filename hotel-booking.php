<?php
session_start();
require './class/atclass.php';
if(!isset($_GET['hid']))
{
    header("location:hotel-details.php");
}
else
{
    $hid=$_GET["hid"];
}
if(isset($_POST['submit']))
{
    $work=$_POST['gender'];
    $title=$_POST['title'];
    $fname=$_POST['name'];
    $lname=$_POST['lname'];
    $dept=$_POST['dept'];
    $arri=$_POST['arri'];
    $cc=$_POST['cc'];
    $phn=$_POST['phn'];
    $email=$_POST['mail'];
    $infant=$_POST['infant'];
    $child=$_POST['child'];
    $adult=$_POST['adult'];
    
    $iq=mysqli_query($connection,"INSERT INTO `booking_details`(`book_for_work`, `book_title`, `book_fname`, `book_lname`, `departure_date`, `arrival_date`, `book_cc`, `book_num`, `book_mail`, `book_infant`, `book_child`, `book_adult`, `hotel_id`) VALUES ('{$work}','{$title}','{$fname}','{$lname}','{$dept}','{$arri}','{$cc}','{$phn}','{$email}','{$infant}','{$child}','{$adult}','{$hid}')") or die("eror".mysqli_error($connection));

    if($iq)
    {
        echo "<script>alert('inserted')</script>";
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
              
              <h2>Booking Process</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br/>
<!--Card-->
<div class="card shadow mb-5 bg-white rounded">
    <!--Card-Body-->
    <form method="post">
    <div class="card-body">
        <!--Card-Title-->
        <p class="card-title text-center shadow mb-5 rounded">Enter Your Details</p>
        
        <h5>Are You Travelling For Work?</h5>
        <!--First Row-->
        <div class="row mb-3 mt-3" style="text-align:center"> <label class="radiobtn"><input type="radio" name="gender" value="1"> Yes</label> 
        <label class="radiobtn"><input type="radio" name="gender" value="0"> No</label> </div>
        <!--Second Row-->
        <div class="row">
            <div class="col-sm-3"> <select class="browser-default custom-select mb-4" name="title" id="select">
                    <option value="" disabled="" selected="">Select Title</option>
                    <option value="1">Mr.</option>
                    <option value="2">Mrs.</option>
                    <option value="3">Miss.</option>
                </select> </div>
                
            <div class="col-sm-4"> <input placeholder=" First Name" type="text" id="name" name="name" class="form-control mb-4" style="font-family:Arial, FontAwesome">  </div>
            <div class="col-sm-4"> <input placeholder=" Last Name" type="text" id="lname" name="lname" class="form-control mb-4" style="font-family:Arial, FontAwesome">  </div>
        </div><br/>
        <!--Third Row-->
        <div class="row" >
            <div class="col-sm-6"><p style="font-weight:bold;">Departure Date</p> </div>
            <div class="col-sm-6"><p style="font-weight:bold">Arrival Date</p> </div>
        </div><br/>
        <div class="row">
            <div class="col-sm-4"> <input placeholder="Departing" type="date" name="dept" id="date-picker-example" class="form-control datepicker mb-4" style="font-family:Arial, FontAwesome" min="<?php echo(date('Y/m/d')) ?>"> </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4"> <input placeholder="Arriving" type="date" name="arri" id="date-picker-example" class="form-control datepicker" style="font-family:Arial, FontAwesome" min="<?php echo(date('Y/m/d')) ?>"> </div>
        </div>
        <!--Fourth Row-->
        <div class="row mt-4">
            <div class="col-sm-2"> <input placeholder=" CountryCode" type="text" name="cc" id="cc" class="form-control mb-4" style="font-family:Arial, FontAwesome">  </div>
            <div class="col-sm-4"> <input placeholder=" Mobile Number" type="text" id="num" name="phn" class="form-control mb-4" style="font-family:Arial, FontAwesome">  </div>
            <div class="col-sm-4"> <input placeholder=" Email" type="email" id="mail" name="mail" class="form-control mb-4" style="font-family:Arial, FontAwesome">  </div>
        
        </div><br/>
        <!--Fifth Row-->
        <div class="col-sm-6"><h4 style="font-weight:bold;">Pax Information</h4></div><br/>
        <div class="row">
        
            <div class="col-sm-4"><h7 style="font-weight:bold;">Infant(0-5)</h7> 
                 <select class="browser-default custom-select mb-4" name="infant" id="select">
                    <option value="">Select</option>
                    <option value="0" >0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select> </div>
                <div class="col-sm-4"><h6 style="font-weight:bold;">Child(5-15)</h6> 
                 <select class="browser-default custom-select mb-4" name="child" id="select">
                    <option value="" >Select</option>
                    <option value="0" >0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select> </div>
                <div class="col-sm-4"><h6 style="font-weight:bold;">Adult</h6> 
                 <select class="browser-default custom-select mb-4" name="adult" id="select">
                    <option value="">Select</option>
                    <option value="0" >0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select> </div>
        </div> 
    </div>
    <div class="col-sm-6">
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
