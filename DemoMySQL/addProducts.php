<?php 
function blindCategoryList($conn)
{
	$sqlSelect ="
	SELECT `CategoryId`, `CategoryName`, `CategoryDescription` FROM `category`";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select class='form-control' name='slCate'>
	<option value='0'>Choice Category</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='".$row['CategoryId']."'>".$row['CategoryName']."</option>";
	}
	echo "</select>";
}
?>
<?php 
$productName = "";
$productDes ="";
$productUpdate ="";
$idCate ="";
if(isset($_POST['btnAdd']))
{
    $productName = $_POST['txtName'];
    $productDes = $_POST['txtDes'];
    $productUpdate= $_POST['dDate'];
    $idCate = $_POST['slCate'];
    $sqlInsert ="INSERT INTO `products`(`ProductName`, `ProductDetails`, `ProductsUpdate`, `CategoryId`) VALUES('$productName','$productDes','$productUpdate','$idCate')";
    mysqli_query($conn,$sqlInsert);
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=pro"/>';
}
?>
<form method="post" >
        <label for="txtName">Products Name(*)</label>
        <input type="text" name="txtName" id="txtName">
        <br>
        <br>
        <label for="txtDes">Description(*)</label>
        <input type="text" name="txtDes" id="txtDes">
        <br>
        <br>
        <label for="dDate">Update(*)</label>
        <input type="date" name="dDate" id="dDate">
        <br>
        <br>
        <label for="slCate">Category: </label>
			            <?php blindCategoryList($conn) ?>
                        <br>
        <br>
        <input type="submit" name="btnAdd" value="Thêm Mới"/>
        <input type="reset" value="Nhập Lại" >
</form>