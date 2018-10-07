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
	$PersonnelCode = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM `Personnel` WHERE PersonnelCode={$PersonnelCode}");
}
?>
<?php
if (isset($_POST['btnDelete'])&&isset($_POST['checkbox']))
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++)
	{
		$PersonnelCode1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `Personnel` WHERE PersonnelCode={$PersonnelCode1}");
	}
}
?>
<div class="container">

	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Personnel</h1>
		<p>
			<a  class="btn btn-default" href="?page=AddPersonnel">
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
					<th><strong>Personnel Code</strong></th>
                    <th><strong>Personnel Name</strong></th>
                    <th><strong>Birthday</strong></th>
                    <th><strong>Gender</strong></th>
                    <th><strong>Address</strong></th>
                    <th><strong>Phone number</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Active</strong></th>
                    <th><strong>Note</strong></th>
                    <th><strong>Position</strong></th>
                    <th><strong>Role</strong></th>
					<th></strong>Personel_Class</strong></th>
                    <th><strong>Open/Close</strong></th>
					<th><strong>IMG</strong></th>
                    <th><strong>Delete</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$num=1;
				$result = mysqli_query($conn,"SELECT * FROM `Personnel` JOIN `Role` on Personnel.RoleId = Role.RoleId JOIN `Position` ON Personnel.PositionId = Position.PositionId");
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					?>
					<tr>
						<td><input name="checkbox[]" type="checkbox" id="checkbox[]" class="form-control" value="<?php echo $row["PersonnelCode"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["PersonnelCode"] ?></td>
                        <td><?php echo $row["PersonnelName"] ?></td>
                        <td><?php echo $row["PersonnelBirth"] ?></td>
                        <td><?php echo $row["PersonnelGender"]== 0 ? "Male" : "Female" ?></td>
                        <td><?php echo $row["PersonnelAddress"] ?></td>
                        <td><?php echo $row["PersonnelNum"] ?></td>
                        <td><?php echo $row["PersonnelEmail"] ?></td>
                        <td>
						<form  method="post" >
                                            <?php
                                            if ($row["PersonnelActive"]==1){
                                                echo '<a class="btn btn-default" href="?page=ActivePersonnel&PersonnelActive='.$row["PersonnelActive"].'&PersonnelCode='.$row["PersonnelCode"].'">Active</a>';
                                            }
                                            else {
                                                echo '<a class="btn btn-default" href="?page=ActivePersonnel&PersonnelActive='.$row["PersonnelActive"].'&PersonnelCode='.$row["PersonnelCode"].'">No Active</a>';
                                            }
                                            ?>
                        </form>
						</td>
                        <td>
                        <form  method="post" >
                                            <?php
                                            if ($row["PersonnelNote"]==1){
                                                echo '<a class="btn btn-default" href="?page=ActiveNote&PersonnelNote='.$row["PersonnelNote"].'&PersonnelCode='.$row["PersonnelCode"].'">Visiting</a>';
                                            }
                                            else {
                                                echo '<a class="btn btn-default" href="?page=ActiveNote&PersonnelNote='.$row["PersonnelNote"].'&PersonnelCode='.$row["PersonnelCode"].'">Lecture</a>';
                                            }
                                            ?>
                        </form>
						</td>
                        <td><?php echo $row["PositionName"] ?></td>
                        <td><?php echo $row["RoleName"] ?></td>
						<td align='center'><a class="btn btn-default"   href="?page=Personel_Class" >
								<i class="fa fa-clipboard"></i></a></td>
                        <td>
                        <form  method="get" >
                                            <?php
                                            if ($row["PersonnelStatus"]==1){
                                                echo '<a class="btn btn-default" href="?page=OpenClose&PersonnelStatus='.$row["PersonnelStatus"].'&PersonnelCode='.$row["PersonnelCode"].'">Teaching</a>';
                                            }
                                            else {
                                                echo '<a class="btn btn-default" href="?page=OpenClose&PersonnelStatus='.$row["PersonnelStatus"].'&PersonnelCode='.$row["PersonnelCode"].'">Retirement</a>';
                                            }
                                            ?>
                        </form>
						</td>
                        <td align='center'>
							<a class="btn btn-default" href="?page=imgs&id=<?php echo $row['PersonnelCode']; ?>" >
								<i class="fa fa-image"></i></a></td>
						<!-- <td> -->
						<td align='center'>
							<a class="btn btn-default"   href="?page=Personnel&ma=<?php echo $row['PersonnelCode']; ?>" onclick="return deleteConfirm()">
								<i class="fa fa-remove"></i></a>
                        </td>
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
