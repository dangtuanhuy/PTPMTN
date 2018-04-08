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
		else
		{
			echo '<meta http-equiv="refresh" content="0;URL=Book.php"/>';
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
					  echo '<meta http-equiv="refresh" content="0;URL=page=imgs?ma='.$id.'">';
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
	  
	 if(isset($_GET["ImgPersonelId"]))
		{
		   $ImgPersonelId = $_GET["ImgPersonelId"];
		   $ketqua = mysqli_query($conn,"select * FROM ImgPersonel WHERE ImgPersonelId='$ImgPersonelId'");
			$row = mysqli_fetch_array($ketqua,MYSQLI_ASSOC);
			$filecanxoa = $row['ImgPersonel'];
			$PersonelCode =  $row['PersonelCode'];
			unlink("resource/".$filecanxoa);
			mysqli_query($conn,"DELETE FROM ImgPersonel WHERE ImgPersonelId=$ImgPersonelId");
			echo '<meta http-equiv="refresh" content="0;URL=updateimages.php?PersonelCode='.$PersonelCode.'"/>';
			  
		}
 ?>
 <div class="container">
 	<h2>Employee Management</h2>
			 	<form  id="frmHinhAnh" class="form-horizontal form" name="frmHinhAnh" method="post" action="" enctype="multipart/form-data" role="form">
					<div class="form-group">
                        <label for="txtMa" class="col-sm-2 control-label">Mã sách(*):  </label>
						<div class="col-sm-10">
							<input type="text" name="txtMa" id="txtMa" class="form-control" placeholder="Mã sản phẩm" value='<?php echo $_GET['id']; ?>' readonly="readonly"/>
						</div>
            		</div>	
                    <div class="form-group">    
                        <label for="txtTen" class="col-sm-2 control-label">Tên sách(*):  </label>
						<div class="col-sm-10">
						     <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value='<?php echo $ten; ?>' readonly="readonly"/> 
						</div>
                    </div>    
                     <div class="form-group">    
                        <label for="" class="col-sm-2 control-label">Hình ảnh(*):  </label>
						<div class="col-sm-10">
							<input type="file" name="fileHinhAnh" id="fileHinhAnh" class="form-control"/>
                    	</div>
                     </div>       
                     <input type="submit"  class="btn btn-primary" name="btnLuu" id="btnLuu" value="Save"/>        
                    <input type="submit"  class="btn btn-danger" name="btnClose" id="btnLuu" value="Close"/>        
				</form>
                 <!--Row du lieu-->
                 <div class="row">
                 
                 <?php
		  				$query = "select ImgPersonelId, ImgPersonel, PersonelCode from ImgPersonel where ImgPersonelId=".$PersonelCode;
                          $result = mysqli_query($conn, $query) or die(mysql_error());
                        $stt = 1;
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
						{
					?>
							<div class='col-sm-offset-2 col-sm-12'>
							  <div class='col-sm-1'>
								<?php echo $stt;?>
								</div>
							  <div class='col-sm-2'>
                              <img src="resource/CP0810_ALG.png" >
								<img src="resource/<?php echo $row['ImgPersonel'];?>" width="100px"/>
							  </div>
							  <div class='col-sm-3'>
								  <a 
                                  href="updateimages.php?ImgPersonelId=<?php echo $row['ImgPersonelId']; ?>">
								  <img src='public/images/delete.png' border='0' /></a>
							  </div>
                              
							</div>
                            <div class='col-sm-offset-2 col-sm-4'>
                           		<div><hr /></div>
                           </div>
                          <?php
							$stt++;
						 }
		  				?>
                 </div>
		</div><!--<div class="container">-->


