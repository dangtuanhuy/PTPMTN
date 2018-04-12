<?php 
function blindRoleList($conn)
{
	$sqlSelect ="
	SELECT `RoleId`, `RoleName`, `RoleDescription` FROM `Role`";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select class='form-control' name='slRole'>
	<option value='0'>Choice Role</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['RoleId']."'>".$row['RoleName']."</option>";
	}
	echo "</select>";
}
function blindPositionList($conn)
{
	$sqlSelect ="
	SELECT `PositionId`, `PositionName`, `PositionDetails`, `DepartmentId` FROM `Position` ";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select class='form-control' name='slPosition'>
	<option value='0'>Choice Position</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['PositionId']."'>".$row['PositionName']."</option>";
	}
	echo "</select>";
}

?>
<?php 
$perCode = "";
$perName = "";
$perPass = "";
$perBirth = date_default_timezone_set('Asia/Vientiane');
$Gender = "";
$perAddress = "";
$perMail = "";
$perPhone = "";
$idRole = "";
$idPosition = "";
if(isset($_POST["btnAdd"]))
{
    $perCode = $_POST["txtCode"];
    $perName = $_POST["txtName"];
    $perPass = $_POST["txtPass"];
    $perBirth = date('Y-m-d',  strtotime($_POST["txtBirthday"]));
    if(isset($_POST['grpGender'])) {
        $Gender = $_POST['grpGender'];
    }
    $perAddress = $_POST["txtAddress"];
    $perMail = $_POST["txtEmail"];
    $perPhone = $_POST["txtPhone"];
    $idRole = $_POST["slRole"];
    $idPosition = $_POST["slPosition"];
    $sqlInsert = "INSERT INTO `Personnel`(`PersonnelCode`, `PersonnelName`, `PersonnelPass`,
     `PersonnelBirth`, `PersonnelGender`, `PersonnelAddress`,
      `PersonnelNum`, `PersonnelEmail`,  
      `PositionId`, `RoleId`
     ) 
      VALUES
      ('$perCode','$perName','".md5($perPass)."','$perBirth','$Gender','$perAddress',' $perPhone','$perMail','$idRole','$idPosition') ";
      mysqli_query($conn,$sqlInsert);
      echo '<script> alert("Insert Success!");</script>';
         echo '<meta http-equiv="refresh" content="0;URL=?page=Personnel"/>';
}
?>
<div class="container">
	
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">Personnel</h4>
					</div>
					<div class="form-group">
						<label for="txtCode">Personnel Code:</label>
						<input type="text" class="form-control" id="txtCode" required name="txtCode" placeholder="Enter Personnel Code">
					</div>
                    <div class="form-group">
						<label for="txtName">Personnel Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Enter Personnel Name">
					</div>
                    <div class="form-group">
						<label for="txtName">Personnel Password:</label>
						<input type="password" class="form-control" id="txtPass" required name="txtPass" placeholder="Enter Personnel Pass">
					</div>
                    <div class="form-group">
						<label for="txtBirthday">Birthday:</label>
						<input type="date" class="form-control" id="txtBirthday" required name="txtBirthday" placeholder="Enter Birthday">
					</div>
                    <div class="form-group">
                    <label class="radio-inline">
                    <input type="radio" name="grpGender" value="0" id="grpGender" 
                             <?php if(isset($Gender)&&$Gender=="0") { echo "checked";} ?> />
                     Male</label>

                    <label class="radio-inline"><input type="radio" name="grpGender" value="1" id="grpGender" 
                        <?php if(isset($Gender)&&$Gender=="1") { echo "checked";} ?> />
                    Female</label>
                    </div>
					
                    <div class="form-group">
                        <label for="txtAddress">Address:</label>
                    <textarea class="form-control" id="ckeditor" required name="txtAddress">
                    </textarea>
					    </div>
                    <div class="form-group">
                    <label for="txtPhone">Email:</label>
						<input type="mail" class="form-control" id="txtEmail" required name="txtEmail" placeholder="Mail">
                    </div>
                    <div class="form-group">
						<label for="txtPhone">Phone:</label>
						<input type="tel" class="form-control" id="txtPhone" required name="txtPhone" placeholder="Phone">
					</div>
                    <div class="form-group">
						<label for="slClass">Position:</label>
						<?php blindPositionList($conn); ?>
					</div>
                    <div class="form-group">
						<label for="slClass">Position:</label>
						<?php blindRoleList($conn) ?>
					</div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>