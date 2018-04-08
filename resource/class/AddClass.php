<?php 
function blindGradeList($conn)
{
	$sqlSelect ="
	SELECT `GradeId`, `GradeName` FROM `Grade`";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select class='form-control' name='slGrade'>
	<option value='0'>Choice Grade</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['GradeId']."'>".$row['GradeName']."</option>";
	}
	echo "</select>";
}
?>
<?php 
$class = "";
$enrollment ="";
$idGrade="";
if(isset($_POST['btnAdd']))
{
    $class = $_POST['txtClass'];
    $enrollment = $_POST['txtEnrollment'];
    $idGrade = $_POST['slGrade'];
    $sqlInsert ="INSERT INTO `Class`(`ClassName`, `Enrollment`, `GradeId`) VALUES('$class','$enrollment','$idGrade')";
    mysqli_query($conn,$sqlInsert);
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=Class"/>';
}
?>
<div class="container">
	
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">ADD CLASS</h4>
					</div>
					<div class="form-group">
						<label for="txtClass">Class Names:</label>
						<input type="text" class="form-control" id="txtClass" required name="txtClass" placeholder="Enter the class names">
					</div>
                    <div class="form-group">
                    <label for="txtEnrollment">Enrollment:</label>
						<input type="number" class="form-control" id="txtEnrollment" required name="txtEnrollment" placeholder="Enter the class names">
                    
					</div>
                    <div class="form-group">
			            <label for="slGrade">Grade: </label>
			            <?php blindGradeList($conn) ?>
		            </div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
</div>