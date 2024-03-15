<?php
     include('../connect/connect.php');
     require('../../carbon/autoload.php');
     use Carbon\Carbon;
     use Carbon\CarbonInterval;
     session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xem đơn hàng</title>
  <link rel="stylesheet" href="..\assets\css\main.css">
  <link rel="stylesheet" href="../assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
  <!-- Start Header -->\
    <div id="header">
          <a href="" class="logo">
              <img src="..\assets\img\icon.jpg" width="300" height="100" alt="Yeni Pet Shop">
          </a>
          <ul id="menu">
              <li class="item">
                <a href="../index.php">Thống kê</a>
              </li>
              <li class="item">
                <a href="">Thú cưng
                  <i class="fa-solid fa-angle-down fa-sm" style="color: #000000;"></i>
                </a>
                <ul class="detail">
                  <li><a class="name-item" href="../quanlythucung/lietke.php">Liệt kê</a></li>
                  <li><a class="name-item" href="../quanlythucung/them.php">Thêm</a></li>
                </ul>
              </li>
              <li class="item">
                <a href="">Loại thú cưng
                  <i class="fa-solid fa-angle-down fa-sm" style="color: #000000;"></i>
                </a>
                <ul class="detail">
                  <li><a class="name-item" href="../quanlyloaithucung/lietke.php">Liệt kê</a></li>
                  <li><a class="name-item" href="../quanlyloaithucung/them.php">Thêm</a></li>
                </ul>
              </li>
              <li class="item">
                <a href="">Giống
                  <i class="fa-solid fa-angle-down fa-sm" style="color: #000000;"></i>
                </a>
                <ul class="detail">
                  <li><a class="name-item" href="../quanlygiong/lietke.php">Liệt kê</a></li>
                  <li><a class="name-item" href="../quanlygiong/them.php">Thêm</a></li>
                </ul>
              </li>
              <li class="item"><a href="lietke.php">Đơn hàng</a></li>
              <li class="item"><a href="../quanlynguoidung/lietke.php">Người dùng</a></li>
            </ul>
          <div id="actions">
          <div class="notification" >
              <i class="fa-regular fa-bell fa-xl" style="color: #000;cursor: pointer;" onclick="toggleNotificationPopup()"></i>
          </div>
          <div class="notification-popup" id="notificationBlock"> 
               <?php
               $sql_lietke_kh = "SELECT * FROM khachhang ORDER BY ngayDK DESC";
               $query_lietke_kh = mysqli_query($mysqli, $sql_lietke_kh);
               
               $sql_donhang = "SELECT * FROM donhang ORDER BY ngayDat DESC";
               $query_donhang = mysqli_query($mysqli, $sql_donhang);
               
               while ($row_dh = mysqli_fetch_array($query_donhang)) {
                    ?>
                    <p class="noti_dh">Có một đơn hàng mới <a style="color: #7BA3CD; text-decoration: none;" href="quanlydonhang/xem.php?code=<?php echo $row_dh['codeDH'] ?>"><?php echo $row_dh['codeDH'] ?></a></p>
                    
                    <?php
                    $ngayDat = strtotime($row_dh['ngayDat']);
                    $now = Carbon::now('Asia/Ho_Chi_Minh');
                    $ngayHienTai = strtotime($now);

                    $soGiay = abs($ngayHienTai - $ngayDat); // Lấy giá trị tuyệt đối để tránh kết quả âm
                          
                          $soPhut = floor($soGiay / 60);
                          $soGio = floor($soPhut / 60);
                          $soNgay = floor($soGio / 24);
                          $soTuan = floor($soNgay / 7);
                          $soThang = floor($soNgay / 30);
              
                          
                          if ($soGiay < 60) {
                            ?>
                            <p class="noti_time"><?php echo $soGiay ?> giây qua</p>
                            <?php
                          }elseif ($soGiay < 3600) { // ít hơn 1 giờ
                                ?>
                                <p class="noti_time"><?php echo $soPhut ?> phút qua</p>
                                <?php
                            } elseif ($soGiay < 86400) { // ít hơn 1 ngày
                                ?>
                                <p class="noti_time"><?php echo $soGio ?> giờ qua</p>
                                <?php
                            } elseif ($soNgay <= 7) { // ít hơn hoặc bằng 1 tuần
                                ?>
                                <p class="noti_time"><?php echo $soNgay ?> ngày qua</p>
                                <?php
                            } elseif ($soNgay <= 30) { // ít hơn hoặc bằng 1 tháng
                                ?>
                                <p class="noti_time"><?php echo $soTuan ?> tuần qua</p>
                                <?php
                            } else { // nếu hơn 1 tháng
                                ?>
                                <p class="noti_time"><?php echo $soThang ?> tháng qua</p>
                                <?php
                            }
                            ?>
                            <hr>
               <?php
               }
               
               

                


                       
              ?> 
          </div>


          <script>
               function toggleNotificationPopup() {
                    // Get the notification block element
                    var notificationBlock = document.getElementById("notificationBlock");

                    // Toggle the display of the notification block
                    if (notificationBlock.style.display === "none") {
                         notificationBlock.style.display = "block";
                    } else {
                         notificationBlock.style.display = "none";
                    }
                    document.querySelector('.notification i.fa-bell').style.animation = 'none';
               }
          </script>
            <div class="item">
              <a href="">
                <i class="fa-solid fa-user fa-xl" style="color: #000000;"></i>
              </a>
              <?php
              if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
                unset($_SESSION['dangnhap']);
                header("Location:login.php");
                }
              ?>
              <ul class="detail">
                <li><a href="../thaydoipassad.php" class="name-item">Thay đổi mật khẩu</a></li>
                <li><a href="../index.php?dangxuat=1" class="name-item">Đăng xuất</a></li>
              </ul>
              
            </div>
          </div>
    </div>
  <!-- End Header -->
  <!-- Start Main -->
  
  <?php 
    include('../connect/connect.php');
    $code = $_GET['code'];
    $sql_lietke_dh = "SELECT * from chitietdonhang, thucung, khachhang, donhang ,hoadon where donhang.codeDH=hoadon.codeDH AND chitietdonhang.maTC=thucung.maTC AND donhang.codeDH=chitietdonhang.codeDH AND donhang.maKH=khachhang.maKH AND chitietdonhang.codeDH='".$code."' order by chitietdonhang.maCTDH asc";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
  ?>
  <div id="xacnhan">
    <div class="content">
      <div class="donhang">
      <p>Xem đơn hàng</p>
    <table class="quanly_table">
      <tr>
        <th>STT</th>
        <th>Mã Đơn Hàng</th>
        <th>Mã Hoá Đơn</th>
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
        <td> <?php echo $row['maHD'] ?> </td>
        <td> <?php echo $row['tenTC'] ?> </td>
        <td> <?php echo number_format($row['gia'],0,',','.').'VNĐ' ?> </td>
        <td> <img src="../quanlythucung/uploads/<?php echo $row['hinhAnh'] ?>" width=100px; height=100px></td>
      </tr>  
      
      <?php
        }
      ?>
      <tr>
        <td colspan="6">
          <p class="total">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'VNĐ' ?></p>
          
        </td>
      </tr>
    </table>
      </div>
    </div>
  </div>

  <!-- End Main -->
  <?php
      include("../footer_ad.php");
  ?>
</body>
</html>