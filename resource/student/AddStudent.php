<?php
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

?>
<?php
    $studentcode = "";
    $studentname = "";
    $studentbirthday = date_default_timezone_set('Asia/Vientiane');
    $Gender = "";
    $address = "";
    $father = "";
    $job1 = "";
    $mother = "";
    $job2 = "";
    $phone = "";
    $idClass = "";
    if(isset($_POST['btnAdd']))
    {
				$sql_qry_stuCode = "SELECT StudentCode FROM Student";
				$result_qry_stuCode = mysqli_query($conn, $sql_qry_stuCode);
				$listStuCode = array();
				while ($row_qry_stuCode = mysqli_fetch_array($result_qry_stuCode)) {
					array_push($listStuCode,$row_qry_stuCode[0]);
				}
				if(in_array($_POST["txtCode"],$listStuCode)) {
					echo '<script> alert("Available code in the database!");</script>';
				} else if((date("Y-m-d") - date('Y-m-d', strtotime($_POST["txtBirthday"]))) > 7) {
					echo '<script> alert("Sorry, but you had could study at a primary school!");</script>';
				} else {
					$studentcode = $_POST["txtCode"];
	        $studentname = $_POST["txtName"];
	        $studentbirthday = date('Y-m-d',  strtotime($_POST["txtBirthday"]));
	        if(isset($_POST['grpGender'])) {
						$Gender = $_POST['grpGender'];
	        }
	        $address =$_POST["txtAddress"];
	        $father = $_POST["txtFather"];
	        $job1 = $_POST["txtJob1"];
	        $mother = $_POST["txtMother"];
	        $job2 = $_POST["txtJob2"];
	        $phone = $_POST["txtPhone"];
	        $idClass = $_POST["slClass"];
	        $sqlInsert = "INSERT INTO Student(StudentCode, StudentName,
	         StudentBirth, StudentGender, StudentAddress,
	        YourFatherName, JobFather, YourMotherName,
	         JobMother, PhoneHouse,
	          ClassId) VALUES
	          ('$studentcode','$studentname','$studentbirthday','$Gender','$address','$father','$job1 ','$mother','$job2','$phone','$idClass')";
	      	mysqli_query($conn, $sqlInsert);
	         echo '<script> alert("Insert Success!");</script>';
	         echo '<meta http-equiv="refresh" content="0;URL=?page=Student"/>';
				}
    }
?>
<div class="container">

				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">STUDENT</h4>
					</div>
					<div class="form-group">
						<label for="txtCode">Student Code:</label>
						<input type="text" class="form-control" id="txtCode" required name="txtCode" placeholder="Enter Student Code">
					</div>
          <div class="form-group">
						<label for="txtName">Student Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Enter Student Name">
					</div>
          <div class="form-group">
						<label for="txtBirthday">Birthday:</label>
						<input type="date" class="form-control" id="txtBirthday" required name="txtBirthday" placeholder="Enter Birthday">
					</div>
					<div class="form-group">
					<label class="radio-inline">
						<input type="radio" name="grpGender" value="0" id="grpGender" checked/> Male
					 </label>
					<label class="radio-inline">
						<input type="radio" name="grpGender" value="1" id="grpGender" /> Female
					</label>
					</div>
					<div class="form-group">
						<label for="txtAddress">Address:</label>
						<textarea class="form-control" id="ckeditor" required name="txtAddress">
						</textarea>
					</div>
          <div class="form-group">
						<label for="txtFather">Student's Father name:</label>
						<input type="text" class="form-control" id="txtFather" required name="txtFather" placeholder="Enter Student's Father name">
					</div>
          <div class="form-group">
						<label for="txtJob1">Job's Father:</label>
						<input type="text" class="form-control" id="txtJob1" required name="txtJob1" placeholder="Enter Job's Father">
					</div>
          <div class="form-group">
						<label for="txtMother">Student's Mother name:</label>
						<input type="text" class="form-control" id="txtMother" required name="txtMother" placeholder="Enter Student's Mother name">
					</div>
          <div class="form-group">
						<label for="txtJob2">Job's Mother:</label>
						<input type="text" class="form-control" id="txtJob2" required name="txtJob2" placeholder="Enter Job's Mother">
					</div>
          <div class="form-group">
						<label for="txtPhone">Phone:</label>
						<input type="tel" class="form-control" id="txtPhone" required name="txtPhone" placeholder="Phone">
					</div>
          <div class="form-group">
						<label for="slClass">Class:</label>
						<?php blindClassList($conn); ?>
					</div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>
