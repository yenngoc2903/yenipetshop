<?php
session_start();
require('connect/connect.php');
require('../tfpdf/tfpdf.php');
require('../carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$pdf = new tFPDF('L', 'mm', 'A3');
$pdf->AddPage();

$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
$pdf->SetFont('DejaVu', '', 15);

$pdf->SetFillColor(193, 229, 252);

$width_cell = array(10, 35, 130, 35, 70, 20, 20,20);

$pdf->Write(10, 'Cửa hàng: Shop Thú Cưng YeNi Pet Shop');
$pdf->Ln(10);
$pdf->Write(10, 'Địa chỉ : Khu II, Đ. 3 Tháng 2, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam ');
$pdf->Ln(10);
$pdf->Write(10, 'SĐT : 0367279433');
$pdf->Ln(10);
$pdf->SetFont('DejaVu', '', 20);
$pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth('BÁO CÁO THÚ CƯNG TỒN KHO')) / 2);
$pdf->Write(10, 'BÁO CÁO THÚ CƯNG TỒN KHO');
$pdf->Ln(10);
$pdf->SetFont('DejaVu', '', 15);
$pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth('Ngày báo cáo : ')) / 2.3);
$pdf->Write(10, 'Ngày báo cáo : ');
$pdf->Cell($width_cell[1], 10, $now, 2, 0, 'C', false);
$pdf->Ln(10);
$pdf->Ln(10);

if(isset($_SESSION['query_pro_data'])){
      
  $data = $_SESSION['query_pro_data'];

        $pdf->Cell($width_cell[0], 10, 'STT', 1, 0, 'C', true);
        $pdf->Cell($width_cell[1], 10, 'Mã thú cưng', 1, 0, 'C', true);
        $pdf->Cell($width_cell[2], 10, 'Tên thú cưng', 1, 0, 'C', true);
        $pdf->Cell($width_cell[1], 10, 'Loại thú cưng', 1, 0, 'C', true);
        $pdf->Cell($width_cell[4], 10, 'Giống thú cưng', 1, 0, 'C', true);
        $pdf->Cell($width_cell[1], 10, 'Giới tính', 1, 0, 'C', true);
        $pdf->Cell($width_cell[7], 10, 'Vacxin', 1, 0, 'C', true);
        $pdf->Cell($width_cell[4], 10, 'Giá', 1, 0, 'C', true);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Ln(10);

        $fill = false;
        $i = 0;

        foreach ($data as $row) {
            $i++;
            $pdf->Cell($width_cell[0], 10, $i, 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[1], 10, $row['maTC'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[2], 10, $row['tenTC'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[1], 10, $row['tenLoai'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[4], 10, $row['tenGiong'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[1], 10, $row['giong'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[7], 10, $row['vacxin'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[4], 10, number_format($row['gia'], 0, ',', '.') . 'VNĐ', 1, 0, 'C', $fill);
            $fill = !$fill;
            $pdf->Ln(10);
        }
      }
    
        $pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth('Ngày.....tháng.....năm.....')) / 1.1);
        $pdf->Write(10, 'Ngày.....tháng.....năm.....');
        $pdf->Ln(10);

        $pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth('Người lập phiếu')) / 7);
        $pdf->Write(10, 'Người lập phiếu');

        $pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth('Người phê duyệt')) / 1.2);
        $pdf->Write(10, 'Người phê duyệt');

        $pdf->Ln(10);

        $pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth('(Ký, họ tên)')) / 7);
        $pdf->Write(10, '(Ký, họ tên)');

        $pdf->SetX(($pdf->GetPageWidth() - $pdf->GetStringWidth('(Ký, họ tên)')) / 1.2);
        $pdf->Write(10, '(Ký, họ tên)');
        $pdf->Ln(10);

        $pdf->Output();
    

?>
