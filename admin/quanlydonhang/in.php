<?php
  require('../connect/connect.php');
	require('../../tfpdf/tfpdf.php');

	
  $pdf = new tFPDF('P', 'mm', array(210, 297));
	$pdf->AddPage("");
	// $pdf->SetFont('Arial','B',16);
	// Add a Unicode font (uses UTF-8)
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',15);
	
	$pdf->SetFillColor(193,229,252);
	//set header 

	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT *,donhang.ngayDat FROM chitietdonhang,thucung,khachhang,donhang,hoadon WHERE hoadon.codeDH=donhang.codeDH AND khachhang.maKH=donhang.maKH AND donhang.codeDH=chitietdonhang.codeDH AND chitietdonhang.maTC=thucung.maTC AND chitietdonhang.codeDH='".$code."' ORDER BY chitietdonhang.maCTDH ASC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
  $width_cell=array(10,25,25,90,40);

  $rows = mysqli_fetch_array($query_lietke_dh);
  $pdf->Cell(0, 10, 'HOÁ ĐƠN', 0, 1, 'C');
  $pdf->Ln(10);
  $pdf->Write(10,'Tên khách hàng : '); 
  $pdf->Cell($width_cell[3],10,$rows['tenKH'],2,0,'C',false); $pdf->Ln(10);
  $pdf->Write(10,'Mã hoá đơn : '); 
  $pdf->Cell($width_cell[2],10,$rows['maHD'],2,0,'C',false); $pdf->Ln(10);
  $pdf->Write(10,'Địa chỉ : '); 
  $pdf->Cell($width_cell[3],10,$rows['diaChi'],2,0,'C',false); $pdf->Ln(10);
  $pdf->Write(10,'SĐT : '); 
  $pdf->Cell($width_cell[4],10,$rows['SDT'],2,0,'C',false); $pdf->Ln(10);
  $pdf->Write(10,'Thời gian đặt hàng : '); 
  $pdf->Cell($width_cell[3],10,$rows['ngayDat'],2,0,'C',false); $pdf->Ln(10);
	$pdf->Write(10,'Đơn hàng của bạn gồm có:');
	$pdf->Ln(10);

	$sql_lietke_dhs = "SELECT * FROM chitietdonhang,thucung,khachhang,donhang WHERE khachhang.maKH=donhang.maKH AND donhang.codeDH=chitietdonhang.codeDH AND chitietdonhang.maTC=thucung.maTC AND chitietdonhang.codeDH='".$code."' ORDER BY chitietdonhang.maCTDH ASC";
	$query_lietke_dhs = mysqli_query($mysqli,$sql_lietke_dhs);

	$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã ĐH',1,0,'C',true);
  $pdf->Cell($width_cell[2],10,'Mã TC',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Tên TC',1,0,'C',true);
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->SetFillColor(255,255,255); 
  $pdf->Ln(10);
	$fill=false;
	$i = 0;
  $tongtien = 0;
	while($row = mysqli_fetch_array($query_lietke_dhs)){
		$i++;
    $tongtien += $row['gia'];
    $pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
    $pdf->Cell($width_cell[1],10,$row['codeDH'],1,0,'C',$fill);
    $pdf->Cell($width_cell[2],10,$row['maTC'],1,0,'C',$fill);
    $pdf->Cell($width_cell[3],10,$row['tenTC'],1,0,'C',$fill);
    $pdf->Cell($width_cell[4],10,number_format($row['gia'],0,',','.').'VNĐ',1,0,'C',$fill);
    
    $fill = !$fill;
    $pdf->Ln(10);
	}
  $pdf->Ln(10);
  $pdf->Write(10,'Tổng tiền: ');
  $pdf->Cell($width_cell[3],10,number_format($tongtien,0,',','.').'VNĐ',2,1,'C',$fill);
	$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại YeniPetShop.');
	$pdf->Ln(10);

	$pdf->Output(); 
?>