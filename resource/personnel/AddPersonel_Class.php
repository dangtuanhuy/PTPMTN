<?php
function blindPersonnelList($conn)
{
	$sqlSelect = "SELECT * FROM `Personnel` ";
	$result = mysqli_query($conn,$sqlSelect);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<option value='".$row['PersonnelCode']."'>".$row['PersonnelName']."</option>";
	}
}
function blindClassList($conn)
{
	$sqlSelect = "SELECT * FROM `Class`";
	$result = mysqli_query($conn,$sqlSelect);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['ClassId']."'>".$row['ClassName']."</option>";
	}
}
$idPersonnal = "";
$idClass = "";
if(isset($_POST['btnAdd']))
{
		$sql_qry_per_class = "SELECT * FROM `Personel_Class`";
		$result_qry_per_class = mysqli_query($conn, $sql_qry_per_class);
		$listPerClassAsPer = array();
		$listPerClassAsClass = array();
		while ($row_qry_per_class = mysqli_fetch_array($result_qry_per_class)) {
			array_push($listPerClassAsPer,$row_qry_per_class[1]);
			array_push($listPerClassAsClass,$row_qry_per_class[0]);
		}
    if(in_array($_POST["slPersonnal"],$listPerClassAsPer)) {
			echo '<script> alert("Available code of Personnal in the database!");</script>';
		}
		else {
			$idPersonnal = $_POST['slPersonnal'];
	    $idClass = $_POST['slClass'];
	    $sqlInsert ="INSERT INTO Personel_Class(ClassId, PersonnelCode) VALUES ('$idClass','$idPersonnal')";
	    mysqli_query($conn,$sqlInsert);
	    echo '<script> alert("Insert Success!");</script>';
	    echo '<meta http-equiv="refresh" content="0;URL=?page=Personel_Class"/>';
		}
}
?>

<div class="container">
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <h4 class="text-center">ADD Class - Personnal</h4>
        </div>
        <div class="form-group">
            <label for="slPersonnal">Personnel: </label>
						<select class='form-control' name='slPersonnal' id='slPersonnal'>
							<option value='0'>Choice Personnal</option>
            	<?php blindPersonnelList($conn) ?>
						</select>
        </div>
        <div class="form-group">
            <label for="slClass">Class: </label>
						<select class='form-control' name='slClass' id='slClass'>
							<option value='0'>Choice Class</option>
            	<?php blindClassList($conn) ?>
						</select>
        </div>
        <input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
    </form>
</div>
