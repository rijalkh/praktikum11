<?php
    include('koneksi.php');
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Jenis_kelamin');
    $sheet->setCellValue('D1', 'Alamat');
    $sheet->setCellValue('E1', 'Telepon');

    $query = mysqli_query($koneksi,"select Nama,Jenis_kelamin,Alamat,Telepon from pendaftaransiswabaru");
    $i = 2;
    $no = 1;
    while($row = mysqli_fetch_array($query))
    {
        $sheet->setCellValue('A'.$i, $no++);
        $sheet->setCellValue('B'.$i, $row['Nama']);
        $sheet->setCellValue('C'.$i, $row['Jenis_kelamin']);
        $sheet->setCellValue('D'.$i, $row['Alamat']);	
        $sheet->setCellValue('E'.$i, $row['Telepon']);		
        $i++;
    }

    $styleArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ];
    $i = $i - 1;
    $sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);

    $writer = new Xlsx($spreadsheet);
    
    $writer->save('Export Data Siswa.xlsx');
    header('Location:form pendaftaran siswa.php');
?>