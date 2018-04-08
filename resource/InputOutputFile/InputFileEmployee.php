<?php
//  Include thư viện PHPExcel_IOFactory vào
include 'Classes/PHPExcel/IOFactory.php';
require_once 'db_connect_windsor.php';

if(isset($_POST['btnGui'])){
	$inputFileName = $_FILES['file']['tmp_name'];
	// $inputFileName = 'product.xlsx';

	//  Tiến hành đọc file excel
	try {
	    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	    $objPHPExcel = $objReader->load($inputFileName);
	} catch(Exception $e) {
	    die('Lỗi không thể đọc file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	//  Lấy thông tin cơ bản của file excel

	// Lấy sheet hiện tại
	$sheet = $objPHPExcel->getSheet(0);

	// Lấy tổng số dòng của file, trong trường hợp này là 6 dòng
	$highestRow = $sheet->getHighestRow();

	// Lấy tổng số cột của file, trong trường hợp này là 4 dòng
	$highestColumn = $sheet->getHighestColumn();

	// Khai báo mảng $rowData chứa dữ liệu

	//  Thực hiện việc lặp qua từng dòng của file, để lấy thông tin
	for ($row = 2; $row <= $highestRow; $row++){
	    // Lấy dữ liệu từng dòng và đưa vào mảng $rowData
	    $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE,FALSE);
	}

	for ($i = 0; $i < $highestRow - 1; $i++) {
			$employeecode = $rowData[$i][0][1];
			$employeepass = $rowData[$i][0][2];
			$employeename = $rowData[$i][0][3];
      $employeebirth = $rowData[$i][0][4];
			$employeeaddress = $rowData[$i][0][5];
			$employeeemail = $rowData[$i][0][6];
      $employeeiC = $rowData[$i][0][7];
			$roleid = $rowData[$i][0][8];
			$sql = "INSERT INTO employee(employeecode,employeepass,employeename,employeebirth,employeeaddress,employeeemail,employeeiC,roleid) VALUES ('$employeecode','$employeepass','$employeename','$employeebirth','$employeeaddress','$employeeemail','$employeeiC',$roleid)";

			mysqli_query($conn, $sql);
		}
	echo "New record created successfully";
	mysqli_close($conn);
  echo '<meta http-equiv="refresh" content="3;url=javascript:history.go(-1)">';
}
?>
<a class="btn btn-primary" href="ExampleFileImport/Employee_import_file_example.xlsx"><strong>File Import Example</strong> <i class="fa fa-cloud-download"></i></a>
<div style="width:100%">
  <br>
  <h4>Import Employee</h4>
  <br>
  <form method="POST" enctype="multipart/form-data" class="form form-inline">
    <input class="form-control" type="file" name="file">
    <button type="submit" name="btnGui" class="btn btn-default">Import</button>
  </form>
</div>
