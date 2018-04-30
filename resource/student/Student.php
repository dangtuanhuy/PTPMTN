<script type="text/javascript">
	function deleteConfirm()
	{
		if(confirm("Are you sure delete!")){
			return true;
		}
		else{
			return false;
		}
	}
</script>
<!-- Lệnh Delete -->

<?php
if(isset($_GET["ma"]))
{
	$StudentCode = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM Student WHERE StudentCode='{$StudentCode}'");
}
?>
<?php
if (isset($_POST['btnDelete'])&&isset($_POST['checkbox']))
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++)
	{
		$StudentCode1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `Student` WHERE `StudentCode`='{$StudentCode1}'");
	}
}
?>
<div class="container">

	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Student</h1>
		<p>
			<a  class="btn btn-default" href="?page=AddStudent">
				<i class="fa fa-plus"></i>
			</a>
			<a  class="btn btn-default" href="?page=ie">
				<i class="fa fa-cloud"> Import/Export</i>
			</a>
		</p>
		<table class="table-striped table-responsive table-bordered" id="myTable">
			<thead>
				<tr>
					<th><strong>Choice</strong></th>
					<th><strong>No</strong></th>
					<th><strong>Student Code</strong></th>
                    <th><strong>Student Name</strong></th>
                    <th><strong>Birthday</strong></th>
                    <th><strong>Gender</strong></th>
                    <th><strong>Address</strong></th>
                    <th><strong>Father</strong></th>
                    <th><strong>Job's Father</strong></th>
                    <th><strong>Mother</strong></th>
                    <th><strong>Job's Mother</strong></th>
                    <th><strong>Phone</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>Class</strong></th>
                    <th><strong>IMG</strong></th>
					<th><strong>Delete</strong></th>
					<th><strong>Update</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php
				function monthOld($dob) {
					// Get today
					$today = date('Y-m-d',time());

					// Convert day follow format
					$yearRecent = date('Y',time());
					$monthRecent = date('m',time());
					$dayRecent = date('d',time());

					// Convert birthday follow format
					$yearBirth = date('Y',strtotime($dob));
					$monthBirth = date('m',strtotime($dob));
					$dayBirth = date('d',strtotime($dob));

					// Calculate old
					$yearOldAsMonth = ($yearRecent - $yearBirth)*12;
					$monthOld = ($monthRecent - $monthBirth);
					$dayOldAsMonth = ($dayRecent - $dayBirth)/30;

					// Return value
					return ($yearOldAsMonth + $monthOld + $dayOldAsMonth);
				}
				$num=1;
				// $result = mysqli_query($conn,"SELECT * FROM `Student` JOIN `Class` ON Student.ClassId=Class.ClassId");
				$result = mysqli_query($conn,"SELECT * FROM Student s, Class c, Grade g WHERE s.ClassId = c.ClassId AND c.GradeId = g.GradeId");
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))	{ ?>
					<tr>
						<td><input name="checkbox[]" type="checkbox" id="checkbox[]" class="form-control" value="<?php echo $row["StudentCode"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["StudentCode"] ?></td>
                        <td><?php echo $row["StudentName"] ?></td>
                        <td><?php echo $row["StudentBirth"] ?></td>
                        <td><?php echo $row["StudentGender"]== 0 ? "Male" : "Female" ?></td>
                        <td><?php echo $row["StudentAddress"] ?></td>
                        <td><?php echo $row["YourFatherName"] ?></td>
                        <td><?php echo $row["JobFather"] ?></td>
                        <td><?php echo $row["YourMotherName"] ?></td>
                        <td><?php echo $row["JobMother"] ?></td>
                        <td><?php echo $row["PhoneHouse"] ?></td>

                        <td>
													<form  method="post" >
							            <?php
								            if ($row["StudentStatus"]==1){
								               echo '<a class="btn btn-default" href="?page=ActiveStudent&StudentStatus='.$row["StudentStatus"].'&StudentCode='.$row["StudentCode"].'">Learning</a>';
								            }
								            else {
								               echo '<a class="btn btn-default" href="?page=ActiveStudent&StudentStatus='.$row["StudentStatus"].'&StudentCode='.$row["StudentCode"].'">Stop learning</a>';
								            }
							            ?>
							            </form>
												</td>
												<?php
													if(in_array('upgrade', $role_details_arr)) {
														if(monthOld($row["StudentBirth"]) < 18) {
															echo '<td><a class="button" style="text-decoration:none" title="Inform parents to take care of their baby at home up to 18 months!">'.$row["ClassName"].'</a></td>';
														} else if(monthOld($row["StudentBirth"]) < 24 && ($row["GradeName"] != 'Group24')) {
															echo '<td><a class="button" style="text-decoration:none" href="?page=UpdateStudentClass&ma='. $row['StudentCode'] . '&id='. $row['ClassId'] . '" title="Please the transition to group of 24 to 36 month old!">'.$row["ClassName"].'</a></td>';
														} else if(monthOld($row["StudentBirth"]) < 24 && ($row["GradeName"] == 'Group24')) {
															echo '<td>'.$row["ClassName"].'</td>';
														} else if(monthOld($row["StudentBirth"]) < 36 && ($row["GradeName"] != 'Group36')) {
															echo '<td><a class="button" style="text-decoration:none" href="?page=UpdateStudentClass&ma='. $row['StudentCode'] . '&id='. $row['ClassId'] . '" title="Please the transition to group of 24 to 36 month old!">'.$row["ClassName"].'</a></td>';
														} else if(monthOld($row["StudentBirth"]) < 36 && ($row["GradeName"] == 'Group36')) {
															echo '<td>'.$row["ClassName"].'</td>';
														} else if(monthOld($row["StudentBirth"]) < 48 && ($row["GradeName"] != 'Pre1')) {
															echo '<td><a class="button" style="text-decoration:none" href="?page=UpdateStudentClass&ma='. $row['StudentCode'] . '&id='. $row['ClassId'] . '" title="Please the transition to preschool I!">'.$row["ClassName"].'</a></td>';
														} else if(monthOld($row["StudentBirth"]) < 48 && ($row["GradeName"] == 'Pre1')) {
															echo '<td>'.$row["ClassName"].'</td>';
														} else if(monthOld($row["StudentBirth"]) < 60 && ($row["GradeName"] != 'Pre2')) {
															echo '<td><a class="button" style="text-decoration:none" href="?page=UpdateStudentClass&ma='. $row['StudentCode'] . '&id='. $row['ClassId'] . '" title="Please the transition to preschool II!">'.$row["ClassName"].'</a></td>';
														} else if(monthOld($row["StudentBirth"]) < 60 && ($row["GradeName"] == 'Pre2')) {
															echo '<td>'.$row["ClassName"].'</td>';
														} else if(monthOld($row["StudentBirth"]) < 72 && ($row["GradeName"] != 'Pre3')) {
															echo '<td><a class="button" style="text-decoration:none" href="?page=UpdateStudentClass&ma='. $row['StudentCode'] . '&id='. $row['ClassId'] . '&id='. $row['ClassId'] . '" title="Please the transition to preschool III!">'.$row["ClassName"].'</a></td>';
														} else if(monthOld($row["StudentBirth"]) < 72 && ($row["GradeName"] == 'Pre3')) {
															echo '<td>'.$row["ClassName"].'</td>';
														} else if(monthOld($row["StudentBirth"]) > 72) {
															echo '<td><a class="button" style="text-decoration:none" href="?page=UpdateStudentClass&ma='. $row['StudentCode'] . '&id='. $row['ClassId'] . '" title="Please inform the parent of this child about the transition to primary school age!">'.$row["ClassName"].'</a></td>';
														} else {
															echo '<td>'.$row["ClassName"].'</td>';
														}
													} else {
														echo '<td>'.$row["ClassName"].'</td>';
													}
												?>
                        <td align='center'>
							<a class="btn btn-default"   href="#" >
								<i class="fa fa-image"></i></a></td>
						<!-- <td> -->
						<td align='center'>
							<a class="btn btn-default"   href="?page=Student&ma=<?php echo $row['StudentCode']; ?>" onclick="return deleteConfirm()">
								<i class="fa fa-remove"></i></a>
                        </td>
						<td align='center'>
								<a class="btn btn-default" href="?page=UpdateStudent&ma=<?php
								echo $row['StudentCode'];?>"><i class="fa fa-share"></i></a></td>
						</tr>
						<?php
						$num++;
					}
					?>
				</tbody>
			</table>
			<div class="row" style="background-color:#FFF"><!--Nút chức nang-->
				<div class="col-md-12">
					<input type="submit" value="Delete Choice" name="btnDelete" id="btnDelete" onclick='return deleteConfirm()' class="btn btn-info"/>

				</div>
			</div>
		</form>
	</div>
