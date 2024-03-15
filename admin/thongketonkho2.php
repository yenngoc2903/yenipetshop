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
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->saubdays(1)->toDateString();
      } elseif ($thoigian == '7') {
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
      } elseif ($thoigian == '30') {
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
      } elseif ($thoigian == '60') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();
      } elseif (!empty($start_date) && !empty($end_date)) {
          
          $subdays = $start_date;
          $now = $end_date;
      }
  }

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$sql_pro = "SELECT * FROM loaithucung, thucung, giongloai 
            WHERE loaithucung.maLoai = thucung.maLoai
            AND giongloai.maGiong = thucung.maGiong
            AND thucung.ngayThem BETWEEN '$subdays' AND '$now'";

$query_pro = mysqli_query($mysqli, $sql_pro);

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