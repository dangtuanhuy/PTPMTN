<?php
$rolename = "";
$roledetails = "";
if(isset($_POST['btnAdd']))
{
    $rolename = $_POST['txtRole'];
    $roledetails = $_POST['txtDetails'];
    $sql = "INSERT INTO `Role`(`RoleName`, `RoleDescription`) VALUES('$rolename','$roledetails')";
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
						<input type="text" class="form-control" id="txtRole" required name="txtRole" placeholder="Grade Names">
					</div>
                    <div class="form-group">
                    <label for="txtDetails">ROLE DETAILS:</label>
                    <textarea class="form-control" id="ckeditor" required name="txtDetails" placeholder="Enter the School Years details">
                    </textarea>
					</div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>
	