<?php
 session_start();
 require '../class/atclass.php';
 if(!isset($_SESSION['email']))
{
    header("location:login.php");
}
//   will not display warning message on browser
error_reporting(0);       

if(isset($_POST['submit']))
 {
     $hid= mysqli_real_escape_string($connection,$_POST['hname']);
     $f=$_FILES['img'];
            
            for($i=0;$i<= count($_FILES['img']['name']);$i++)
           {
                
                $des="upload/".$_FILES['img']['name'][$i] ;
                
                if(!file_exists($des))
                {      
                    if($f['type'][$i]=="image/jpeg" || $f['type'][$i]=="image/png" || $f['type'][$i]=="image/jpg")
                    {
                        $f1 = $_FILES['img']['name'][$i];
                    $tmp=$_FILES['img']['tmp_name'][$i];
                    
                     $file=move_uploaded_file($tmp,$des);
                     $insertquery= mysqli_query($connection, "INSERT INTO `img_master`(`hotel_id`, `img_url`) VALUES ('{$hid}','{$f1}')") or die("Error In Query" . mysqli_error($connection));
                    }
                    else {
                            echo "<script>alert('only jpeg and png image is allowed');window.location='add_image.php';</script>";
                         }
                }
                else {
                        echo "<script>alert('image already exist. Please change image name');window.location='add_image.php'</script>";
                     }
           
          
                if ($insertquery) {


              echo "<script>alert('Image Added Successfully.');window.location='add_image.php';</script>";


                }  
        }
         
    }
  $q= mysqli_query($connection, "select * from hotel_master") or die("error". mysqli_error($connection));
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
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/ht-logo.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
      include './themepart/navbar.php';
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php
          include './themepart/sidebar.php';
      ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
           
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Add Image</h3>
                  <br/>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="exampleSelectGender">Select Hotel</label>
                      <select class="form-control" name="hname" id="exampleSelectGender">
                          <?php while ($row = mysqli_fetch_array($q)) {
                                
                            ?>
                          <option value="<?php echo $row['hotel_id']?>"><?php echo $row['hotel_name']?></option>
                          <?php } ?>
                        </select>
                      </div>
                    <div class="form-group">
                      <label>upload Image</label>
                     
                      <div class="input-group col-xs-12">
                          <input type="file" name="img[]" class="form-control" multiple>
                        
                      </div>
                    </div>
                    
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
              include './themepart/footer.php';
        ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
