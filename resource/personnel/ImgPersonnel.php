		<br/>
		<?php
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$sql = "select PersonnelName from Personnel where PersonnelCode='$id'";
			$rs = mysqli_query($conn,$sql);
			$row = mysqli_fetch_row($rs);
			$ten = $row[0];
		}

		if(isset($_POST['btnLuu']))
		{
			$id = $_POST['txtMa'];
			$taptin = $_FILES['fileHinhAnh'];
			if($taptin['type']=="image/jpg" || $taptin['type']=="image/jpeg" || $taptin['type']=="image/png" 	|| $taptin['type']=="image/gif")
			{
				if($taptin['size'] <= 614400 )
				{
					$tentaptin = $id."_".$taptin['name'];
					copy($taptin['tmp_name'], "resource/".$tentaptin);
					$sqstring="insert into ImgPersonel(ImgPersonel, PersonelCode) values('$tentaptin', '$id')";
					$rs = mysqli_query($conn,$sqstring);
					if($rs)
					{
						echo "<script>alert('upload thành công...');</script>";
					}
					else 
					{
						echo "<script>alert('Upload hình không thành công...');</script>";
						echo '<meta http-equiv="refresh" content="0;URL=page=imgs?id='.$id.'">';
					}
				}
				else
				{
					echo "hình có kích thước quá lớn";
				}
			}
			else
			{
				echo "Hình không đúng định dạng";
			}	
		}

		
		?>
		<div class="container">
			<h2 class="text-center">Personnel Picture</h2>
			<form  id="frmHinhAnh" class="form-horizontal form" name="frmHinhAnh" method="post" action="" enctype="multipart/form-data" role="form">
				<div class="form-group">
					<label for="txtMa" class="col-sm-2 control-label">Personnel Code(*):  </label>
					<div class="col-sm-10">
						<input type="text" name="txtMa" id="txtMa" class="form-control" placeholder="Mã sản phẩm" value='<?php echo $_GET['id']; ?>' readonly="readonly"/>
					</div>
				</div>	
				<div class="form-group">    
					<label for="txtTen" class="col-sm-2 control-label">Personnel Name(*):  </label>
					<div class="col-sm-10">
						<input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value='<?php echo $ten; ?>' readonly="readonly"/> 
					</div>
				</div>    
				<div class="form-group">    
					<label for="" class="col-sm-2 control-label">IMG (*):  </label>
					<div class="col-sm-10">
						<input type="file" name="fileHinhAnh" id="fileHinhAnh" class="form-control"/>
					</div>
				</div>    
				<div class="form-group">     
					<div class="col-sm-10">  
						<input type="submit"  class="btn btn-primary btn-lg" name="btnLuu" id="btnLuu" value="Upload"/>        
						<input type="submit"  class="btn btn-danger btn-lg" name="btnClose" id="btnLuu" value="Close"/>  
					</div>	      
				</form>
				<hr />
				<!--Row du lieu-->
				<?php
				$query = "select ImgPersonelId, ImgPersonel, PersonelCode from ImgPersonel where PersonelCode='".$_GET['id']."'";
				$result = mysqli_query($conn, $query) or die(mysql_error());
				$stt = 1;
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
				{
					?>
					<div class="col-sm-10">  
						<span class="badge badge-info"><?php echo $stt;?> </span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="badge badge-danger"><a 
                                  href="?page=DeleteImgPersonnel&&ImgPersonelId=<?php echo $row['ImgPersonelId']; ?>"><i class="fa fa-remove"></i></a></span>
						<br/>
						<img src="resource/<?php echo $row['ImgPersonel'];?>" width="100px"/>
						<br/><br/>
					</div>
					<?php
					$stt++;
				}
				?>
			</div><!--<div class="container">-->


