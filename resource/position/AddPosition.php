<?php 
function blindDepartmentList($conn)
{
	$sqlSelect ="
	SELECT `DepartmentId`, `DepartmentName`, `DepartmentDetails` FROM `Department` ";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select class='form-control' name='slDepartment'>
	<option value='0'>Choice Department</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['DepartmentId']."'>".$row['DepartmentName']."</option>";
	}
	echo "</select>";
}
?>
<?php 
$position = "";
$positiondetails = "";
$idDepartment = "";
if(isset($_POST['btnAdd']))
{
    $position = $_POST['txtPosition'];
    $positiondetails = $_POST['txtDetails'];
    $idDepartment = $_POST['slDepartment'];
    $sqlInsert ="INSERT INTO `Position`(`PositionName`, `PositionDetails`, `DepartmentId`) VALUES (' $position ','$positiondetails','$idDepartment')";
    mysqli_query($conn,$sqlInsert);
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=Position"/>';
}
?>
<div class="container">
	
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">ADD POSITION</h4>
					</div>
					<div class="form-group">
						<label for="txtPosition">Position Names:</label>
						<input type="text" class="form-control" id="txtPosition" required name="txtPosition" placeholder="Enter the position names">
					</div>
                    <div class="form-group">
                    <label for="txtEnrollment">Position Details:</label>
                    <textarea class="form-control" id="ckeditor" required name="txtDetails" placeholder="Enter the School Years details">
                    </textarea>
                    
					</div>
                    <div class="form-group">
			            <label for="slGrade">Department: </label>
			            <?php blindDepartmentList($conn) ?>
		            </div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>