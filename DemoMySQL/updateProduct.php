<?php 
if(isset($_GET["ma"])){
	$ma = $_GET["ma"];
	
	$sqlstring = "SELECT `ProductName`, `ProductDetails`, `ProductsUpdate`, `CategoryId` FROM `products` WHERE `ProductId`=".$ma;
	$result = mysqli_query($conn, $sqlstring);
    $row = mysqli_fetch_row($result);
    
    $productName = $row['0'];
    $productDes =$row['1'];
    $productUpdate = $row['2'];
    $idCate = $row['3'];
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=?page=pro"/>';
}
function bindUpdateCate($conn, $selectedValue) {
	$sqlstring = "SELECT `ProductId`, `ProductName`, `ProductDetails`, `ProductsUpdate`, `CategoryName` FROM `products` 
    JOIN category on category.CategoryId = products.ProductId";
	$result = mysqli_query($conn, $sqlstring);
	echo "<select name='slCate' class='form-control'>
	<option value='0'>Category:</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if ($row['CategoryId'] == $selectedValue) {
			echo "<option value='" . $row['CategoryId']."' selected>".$row['CategoryName']."</option>";
		} 
		else {
			echo "<option value='".$row['CategoryId']."'>".$row['CategoryName']."</option>";
		}
	}
	echo "</select>";
}
if(isset($_POST["btnEdit"])){
	$productName = $_POST['txtName'];
    $productDes = $_POST['txtDes'];
    $productUpdate= $_POST['dDate'];
    $idCate = $_POST['slCate'];
	$sqlstring="UPDATE `products` SET 
	ProductName ='".$productName."',
	ProductDetails = '".$productDes."',
    ProductsUpdate = '".$productUpdate."',
	CategoryId = '".$idCate."'
	 WHERE ProductId=".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=pro"/>';
	}
?>

<form method="post" >
        <label for="txtName">Products Name(*)</label>
        <input type="text" name="txtName" id="txtName" value='<?php echo $productName ; ?>'>
        <br>
        <br>
        <label for="txtDes">Description(*)</label>
        <input type="text" name="txtDes" id="txtDes" value='<?php echo $productDes ; ?>'>
        <br>
        <br>
        <label for="dDate">Update(*)</label>
        <input type="date" name="dDate" id="dDate" value='<?php echo $productUpdate ; ?>'>
        <br>
        <br>
        <label for="slCate">Category: </label>
			            <?php bindUpdateCate($conn, $idCate) ?>
                        <br>
        <br>
        <input type="submit" name="btnEdit" value="Thêm Mới"/>
        <input type="reset" value="Nhập Lại" >
</form>