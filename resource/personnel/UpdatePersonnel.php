<?php
$query = "SELECT `PersonnelEmail`,`PersonnelName`,`PersonnelAddress`,`PersonnelNum`
			FROM Personnel
			WHERE PersonnelCode = '" . $_SESSION['Username'] . "'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$tendangnhap = $_SESSION['Username'];
	$email = $row["PersonnelEmail"];
	$hoten = $row["PersonnelName"];
	$diachi = $row["PersonnelAddress"];
	$dienthoai = $row["PersonnelNum"];

//Cap nhat giang vien khi nhan vao nut cap nhat
if(isset($_POST['btnCapNhat'])){
	$query = "SELECT `PersonnelEmail`,`PersonnelName`,`PersonnelAddress`,`PersonnelNum`
			FROM Personnel
			WHERE PersonnelCode = '" . $_SESSION['Username'] . "'";

    $result = mysqli_query($conn, $query) or die(mysql_error());
	$row = mysqli_fetch_row($result);
	if($_POST['txtMatKhau1']!="")
	{
		$matkhau = $_POST['txtMatKhau1'];
	}
	$hoten = $_POST['txtHoTen'];
	$diachi = $_POST['txtDiaChi'];
	$dienthoai = $_POST['txtDienThoai'];

	$kiemtra = kiemTra();
	if($kiemtra == ""){
		//Giao vien co thay doi mat khau
		if($_POST['txtMatKhau1']!=""){
			mysqli_query($conn, "UPDATE Personnel
					SET PersonnelName = '".$hoten."', PersonnelAddress ='".$diachi."',
					PersonnelNum ='".$dienthoai."', PersonnelPass ='".md5($_POST['txtMatKhau1'])."'
					WHERE PersonnelCode = '" . $_SESSION['Username'] . "'")
					or die(mysqli_error());
		}
		//Giao vien khong thay doi mat khau
		else{ mysqli_query($conn, "UPDATE Personnel
					SET PersonnelName = '".$hoten."', PersonnelAddress ='".$diachi."',
					PersonnelNum = '".$dienthoai."'
					WHERE PersonnelCode = '" . $_SESSION['Username'] . "'")
					or die(mysqli_error());
		}
		echo "<script>alert('Update Success!');window.location='Index.php';</script>";
	}else{
		echo $kiemtra;
	}
}

function kiemTra(){
	if($_POST['txtHoTen']==""||$_POST['txtDiaChi']==""){
		return "<p >Please enter full information.</p>";
	}
	elseif($_POST['txtMatKhau1']!=$_POST['txtMatKhau2'])
	{
		return "<p >The two passwords must be identical.</p>";
	}
	elseif(strlen($_POST['txtMatKhau1'])<=5 && strlen($_POST['txtMatKhau1'])>0){
		return "<p >Passwords must be greater than 5 characters. </p>";
	}
	else{
		return "";
	}
}
?>
<div class="container">
	<div class="col">
		<h2 class="text-center py-3">Update personal information</h2>
		<hr>
		<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="lblTenDangNhap" class="col control-label">Personnal Code(*):  </label>
				<div class="col-sm-10">
					<input class="form-control" style="font-weight:400" value="<?php echo $tendangnhap; ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="lblEmail" class="col control-label">Email(*):  </label>
				<div class="col-sm-10">
					<input class="form-control" style="font-weight:400" value="<?php echo $email; ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="lblMatKhau1" class="col control-label">New Password(*):  </label>
				<div class="col-sm-10">
					<input type="password" name="txtMatKhau1" id="txtMatKhau1" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label for="lblMatKhau2" class="col control-label">Repeat New Password(*):  </label>
				<div class="col-sm-10">
						<input type="password" name="txtMatKhau2" id="txtMatKhau2" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label for="lblHoten" class="col control-label">Full Name(*):  </label>
				<div class="col-sm-10">
						<input type="text" name="txtHoTen" id="txtHoTen" value="<?php echo $hoten; ?>" class="form-control" placeholder="Giá"/>
				</div>
			</div>
			<div class="form-group">
				<label for="lblDiaChi" class="col control-label">Address(*):  </label>
				<div class="col-sm-10">
					<input type="text" name="txtDiaChi" id="txtDiaChi" value="<?php if(isset($diachi)) echo $diachi; ?>" class="form-control" placeholder="Địa chỉ"/>
				</div>
			</div>
			<div class="form-group">
				<label for="lblDienThoai" class="col control-label">Phone(*):  </label>
				<div class="col-sm-10">
						<input type="text" name="txtDienThoai" id="txtDienThoai" value="<?php if(isset($dienthoai)) echo $dienthoai; ?>" class="form-control" placeholder="Điện thoại" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10">
					<input type="submit"  class="btn btn-primary text-center" name="btnCapNhat" id="btnCapNhat" value="Update"/>
				</div>
			</div>
		</form>
	</div>
</div>