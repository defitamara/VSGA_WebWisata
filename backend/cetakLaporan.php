<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// sheet pertama
$sheet->setTitle('Data Pengunjung');
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama Pengunjung');
$sheet->setCellValue('C1', 'Tanggal');
$sheet->setCellValue('D1', 'Alamat');
$sheet->setCellValue('E1', 'Jenis Kelamin');
$sheet->setCellValue('F1', 'Usia');
$sheet->setCellValue('G1', 'Agama');
$sheet->setCellValue('H1', 'Testimoni');

// Mengambil data pengunjung dari database
include '../koneksi.php';
$query = "SELECT * from pengunjung";
$query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
$nomor = 1;
$row = 2;  
while($data = mysqli_fetch_array($query_mysql)){
    $sheet->setCellValue('A'.$row, $nomor++);
    $sheet->setCellValue('B'.$row, $data['nama_pengunjung']);
    $sheet->setCellValue('C'.$row, date('d-m-Y', strtotime($data["tanggal"])));
    $sheet->setCellValue('D'.$row, $data['alamat']);
    $sheet->setCellValue('E'.$row, $data['jenis_kelamin']);
    $sheet->setCellValue('F'.$row, $data['usia']);
    $sheet->setCellValue('G'.$row, $data['agama']);
    $sheet->setCellValue('H'.$row, $data['testimoni']);
    $row++;
}

// Style
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$row = $row - 1;
$sheet->getStyle('A1:H'.$row)->applyFromArray($styleArray);

// Menyimpan report dalam bentuk excel
$writer = new Xlsx($spreadsheet);
$writer->save('Data Pengunjung.xlsx');

header("location:dataPengunjung.php?pesan=cetak");

?>

<!-- Ref belajar: https://belajarphp.net/tutorial-membuat-laporan-excel-dengan-php-dan-mysql/ -->
<!-- NB: Jika ingin menyimpan report/laporan, pastikan kita tidak membuka file excel Data Pengunjung. Agar tidak eror -->