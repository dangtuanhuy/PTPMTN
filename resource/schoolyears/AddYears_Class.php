<?php
function blindSchoolYearsList($conn)
{
	$sqlSelect ="
	SELECT `SchoolYearsId`, `SchoolYears`, `Details` FROM `SchoolYears`";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select class='form-control' name='slSchoolYears'>
	<option value='0'>Choice SchoolYears</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['SchoolYearsId']."'>".$row['SchoolYears']."</option>";
	}
	echo "</select>";
}
function blindClassList($conn)
{
	$sqlSelect ="
	SELECT `ClassId`, `ClassName`, `Enrollment`, `ClassStatus`, `GradeId` FROM `Class`";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select class='form-control' name='slClass'>
	<option value='0'>Choice Class</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['ClassId']."'>".$row['ClassName']."</option>";
	}
	echo "</select>";
}
$idSchoolYears = "";
$idClass = "";
if(isset($_POST['btnAdd']))
{
	$sql_qry_year_class = "SELECT * FROM `SchoolYears_Class`";
	$result_qry_year_class = mysqli_query($conn, $sql_qry_year_class);
	$listYearClassAsYear = array();
	$listYearClassAsClass = array();
	while ($row_qry_year_class = mysqli_fetch_array($result_qry_year_class)) {
		array_push($listYearClassAsYear,$row_qry_year_class[0]);
		array_push($listYearClassAsClass,$row_qry_year_class[1]);
	}
	if(in_array($_POST["slSchoolYears"],$listYearClassAsYear) && in_array($_POST["slClass"],$listYearClassAsClass)) {
		echo '<script> alert("Available code of School Years in the database!");</script>';
	} else {
    $idSchoolYears = $_POST['slSchoolYears'];
    $idClass = $_POST['slClass'];
    $sqlInsert ="INSERT INTO `SchoolYears_Class`(`SchoolYearsId`, `ClassId`) VALUES ('$idSchoolYears','$idClass')";
    mysqli_query($conn,$sqlInsert);
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=Years_Class"/>';
	}
}
?>

<div class="container">

    <form method="post" class="form-horizontal">
        <div class="form-group">
            <h4 class="text-center">ADD Class - Years</h4>
        </div>
        <div class="form-group">
            <label for="slSchoolYears">School Years: </label>
            <?php blindSchoolYearsList($conn) ?>
        </div>
        <div class="form-group">
            <label for="slClass">Class: </label>
            <?php blindClassList($conn) ?>
        </div>
        <input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
    </form>
</div>
