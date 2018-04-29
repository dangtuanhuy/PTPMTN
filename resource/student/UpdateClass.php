<?php
if(isset($_GET["ma"]) && isset($_GET["id"])) {
	$studentcode = $_GET["ma"];
	$classid = $_GET["id"];
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=?page=student"/>';
}
if(isset($_POST["btnUpgrade"])){
	$class_id = $_POST["ClassId"];
	$sqlstring = "UPDATE `Student` SET ClassId = '".$class_id."' WHERE StudentCode = '{$studentcode}'";
	mysqli_query($conn,$sqlstring);
		echo '<meta http-equiv="refresh" content="0;URL=?page=Student"/>';
}
?>
<div class="container">
	<form id="form1" name="form1" method="post" class="form-horizontal" >
		<div class="form-group">
			<h4 class="text-center">CHANGE CLASS FOR STUDENT</h4>
		</div>
		<div class="form-group">
			<label for="ClassId" class="control-label">Choose Class:  </label>
			<select class="form-control" name="ClassId" id="ClassId" required>
				<?php
					$sqlstringclass = "SELECT * FROM Class";
					$resultclass = mysqli_query($conn, $sqlstringclass);
					while($rowclass = mysqli_fetch_array($resultclass)) {
						if($classid == $rowclass['ClassId']) {
							echo '<option value="' . $rowclass['ClassId'] . '" selected>' . $rowclass['ClassName'] . '</option>';
						} else {
							echo '<option value="' . $rowclass['ClassId'] . '">' . $rowclass['ClassName'] . '</option>';
						}
					}
				?>
			</select>
		</div>
			<input type="submit"  class="btn btn-primary" name="btnUpgrade" id="btnUpgrade" value="Change"/>
			<input type="reset" class="btn btn-primary" name="btnCancel"  id="btnCancel" value="Cancel"  />
		</div>
	</form>
</div>
