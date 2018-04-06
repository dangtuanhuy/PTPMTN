<?php
if(isset($_GET["ma"])){

$ma = $_GET["ma"];

$sqlstring = "SELECT `SchoolYearsId`, `SchoolYears`, `Details` FROM `SchoolYears` WHERE `SchoolYearsId`=".$ma;
$result = mysqli_query($conn, $sqlstring);
$row = mysqli_fetch_row($result);
$num = $rows['0'];
$school = $row['1'];
$details = $row['2'];
}
else
{
echo '<meta http-equiv="refresh" content="0;URL=?page=grade"/>';
}
if(isset($_POST["btnEdit"])){
    $school= $_POST["txtSchool"];
    $details = $_POST['txtDetails'];
	$sqlstring="UPDATE `SchoolYears` SET 

    SchoolYears='".$gradename."',
    Details = '".$details."'
	WHERE SchoolYearsId=".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=SchoolYears"/>';
	}
?>

	<div class="container">
	
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <h4 class="text-center">EDIT SCHOOL YEARS</h4>
        </div>
        <div class="form-group">
            <label for="txtSchool">School Years:</label>
            <input type="text" class="form-control" id="txtSchool" required name="txtSchool" value='<?php echo  $school?>' placeholder="Enter the School Years">
        </div>
        <div class="form-group">
        <label for="txtDetails">Details:</label>
        <textarea class="form-control" id="ckeditor" required name="txtDetails" placeholder="Enter the School Years details">
        <?php echo  $details?>
        </textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
    </form>
</div>
