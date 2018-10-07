<?php
$rolename = "";
$roledescription = "";
$roledetails = "";
if(isset($_POST['btnAdd']))
{
    $rolename = $_POST['txtRole'];
    $roledescription = $_POST['txtDetails'];
    $roledetails = implode(",",$_POST['add']);
    $sql = "INSERT INTO `Role`(`RoleName`, `RoleDescription`, `RoleDetail`) VALUES('$rolename','$roledescription','$roledetails')";
    mysqli_query($conn,$sql);
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=Role"/>';
}
?>
<div class="container">

				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">ADD ROLE</h4>
					</div>
					<div class="form-group">
						<label for="txtRole">ROLE NAMES:</label>
						<input type="text" class="form-control" id="txtRole" required name="txtRole" placeholder="Role Names">
					</div>
          <div class="form-group">
            <label for="txtDetails">ROLE DETAILS:</label>
            <!-- <textarea class="form-control" id="ckeditor" required name="txtDetails" placeholder="Enter the role description">
            </textarea> -->
            <input type="text" class="form-control" id="txtdetails" required name="txtDetails" placeholder="Enter the role description">
					</div>
          <div class="form-group">
            <label for="roleGroup">DETAILS</label><br  />
            <input type="checkbox" onClick="toggle(this)" id="roleGroup"> Check All
            <!-- <input type="checkbox" name='add[]' value="fullcontrol" onClick="toggle(this)"> Full Control -->
            <table class="table" border="0">
              <thead>
                <tr>
                  <th>Teacher Group</th>
                  <th>Management Group</th>
                  <th>System Group</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" name='add[]' value="student"> Student Access</td>
                  <td><input type="checkbox" name='add[]' value="personnel"> Personnel Access</td>
                  <td><input type="checkbox" name='add[]' value="home" checked> Home Access</td>
                </tr>
                <tr>
                  <td><input type="checkbox" name='add[]' value="class"> Class Access</td>
                  <td><input type="checkbox" name='add[]' value="department"> Department Access</td>
                  <td><input type="checkbox" name='add[]' value="role"> Role Access</td>
                </tr>
                <tr>
                  <td><input type="checkbox" name='add[]' value="grade"> Grade Access</td>
                  <td><input type="checkbox" name='add[]' value="position"> Position Access</td>
                  <td></td>
                </tr>
                <tr>
                  <td><input type="checkbox" name='add[]' value="schoolyears"> School Years Access</td>
                  <td><input type="checkbox" name='add[]' value="upgrade"> Upgrade Class Access</td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>
