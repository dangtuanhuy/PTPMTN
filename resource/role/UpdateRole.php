<?php
if(isset($_GET["ma"])){

$ma = $_GET["ma"];

$sqlstring = "SELECT * FROM `Role` WHERE RoleId=".$ma;
$result = mysqli_query($conn, $sqlstring);
$row = mysqli_fetch_row($result);
$num = $rows['0'];
$rolename = $row['1'];
$roledescription = $row['2'];
$roledetails = explode(',',$row['3']);
}
else
{
echo '<meta http-equiv="refresh" content="0;URL=?page=Role"/>';
}
if(isset($_POST["btnEdit"])){
    $rolename  = $_POST["txtrole"];
    $roledescription = $_POST['txtDetails'];
    if ($_POST['add']) {
      $roledetail = implode(",",$_POST['add']);
    }
	  $sqlstring ="UPDATE `Role` SET
      RoleName ='".$rolename."',
      RoleDescription = '".$roledescription."',
      RoleDetail = '".$roledetail."'
	    WHERE RoleId =".$ma;
	  mysqli_query($conn,$sqlstring);
    echo '<script> alert("Update Success!");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=?page=Role"/>';
	}
?>

	<div class="container">
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <h4 class="text-center">EDIT ROLE</h4>
        </div>
        <div class="form-group">
            <label for="txtrole">Role names:</label>
            <input type="text" class="form-control" id="txtrole" required name="txtrole" value='<?php echo  $rolename ?>' placeholder="Enter the role name">
        </div>
        <div class="form-group">
        <label for="txtDetails">Description:</label>
        <input type="text" class="form-control" id="txtdetails" required name="txtDetails" value='<?php echo  $roledescription ?>' placeholder="Enter the role description">
        </div>
        <div class="form-group">
          <label for="roleGroup">DETAILS</label><br  />
          <input type="checkbox" onClick="toggle(this)" id="roleGroup"> Check All
          <!-- <input type="checkbox" name='add[]' value="fullcontrol"<?php if(in_array("fullcontrol",$roledetails)){echo " checked";}?> onClick="toggle(this)"> Full Control -->
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
                <td><input type="checkbox" name='add[]' value="student"<?php if(in_array("student",$roledetails)){echo " checked";}?>> Student Access</td>
                <td><input type="checkbox" name='add[]' value="personnel"<?php if(in_array("personnel",$roledetails)){echo " checked";}?>> Personnel Access</td>
                <td><input type="checkbox" name='add[]' value="home"<?php if(in_array("home",$roledetails)){echo " checked";}?>> Home Access</td>
              </tr>
              <tr>
                <td><input type="checkbox" name='add[]' value="class"<?php if(in_array("class",$roledetails)){echo " checked";}?>> Class Access</td>
                <td><input type="checkbox" name='add[]' value="department"<?php if(in_array("department",$roledetails)){echo " checked";}?>> Department Access</td>
                <td><input type="checkbox" name='add[]' value="role"<?php if(in_array("role",$roledetails)){echo " checked";}?>> Role Access</td>
              </tr>
              <tr>
                <td><input type="checkbox" name='add[]' value="grade"<?php if(in_array("grade",$roledetails)){echo " checked";}?>> Grade Access</td>
                <td><input type="checkbox" name='add[]' value="position"<?php if(in_array("position",$roledetails)){echo " checked";}?>> Position Access</td>
                <td></td>
              </tr>
              <tr>
                <td><input type="checkbox" name='add[]' value="schoolyears"<?php if(in_array("schoolyears",$roledetails)){echo " checked";}?>> School Years Access</td>
                <td><input type="checkbox" name='add[]' value="upgrade"<?php if(in_array("upgrade",$roledetails)){echo " checked";}?>> Upgrade Class Access</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
        <input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
    </form>
</div>
<script language="JavaScript">
  function toggle(source) {
    checkboxes = document.getElementsByName('add[]');
    for(var i=1, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
  }
</script>
