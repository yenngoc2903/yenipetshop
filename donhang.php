<!DOCTYPE html>
<html>
  <head>
    <title>Lịch sử đơn hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
    <?php
      include("header.php");
      include('admin/connect/connect.php');
      $id_KH = $_SESSION['id_KH'];
	    $sql_lietke_dh = "SELECT * FROM khachhang,donhang WHERE khachhang.maKH=donhang.maKH AND khachhang.maKH='$id_KH' ";
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
    <div id="quanly" style="padding-top:20px">
    <p>Liệt kê đơn hàng</p>
    <table class="quanly_table">
      <tr>
        <th>STT</th>
        <th>Mã</th>
        <th>Ngày Đặt</th>
        <th>Trạng Thái</th>
        <th>Quản lý</th>
      </tr>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_dh)){
        $i++;
      ?>
      <tr>
        <td> <?php echo $i ?> </td>
        <td> <?php echo $row['codeDH'] ?> </td>
        <td> <?php echo $row['ngayDat'] ?> </td>
      
        <td>
          <?php if($row['trangThai']==1){
            echo '<a style="text-decoration: none;color: red;" href="">Chưa xác nhận</a>';
          }else{
            echo 'Đã xác nhận';
          }
          ?>
        </td>
        <td>
          <div class="quanly_table-action">
            <?php
              if($row['trangThai']==1){
            ?>
              <a href="xem_donhang.php?code=<?php echo $row['codeDH'] ?>">Xem</a>
              <a href="xuly_donhang.php?code=<?php echo $row['codeDH'] ?>">Huỷ</a>
            <?php
              }else{
            ?>
              <a href="xem_donhang.php?code=<?php echo $row['codeDH'] ?>">Xem</a>
            <?php
              }
            ?>
          </div> 
        </td>
      </tr>  
    <?php
      }
    ?>
    </table>
  </div>

      
    

    <?php
      include("footer.php");
    ?>
  </body>
</html>