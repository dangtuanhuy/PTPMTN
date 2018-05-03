<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-picture"></i></div>
          <div class="name"><strong class="text-uppercase">CLASSROOM</strong><span>IS USING</span>
            <?php
            $result = mysqli_query($conn," SELECT `ClassId`, `ClassName`, `Enrollment`, `ClassStatus`, `GradeId` FROM `Class` WHERE `ClassStatus`=1");
            $num_rows = mysqli_num_rows($result);
            ?>

            <div class="count-number"><?=$num_rows?></div>
          </div>
        </div>
      </div>
      <!-- Count item widget-->
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-padnote"></i></div>
          <div class="name"><strong class="text-uppercase">PERSONNEL</strong><span>TOTAL</span>
            <?php
            $result1=mysqli_query($conn,"SELECT * FROM `Personnel` ");
            $num_rows1 = mysqli_num_rows($result1);
            ?>
            <div class="count-number"><?=$num_rows1?></div>
          </div>
        </div>
      </div>
      <!-- Count item widget-->
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-user"></i></div>
          <div class="name"><strong class="text-uppercase">STUDENT</strong><span>IS LEARNING</span>
            <?php
            $result2 = mysqli_query($conn," SELECT * FROM `Student` WHERE `StudentStatus`=1");
            $num_rows2 = mysqli_num_rows($result2);
            ?>
            <div class="count-number"><?=$num_rows2?></div>
          </div>
        </div>
      </div>
      <!-- Count item widget-->
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-bill"></i></div>
          <div class="name"><strong class="text-uppercase">ROOM</strong><span>TOTAL</span>
            <?php
            $result3 = mysqli_query($conn,"SELECT * FROM `Class`");
            $num_rows3 = mysqli_num_rows($result3)
            ?>
            <div class="count-number"><?=$num_rows3?></div>
          </div>
        </div>
      </div>
      <!-- Count item widget-->
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-list"></i></div>
          <div class="name"><strong class="text-uppercase">POSITION</strong><span>TOTAL</span>
            <?php
            $result4 = mysqli_query($conn,"SELECT `PositionId`, `PositionName`, `PositionDetails`, `DepartmentId` FROM `Position`");
            $num_rows4 = mysqli_num_rows($result4)
            ?>
            <div class="count-number"><?=$num_rows4?></div>
          </div>
        </div>
      </div>
      <!-- Count item widget-->
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-list-1"></i></div>
          <div class="name"><strong class="text-uppercase">DEPARTMENT</strong><span>TOTAL</span>
            <?php
            $result5 = mysqli_query($conn,"SELECT `DepartmentId`, `DepartmentName`, `DepartmentDetails` FROM `Department` ");
            $num_rows5 = mysqli_num_rows($result5)
            ?>
            <div class="count-number"><?=$num_rows5?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr/>
  <!-- Statistics Section-->
  <section class="statistics">
    <div class="container">
      <h3 class="text-center">INFORMATION PERSONNAL</h3>
      <table class="table-striped table-responsive table-bordered" id="myTable">

       <thead>
        <tr>
         <th ><strong>No</strong></th>
         <th class="col-md-1"><strong>Persannel Code</strong></th>
         <th class="col-md-1"><strong>Persannel Name</strong></th>
         <th class="col-md-1"><strong>Birthday</strong></th>
         <th class="col-md-1"><strong>Gender</strong></th>
         <th class="col-md-1"><strong>Address</strong></th>
         <th class="col-md-1"><strong>Phone</strong></th>
         <th class="col-md-1"><strong>Email</strong></th>
         <th class="col-md-1"><strong>Department</strong></th>
         <th class="col-md-1"><strong>Position</strong></th>

       </tr>
     </thead>
     <tbody>
      <?php
      $num=1;
      $result = mysqli_query($conn,"SELECT
        `PersonnelCode`,`PersonnelName`,`PersonnelBirth`,
        `PersonnelGender`,`PersonnelAddress`,`PersonnelNum`,`PersonnelEmail`,`DepartmentName`, `PositionName`
        FROM `Personnel` p
        JOIN `Position` ON `Position`.PositionId = p.`PositionId`
        JOIN `Department` ON `Department`.DepartmentId = `Position`.`PositionId`");
      while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
       ?>
       <tr>
        <td><?php echo $num ?></td>
        <td><?php echo $row["PersonnelCode"] ?></td>
        <td><?php echo $row["PersonnelName"] ?></td>
        <td><?php echo $row["PersonnelBirth"] ?></td>
        <td><?php echo $row["PersonnelGender"] == 0 ?"Boy" : "Girl" ?></td>
        <td><?php echo $row["PersonnelAddress"] ?></td>
        <td><?php echo $row["PersonnelNum"] ?></td>
        <td><?php echo $row["PersonnelEmail"] ?></td>
        <td><?php echo $row["DepartmentName"] ?></td>
        <td><?php echo $row["PositionName"] ?></td>

      </tr>
      <?php
      $num++;
    }
    ?>
  </tbody>
</table>
</div>

</section>

<section class="statistics">
  <div class="container">
    <h3 class="text-center">INFORMATION STUDENT</h3>
    <table class="table-striped table-responsive table-bordered" id="myTable1">

     <thead>
      <tr>
       <th ><strong>No</strong></th>
       <th class="col-md-1"><strong>Student Code</strong></th>
       <th class="col-md-1"><strong>Student Name</strong></th>
       <th class="col-md-1"><strong>Birthday</strong></th>
       <th class="col-md-1"><strong>Address</strong></th>
       <th class="col-md-1"><strong>Gender</strong></th>
       <th class="col-md-1"><strong>Class Name</strong></th>
       <th class="col-md-1"><strong>Grade Name</strong></th>

     </tr>
   </thead>
   <tbody>
    <?php
    $num1=1;
    $result = mysqli_query($conn,"SELECT `StudentCode`,`StudentName`,`StudentBirth`,`StudentGender`,`StudentAddress`, `ClassName`, GradeName
      FROM `Student` st
      JOIN `Class`  ON Class.`ClassId` = st.`ClassId`
      JOIN Grade ON Grade.GradeId = Class.ClassId");
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
     ?>
     <tr>
      <td><?php echo $num1 ?></td>
      <td><?php echo $row["StudentCode"] ?></td>
      <td><?php echo $row["StudentName"] ?></td>
      <td><?php echo $row["StudentBirth"] ?></td>
      <td><?php echo $row["StudentAddress"] ?></td>
      <td><?php echo $row["StudentGender"] ==1 ?"Boy" : "Girl" ?></td>
      <td><?php echo $row["ClassName"] ?></td>
      <td><?php echo $row["GradeName"] ?></td>

    </tr>
    <?php
    $num1 ++;
  }
  ?>
</tbody>
</table>
</div>

</section>
<!-- Updates Section -->
<section class="mt-30px mb-30px">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-12">
        <!-- Recent Updates Widget          -->
        <div id="daily-feeds" class="card updates daily-feeds">
          <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#tda-box" aria-expanded="true" aria-controls="tda-box">Team CDM/Usecase</a></h2>
            <div class="right-column">
              <div class="badge badge-primary">5 members</div><a data-toggle="collapse" data-parent="#daily-feeds" href="#tda-box" aria-expanded="true" aria-controls="tda-box"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
          <div id="tda-box" role="tabpanel" class="collapse show">
            <div class="feed-box">
              <ul class="feed-elements list-unstyled">
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/2.png" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Pham Hoai An</strong><small>Project Manager </small>
                        <div class="full-date"><small>CDM</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-5.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Vo Thi Thanh Quy</strong><small>Analyst </small>
                        <div class="full-date"><small>Use-case model</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Nguyen Van Loc</strong><small>Analyst </small>
                        <div class="full-date"><small>CDM - Use-case</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Ly Truong Giang</strong><small>Analyst </small>
                        <div class="full-date"><small>Use-case Model</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-5.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Nguyen Thi Minh Tuyet</strong><small>Analyst </small>
                        <div class="full-date"><small>CDM</small></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Recent Updates Widget End-->
      </div>
      <div class="col-lg-4 col-md-6">
        <!-- Daily Feed Widget-->
        <div id="daily-feeds" class="card updates daily-feeds">
          <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#td-box" aria-expanded="true" aria-controls="td-box">Team Web App</a></h2>
            <div class="right-column">
              <div class="badge badge-primary">3 members</div><a data-toggle="collapse" data-parent="#daily-feeds" href="#td-box" aria-expanded="true" aria-controls="td-box"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
          <div id="td-box" role="tabpanel" class="collapse show">
            <div class="feed-box">
              <ul class="feed-elements list-unstyled">
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Le Nguyen Thuc</strong><small>Web App Developer  </small>
                        <div class="full-date"><small>Web App</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Dang Tuan Huy</strong><small>Web App Developer </small>
                        <div class="full-date"><small>Web App</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-3.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Nguyen Thi Cam Tuyen</strong><small>Web App Developer </small>
                        <div class="full-date"><small>Web App</small></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Daily Feed Widget End-->
      </div>
      <div class="col-lg-4 col-md-6">
        <!-- Daily Feed Widget-->
        <div id="daily-feeds" class="card updates daily-feeds">
          <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#dfd-box" aria-expanded="true" aria-controls="dfd-box">Team DFD</a></h2>
            <div class="right-column">
              <div class="badge badge-primary">5 members</div><a data-toggle="collapse" data-parent="#daily-feeds" href="#dfd-box" aria-expanded="true" aria-controls="dfd-box"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
          <div id="dfd-box" role="tabpanel" class="collapse show">
            <div class="feed-box">
              <ul class="feed-elements list-unstyled">
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Le Nguyen Thuc</strong><small>DFD Analyst </small>
                        <div class="full-date"><small>DFD</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Dang Tuan Huy</strong><small>Analyst </small>
                        <div class="full-date"><small>DFD</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-3.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Nguyen Thi Cam Tuyen</strong><small>Analyst </small>
                        <div class="full-date"><small>DFD</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-5.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Nguyen Thi Minh Tuyet</strong><small>Analyst </small>
                        <div class="full-date"><small>DFD</small></div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- List-->
                <li class="clearfix">
                  <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-5.jpg" alt="person" class="img-fluid rounded-circle"></a>
                      <div class="content"><strong>Vo Thi Thanh Quy</strong><small>Analyst </small>
                        <div class="full-date"><small>DFD</small></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Daily Feed Widget End-->
      </div>
    </div>
  </div>
</section>
