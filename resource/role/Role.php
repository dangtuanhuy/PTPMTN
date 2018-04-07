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
	$RoleId = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM `Role` WHERE `RoleId`=$RoleId");
}
?>
<?php
if (isset($_POST['btnDelete'])&&isset($_POST['checkbox'])) 
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++) 
	{
		$RoleId1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `Role` WHERE `RoleId`=$RoleId1");
	}
}
?>
<div class="container">

	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Role</h1>
		<p>
			<a  class="btn btn-default" href="?page=AddRole">
				<i class="fa fa-plus"></i>
			</a>

		</p>
		<table class="table-striped table-responsive table-bordered" id="myTable">
			<thead>
				<tr>
					<th ><strong>Choice</strong></th>
					<th ><strong>No</strong></th>
					<th ><strong>Role Name</strong></th>
                    <th class="col-md-8"><strong>Role Description</strong></th>
					<th class="col-md-2"><strong>Delete</strong></th>
					<th class="col-md-2"><strong>Update</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$num=1;
				$result = mysqli_query($conn,"SELECT * FROM `Role`");
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					?>
					<tr>
						<td><input name="checkbox[]" type="checkbox" id="checkbox[]"  class="form-control" value="<?php echo $row["RoleId"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["RoleName"] ?></td>
                        <td><?php echo $row["RoleDescription"] ?></td>
						<td align='center'>
							<a class="btn btn-default"   href="?page=Role&ma=<?php echo $row['RoleId']; ?>" onclick="return deleteConfirm()">
								<i class="fa fa-remove"></i></a>
							</td>
							<td>
								<a class="btn btn-default" href="?page=UpdateRole&ma=<?php
								echo $row['RoleId'];?>"><i class="fa fa-share"></i></a>
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