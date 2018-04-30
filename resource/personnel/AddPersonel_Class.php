<?php
// $sql_find_teacher = "SELECT PositionName FROM Position po, Personnel pe, Personel_Class pc WHERE pc.PersonnelCode = pe.PersonnelCode AND pe.PositionId = po.PositionId AND pc.ClassId = 2";
// $result_find_teacher = mysqli_query($conn,$sql_find_teacher);
// $num_teacher = mysqli_num_rows($result_find_teacher);
// $teacher = array();
// while ($row_teacher = mysqli_fetch_array($result_find_teacher)) {
// 	array_push($teacher,$row_teacher[0]);
// }
// print_r($teacher);

function blindPersonnelList($conn)
{
	$sqlSelect = "SELECT * FROM `Personnel` ";
	$result = mysqli_query($conn,$sqlSelect);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<option value='".$row['PersonnelCode']."'>".$row['PersonnelName']."</option>";
	}
}

function blindPersonnel($conn,$code)
{
	$sqlSelect = "SELECT * FROM `Personnel` WHERE PersonnelCode = '{$code}'";
	$result = mysqli_query($conn,$sqlSelect);
	while ($row = mysqli_fetch_array($result)) {
		if($code == $row['PersonnelCode']) {
			echo "<option value='".$row['PersonnelCode']."' selected>".$row['PersonnelName']."</option>";
		} else {
			echo "<option value='".$row['PersonnelCode']."'>".$row['PersonnelName']."</option>";
		}
	}
}

// TO-DO: Cần người chỉnh sửa phần này. Mình bó tay rồi
function blindPersonnelFromClass($conn,$id)
{
	$sql_find_grade = "SELECT GradeName FROM Grade JOIN Class ON Grade.GradeId = Class.GradeId WHERE Class.ClassId = {$id}";
	$result_find_grade = mysqli_query($conn,$sql_find_grade);

	while ($row_grade = mysqli_fetch_array($result_find_grade)) {
	  $grade = $row_grade[0];
	}

	$sql_find_teacher = "SELECT PositionName FROM Position po, Personnel pe, Personel_Class pc WHERE pc.PersonnelCode = pe.PersonnelCode AND pe.PositionId = po.PositionId AND pc.ClassId = {$id}";
	$result_find_teacher = mysqli_query($conn,$sql_find_teacher);
	$num_teacher = mysqli_num_rows($result_find_teacher);
	$teacher = array();
	while ($row_teacher = mysqli_fetch_array($result_find_teacher)) {
	  array_push($teacher,$row_teacher[0]);
	}

	if(!in_array('Nanny',$teacher) && (!in_array('Teacher-Kindergarten',$teacher) || !in_array('Teacher-Pre1',$teacher) || !in_array('Teacher-Pre2',$teacher) || !in_array('Teacher-Pre3',$teacher)) && $num_teacher <= 2) {
		if($grade == 'Group24' || $grade == 'Group36') {
		  // For Kindergarten: Group 18 to 36 month old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Kindergarten' OR Position.PositionExpertise = 'Nanny'";
		} else if($grade == 'Pre1') {
		  // For Preschool: 3 years old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Preschool-I' OR Position.PositionExpertise = 'Nanny'";
		} else if($grade == 'Pre2') {
		  // For Preschool: 4 years old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Preschool-II' OR Position.PositionExpertise = 'Nanny'";
		} else if($grade == 'Pre3') {
		  // For Preschool: 5 years old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Preschool-III' OR Position.PositionExpertise = 'Nanny'";
		} else {
		  // No information
		  $sql_qry_personnel = "SELECT * FROM Personnel";
		}
	} else if(!in_array('Teacher-Kindergarten',$teacher) || !in_array('Teacher-Pre1',$teacher) || !in_array('Teacher-Pre2',$teacher) || !in_array('Teacher-Pre3',$teacher) && $num_teacher <= 2) {
		if($grade == 'Group24' || $grade == 'Group36') {
		  // For Kindergarten: Group 18 to 36 month old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Kindergarten'";
		} else if($grade == 'Pre1') {
		  // For Preschool: 3 years old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Preschool-I'";
		} else if($grade == 'Pre2') {
		  // For Preschool: 4 years old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Preschool-II'";
		} else if($grade == 'Pre3') {
		  // For Preschool: 5 years old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Preschool-III'";
		} else {
		  // No information
		  $sql_qry_personnel = "SELECT * FROM Personnel";
		}
	} else if(!in_array('Nanny',$teacher) && $num_teacher <= 2) {
		if($grade == 'Group24' || $grade == 'Group36') {
		  // For Kindergarten: Group 18 to 36 month old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Nanny'";
		} else if($grade == 'Pre1') {
		  // For Preschool: 3 years old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Nanny'";
		} else if($grade == 'Pre2') {
		  // For Preschool: 4 years old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Nanny'";
		} else if($grade == 'Pre3') {
		  // For Preschool: 5 years old
		  $sql_qry_personnel = "SELECT * FROM Personnel JOIN Position ON Personnel.PositionId = Position.PositionId WHERE Position.PositionExpertise = 'Nanny'";
		} else {
		  // No information
		  $sql_qry_personnel = "SELECT * FROM Personnel";
		}
	} else {
		echo '<script> alert("Available Teacher and Nanny in Class!");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=?page=Personel_Class"/>';
	}

	$result_qry_personnel = mysqli_query($conn,$sql_qry_personnel);
	if(mysqli_num_rows($result_qry_personnel) >0 ) {
		$result_personnel = mysqli_query($conn,$sql_qry_personnel);
	} else {
		$result_personnel = mysqli_query($conn,"SELECT * FROM Personnel");
	}
	while ($row_personnel = mysqli_fetch_array($result_personnel)) {
		echo "<option value='".$row_personnel['PersonnelCode']."'>".$row_personnel['PersonnelName']."</option>";
	}
}

function blindClassList($conn)
{
	$sqlSelect = "SELECT * FROM `Class`";
	$result = mysqli_query($conn,$sqlSelect);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<option value='".$row['ClassId']."'>".$row['ClassName']."</option>";
	}
}

function blindClass($conn,$id)
{
	$sqlSelect = "SELECT * FROM `Class` WHERE ClassId = {$id}";
	$result = mysqli_query($conn,$sqlSelect);
	while ($row = mysqli_fetch_array($result)) {
		if($id == $row['ClassId']) {
			echo "<option value='".$row['ClassId']."' selected>".$row['ClassName']."</option>";
		} else {
			echo "<option value='".$row['ClassId']."'>".$row['ClassName']."</option>";
		}
	}
}

function blindClassFromPersonnel($conn,$code)
{
	$sql_find_expertise = "SELECT PositionExpertise FROM Position JOIN Personnel ON Position.PositionId = Personnel.PositionId WHERE Personnel.PersonnelCode = '{$code}'";
	$result_find_expertise = mysqli_query($conn,$sql_find_expertise);

	while ($row_expertise = mysqli_fetch_array($result_find_expertise)) {
	  $expertise = $row_expertise[0];
	}

	switch ($expertise) {
		case 'Kindergarten':
			// For Kindergarten: Group 18 to 36 month old
			$sql_qry_class = "SELECT ClassId, ClassName FROM Class JOIN Grade ON Class.GradeId = Grade.GradeId WHERE Grade.GradeName = 'Group24' OR Grade.GradeName = 'Group36'";
			break;
		case 'Preschool-I':
			// For Preschool: 3 years old
		  $sql_qry_class = "SELECT ClassId, ClassName FROM Class JOIN Grade ON Class.GradeId = Grade.GradeId WHERE Grade.GradeName = 'Pre1'";
			break;
		case 'Preschool-II':
			// For Preschool: 4 years old
		  $sql_qry_class = "SELECT ClassId, ClassName FROM Class JOIN Grade ON Class.GradeId = Grade.GradeId WHERE Grade.GradeName = 'Pre2'";
			break;
		case 'Preschool-III':
			// For Preschool: 5 years old
		  $sql_qry_class = "SELECT ClassId, ClassName FROM Class JOIN Grade ON Class.GradeId = Grade.GradeId WHERE Grade.GradeName = 'Pre3'";
			break;
		default:
			// No information
			$sql_qry_class = "SELECT ClassId, ClassName FROM Class";
			break;
	}

	if(mysqli_num_rows(mysqli_query($conn,$sql_qry_class)) >0 ) {
		$result_class = mysqli_query($conn,$sql_qry_class);
	} else {
		$result_class = mysqli_query($conn,"SELECT ClassId, ClassName FROM Class");
	}
	while ($row_class = mysqli_fetch_array($result_class)) {
		echo "<option value='".$row_class['ClassId']."'>".$row_class['ClassName']."</option>";
	}
}
$idPersonnal = "";
$idClass = "";
if(isset($_POST['btnAdd']))
{
		$sql_qry_per_class = "SELECT * FROM `Personel_Class`";
		$result_qry_per_class = mysqli_query($conn, $sql_qry_per_class);
		$listPerClassAsPer = array();
		while ($row_qry_per_class = mysqli_fetch_array($result_qry_per_class)) {
			array_push($listPerClassAsPer,$row_qry_per_class[1]);
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

<?php if(isset($_GET['action'])) { if($_GET['action'] == 'personnel') { ?>
	<div class="container">
	    <form method="post" class="form-horizontal">
	        <div class="form-group">
	            <h4 class="text-center">ADD Class - Personnal</h4>
	        </div>
	        <div class="form-group">
	            <label for="slPersonnal">Personnel: </label>
							<select class='form-control' name='slPersonnal' id='slPersonnal'>
								<?php blindPersonnel($conn,$_POST['slPersonnal']) ?>
							</select>
	        </div>
	        <div class="form-group">
	            <label for="slClass">Class: </label>
							<select class='form-control' name='slClass' id='slClass'>
								<option value='0'>Choice Class</option>
	            	<?php blindClassFromPersonnel($conn,$_POST['slPersonnal']) ?>
							</select>
	        </div>
	        <input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
	        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
	    </form>
	</div>
<?php	}
	else if($_GET['action'] == 'class') {
	// TO-DO: Cần người chỉnh sửa phần này. Mình bó tay rồi
?>
<!-- TO-DO: Cần người chỉnh sửa phần này. Mình bó tay rồi -->
	<div class="container">
	    <form method="post" class="form-horizontal">
	        <div class="form-group">
	            <h4 class="text-center">ADD Class - Personnal</h4>
	        </div>
	        <div class="form-group">
	            <label for="slPersonnal">Personnel: </label>
							<select class='form-control' name='slPersonnal' id='slPersonnal'>
								<option value='0'>Choice Personnal</option>
	            	<?php blindPersonnelFromClass($conn,$_POST['slClass']) ?>
							</select>
	        </div>
	        <div class="form-group">
	            <label for="slClass">Class: </label>
							<select class='form-control' name='slClass' id='slClass'>
								<?php blindClass($conn,$_POST['slClass']) ?>
							</select>
	        </div>
	        <input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
	        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
	    </form>
	</div>
<?php	}
} else { ?>
<div class="container">
	<div class="form-group">
			<h4 class="text-center">ADD Class - Personnal</h4>
	</div>
	<div class="form-group">
		<form method="post" action="?page=AddPersonel_Class&action=personnel" class="form-horizontal">
			<label for="slPersonnal">Personnel: </label>
			<select class='form-control' name='slPersonnal' id='slPersonnal' onchange='this.form.submit()'>
				<option value='0'>Choice Personnal</option>
				<?php blindPersonnelList($conn) ?>
			</select>
		</form>
	</div>
	<div class="form-group">
		<!-- TO-DO: Cần người chỉnh sửa phần này. Mình bó tay rồi -->
		<form method="post" action="?page=AddPersonel_Class&action=class" class="form-horizontal">
			<label for="slClass">Class: </label>
			<select class='form-control' name='slClass' id='slClass' onchange='this.form.submit()'>
				<option value='0'>Choice Class</option>
				<?php blindClassList($conn) ?>
			</select>
		</form>
	</div>
	<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
	<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
</div>
<?php } ?>
