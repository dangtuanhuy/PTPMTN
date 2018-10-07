<?php 
$school = "";
$details ="";
if(isset($_POST['btnAdd']))
{
    $school = $_POST['txtSchool'];
    $details = $_POST['txtDetails'];
    $sqlInsert ="INSERT INTO `SchoolYears`(`SchoolYears`, `Details`) VALUES('$school','$details')";
    mysqli_query($conn,$sqlInsert);
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=SchoolYears"/>';
}
?>
<div class="container">
	
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">SCHOOL YEARS</h4>
					</div>
					<div class="form-group">
						<label for="txtSchool">School Years:</label>
						<input type="text" class="form-control" id="txtSchool" required name="txtSchool" placeholder="Enter the School Years">
					</div>
                    <div class="form-group">
                    <label for="txtDetails">Details:</label>
                    <textarea class="form-control" id="ckeditor" required name="txtDetails" placeholder="Enter the School Years details">
                    </textarea>
					</div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>