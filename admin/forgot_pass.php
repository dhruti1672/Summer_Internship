<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../class/atclass.php';
if($_POST)
{
    $email=$_POST['email'];
    
    $q= mysqli_query($connection,"select * from admin_master where admin_email='{$email}'") or die("error in query". mysqli_error($connection));
    $count = mysqli_num_rows($q);
    $row = mysqli_fetch_array($q);
    $otp= rand(100000,900000);
    $_SESSION['otp']=$otp;
    $_SESSION['pemail']=$email;
    if($count>0)
    {
             //Import PHPMailer classes into the global namespace
            //These must be at the top of your script, not inside a function
            
            //Load Composer's autoloader
            require '../vendor/autoload.php';

            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'hellytours@gmail.com';                     //SMTP username
                $mail->Password   = 'hetal_708';                               //SMTP password
                $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('helly_tours@gmail.com', 'Helly Tours');
                $mail->addAddress($email, $email);     //Add a recipient



                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Reset the Password ';
                $mail->Body    = "Hi, $email your <b>OTP IS $otp</b>";
                

                $mail->send();
                echo "<script>alert('OPT Has Been Send To Your Email');window.location='check-otp.php';</script>";
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
    }
 else {
        echo"</script> alert('Email Not Found);</script>";
    } 
 }

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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/ht-logo.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
                <h2>Reset Password</h2>
                <br/>
                 <h6 class="font-weight-light">Enter e-mail to reset password.</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="E-mail Id">
                </div>
                
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                      <button type="submit" name="submit" class="btn btn-primary mr-2" >Reset Password</button>
                  </div>
                  
                </div>
                
               
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
