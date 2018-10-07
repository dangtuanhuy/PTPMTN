<?php
session_start();
if(!isset($_SESSION['Username'])):
	echo '<meta http-equiv="refresh" content="0; URL=login.php"/>';
else:

function PersonnelLogin($conn, $PersonnelCode) {
  $sql_query_Personnel = "SELECT PersonnelName FROM `Personnel` WHERE `PersonnelCode` = '{$PersonnelCode}'";
  $sql_result_Personnel = mysqli_query($conn,$sql_query_Personnel)  or die(mysql_error());
  while ($row = $sql_result_Personnel->fetch_assoc()) {
    echo $row['PersonnelName'];
}
}
?>
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

  <?php
  include_once('config/connect.php');
	$_user = $_SESSION['Username'];
	$sql_query_role = "SELECT RoleDetail FROM `Role` JOIN `Personnel` ON Role.RoleId = Personnel.RoleId WHERE Personnel.PersonnelCode = '{$_user}'";
	$result_role = mysqli_query($conn,$sql_query_role);
	$row_role_details = mysqli_fetch_array($result_role);
	$role_details_arr = explode(',',$row_role_details[0]);
  ?>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="img/logo.png" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">Management School </h2>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">
						<?php if(in_array('home', $role_details_arr)) echo '<li><a href="index.php"> <i class="icon-home"></i>Home</a></li>'; ?>
						<?php if(in_array('grade', $role_details_arr)) echo '<li><a href="?page=grade"> <i class="fa fa-clipboard"></i>Grade</a></li>'; ?>
						<?php if(in_array('schoolyears', $role_details_arr)) echo '<li><a href="?page=SchoolYears"> <i class="fa fa-calendar"></i>School Years</a></li>'; ?>
						<?php if(in_array('class', $role_details_arr)) echo '<li><a href="?page=Class"> <i class="	fa fa-briefcase"></i>Class</a></li>'; ?>
						<?php if(in_array('student', $role_details_arr)) echo '<li><a href="?page=Student"> <i class="fa fa-child"></i>Student</a></li>'; ?>
						<?php if(in_array('department', $role_details_arr)) echo '<li><a href="?page=Department"> <i class="fa fa-fort-awesome"></i>Department</a></li>'; ?>
						<?php if(in_array('position', $role_details_arr)) echo '<li><a href="?page=Position"> <i class="fa fa-institution"></i>Position</a></li>'; ?>
						<?php if(in_array('personnel', $role_details_arr)) echo '<li><a href="?page=Personnel"> <i class="fa fa-group"></i>Personnel</a></li>'; ?>
						<?php if(in_array('role', $role_details_arr)) echo '<li><a href="?page=Role"> <i class="fa fa-cogs"></i>Role</a></li>'; ?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="index.php" class="menu-btn"><i class="icon-bars"> </i></a><a href="#" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span><h1>CT249</h1> </span><strong class="text-primary"> Dashboard</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <li class="nav-item dropdown">
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <!-- Messages dropdown-->
                <li class="nav-item dropdown">
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                  </ul>
                </li>
                <!-- Languages dropdown    -->
                <?php
                if (isset($_SESSION['Username']) && $_SESSION['Username'] != "")
                {
                ?>
                <li class="nav-item "><a id="languages" rel="nofollow"  href="?page=UpdatePersonnel"  aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><span class="d-none d-sm-inline-block">Update</span></a>
                <?php }?>
                </li>
                <!-- Log out-->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block"><?php if(isset($_SESSION["Username"])){PersonnelLogin($conn, $_SESSION["Username"]); echo "  <i class='fa fa-power-off text-danger'></i>"; }?></span></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->

<?php
if(isset($_GET['page']))
{
  $page = $_GET['page'];
  if($page=="grade")
  {
    include_once("resource/grade/Grade.php");
  }
  if($page=="addGrade")
  {
    include_once("resource/grade/AddGrade.php");
  }
  if($page=="updateGrade")
  {
    include_once("resource/grade/UpdateGrade.php");
  }
  //School Years
  if($page=="SchoolYears")
  {
    include_once("resource/schoolyears/SchoolYears.php");
  }
  if($page=="AddSchoolYears")
  {
    include_once("resource/schoolyears/AddSchoolYears.php");
  }
  if($page=="UpdateSchoolYears")
  {
    include_once("resource/schoolyears/UpdateSchoolYears.php");
  }
  //Class
  if($page=="Class")
  {
    include_once("resource/class/Class.php");
  }
  if($page=="AddClass")
  {
    include_once("resource/class/AddClass.php");
  }
  if($page=="UpdateClass")
  {
    include_once("resource/class/UpdateClass.php");
  }
  if(isset($_GET['page'])&& $_GET['page']=="ActiveClass"){

    if($_GET['ClassStatus'] == 0){
      $active = 1;
    }
    else{
      $active = 0;
    }
    $updateStatus = "UPDATE `Class` SET `ClassStatus`=".$active." where `ClassId` = '".$_GET['ClassId']."'";
    mysqli_query($conn,$updateStatus);
    echo "<script>window.location.href='?page=Class'</script>";
  }
  //School Years_Class
  if($page=="Years_Class")
  {
    include_once("resource/schoolyears/Years_Class.php");
  }
  if($page=="AddYears_Class")
  {
    include_once("resource/schoolyears/AddYears_Class.php");
  }
  if($page=="UpdateYears_Class")
  {
    include_once("resource/schoolyears/UpdateYears_Class.php");
  }
  //Department
  if($page=="Department")
  {
    include_once("resource/department/Department.php");
  }
  if($page=="AddDepartment")
  {
    include_once("resource/department/AddDepartment.php");
  }
  if($page=="UpdateDepartment")
  {
    include_once("resource/department/UpdateDepartment.php");
  }
  //Position
  if($page=="Position")
  {
    include_once("resource/position/Position.php");
  }
  if($page=="AddPosition")
  {
    include_once("resource/position/AddPosition.php");
  }
  if($page=="UpdatePosition")
  {
    include_once("resource/position/UpdatePosition.php");
  }
  //Role
  if($page=="Role")
  {
    include_once("resource/role/Role.php");
  }
  if($page=="AddRole")
  {
    include_once("resource/role/AddRole.php");
  }
  if($page=="UpdateRole")
  {
    include_once("resource/role/UpdateRole.php");
  }
  // Import Export
  if($page=="ie")
  {
    include_once("resource/immigration/ImmigrationController.php");
  }
  //Student
  if($page=="Student")
  {
    include_once("resource/student/Student.php");
  }
  if($page=="AddStudent")
  {
    include_once("resource/student/AddStudent.php");
  }
  if($page=="UpdateStudent")
  {
    include_once("resource/student/UpdateStudent.php");
  }
	if($page=="UpdateStudentClass")
  {
    include_once("resource/student/UpdateClass.php");
  }
  if(isset($_GET['page'])&& $_GET['page']=="ActiveStudent"){

    if($_GET['StudentStatus'] == 0){
      $active = 1;
    }
    else{
      $active = 0;
    }
    $updateStatus = "UPDATE `Student` SET `StudentStatus`=".$active." where `StudentCode` = '".$_GET['StudentCode']."'";
    mysqli_query($conn,$updateStatus);
    echo "<script>window.location.href='?page=Student'</script>";
  }
  //Personnel
  if($page=="Personnel")
  {
    include_once("resource/personnel/Personnel.php");
  }
  if($page=="AddPersonnel")
  {
    include_once("resource/personnel/AddPersonnel.php");
  }
  if($page=="UpdatePersonnel")
  {
    include_once("resource/personnel/UpdatePersonnel.php");
  }

  if($page=="DeleteImgPersonnel"){
     include_once("resource/personnel/DeleteImgPersonnel.php");
  }
  if(isset($_GET['page'])&& $_GET['page']=="ActiveNote"){

    if($_GET['PersonnelNote'] == 0){
      $active = 1;
    }
    else{
      $active = 0;
    }
    $updateStatus = "UPDATE `Personnel` SET `PersonnelNote`=".$active." where `PersonnelCode` = '".$_GET['PersonnelCode']."'";
    mysqli_query($conn,$updateStatus);
    echo "<script>window.location.href='?page=Personnel'</script>";
  }
  if(isset($_GET['page'])&& $_GET['page']=="ActivePersonnel"){

    if($_GET['PersonnelActive'] == 0){
      $active = 1;
    }
    else{
      $active = 0;
    }
    $updateStatus = "UPDATE `Personnel` SET `PersonnelActive`=".$active." where `PersonnelCode` = '".$_GET['PersonnelCode']."'";
    mysqli_query($conn,$updateStatus);
    echo "<script>window.location.href='?page=Personnel'</script>";
  }
  if(isset($_GET['page'])&& $_GET['page']=="OpenClose"){

    if($_GET['PersonnelStatus'] == 0){
      $active = 1;
    }
    else{
      $active = 0;
    }
    $updateStatus = "UPDATE `Personnel` SET `PersonnelStatus`=".$active." where `PersonnelCode` = '".$_GET['PersonnelCode']."'";
    mysqli_query($conn,$updateStatus);
    echo "<script>window.location.href='?page=Personnel'</script>";
  }
  if($page=="imgs")
  {
    include_once("resource/personnel/ImgPersonnel.php");
  }
  //Personal_class
  if($page=="Personel_Class")
  {
		include_once("resource/personnel/Personel_Class.php");
  }
  if($page=="AddPersonel_Class")
  {
    include_once("resource/personnel/AddPersonel_Class.php");
  }
  if($page=="UpdatePersonel_Class")
  {
    include_once("resource/personnel/UpdatePersonel_Class.php");
  }
}
else
include_once('body.php')
?>
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>CT249 Team 3 &copy; 2017-2018</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="Index.php" class="external">Team 3</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
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
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
                            <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script language="javascript">
                              $(document).ready(function() {
                                var table = $('#myTable').DataTable( {
                                  responsive: true,
                                  "language": {
                                    // "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang",
                                    // "info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu",
                                    // "infoEmpty": "Dữ liệu rỗng",
                                    // "emptyTable": "Chưa có dữ liệu nào",
                                    // "processing": "Đang xử lý...",
                                    // "search": "Tìm kiếm:",
                                    "infoEmpty": "Empty data",
                                    "emptyTable": "Data not available",
                                    "processing": "Processing...",
                                    "search": "Search:",
                                    "loadingRecords": "Loading data...",
                                    "zeroRecords": "Data not found",
                                    // "loadingRecords": "Đang load dữ liệu...",
                                    // "zeroRecords": "không tìm thấy dữ liệu",
                                    // "infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
                                    "paginate": {
                                      "first": "|<",
                                      "last": ">|",
                                      "next": ">>",
                                      "previous": "<<"
                                    }
                                  },
                                  "lengthMenu": [[10, 15, 20, 25, 30, -1], [10, 15, 20, 25, 30, "All"]]
                                } );
        //new $.fn.dataTable.FixedHeader( table );
      } );
    </script>
    <script language="javascript">
                              $(document).ready(function() {
                                var table = $('#myTable1').DataTable( {
                                  responsive: true,
                                  "language": {
                                    // "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang",
                                    // "info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu",
                                    // "infoEmpty": "Dữ liệu rỗng",
                                    // "emptyTable": "Chưa có dữ liệu nào",
                                    // "processing": "Đang xử lý...",
                                    // "search": "Tìm kiếm:",
                                    "infoEmpty": "Empty data",
                                    "emptyTable": "Data not available",
                                    "processing": "Processing...",
                                    "search": "Search:",
                                    "loadingRecords": "Loading data...",
                                    "zeroRecords": "Data not found",
                                    // "loadingRecords": "Đang load dữ liệu...",
                                    // "zeroRecords": "không tìm thấy dữ liệu",
                                    // "infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
                                    "paginate": {
                                      "first": "|<",
                                      "last": ">|",
                                      "next": ">>",
                                      "previous": "<<"
                                    }
                                  },
                                  "lengthMenu": [[10, 15, 20, 25, 30, -1], [10, 15, 20, 25, 30, "All"]]
                                } );
        //new $.fn.dataTable.FixedHeader( table );
      } );
    </script>
    <script type="text/javascript" src="library/Ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace('ckeditor');
    </script>
  </body>
</html>
<?php
endif;
?>
