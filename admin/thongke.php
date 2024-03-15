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
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(0)->toDateString();
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

$sql = "SELECT * FROM thongke WHERE ngayDat BETWEEN '$subdays' AND '$now' ORDER BY ngayDat ASC";
$sql_query = mysqli_query($mysqli, $sql);

$chart_data = array(); 

while ($val = mysqli_fetch_array($sql_query)) {
    $chart_data[] = array(
        'date' => $val['ngayDat'],
        'order' => $val['donHang'],
        'sales' => $val['doanhThu']
    );
}

// Set the content type to JSON
header('Content-Type: application/json');

// Echo the JSON-encoded data
echo json_encode($chart_data);
?>
