
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
	$CategoryId = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM `category` WHERE CategoryId=$CategoryId");
}
?>
<?php
if (isset($_POST['btnDelete'])&&isset($_POST['checkbox'])) 
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++) 
	{
		$CategoryId1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `category` WHERE CategoryId=$CategoryId=$CategoryId1");
	}
}
?>
<p>
<a   href="?page=addcate">Thêm</a>

</p>
<form>
<table border="1">
    <thead >
		<tr>
            <th><strong>Choice</strong></th>
			<th><strong>Num</strong></th>
			<th><strong>Category</strong></th>
			<th><strong>Details</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
    <tbody>
		<?php 
        $num = 1;
        $result = mysqli_query($conn,"SELECT `CategoryId`, `CategoryName`, `CategoryDescription` FROM `category`");
		while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
                    
			?>
			<tr>
            <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["CategoryId"] ?>"></td>
				<td class="col-md-1"><?php echo $num ?> </td>
				<td class="col-md-3"><?php echo $row["CategoryName"] ?> </td>
				<td class="col-md-6"><?php echo $row["CategoryDescription"] ?> </td>
				<td class="text-center col-md-2">
                <a class="btn btn-danger" href="?page=cate&ma=<?php echo $row['CategoryId']; ?>" onclick="return deleteConfirm()">
                Delete
                </a>
				|
				<a class="btn btn-danger" href="?page=Updatecate&ma=<?php echo $row['CategoryId']; ?>" >
               Update
                </a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
<br>
<input type="submit" value="Xóa Nhiều" name="btnDelete" id="btnDelete" onclick='return deleteConfirm()' class="btn btn-info"/>
</form>