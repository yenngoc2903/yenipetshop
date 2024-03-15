<?php
include('admin/connect/connect.php');

  $code = $_GET['code'];
  $sql_huy_ctdh = "DELETE FROM chitietdonhang WHERE codeDH = '".$code."'";
  mysqli_query($mysqli, $sql_huy_ctdh);

  $sql_huy_dh = "DELETE FROM donhang WHERE codeDH = '".$code."'";
  mysqli_query($mysqli, $sql_huy_dh);
  header('Location:user.php?huydh=1');
?>