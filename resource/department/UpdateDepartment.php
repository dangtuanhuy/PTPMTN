<?php
if(isset($_GET["ma"])){

$ma = $_GET["ma"];

$sqlstring = "SELECT `DepartmentId`, `DepartmentName`, `DepartmentDetails` FROM `Department` WHERE `DepartmentId`=".$ma;
$result = mysqli_query($conn, $sqlstring);
$row = mysqli_fetch_row($result);
$num = $rows['0'];
$departname = $row['1'];
$departdetails = $row['2'];
}
else
{
echo '<meta http-equiv="refresh" content="0;URL=?page=Department"/>';
}
if(isset($_POST["btnEdit"])){
    $departname = $_POST["txtdepart"];
    $departdetails = $_POST['txtDetails'];
	$sqlstring ="UPDATE `Department` SET 

    DepartmentName ='".$departname."',
    DepartmentDetails = '".$departdetails."'
	WHERE DepartmentId=".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=Department"/>';
	}
?>

	<div class="container">
	
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <h4 class="text-center">EDIT DEPARTMETN</h4>
        </div>
        <div class="form-group">
            <label for="txtdepart">Department names:</label>
            <input type="text" class="form-control" id="txtdepart" required name="txtdepart" value='<?php echo  $departname?>' placeholder="Enter the School Years">
        </div>
        <div class="form-group">
        <label for="txtDetails">Details:</label>
        <textarea class="form-control" id="ckeditor" required name="txtDetails" placeholder="Enter the School Years details">
        <?php echo  $departdetails ?>
        </textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
    </form>
</div>
