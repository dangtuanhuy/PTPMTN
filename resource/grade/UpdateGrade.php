<?php
if(isset($_GET["ma"])){

$ma = $_GET["ma"];

$sqlstring = "SELECT `GradeId`, `GradeName` FROM `Grade` WHERE `GradeId`=".$ma;
$result = mysqli_query($conn, $sqlstring);
$row = mysqli_fetch_row($result);
$num = $rows['0'];
$gradename = $row['1'];
}
else
{
echo '<meta http-equiv="refresh" content="0;URL=?page=grade"/>';
}
if(isset($_POST["btnEdit"])){
	$gradename= $_POST["txtGradeNames"];
	$sqlstring="UPDATE `Grade` SET 

	GradeName='".$gradename."'
	WHERE GradeId=".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=grade"/>';
	}
?>

	<h2 class="text-center">EDIT GRADE</h2>
	<form id="form1" name="form1" method="post" class="form-horizontal" role="form">
    
		<div class="form-group">
			<label for="txtGradeNames" class="col-sm-2 control-label">Grade Names:  </label>
			<div class="col-sm-10">
				<input type="text" name="txtGradeNames" id="txtGradeNames" class="form-control" required placeholder="Grade Names" value='<?php echo $gradename; ?>' >
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit"  class="btn btn-primary" name="btnEdit" id="btnEdit" value="Update"/>
				<input type="reset" class="btn btn-primary" name="btnCancel"  id="btnCancel" value="Cancel"  />                              	
			</div>
		</div>
	</form>
