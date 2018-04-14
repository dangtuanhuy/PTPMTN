<?php
if(isset($_GET["ImgPersonelId"]))
{
	$ImgPersonelId = $_GET["ImgPersonelId"];
	$query= "select * FROM ImgPersonel WHERE ImgPersonelId='".$ImgPersonelId."'";
	$ketqua = mysqli_query($conn,$query);
	while ($row = $ketqua->fetch_assoc()) {
		$filecanxoa = $row['ImgPersonel'];
		$PersonelCode =  $row['PersonelCode'];
	}
	unlink("resource/".$filecanxoa);
	mysqli_query($conn,"DELETE FROM ImgPersonel WHERE ImgPersonelId='".$ImgPersonelId."'");
	echo "<script>window.location.href='?page=imgs&id=".$PersonelCode."'</script>";
}
?>