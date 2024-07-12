<?php
require 'vendor/autoload.php';
require 'connection.php';

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'GS Token');
$sheet->setCellValue('C1', 'Date');
$sheet->setCellValue('D1', 'Student Grievance');
$sheet->setCellValue('E1', 'Student Name');
$sheet->setCellValue('F1', 'Mobile');
$sheet->setCellValue('G1', 'Email');
$sheet->setCellValue('H1', 'Address');
$sheet->setCellValue('I1', 'Student Grievance Details');
$sheet->setCellValue('J1', 'Status');
$sheet->getStyle('A1:J1')->getFont()->setBold(true);
// $sheet->getStyle('A1:J1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); 

$sql = "SELECT * FROM complaints";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i = 2;
    while ($row = $result->fetch_assoc()) {
        $date_string = $row['created_at'];
        $date = new DateTime($date_string);
        
        $id = $row['id'];
        $gs_token = $row['gs_token'];
        $date = date_format($date, 'd-m-Y');
        $student_grievance = $row['student_grievance'];
        $student_name = $row['student_name'];
        $mobile = $row['mobile_no'];
        $email = $row['email'];
        $correspondance_address = ucwords($row['correspondance_address']) . ", " . ucwords($row['city']) . ", " . ucwords($row['state']) . ", " . $row['pin'] . ", " . $row['country'];
        $student_grievance_details = $row['student_grievance_details'];
        $status = $row['status'];
        $sheet->setCellValue('A' . $i, $id);
        $sheet->setCellValue('B' . $i, $gs_token);
        $sheet->setCellValue('C' . $i, $date);
        $sheet->setCellValue('D' . $i, $student_grievance);
        $sheet->setCellValue('E' . $i, $student_name);
        $sheet->setCellValue('F' . $i, $mobile);
        $sheet->setCellValue('G' . $i, $email);
        $sheet->setCellValue('H' . $i, $correspondance_address);
        $sheet->setCellValue('I' . $i, $student_grievance_details);
        $sheet->setCellValue('J' . $i, $status);
        $i++;
    }
}
// $writer = new Xlsx($spreadsheet);
// $writer->save('php://output');
// $writer->save('./excel/closed-complaint-report.xlsx');
// $headers = [
//     'Content-Type' => 'application/excel',
// ];
// response()->download("./excel/closed-complaint-report.xlsx", 'closed-complaint-report.xlsx', $headers);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="complaint-report.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('./excel/complaint-report.xlsx');
$writer->save('php://output');
exit;




?>