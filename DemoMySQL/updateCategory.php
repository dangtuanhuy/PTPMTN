<?php
if(isset($_GET["ma"])){
$ma = $_GET["ma"];
$result =mysqli_query($conn ,"SELECT * FROM `category` WHERE CategoryId=".$ma);
$row = mysqli_fetch_row($result);
$num = $row[0];
$categoryName = $row[1];
$categoryDes = $row[2];
}
else
{
echo '<meta http-equiv="refresh" content="0;URL=?page=cate"/>';
}
if(isset($_POST["btnEdit"])){
    $categoryName = $_POST["txtName"];
    $categoryDes = $_POST["txtDes"];
	$sqlstring="UPDATE `category` SET  
	CategoryName = '".$categoryName."', CategoryDescription = '".$categoryDes."'
	WHERE CategoryId=".$ma;
	mysqli_query($conn,$sqlstring);
			echo '<meta http-equiv="refresh" content="0;URL=?page=cate"/>';
	}
?>
    <form method="post" >
        <label for="txtName">Category Name(*)</label>
        <input type="text" name="txtName" id="txtName" value='<?php echo $categoryName; ?>'>
        <br>
        <br>
        <label for="txtDes">Description(*)</label>
        <input type="text" name="txtDes" id="txtDes" value='<?php echo $categoryDes; ?>'>
        <br>
        <br>
        <input type="submit" name="btnEdit" value="Cập Nhật"/>
        <input type="reset" value="Nhập Lại" >
    </form>