<?php
     include('../connect/connect.php');

     if(isset($_GET['code'])){
          $code = $_GET['code'];
           
          $sql_xoa_dh = "DELETE FROM donhang WHERE codeDH = '".$code."'";
          mysqli_query($mysqli, $sql_xoa_dh);

          $sql_xoa_ctdh = "DELETE FROM chitietdonhang WHERE codeDH = '".$code."'";
          mysqli_query($mysqli, $sql_xoa_ctdh);
           
          header('Location:../quanlydonhang/lietke.php?xoa=1');
     }
     
?>