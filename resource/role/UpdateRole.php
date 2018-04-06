<?php
if(isset($_GET["ma"])){

$ma = $_GET["ma"];

$sqlstring = "SELECT `RoleId`, `RoleName`, `RoleDescription` FROM `Role` WHERE RoleId=".$ma;
$result = mysqli_query($conn, $sqlstring);
$row = mysqli_fetch_row($result);
$num = $rows['0'];
$rolename = $row['1'];
$roledetails = $row['2'];
}
else
{
echo '<meta http-equiv="refresh" content="0;URL=?page=Role"/>';
}
if(isset($_POST["btnEdit"])){
    $rolename  = $_POST["txtrole"];
    $roledetails = $_POST['txtDetails'];
	$sqlstring ="UPDATE `Role` SET 

    RoleName ='".$rolename."',
    RoleDescription = '".$roledetails."'
	WHERE RoleId =".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=Role"/>';
	}
?>

	<div class="container">
	
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <h4 class="text-center">EDIT DEPARTMETN</h4>
        </div>
        <div class="form-group">
            <label for="txtrole">Role names:</label>
            <input type="text" class="form-control" id="txtrole" required name="txtrole" value='<?php echo  $rolename ?>' placeholder="Enter the role name">
        </div>
        <div class="form-group">
        <label for="txtDetails">Details:</label>
        <textarea class="form-control" id="ckeditor" required name="txtDetails" placeholder="Enter role details">
        <?php echo  $roledetails  ?>
        </textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
        <input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
    </form>
</div>
