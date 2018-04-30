<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CT249</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>
      <body>
        <?php session_start(); ?>
        <?php include_once("config/connect.php"); ?>
        <?php
        if(isset($_POST['btnLogion']))
        {
          $loginusername = trim($_POST["txtloginUsername"]);
          $loginpassword = trim($_POST["txtloginPassword"]);
          $loginpassword = md5($loginpassword);
          $result = mysqli_query($conn,"SELECT PersonnelCode, PersonnelPass,  RoleId
            FROM Personnel
            WHERE PersonnelCode='{$loginusername}' AND PersonnelPass='{$loginpassword}'");
            // WHERE RoleId = 2 AND  PersonnelCode='{$loginusername}' AND PersonnelPass='{$loginpassword}'");
          if (mysqli_num_rows($result) == 1)
          {
            $_SESSION["Username"] = $loginusername;
            echo "<script>window.location.href='index.php'</script>";
          }
          else
          {
            echo '<script> alert("The username or password is incorrect");</script>';
          }
        }
        ?>
        <div class="page login-page">
          <div class="container">
            <div class="form-outer text-center d-flex align-items-center">
              <div class="form-inner">
                <div class="logo text-uppercase"><strong class="text-primary">Login to your dashboard</strong></div>
                <p class="hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                <form method="post" class="text-left form-validate">
                  <div class="form-group-material">
                    <input id="txtloginUsername" type="text" name="txtloginUsername" required data-msg="Please enter your username" class="input-material">
                    <label for="txtloginUsername" class="label-material">Username</label>
                  </div>
                  <div class="form-group-material">
                    <input id="txtloginPassword" type="password" name="txtloginPassword" required data-msg="Please enter your password" class="input-material">
                    <label for="txtloginPassword" class="label-material">Password</label>
                  </div>
                  <div class="form-group text-center">
                    <input type="submit" value="LOGIN" name="btnLogion" class="btn btn-outline-info btn-lg btn-block"/>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- JavaScript files-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper.js/umd/popper.min.js"> </script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
        <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Main File-->
        <script src="js/front.js"></script>
      </body>
      </html>
