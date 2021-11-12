<?php
    error_reporting(0);
    $pdf = new FPDF('L','mm','Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,7,'PDF DATA WBS',0,1,'C');
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,6,'No',1,0,'C');
    $pdf->Cell(20,6,'Web Code',1,0,'C');
    $pdf->Cell(20,6,'PIC',1,0,'C');
    $pdf->Cell(30,6,'Tanggal Awal',1,0,'C');
    $pdf->Cell(30,6,'Tanggal Akhir',1,0,'C');
    $pdf->Cell(15,6,'Durasi',1,0,'C');
    $pdf->Cell(50,6,'Nama Pekerjaan',1,0,'C');
    $pdf->Cell(80,6,'Uraian Kegiatan',1,0,'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Output();
    
?>