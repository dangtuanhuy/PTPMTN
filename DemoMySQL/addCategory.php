<?php 
$name= "";
$description ="";
if(isset($_POST["btnAdd"]))
{
	$name = $_POST["txtName"];
	$description = $_POST["txtDes"];
    $insert = "INSERT INTO category(`CategoryName`, `CategoryDescription`) VALUES ('$name','$description')";
    mysqli_query($conn,$insert);
	echo '<script> alert("Insert Success!");</script>';
	echo "<script>window.location.href='?page=cate'</script>";
}
?>

<form method="post" >
        <label for="txtName">Category Name(*)</label>
        <input type="text" name="txtName" id="txtName">
        <br>
        <br>
        <label for="txtDes">Description(*)</label>
        <input type="text" name="txtDes" id="txtDes">
        <br>
        <br>
        <input type="submit" name="btnAdd" value="Thêm Mới"/>
        <input type="reset" value="Nhập Lại" >
</form>