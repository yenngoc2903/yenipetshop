<?php
include('../connect/connect.php');

$tenLoai = $_POST['tenLoai'];
$tenGiong = $_POST['tenGiong'];


if (isset($_POST['themgiong'])) {
  //Thêm
  $tenLoai = $_POST['tenLoai'];
  $tenGiong = $_POST['tenGiong'];
  if ( empty($tenLoai) || empty($tenGiong)) {
    header('Location:../quanlygiong/them.php?them=1');
  }else {
  $sql_them = "insert into giongloai(maLoai, tenGiong) value ('".$tenLoai."', '".$tenGiong."')";
  mysqli_query($mysqli, $sql_them);
  header('Location:../quanlygiong/lietke.php?them=1');}
}elseif(isset($_POST['suagiong'])){
  //Sửa
  $sql_update = "update giongloai set maLoai = '".$tenLoai."', tenGiong = '".$tenGiong."' where maGiong = '$_GET[magiong]'";
  mysqli_query($mysqli, $sql_update);
  header('Location:../quanlygiong/lietke.php?sua=1');
}else{
  //Xoá
  $id = $_GET['magiong'];
  $sql_xoa_giongloai = "DELETE FROM giongloai WHERE maGiong = '".$id."'";
  $sql_xoa_thucung = "DELETE FROM thucung WHERE maGiong = '".$id."'";

  mysqli_query($mysqli, $sql_xoa_giongloai);
  mysqli_query($mysqli, $sql_xoa_thucung);

  header('Location:../quanlygiong/lietke.php?xoa=1');
}
?>