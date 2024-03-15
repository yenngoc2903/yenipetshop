<?php
  session_start();
  include("admin/connect/connect.php");
  require('carbon/autoload.php');
  use Carbon\Carbon;
  use Carbon\CarbonInterval;
  $now = Carbon::now('Asia/Ho_Chi_Minh');
  $id_KH = $_SESSION['id_KH'];
  
    $codeDH = rand(0, 999999);
    $maHD = generateRandomString(6);

    $tongTien = 0;

    foreach ($_SESSION['cart'] as $key => $value) {
        $maTC = $value['id'];
        $get_price_query = "SELECT gia FROM thucung WHERE maTC = '".$maTC."'";
        $price_result = mysqli_query($mysqli, $get_price_query);

        if ($price_result && mysqli_num_rows($price_result) > 0) {
            $row = mysqli_fetch_assoc($price_result);
            $gia = $row['gia'];

            $tongTien += $gia;
        }
    }

    $get_address_query = "SELECT diaChi FROM khachhang WHERE maKH = '".$id_KH."'";
    $address_result = mysqli_query($mysqli, $get_address_query);

    $diaChi = "";

    if ($address_result && mysqli_num_rows($address_result) > 0) {
        $row = mysqli_fetch_assoc($address_result);
        $diaChi = $row['diaChi'];
    }

    $codenow = $codeDH;
    $insert_cart = "INSERT INTO donhang(codeDH, maKH,ngayDat, trangThai, ngayXacNhan) VALUE ('".$codeDH."','".$id_KH."','".$now."',1,NULL )";
    $cart_query = mysqli_query($mysqli, $insert_cart);

    

    if ($cart_query) {
        foreach($_SESSION['cart'] as $key => $value) {
            $maTC = $value['id'];
            $insert_order_details = "INSERT INTO chitietdonhang(codeDH, maTC, luotMua) VALUE ('".$codeDH."','".$maTC."',1)";
            mysqli_query($mysqli, $insert_order_details);

            $insert_hoadon = "INSERT INTO hoadon(maHD,ngayDat,maKH, tongTien, codeDH, trangThai, ngayThanhToan, diaChi) VALUE ('".$maHD."','".$now."','".$id_KH."','".$tongTien."','".$codeDH."',0,NULL,'".$diaChi."' )";
          $hoadon_query = mysqli_query($mysqli, $insert_hoadon);
        }

       

       

       
    }
    unset($_SESSION['cart']);  
    header('Location:thanks.php?dat=1');
  


    function generateRandomString($length = 6) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
  
      $lengthPerType = ceil($length / 2);
  
      $letters = substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $lengthPerType)), 0, $lengthPerType);
  
      $numbers = substr(str_shuffle(str_repeat('0123456789', $lengthPerType)), 0, $lengthPerType);
  
      $randomString = $letters . $numbers;

      $randomString = str_shuffle($randomString);
  
      return $randomString;
  }
?>