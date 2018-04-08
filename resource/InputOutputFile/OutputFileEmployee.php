<?php
require_once 'db_connect_windsor.php'; // MySQLi
// Bước 1:
// Lấy dữ liệu từ database
$sql = "SELECT * FROM employee";
$result = $conn->query($sql); // MySQLi

if ($result->num_rows > 0) { // MySQLi
    // output data of each row
    $data = array();
    $number = 1;
    while($row = $result->fetch_assoc()) { // MySQLi
        array_push(
          $data,
          array (
            $number,
            $row["EmployeeCode"],
            $row["EmployeeName"],
            $row["EmployeeBirth"],
            $row["EmployeeAddress"],
            $row["EmployeeEmail"],
            $row["EmployeeIC"],
            $row["RoleId"]
          )
        );
        $number++;
    }
} else {
    echo "0 results";
}
$conn->close(); // MySQLi
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
$PHPExcel->getActiveSheet()->setCellValue('B1', 'EmployeeCode');
$PHPExcel->getActiveSheet()->setCellValue('C1', 'EmployeeName');
$PHPExcel->getActiveSheet()->setCellValue('D1', 'EmployeeBirth');
$PHPExcel->getActiveSheet()->setCellValue('E1', 'EmployeeAddress');
$PHPExcel->getActiveSheet()->setCellValue('F1', 'EmployeeEmail');
$PHPExcel->getActiveSheet()->setCellValue('G1', 'EmployeeIC');
$PHPExcel->getActiveSheet()->setCellValue('H1', 'RoleId');

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

    // Tăng row lên để khỏi bị lưu đè
    $rowNumber++;
}

// Bước 8: Khởi tạo đối tượng Writer
$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');

// Bước 9: Trả file về cho client download
date_default_timezone_set("Asia/Ho_Chi_Minh");
$filename = "Employee_export_file_".date("YmdHis").".xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
if (isset($objWriter)) {
    $objWriter->save('php://output');
}
?>
