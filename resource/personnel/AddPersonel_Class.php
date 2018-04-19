<?php 
function blindPersonnelList($conn)
{
	$sqlSelect ="
	SELECT * FROM `Personnel` ";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select class='form-control' name='slPersonnal'>
	<option value='0'>Choice Personnal</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['PersonnelCode']."'>".$row['PersonnelName']."</option>";
	}
	echo "</select>";
}
function blindClassList($conn)
{
	$sqlSelect ="
	SELECT * FROM `Class`";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select class='form-control' name='slClass'>
	<option value='0'>Choice Class</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['ClassId']."'>".$row['ClassName']."</option>";
	}
	echo "</select>";
}
$idPersonnal = "";
$idClass = "";
if(isset($_POST['btnAdd']))
{
    $idPersonnal = $_POST['slPersonnal'];
    $idClass = $_POST['slClass'];
    $sqlInsert ="INSERT INTO Personel_Class(ClassId, PersonnelCode) VALUES ('$idClass','$idPersonnal')";
    mysqli_query($conn,$sqlInsert);
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=Personel_Class"/>';
}
?>

<div class="container">
	
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <h4 class="text-center">ADD Class - Personnal</h4>
        </div>
        <div class="form-group">
            <label for="slPersonnal">Personnel: </label>
            <?php blindPersonnelList($conn) ?>
        </div>
        <div class="form-group">
            <label for="slClass">Class: </label>
            <?php blindClassList($conn) ?>
        </div>
        <input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
    </form>
</div>