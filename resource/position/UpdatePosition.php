<?php 
if(isset($_GET["ma"])){

	$ma = $_GET["ma"];
	
	$sqlstring = "SELECT`PositionName`, `PositionDetails`, `DepartmentId` FROM `Position` WHERE PositionId=".$ma;
	$result = mysqli_query($conn, $sqlstring);
	$row = mysqli_fetch_row($result);
	$positionname = $row['0'];
	$positiondetails = $row['1'];
	$idDepartment = $row['2'];
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=?page=Position"/>';
}
function bindUpdatePosition($conn, $selectedValue) {
	$sqlstring = "SELECT * FROM `Position`
    JOIN Department ON Position.PositionId=Department.DepartmentId";
	$result = mysqli_query($conn, $sqlstring);
	echo "<select name='slDepartment' class='form-control'>
	<option value='0'>Department</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if ($row['DepartmentId'] == $selectedValue) {
			echo "<option value='" . $row['DepartmentId']."' selected>".$row['DepartmentName']."</option>";
		} 
		else {
			echo "<option value='".$row['DepartmentId']."'>".$row['DepartmentName']."</option>";
		}
	}
	echo "</select>";
}
if(isset($_POST["btnEdit"])){
	$positionname = $_POST["txtPosition"];
	$positiondetails = $_POST["txtDetails"];
	$idDepartment = $_POST["slDepartment"];
	$sqlstring ="UPDATE `Position` SET 
	PositionName ='".$positionname."',
	PositionDetails = '".$positiondetails."',
	DepartmentId = '".$idDepartment."'
	 WHERE PositionId=".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=Position"/>';
	}
?>
<div class="container">
<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">UPDATE POSITION</h4>
					</div>
					<div class="form-group">
						<label for="txtPosition">Position Names:</label>
						<input type="text" class="form-control" id="txtPosition" required name="txtPosition" placeholder="Enter the position names" value='<?php echo $positionname ; ?>' >
					</div>
                    <div class="form-group">
                    <label for="txtEnrollment">Position Details:</label>
						
                        <textarea class="form-control" id="ckeditor" required name="txtDetails" placeholder="Enter the School Years details">
        <?php echo  $positiondetails?>
        </textarea>
					</div>
                    <div class="form-group">
			            <label for="slGrade">Department: </label>
			            <?php  bindUpdatePosition($conn, $idDepartment); ?>
		            </div>
					<input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>