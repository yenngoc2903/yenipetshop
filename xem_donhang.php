<!DOCTYPE html>
<html>
  <head>
    <title>Đơn hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
    <?php
      include("header.php");
      include('admin/connect/connect.php');
      $id_KH = $_SESSION['id_KH'];
      $code = $_GET['code'];
	    $sql_lietke_dh = "SELECT * FROM chitietdonhang, thucung, khachhang, donhang WHERE chitietdonhang.maTC=thucung.maTC AND donhang.codeDH=chitietdonhang.codeDH AND donhang.maKH=khachhang.maKH AND chitietdonhang.codeDH='".$code."' ";
	    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
    ?>
    <div class="slider_user-img">
      <h1>
        <?php
            if (isset($_SESSION['dangky'])) {
              echo 'Xin chào '. $_SESSION['dangky'];
            }
        ?>
      </h1>
    </div>  
    <div id="xacnhan" style="padding-top:20px;">
      <div class="content">
      <div class="donhang" style="width:100%;">
                    <table style="width:100%;text-align: center;justify-content: center; ">
                    <p>THÔNG TIN CHI TIẾT ĐƠN HÀNG</p>
                    <tr class="menu">
                      <th>STT</th>
                      <th>Mã Đơn Hàng</th>
                      <th>Tên Thú Cưng</th>
                      <th>Đơn giá</th>
                      <th>Ảnh</th>
                    </tr>
                    <?php
                      $i = 0;
                      $tongtien = 0;
                      while ($row = mysqli_fetch_array($query_lietke_dh)){
                        $i++;
                        $tongtien += $row['gia'];
                        $code_xuat = $row['codeDH'];
                    ?>
                    <tr>
                      <td> <?php echo $i ?> </td>
                      <td> <?php echo $row['codeDH'] ?> </td>
                      <td> <?php echo $row['tenTC'] ?> </td>
                      <td> <?php echo number_format($row['gia'],0,',','.').'VNĐ' ?> </td>
                      <td> <img src="admin/quanlythucung/uploads/<?php echo $row['hinhAnh'] ?>" width=100px; height=100px></td>
                    </tr>   
                          
                        <?php
                            }
                        ?>
                      <td colspan="6"><p class="total">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'VNĐ' ?></p> </td>
                     
              </table>
    </div>
      </div>
    </div>
    
      
      
      
     
     
        
         
          
       
  

      
    

    <?php
      include("footer.php");
    ?>
  </body>
</html>