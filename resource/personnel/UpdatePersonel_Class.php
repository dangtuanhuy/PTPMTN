<?php 
if(isset($_GET["PersonnelCode"]) && isset($_GET["ClassId"])){

    $PersonnelCode= $_GET["PersonnelCode"];
    $ClassId = $_GET["ClassId"];
	
	$sqlstring = "SELECT `ClassId`, `PersonnelCode` FROM `Personel_Class` WHERE  ClassId = {$ClassId} AND  PersonnelCode = '{$PersonnelCode}'";
	$result = mysqli_query($conn, $sqlstring);
	$row = mysqli_fetch_row($result);
	$idClass = $row['0'];
	$idPersonnelCode = $row['1'];
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=?page=Personel_Class"/>';
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
function bindUpdatePersonnel($conn, $selectedValue) {
	$sqlstring = "SELECT PersonnelName, ClassName FROM `Personel_Class`
    JOIN Personnel On Personnel.PersonnelCode = Personel_Class.PersonnelCode
    JOIN Class ON Class.ClassId = Personel_Class.ClassId";
	$result = mysqli_query($conn, $sqlstring);
	echo "<select name='slPersonnal' class='form-control' readonly='true'>
	<option value='0'>School Years:</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if ($row['PersonnelCode'] == $selectedValue) {
			echo "<option value='" . $row['PersonnelCode']."' selected>".$row['PersonnelName']."</option>";
		} 
		else {
			echo "<option value='".$row['PersonnelCode']."'>".$row['PersonnelName']."</option>";
		}
	}
	echo "</select>";
}
if(isset($_POST["btnEdit"])){
    $idClass = $_POST["slClass"];
	$idPersonnelCode  = $_POST["slPersonnal"];
	$sqlstring="UPDATE `Personel_Class` SET 
	PersonnelCode = '".$idClass."',
	ClassId = '".$idPersonnelCode."',
     WHERE ClassId=".$ma;
     //Lỗi anh sửa Id chỗ này nhé
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=Personel_Class"/>';
	}
?>
<div class="container">
	
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <h4 class="text-center">Update Class - Personnal</h4>
        </div>
        <div class="form-group">
            <label for="slPersonnal">Personnel: </label>
            <?php bindUpdatePersonnel($conn, $idPersonnelCode) ?>
        </div>
        <div class="form-group">
            <label for="slClass">Class: </label>
            <?php bindUpdateClass($conn, $idClass) ?>
        </div>
        <input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
    </form>
</div>