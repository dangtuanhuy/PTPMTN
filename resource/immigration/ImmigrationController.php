<?php
//  Include thư viện PHPExcel_IOFactory vào
include 'Classes/PHPExcel/IOFactory.php';
// require_once 'db_connect_windsor.php';
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
      <a class="btn btn-primary" href="Wine_import_file_example.xlsx">
        <strong>File Import Example</strong> <i class="fa fa-cloud-download"></i>
      </a>
    </form>
    <hr>
  </div>

  <!-- Export Student -->
  <div id="export-student" style="width: 100%; display: none;">
    <h4>Export Student</h4>
    <form method="POST" class="form">
      <button type="submit" name="student-export" class="btn btn-primary"><i class="fa fa-cloud-download"></i> Export</button>
    </form>
    <hr>
  </div>

  <!-- Import Personnel -->
  <div id="import-personnel" style="width: 100%; display: none;">
    <h4>Import Personnel</h4>
    <form method="POST" enctype="multipart/form-data" class="form">
      <input class="form-control" type="file" name="file">
      <button type="submit" name="personnel-import" class="btn btn-default">Import</button>
      <a class="btn btn-primary" href="Wine_import_file_example.xlsx">
        <strong>File Import Example</strong> <i class="fa fa-cloud-download"></i>
      </a>
    </form>
    <hr>
  </div>

  <!-- Export Personnel -->
  <div id="export-personnel" style="width: 100%; display: none;">
    <h4>Export Personnel</h4>
    <form method="POST" class="form">
      <button type="submit" name="personnel-export" class="btn btn-primary"><i class="fa fa-cloud-download"></i> Export</button>
    </form>
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
			$winename = $rowData[$i][0][1];
			$winestrength = $rowData[$i][0][2];
			$wineshortdetails = $rowData[$i][0][3];
      $winedetails = $rowData[$i][0][4];
			$wineupdatedate = $rowData[$i][0][5];
			$winequantity = $rowData[$i][0][6];
      $winesold = $rowData[$i][0][7];
			$categoryid = $rowData[$i][0][8];
      $publisherid = $rowData[$i][0][9];
			$countryid = $rowData[$i][0][10];
			$sql = "INSERT INTO wine(winename,winestrength,wineshortdetails,winedetails,wineupdatedate,winequantity,winesold,categoryid,publisherid,countryid) VALUES ('$winename',$winestrength,'$wineshortdetails','$winedetails','$wineupdatedate',$winequantity,$winesold,$categoryid,$publisherid,$countryid)";

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
			$winename = $rowData[$i][0][1];
			$winestrength = $rowData[$i][0][2];
			$wineshortdetails = $rowData[$i][0][3];
      $winedetails = $rowData[$i][0][4];
			$wineupdatedate = $rowData[$i][0][5];
			$winequantity = $rowData[$i][0][6];
      $winesold = $rowData[$i][0][7];
			$categoryid = $rowData[$i][0][8];
      $publisherid = $rowData[$i][0][9];
			$countryid = $rowData[$i][0][10];
			$sql = "INSERT INTO wine(winename,winestrength,wineshortdetails,winedetails,wineupdatedate,winequantity,winesold,categoryid,publisherid,countryid) VALUES ('$winename',$winestrength,'$wineshortdetails','$winedetails','$wineupdatedate',$winequantity,$winesold,$categoryid,$publisherid,$countryid)";

			mysqli_query($conn, $sql);
		}
	echo "New record created successfully";
	mysqli_close($conn);
}

if(isset($_POST['student-export'])) {
  // Bước 1:
  // Lấy dữ liệu từ database
  $sql = "SELECT * FROM wine";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      $data = array();
      $number = 1;
      while($row = $result->fetch_assoc()) {
          array_push(
            $data,
            array (
              $number,
              $row["WineName"],
              $row["WineStrength"],
              $row["WineShortDetails"],
              $row["WineDetails"],
              $row["WineUpdateDate"],
              $row["WineQuantity"],
              $row["WineSold"],
              $row["CategoryId"],
              $row["PublisherId"],
              $row["CountryId"]
            )
          );
          $number++;
      }
  } else {
      echo "0 results";
  }
  $conn->close();
  // print_r($data);
  // Bước 2: Import thư viện phpexcel
  require 'Classes/PHPExcel.php';

  // Bước 3: Khởi tạo đối tượng mới và xử lý
  $PHPExcel = new PHPExcel();

  // Bước 4: Chọn sheet - sheet bắt đầu từ 0
  $PHPExcel->setActiveSheetIndex(0);

  // Bước 5: Tạo tiêu đề cho sheet hiện tại
  $PHPExcel->getActiveSheet()->setTitle('Wine');

  // Bước 6: Tạo tiêu đề cho từng cell excel,
  // Các cell của từng row bắt đầu từ A1 B1 C1 ...
  $PHPExcel->getActiveSheet()->setCellValue('A1', 'No.');
  $PHPExcel->getActiveSheet()->setCellValue('B1', 'WineName');
  $PHPExcel->getActiveSheet()->setCellValue('C1', 'WineStrength');
  $PHPExcel->getActiveSheet()->setCellValue('D1', 'WineShortDetails');
  $PHPExcel->getActiveSheet()->setCellValue('E1', 'WineDetails');
  $PHPExcel->getActiveSheet()->setCellValue('F1', 'WineUpdateDate');
  $PHPExcel->getActiveSheet()->setCellValue('G1', 'WineQuantity');
  $PHPExcel->getActiveSheet()->setCellValue('H1', 'WineSold');
  $PHPExcel->getActiveSheet()->setCellValue('I1', 'CategoryId');
  $PHPExcel->getActiveSheet()->setCellValue('J1', 'PublisherId');
  $PHPExcel->getActiveSheet()->setCellValue('K1', 'CountryId');

  // Bước 7: Lặp data và gán vào file
  // Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
  $rowNumber = 2;
  foreach ($data as $index => $item)
  {
      // A1, A2, A3, ...
      $PHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, $item[0]);

      // B1, B2, B3, ...
      $PHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item[1]);

      // C1, C2, C3, ...
      $PHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item[2]);

      // D1, D2, D3, ...
      $PHPExcel->getActiveSheet()->setCellValue('D' . $rowNumber, $item[3]);

      // E1, E2, E3, ...
      $PHPExcel->getActiveSheet()->setCellValue('E' . $rowNumber, $item[4]);

      // F1, F2, F3, ...
      $PHPExcel->getActiveSheet()->setCellValue('F' . $rowNumber, $item[5]);

      // G1, G2, G3, ...
      $PHPExcel->getActiveSheet()->setCellValue('G' . $rowNumber, $item[6]);

      // H1, H2, H3, ...
      $PHPExcel->getActiveSheet()->setCellValue('H' . $rowNumber, $item[7]);

      // I1, I2, I3, ...
      $PHPExcel->getActiveSheet()->setCellValue('I' . $rowNumber, $item[8]);

      // J1, J2, J3, ...
      $PHPExcel->getActiveSheet()->setCellValue('J' . $rowNumber, $item[9]);

      // K1, K2, K3, ...
      $PHPExcel->getActiveSheet()->setCellValue('K' . $rowNumber, $item[10]);

      // Tăng row lên để khỏi bị lưu đè
      $rowNumber++;
  }

  // Bước 8: Khởi tạo đối tượng Writer
  $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');

  // Bước 9: Trả file về cho client download
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  $filename = "Wine_export_file_".date("YmdHis").".xlsx";
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control: max-age=0');
  if (isset($objWriter)) {
      $objWriter->save('php://output');
  }
}

if(isset($_POST['personnel-export'])) {
  // Bước 1:
  // Lấy dữ liệu từ database
  $sql = "SELECT * FROM wine";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      $data = array();
      $number = 1;
      while($row = $result->fetch_assoc()) {
          array_push(
            $data,
            array (
              $number,
              $row["WineName"],
              $row["WineStrength"],
              $row["WineShortDetails"],
              $row["WineDetails"],
              $row["WineUpdateDate"],
              $row["WineQuantity"],
              $row["WineSold"],
              $row["CategoryId"],
              $row["PublisherId"],
              $row["CountryId"]
            )
          );
          $number++;
      }
  } else {
      echo "0 results";
  }
  $conn->close();
  // print_r($data);
  // Bước 2: Import thư viện phpexcel
  require 'Classes/PHPExcel.php';

  // Bước 3: Khởi tạo đối tượng mới và xử lý
  $PHPExcel = new PHPExcel();

  // Bước 4: Chọn sheet - sheet bắt đầu từ 0
  $PHPExcel->setActiveSheetIndex(0);

  // Bước 5: Tạo tiêu đề cho sheet hiện tại
  $PHPExcel->getActiveSheet()->setTitle('Wine');

  // Bước 6: Tạo tiêu đề cho từng cell excel,
  // Các cell của từng row bắt đầu từ A1 B1 C1 ...
  $PHPExcel->getActiveSheet()->setCellValue('A1', 'No.');
  $PHPExcel->getActiveSheet()->setCellValue('B1', 'WineName');
  $PHPExcel->getActiveSheet()->setCellValue('C1', 'WineStrength');
  $PHPExcel->getActiveSheet()->setCellValue('D1', 'WineShortDetails');
  $PHPExcel->getActiveSheet()->setCellValue('E1', 'WineDetails');
  $PHPExcel->getActiveSheet()->setCellValue('F1', 'WineUpdateDate');
  $PHPExcel->getActiveSheet()->setCellValue('G1', 'WineQuantity');
  $PHPExcel->getActiveSheet()->setCellValue('H1', 'WineSold');
  $PHPExcel->getActiveSheet()->setCellValue('I1', 'CategoryId');
  $PHPExcel->getActiveSheet()->setCellValue('J1', 'PublisherId');
  $PHPExcel->getActiveSheet()->setCellValue('K1', 'CountryId');

  // Bước 7: Lặp data và gán vào file
  // Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
  $rowNumber = 2;
  foreach ($data as $index => $item)
  {
      // A1, A2, A3, ...
      $PHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, $item[0]);

      // B1, B2, B3, ...
      $PHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item[1]);

      // C1, C2, C3, ...
      $PHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item[2]);

      // D1, D2, D3, ...
      $PHPExcel->getActiveSheet()->setCellValue('D' . $rowNumber, $item[3]);

      // E1, E2, E3, ...
      $PHPExcel->getActiveSheet()->setCellValue('E' . $rowNumber, $item[4]);

      // F1, F2, F3, ...
      $PHPExcel->getActiveSheet()->setCellValue('F' . $rowNumber, $item[5]);

      // G1, G2, G3, ...
      $PHPExcel->getActiveSheet()->setCellValue('G' . $rowNumber, $item[6]);

      // H1, H2, H3, ...
      $PHPExcel->getActiveSheet()->setCellValue('H' . $rowNumber, $item[7]);

      // I1, I2, I3, ...
      $PHPExcel->getActiveSheet()->setCellValue('I' . $rowNumber, $item[8]);

      // J1, J2, J3, ...
      $PHPExcel->getActiveSheet()->setCellValue('J' . $rowNumber, $item[9]);

      // K1, K2, K3, ...
      $PHPExcel->getActiveSheet()->setCellValue('K' . $rowNumber, $item[10]);

      // Tăng row lên để khỏi bị lưu đè
      $rowNumber++;
  }

  // Bước 8: Khởi tạo đối tượng Writer
  $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');

  // Bước 9: Trả file về cho client download
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  $filename = "Wine_export_file_".date("YmdHis").".xlsx";
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="'.$filename.'"');
  header('Cache-Control: max-age=0');
  if (isset($objWriter)) {
      $objWriter->save('php://output');
  }
}
?>
