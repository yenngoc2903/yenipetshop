<?php
  include('../connect/connect.php');
  $maKH = $_GET['maKH'];
  $sql_xoa_nd = "DELETE FROM khachhang WHERE maKH = '".$maKH."'";
  mysqli_query($mysqli, $sql_xoa_nd);
  header('Location:../quanlynguoidung/lietke.php?xoa=1');
?>