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
				$num=1;
				$result = mysqli_query($conn,"SELECT * FROM `Student` JOIN `Class` ON Student.ClassId=Class.ClassId");
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					?>
					<tr>
						<td><input name="checkbox[]" type="checkbox" id="checkbox[]" class="form-control" value="<?php echo $row["StudentCode"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["StudentCode"] ?></td>
                        <td><?php echo $row["StudentName"] ?></td>
                        <td><?php echo $row["StudentBirth"] ?></td>
                        <td><?php echo $row["StudentGender"]== 0 ? "Male" : "Female" ?></td>
                        <td><?php echo $row["StudentAddress"] ?></td>
                        <td><?php echo $row["YourFatherName"] ?></td>
                        <td><?php echo $row["Job'Father"] ?></td>
                        <td><?php echo $row["YourMotherName"] ?></td>
                        <td><?php echo $row["Job'Mother"] ?></td>
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
                        <td><?php echo $row["ClassName"] ?></td>
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
