<?php
  require('../carbon/autoload.php');
  include("connect/connect.php");
  use Carbon\Carbon;
  use Carbon\CarbonInterval;




  if (empty($thoigian) && empty($start_date) && empty($end_date)) {
      $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
  } else {
      
      if ($thoigian == '1') {
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->saubdays(1)->toDateString();
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

$sql = "SELECT loaithucung.tenLoai,
               COUNT(*) AS soLuong
        FROM thucung
        INNER JOIN loaithucung ON thucung.maLoai = loaithucung.maLoai
        WHERE thucung.tinhTrang = 'Còn Hàng'
        GROUP BY loaithucung.tenLoai;";

$sql_query = mysqli_query($mysqli, $sql);
$chart_data = array();

while ($val = mysqli_fetch_array($sql_query)) {
    $chart_data[] = array(
        'tenLoai' => $val['tenLoai'],
        'soLuong' => (int)$val['soLuong']
    );
}

header('Content-Type: application/json');
echo json_encode($chart_data);
mysqli_close($mysqli);
?>