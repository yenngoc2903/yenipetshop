<?php
include('../connect/connect.php');

$maLoai = $_POST['maLoai'];
$tenLoai = $_POST['tenLoai'];


if (isset($_POST['themloaithucung'])) {
  //Thêm
  $tenLoai = $_POST['tenLoai'];
  if ( empty($tenLoai)) {
    header('Location:../quanlyloaithucung/them.php?them=1');
  }else {
  $sql_them = "insert into loaithucung(maLoai, tenLoai) value ('".$maLoai."', '".$tenLoai."')";
  mysqli_query($mysqli, $sql_them);
  header('Location:../quanlyloaithucung/lietke.php?them=1');}
}elseif(isset($_POST['sualoaithucung'])){
  //Sửa
  $sql_update = "update loaithucung set tenLoai = '".$tenLoai."' where maLoai = '$_GET[maloai]'";
  mysqli_query($mysqli, $sql_update);
  header('Location:../quanlyloaithucung/lietke.php?sua=1');
}else{
  //Xoá
  $id = $_GET['maloai'];
  $sql_xoa = "delete from loaithucung where maLoai = '".$id."'";
  mysqli_query($mysqli, $sql_xoa);
  header('Location:../quanlyloaithucung/lietke.php?xoa=1');
}
?>