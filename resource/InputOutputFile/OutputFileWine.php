<?php
require_once 'db_connect_windsor.php';
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
?>
