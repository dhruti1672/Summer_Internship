<?php

session_start();
include '../class/atclass.php';
if(!isset($_SESSION['otp']))
{
    header("location:forgot_pass");
}
if($_POST)
{
    $np= mysqli_real_escape_string($connection,$_POST['np']);
    $cp= mysqli_real_escape_string($connection,$_POST['cp']);
    if($np==$cp)
    {
         $update = mysqli_query($connection, "update admin_master set admin_pass='{$np}' where admin_email='{$_SESSION['pemail']}'") or die(mysqli_error($connection));
                if ($update) 
                {
                    echo "<script>alert('password updated successfully');window.location='login.php'</script>";
                }
    }
    else 
        {
            echo "<script>alert('New Password and Confirm Password did not match ..');</script>";
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
              
                <h2>Enter New password</h2>
             
              <form class="pt-3" method="post">
                <div class="form-group">
                    <input type="password" name="np" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="New Password">
                </div>
                <div class="form-group">
                    <input type="password" name="cp" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="confirm Password">
                </div>
                
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                      <button type="submit" name="submit" class="btn btn-primary mr-2" >Reset Password</button>
                      <button type="submit" name="cancel" class="btn btn-primary mr-2" onclick="index.php">Cancel</button>
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
