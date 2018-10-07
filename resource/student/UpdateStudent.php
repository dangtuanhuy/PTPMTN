
<?php 
if(isset($_GET["ma"])){

	$ma = $_GET["ma"];
	
	$sqlstring = "SELECT `StudentCode`, `StudentName`, `StudentBirth`, `StudentGender`, `StudentAddress`, `YourFatherName`, `JobFather`, `YourMotherName`, `JobMother`, `PhoneHouse`,`ClassId` FROM Student WHERE StudentCode='".$ma."'";
	$result = mysqli_query($conn, $sqlstring);
	$row = mysqli_fetch_row($result);
	$StudentCode = $row['0'];
	$StudentName = $row['1'];
    $StudentBirth= $row['2'];
    $StudentGender = $row['3'];
    $StudentAddress = $row['4'];
    $YourFatherName = $row['5'];
    $JobFather = $row['6'];
    $YourMotherName = $row['7'];
    $JobMother = $row['8'];
    $PhoneHouse = $row['9'];
    $idClass = $row['10'];
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=?page=Student"/>';
}
function bindUpdateClass($conn, $selectedValue) {
	$sqlstring = "SELECT `ClassId`, `ClassName`, `Enrollment`, `ClassStatus`, `GradeId` FROM `Class`";
	$result = mysqli_query($conn, $sqlstring);
	echo "<select name='slClass' class='form-control'>
	<option value='0'>Class:</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if ($row['ClassId'] == $selectedValue) {
			echo "<option value='" . $row['ClassId']."' selected>".$row['ClassName']."</option>";
		} 
		else {
			echo "<option value='".$row['ClassName']."'>".$row['ClassName']."</option>";
		}
	}
	echo "</select>";
}
if(isset($_POST["btnEdit"])){   
	$StudentName = $_POST["txtName"];
    $StudentBirth = $_POST["txtBirthday"];
    $StudentGender = $_POST["txtClass"];
    $StudentAddress = $_POST["txtAddress"];
    $YourFatherName = $_POST["txtFather"];
    $JobFather = $_POST["txtJob1"];
    $YourMotherName = $_POST["txtMother"];
	$JobMother = $_POST["txtJob2"];
    $PhoneHouse = $_POST["txtPhone"];
    $idClass = $_POST["txtClass"];


	$sqlstring="UPDATE `Student` SET 
	StudentName = '".$StudentName."',
    StudentBirth = '".$StudentBirth."',
    StudentGender = '".$StudentGender."',
    StudentAddress  = '". $StudentAddress."',
    YourFatherName = '".$YourFatherName."',
    JobFather = '".$JobFather."',
    YourMotherName = '".$YourMotherName."',
    JobMother = '". $JobMother."',
    PhoneHouse = '".$PhoneHouse."',
	ClassId = '".$idClass."'
	 WHERE StudentCode=".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=Student"/>';
	}
?>
<div class="container">
	
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">UPDATE STUDENT</h4>
					</div>
					<div class="form-group">
						<label for="txtCode">Student Code:</label>
						<input type="text" class="form-control" id="txtCode" required name="txtCode" placeholder="Enter Student Code" readonly value='<?php echo $StudentCode  ?>'>
					</div>
                    <div class="form-group">
						<label for="txtName">Student Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Enter Student Name" value='<?php echo $StudentName  ?>'>
					</div>
                    <div class="form-group">
						<label for="txtBirthday">Birthday:</label>
						<input type="date" class="form-control" id="txtBirthday" required name="txtBirthday" placeholder="Enter Birthday" value='<?php echo  $StudentBirth ?>'>
					</div>
                    <div class="form-group">
                    <label class="radio-inline">
                    <input type="radio" name="grpGender" value="0" id="grpGender" 
                             <?php if(isset($StudentGender)&&$StudentGender=="0") { echo "checked";} ?> />
                     Male</label>

                    <label class="radio-inline"><input type="radio" name="grpGender" value="1" id="grpGender" 
                        <?php if(isset($StudentGender)&&$StudentGender=="1") { echo "checked";} ?> />
                    Female</label>
                    </div>
					
                    <div class="form-group">
                        <label for="txtAddress">Address:</label>
                    <textarea class="form-control" id="ckeditor" required name="txtAddress">
					<?php echo $StudentAddress ?>
                    </textarea>
					    </div>
                    <div class="form-group">
						<label for="txtFather">Student's Father name:</label>
						<input type="text" class="form-control" id="txtFather" required name="txtFather" placeholder="Enter Student's Father name" value='<?php echo  $YourFatherName ?>'>
					</div>
                    <div class="form-group">
						<label for="txtJob1">Job's Father:</label>
						<input type="text" class="form-control" id="txtJob1" required name="txtJob1" placeholder="Enter Job's Father" value='<?php echo  $JobFather ?>'>
					</div>
                    <div class="form-group">
						<label for="txtMother">Student's Mother name:</label>
						<input type="text" class="form-control" id="txtMother" required name="txtMother" placeholder="Enter Student's Mother name" value='<?php echo  $YourMotherName ?>'>
					</div>
                    <div class="form-group">
						<label for="txtJob2">Job's Mother:</label>
						<input type="text" class="form-control" id="txtJob2" required name="txtJob2" placeholder="Enter Job's Mother" value='<?php echo   $JobMother ?>'>
					</div>
                    <div class="form-group">
						<label for="txtPhone">Phone:</label>
						<input type="tel" class="form-control" id="txtPhone" required name="txtPhone" placeholder="Phone" value='<?php echo  $PhoneHouse ?>'>
					</div>
                    <div class="form-group">
						<label for="slClass">Class:</label>
						<?php bindUpdateClass($conn, $idClass)  ?>
					</div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>