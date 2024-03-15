<?php
include('admin/connect/connect.php');

$tenKH = $_POST['tenKH'];
$email = $_POST['email'];
$diaChi = $_POST['diaChi'];
$SDT = $_POST['SDT'];


if(isset($_POST['suathongtin'])){
  //Sửa
    $sql_update_tk = "UPDATE khachhang SET tenKH = '".$tenKH."', 
    email = '".$email."', diaChi = '".$diaChi."', SDT = '".$SDT."'
    WHERE maKH = '$_GET[maKH]'";
    mysqli_query($mysqli, $sql_update_tk);
    header('Location:user.php?sua=2');
  }elseif(isset($_POST['suathongtin2'])) {
    //Sửa
    $sql_update_tk = "UPDATE khachhang SET tenKH = '".$tenKH."', 
    email = '".$email."', diaChi = '".$diaChi."', SDT = '".$SDT."'
    WHERE maKH = '$_GET[maKH]'";
    mysqli_query($mysqli, $sql_update_tk);
    header('Location:xacnhan.php?sua=1');
  }
?>