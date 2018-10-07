<?php
$departname = "";
$departdetails = "";
if(isset($_POST['btnAdd']))
{
    $departname = $_POST['txtDepartment'];
    $departdetails = $_POST['txtDetails'];
    $sql = "INSERT INTO `Department`(`DepartmentName`, `DepartmentDetails`) VALUES('$departname','$departdetails')";
    mysqli_query($conn,$sql);
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=Department"/>';
} 
?>
<div class="container">
	
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">ADD DEPARTMENT</h4>
					</div>
					<div class="form-group">
						<label for="txtDepartment">DEPARTMENT NAMES:</label>
						<input type="text" class="form-control" id="txtDepartment" required name="txtDepartment" placeholder="Grade Names">
					</div>
                    <div class="form-group">
                    <label for="txtDetails">DEPARTMENT DETAILS:</label>
                    <textarea class="form-control" id="ckeditor" required name="txtDetails" placeholder="Enter the School Years details">
                    </textarea>
					</div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>
	