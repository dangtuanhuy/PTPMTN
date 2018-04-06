<?php 
if(isset($_GET["ma"])){

	$ma = $_GET["ma"];
	
	$sqlstring = "SELECT `ClassName`, `Enrollment`,`GradeId` FROM `Class` WHERE `ClassId`=".$ma;
	$result = mysqli_query($conn, $sqlstring);
	$row = mysqli_fetch_row($result);
	$classname = $row['0'];
	$enrollment = $row['1'];
	$idGrade = $row['2'];
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=?page=Class"/>';
}
function bindUpdateGrade($conn, $selectedValue) {
	$sqlstring = "SELECT * FROM `Class`
    JOIN Grade ON Class.ClassId = Grade.GradeId";
	$result = mysqli_query($conn, $sqlstring);
	echo "<select name='slGrade' class='form-control'>
	<option value='0'>Grade:</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if ($row['GradeId'] == $selectedValue) {
			echo "<option value='" . $row['GradeId']."' selected>".$row['GradeName']."</option>";
		} 
		else {
			echo "<option value='".$row['GradeId']."'>".$row['GradeName']."</option>";
		}
	}
	echo "</select>";
}
if(isset($_POST["btnEdit"])){
	$classname= $_POST["txtClass"];
	$enrollment = $_POST["txtEnrollment"];
	$idGrade = $_POST["slGrade"];
	$sqlstring="UPDATE `Class` SET 
	ClassName='".$classname."',
	Enrollment = '".$enrollment."',
	GradeId = '".$idGrade."'
	 WHERE ClassId=".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=Class"/>';
	}
?>
<div class="container">
<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">UPDATE CLASS</h4>
					</div>
					<div class="form-group">
						<label for="txtClass">Class Names:</label>
						<input type="text" class="form-control" id="txtClass" required name="txtClass" placeholder="Enter the class names" value='<?php echo $classname ; ?>' >
					</div>
                    <div class="form-group">
                    <label for="txtEnrollment">Enrollment:</label>
						<input type="number" class="form-control" id="txtEnrollment" required name="txtEnrollment" placeholder="Enter the class names" value='<?php echo $enrollment ; ?>' >
                    
					</div>
                    <div class="form-group">
			            <label for="slGrade">Class: </label>
			            <?php  bindUpdateGrade($conn, $idGrade) ?>
		            </div>
					<input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>