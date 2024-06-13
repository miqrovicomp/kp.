<?php

// Include database connection
include_once __DIR__ . '/../config/config.php';
// Memuat file autoload dari Composer
require_once __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

try {
   
// Function to fetch data from database
function fetchData($conn, $query) {
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fetch data for barang keluar
$barangKeluarQuery = "SELECT bk.id_barang_keluar, bk.tgl_keluar, b.nama_barang, bkd.jumlah, p.nama_poli
                      FROM barang_keluar bk
                      JOIN barang_keluar_detail bkd ON bk.id_barang_keluar = bkd.id_barang_keluar
                      JOIN barang b ON bkd.id_barang = b.id_barang
                      JOIN poli p ON b.id_poli = p.id_poli";
$barangKeluarData = fetchData($conn, $barangKeluarQuery);

 
// Create a new Spreadsheet
$spreadsheet = new Spreadsheet();

// Function to create a sheet with data
function createSheet($spreadsheet, $sheetIndex, $sheetTitle, $data, $headers) {
    $spreadsheet->createSheet();
    $spreadsheet->setActiveSheetIndex($sheetIndex);
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle($sheetTitle);

    // Set headers
    $col = 'A';
    foreach ($headers as $header) {
        $sheet->setCellValue($col . '1', $header);
        $col++;
    }

    // Set data
    $row = 2;
    foreach ($data as $rowData) {
        $col = 'A';
        foreach ($rowData as $cellData) {
            $sheet->setCellValue($col . $row, $cellData);
            $col++;
        }
        $row++;
    }
}

/// Create sheet for Barang Keluar
createSheet($spreadsheet, 1, 'Barang Keluar', $barangKeluarData, ['ID Barang Keluar', 'Tanggal Keluar', 'Nama Barang', 'Jumlah', 'Nama Poli']);

// Set active sheet to the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Generate and save Excel file
$writer = new Xlsx($spreadsheet);
$filename = 'Laporan_' . date('Y-m-d_H-i-s') . '.xlsx';
$writer->save($filename);

// Output file to download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
header('Content-Length: ' . filesize($filename));
readfile($filename);

// Delete the file after download
unlink($filename);

// Close the database connection
$conn->close();
     
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
