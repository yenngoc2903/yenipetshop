<?php
  require('../carbon/autoload.php');
  include("connect/connect.php");
  use Carbon\Carbon;
  use Carbon\CarbonInterval;

  $thoigian = isset($_POST['thoigian']) ? $_POST['thoigian'] : '';
  $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
  $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';



  if (empty($thoigian) && empty($start_date) && empty($end_date)) {
      $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
  } else {
      
      if ($thoigian == '1') {
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(1)->toDateString();
      } elseif ($thoigian == '7') {
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
      } elseif ($thoigian == '30') {
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
      } elseif (!empty($start_date) && !empty($end_date)) {
          
          $subdays = $start_date;
          $now = $end_date;
      }
  }

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$sql = "SELECT DATE(donhang.ngayDat) AS ngayDat,
               SUM(CASE WHEN loaithucung.tenLoai = 'Chó' THEN 1 ELSE 0 END) AS cho,
               SUM(CASE WHEN loaithucung.tenLoai = 'Mèo' THEN 1 ELSE 0 END) AS meo
        FROM thucung
        INNER JOIN loaithucung ON thucung.maLoai = loaithucung.maLoai
        INNER JOIN chitietdonhang ON thucung.maTC = chitietdonhang.maTC
        INNER JOIN donhang ON chitietdonhang.codeDH = donhang.codeDH
        WHERE thucung.tinhTrang = 'Hết Hàng'
        AND DATE(donhang.ngayDat) BETWEEN '$subdays' AND '$now'
        GROUP BY DATE(donhang.ngayDat);";


$sql_query = mysqli_query($mysqli, $sql);
$chart_data = array();

while ($val = mysqli_fetch_array($sql_query)) {
  $chart_data[] = array(
    'ngayDat' => $val['ngayDat'],
    'cho' => (int)$val['cho'],
    'meo' => (int)$val['meo']
  );
}
header('Content-Type: application/json');
echo $data = json_encode($chart_data);


?>