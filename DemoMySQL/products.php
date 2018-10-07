 <!-- Xử lý Products -->
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
	$ProductId = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM `products` WHERE ProductId=$ProductId");
}
?>
<?php
if (isset($_POST['btnDelete'])&&isset($_POST['checkbox'])) 
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++) 
	{
		$ProductId1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `products` WHERE ProductId=$ProductId1");
	}
}
?>
<p>
<a   href="?page=addpro">Thêm</a>

</p>
<form>
<table border="1">
    <thead >
		<tr>
            <th><strong>Choice</strong></th>
			<th><strong>Num</strong></th>
			<th><strong>Products Name</strong></th>
			<th><strong>Description</strong></th>
      <th><strong>Update </strong></th>
			<th><strong>Category</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
    <tbody>
		<?php 
        $num = 1;
        $result = mysqli_query($conn,
        "SELECT `ProductId`, `ProductName`, `ProductDetails`, `ProductsUpdate`, `CategoryName` FROM `products` 
        JOIN category on category.CategoryId = products.ProductId");
		while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
                    
			?>
			<tr>
            <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["CategoryId"] ?>"></td>
				<td class="col-md-1"><?php echo $num ?> </td>
				<td class="col-md-3"><?php echo $row["ProductName"] ?> </td>
				<td class="col-md-6"><?php echo $row["ProductDetails"] ?> </td>
        <td class="col-md-3"><?php echo $row["ProductsUpdate"] ?> </td>
				<td class="col-md-6"><?php echo $row["CategoryName"] ?> </td>
				<td class="text-center col-md-2">
                <a class="btn btn-danger" href="?page=pro&ma=<?php echo $row['ProductId']; ?>" onclick="return deleteConfirm()">
                Delete
                </a>
				|
				<a class="btn btn-danger" href="?page=Updatepro&ma=<?php echo $row['ProductId']; ?>" >
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