<?php
$gradename = "";
if(isset($_POST['btnAdd']))
{
    $gradename = $_POST['txtGradeNames'];
    $sql = "INSERT INTO `Grade`(`GradeName`) VALUES('$gradename')";
    mysqli_query($conn,$sql);
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=grade"/>';
} 
?>
<div class="container">
	
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">GRADE NAMES</h4>
					</div>
					<div class="form-group">
						<label for="txtSach">NAMES:</label>
						<input type="text" class="form-control" id="txtGradeNames" required name="txtGradeNames" placeholder="Grade Names">
					</div>
					
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>
	