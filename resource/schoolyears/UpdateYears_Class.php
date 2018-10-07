<?php 
if(isset($_GET["SchoolYearsId"]) && isset($_GET["ClassId"])){

    $SchoolYearsId = $_GET["SchoolYearsId"];
    $ClassId = $_GET["ClassId"];
	
	$sqlstring = "SELECT SchoolYearsId, ClassId FROM SchoolYears_Class WHERE SchoolYearsId = $SchoolYearsId AND  ClassId = $ClassId ";
	$result = mysqli_query($conn, $sqlstring);
	$row = mysqli_fetch_row($result);
	$idClass = $row['0'];
	$idSchooleYears = $row['1'];
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=?page=Class"/>';
}
function bindUpdateClass($conn, $selectedValue) {
	$sqlstring = "SELECT * FROM `SchoolYears_Class` 
    JOIN Class ON Class.ClassId = SchoolYears_Class.ClassId
    JOIN SchoolYears ON SchoolYears.SchoolYearsId = SchoolYears_Class.SchoolYearsId";
	$result = mysqli_query($conn, $sqlstring);
	echo "<select name='slClass' class='form-control' readonly='true'>
	<option value='0'>Class:</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if ($row['ClassId'] == $selectedValue) {
			echo "<option value='" . $row['ClassId']."' selected>".$row['ClassName']."</option>";
		} 
		else {
			echo "<option value='".$row['ClassId']."'>".$row['ClassName']."</option>";
		}
	}
	echo "</select>";
}
function bindUpdateSchooleYears($conn, $selectedValue) {
	$sqlstring = "SELECT  SchoolYears, ClassName FROM `SchoolYears_Class` 
    JOIN Class ON Class.ClassId = SchoolYears_Class.ClassId
    JOIN SchoolYears ON SchoolYears.SchoolYearsId = SchoolYears_Class.SchoolYearsId";
	$result = mysqli_query($conn, $sqlstring);
	echo "<select name='slSchoolYears' class='form-control'>
	<option value='0'>School Years:</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if ($row['SchoolYearsId'] == $selectedValue) {
			echo "<option value='" . $row['SchoolYearsId']."' selected>".$row['SchoolYears']."</option>";
		} 
		else {
			echo "<option value='".$row['SchoolYearsId']."'>".$row['SchoolYears']."</option>";
		}
	}
	echo "</select>";
}
if(isset($_POST["btnEdit"])){
    $idClass = $_POST["slClass"];
	$idSchoolYears = $_POST["slSchoolYears"];
	$sqlstring="UPDATE `SchoolYears_Class` SET 
	SchoolYearsId = '".$idClass."',
	ClassId = '".$idSchoolYears ."',
	 WHERE ClassId=".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=Years_Class"/>';
	}
?>
<div class="container">
<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">UPDATE CLASS - YEARS</h4>
					</div>
                    <div class="form-group">
			            <label for="slGrade">Class: </label>
			            <?php  bindUpdateClass($conn, $idClass) ?>
		            </div>
                    <div class="form-group">
			            <label for="slGrade">School: </label>
			            <?php  bindUpdateSchooleYears($conn, $idSchoolYears) ?>
		            </div>
					<input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>