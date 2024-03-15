<?php
  include('../connect/connect.php');
  require('../../carbon/autoload.php');
  use Carbon\Carbon;
  use Carbon\CarbonInterval;
  $now = Carbon::now('Asia/Ho_Chi_Minh');
  
  if(isset($_GET['code'])){
    //Xử lý đơn hàng
    $code = $_GET['code'];
    $ngayXacNhan = $now;
    $sql_update = "UPDATE donhang SET trangthai = 0, ngayXacNhan = '$ngayXacNhan' WHERE codeDH = '$code'";
    mysqli_query($mysqli, $sql_update); 
    $sql_lietke_thucung ="SELECT * FROM thucung,chitietdonhang WHERE thucung.maTC=chitietdonhang.maTC AND chitietdonhang.codeDH ='".$code."' ";
    $query_lietke_thucung = mysqli_query($mysqli,$sql_lietke_thucung);

    while($row_thucung = mysqli_fetch_array($query_lietke_thucung)){
      $maTC = $row_thucung['maTC'];
      $sql_update_thucung ="UPDATE thucung SET tinhTrang='Hết Hàng' WHERE maTC='".$maTC."'";
      mysqli_query($mysqli,$sql_update_thucung);
    }
    header('Location:../quanlydonhang/lietke.php?xuly=1');
} 

  
    //Thông kê doanh thu
    $sql_lietke_dh = "SELECT * FROM chitietdonhang,thucung WHERE chitietdonhang.maTC=thucung.maTC AND chitietdonhang.codeDH='$code' ORDER BY chitietdonhang.maCTDH ASC";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

    $sql_thongke = "SELECT * FROM thongke WHERE ngayDat='$now'"; 
    $query_thongke = mysqli_query($mysqli,$sql_thongke);

    $luotMua = 0;
    $doanhThu = 0;
    while($row = mysqli_fetch_array($query_lietke_dh)){
          $luotMua+=$row['luotMua'];
          $doanhThu+=$row['gia'];
    }

    if(mysqli_num_rows($query_thongke)==0){
            $luotBan = $luotMua;
            $doanhThu = $doanhThu;
            $donHang = 1;
            $sql_update_thongke = mysqli_query($mysqli,"INSERT INTO thongke (ngayDat,donHang,doanhThu,luotBan) VALUE('$now','$donHang','$doanhThu','$luotBan')" );
    }elseif(mysqli_num_rows($query_thongke)!=0){
        while($row_tk = mysqli_fetch_array($query_thongke)){
            $luotBan = $row_tk['luotBan']+$luotBan;
            $doanhThu = $row_tk['doanhThu']+$doanhThu;
            $donHang = $row_tk['donHang']+1;
            $sql_update_thongke = mysqli_query($mysqli,"UPDATE thongke SET donHang='$donHang',doanhThu='$doanhThu',luotBan='$luotBan' WHERE ngayDat='$now'" );
        }
    }
    
    header('Location:../quanlydonhang/lietke.php?xuly=1');
  
?>