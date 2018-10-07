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
	$DepartmentId = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM `Department` WHERE `DepartmentId`=$DepartmentId");
}
?>
<?php
if (isset($_POST['btnDelete'])&&isset($_POST['checkbox'])) 
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++) 
	{
		$DepartmentId1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `Department` WHERE `DepartmentId`=$DepartmentId1");
	}
}
?>
<div class="container">

	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Department</h1>
		<p>
			<a  class="btn btn-default" href="?page=AddDepartment">
				<i class="fa fa-plus"></i>
			</a>
		</p>
		<table class="table-striped table-responsive table-bordered" id="myTable">
			<thead>
				<tr>
					<th ><strong>Choice</strong></th>
					<th ><strong>No</strong></th>
					<th ><strong>Department Names</strong></th>
                    <th class="col-md-7"><strong>Details</strong></th>
					<th class="col-md-1"><strong>Delete</strong></th>
					<th class="col-md-1"><strong>Update</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$num=1;
				$result = mysqli_query($conn,"SELECT * FROM `Department` ");
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					?>
					<tr>
						<td><input name="checkbox[]" type="checkbox" id="checkbox[]" class="form-control" value="<?php echo $row["DepartmentId"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["DepartmentName"] ?></td>
                        <td><?php echo $row["DepartmentDetails"] ?></td>
						<td align='center'>
							<a class="btn btn-default"   href="?page=Department&ma=<?php echo $row['DepartmentId']; ?>" onclick="return deleteConfirm()">
								<i class="fa fa-remove"></i></a>
							</td>
							<td>
								<a class="btn btn-default" href="?page=UpdateDepartment&ma=<?php
								echo $row['DepartmentId'];?>"><i class="fa fa-share"></i></a>
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