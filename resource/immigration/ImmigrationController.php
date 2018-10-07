<?php
//  Include thư viện PHPExcel_IOFactory vào
include 'Classes/PHPExcel/IOFactory.php';
require_once 'connect.php';
?>
<div class="container" onload="showPage('import-student'); return false;">
  <h1 class="text-center">Import/Export Management</h1>
  <button class="btn btn-default" onclick="window.history.go(-1); return false;">Return Back <i class="fa fa-backward"></i></button>
  <button class="btn btn-info" onclick="showPage('import-student'); return false;">
    Import Student <i class="fa fa-upload"></i>
  </button>
  <button class="btn btn-success" onclick="showPage('export-student'); return false;">
    Export Student <i class="fa fa-download"></i>
  </button>
  <button class="btn btn-info" onclick="showPage('import-personnel'); return false;">
    Import Personnel <i class="fa fa-upload"></i>
  </button>
  <button class="btn btn-success" onclick="showPage('export-personnel'); return false;">
    Export Personnel <i class="fa fa-download"></i>
  </button>
  <hr>

  <!-- Import Student -->
  <div id="import-student" style="width: 100%; display: none;">
    <h4>Import Student</h4>
    <form method="POST" enctype="multipart/form-data" class="form">
      <input class="form-control" type="file" name="file">
      <button type="submit" name="student-import" class="btn btn-default">Import</button>
      <a class="btn btn-primary" href="/CT249/resource/immigration/Student_import_file_example.xlsx">
        <strong>File Import Example</strong> <i class="fa fa-cloud-download"></i>
      </a>
    </form>
    <hr>
  </div>

  <!-- Export Student -->
  <div id="export-student" style="width: 100%; display: none;">
    <h4>Export Student</h4>
    <fieldset>
      <center>
        <h5>You want export data of Student. Click Download to receive export file!</h5>
        <a type="button" href="/CT249/resource/immigration/export_student.php" class="btn btn-primary">
          <i class="fa fa-cloud-download"></i> Download
        </a>
      </center>
    </fieldset>
    <hr>
  </div>

  <!-- Import Personnel -->
  <div id="import-personnel" style="width: 100%; display: none;">
    <h4>Import Personnel</h4>
    <form method="POST" enctype="multipart/form-data" class="form">
      <input class="form-control" type="file" name="file">
      <button type="submit" name="personnel-import" class="btn btn-default">Import</button>
      <a class="btn btn-primary" href="/CT249/resource/immigration/Personnel_import_file_example.xlsx">
        <strong>File Import Example</strong> <i class="fa fa-cloud-download"></i>
      </a>
    </form>
    <hr>
  </div>

  <!-- Export Personnel -->
  <div id="export-personnel" style="width: 100%; display: none;">
    <h4>Export Personnel</h4>
    <fieldset>
      <center>
        <h5>You want export data of Personnel. Click Download to receive export file!</h5>
        <a type="button" href="/CT249/resource/immigration/export_personnel.php" class="btn btn-primary">
          <i class="fa fa-cloud-download"></i> Download
        </a>
      </center>
    </fieldset>
    <hr>
  </div>
</div>

<script type="text/javascript">
  // list div hidden
  var divId = ['import-student','export-student','import-personnel','export-personnel'];

  // Hàm hiển thị vùng nội dung
  function showPage(id) {
    for (i=0; i<divId.length; i++) {
      document.getElementById(divId[i]).style.display = 'none';
    }
    // show the table by id
    document.getElementById(id).style.display = 'block';
  }
</script>

<?php
// // Start
if(isset($_POST['student-import'])){
	$inputFileName = $_FILES['file']['tmp_name'];

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
			$StudentCode = $rowData[$i][0][1];
			$StudentName = $rowData[$i][0][2];
			$StudentBirth = $rowData[$i][0][3];
      $StudentGender = $rowData[$i][0][4];
			$StudentAddress = $rowData[$i][0][5];
			$YourFatherName = $rowData[$i][0][6];
      $JobFather = $rowData[$i][0][7];
			$YourMotherName = $rowData[$i][0][8];
      $JobMother = $rowData[$i][0][9];
      $PhoneHouse = $rowData[$i][0][10];
      $StudentStatus = $rowData[$i][0][11];
			$ClassId = $rowData[$i][0][12];
			$sql = "INSERT INTO student VALUES ('$StudentCode','$StudentName','$StudentBirth',$StudentGender,'$StudentAddress','$YourFatherName','$JobFather','$YourMotherName','$JobMother','$PhoneHouse',$StudentStatus,$ClassId)";

			mysqli_query($conn, $sql);
		}
	echo "New record created successfully";
	mysqli_close($conn);
}

if(isset($_POST['personnel-import'])){
	$inputFileName = $_FILES['file']['tmp_name'];

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
			$PersonnelCode = $rowData[$i][0][1];
			$PersonnelName = $rowData[$i][0][2];
			$PersonnelPass = $rowData[$i][0][3];
      $PersonnelBirth = $rowData[$i][0][4];
			$PersonnelGender = $rowData[$i][0][5];
			$PersonnelAddress = $rowData[$i][0][6];
      $PersonnelNum = $rowData[$i][0][7];
			$PersonnelEmail = $rowData[$i][0][8];
      $PersonnelActive = $rowData[$i][0][9];
      $PersonnelNote = $rowData[$i][0][10];
      $PositionId = $rowData[$i][0][11];
      $RoleId = $rowData[$i][0][12];
			$PersonnelStatus = $rowData[$i][0][13];
			$sql = "INSERT INTO personnel VALUES ('$PersonnelCode','$PersonnelName','$PersonnelPass','$PersonnelBirth',$PersonnelGender,'$PersonnelAddress','$PersonnelNum','$PersonnelEmail',$PersonnelActive,$PersonnelNote,$PositionId,$RoleId,$PersonnelStatus)";

			mysqli_query($conn, $sql);
		}
	echo "New record created successfully";
	mysqli_close($conn);
}
?>
