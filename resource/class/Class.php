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
	$ClassId = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM `Class` WHERE `ClassId`=$ClassId");
}
?>
<?php
if (isset($_POST['btnDelete'])&&isset($_POST['checkbox'])) 
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++) 
	{
		$ClassId1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `Class` WHERE `ClassId`=$ClassId1");
	}
}
?>
<div class="container">

	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Class</h1>
		<p>
			<a  class="btn btn-default" href="?page=AddClass">
				<i class="fa fa-plus"></i>
			</a>
		</p>
		<table class="table-striped table-responsive table-bordered" id="myTable">
			<thead>
				<tr>
					<th class='col-1'><strong>Choice</strong></th>
					<th class='col-1'><strong>No</strong></th>
					<th class='col-3'><strong>Class Names</strong></th>
                    <th class='col-2'><strong>Enrollment</strong></th>
                    <th class='col-1'><strong>Grade Names</strong></th>
                    <th class='col-2'><strong>Status</strong></th>
					<th class='col-1'><strong>Delete</strong></th>
					<th class='col-1'><strong>Update</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$num=1;
				$result = mysqli_query($conn,"SELECT `ClassId`,`ClassName`,`Enrollment`,`ClassStatus`, `GradeName` FROM `Class` c
                JOIN Grade g ON c.GradeId= g.GradeId");
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					?>
					<tr>
						<td><input name="checkbox[]" type="checkbox" id="checkbox[]" class="form-control" value="<?php echo $row["ClassId"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["ClassName"] ?></td>
                        <td><?php echo $row["Enrollment"] ?></td>
                        <td><?php echo $row["GradeName"] ?></td>
                        <td><?php echo $row["ClassStatus"] ?></td>
						<td align='center'>
							<a class="btn btn-default"   href="?page=Class&ma=<?php echo $row['SchoolYearsId']; ?>" onclick="return deleteConfirm()">
								<i class="fa fa-remove"></i></a>
							</td>
							<td>
								<a class="btn btn-default" href="?page=UpdateClass&ma=<?php
								echo $row['ClassId'];?>"><i class="fa fa-share"></i></a>
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