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
  <title>Thêm thú cưng</title>
  <link rel="stylesheet" href="..\assets\css\main.css">
  <link rel="stylesheet" href="../assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
  <!-- Start Header -->

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
                  <li><a class="name-item" href="lietke.php">Liệt kê</a></li>
                  <li><a class="name-item" href="them.php">Thêm</a></li>
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
              <li class="item"><a href="../quanlydonhang/lietke.php">Đơn hàng</a></li>
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
  if (isset($_GET['them']) && $_GET['them'] == 1) {
      echo '<div id="toast_them"> </div>';
      ?>
      <script>
        function toast({title = '', message = '', type = 'info', duration = 3000}) { 
          const main = document.getElementById('toast_them')
          if (main) {
            const toast = document.createElement('div');
            toast.classList.add('toast',`toast_${type}`);
            toast.innerHTML = `
                  <div class="toast_icon-error">
                  <i class="fa-solid fa-xmark"></i>
                  </div>
                  <div class="toast_body">
                    <h3 class="toast_title">${title}</h3>
                    <p class="toast_msg">${message}</p>
                  </div>
            `;
            main.appendChild(toast);
          }
        }

        toast({
          title: 'Error',
          message: 'Vui lòng nhập đầy đủ thông tin!',
          type: 'error',
          duration: 3000
        });
      </script>
    <?php
    }
    ?>
  <div id="quanly" style="padding-top:150px;margin:0 20px">
    <p>Thêm thú cưng</p>
    <table class="quanly_table" >
      <form action="xuly.php" method="POST" enctype="multipart/form-data">
        <tr class="item">
          <td>Loại thú cưng</td>
          <td>
            <select name="tenLoai" >
                <?php
                include('../connect/connect.php');
                $sql_loaithucung = "select * from loaithucung order by maLoai asc";
                $query_loaithucung = mysqli_query($mysqli,$sql_loaithucung);
                while ($row_loaithucung = mysqli_fetch_array($query_loaithucung)){
                ?>
                <option value="<?php echo $row_loaithucung['maLoai'] ?> "> <?php echo $row_loaithucung['tenLoai'] ?> </option>
                <?php
                }
                ?>
            </select>
          </td>
        </tr>
        <tr class="item" >
          <td>Giống</td>
          <td>
            <select id="tenGiong" name="tenGiong" >
                <?php
                include('../connect/connect.php');
                $sql_giongloai = "select * from giongloai,loaithucung where giongloai.maLoai=loaithucung.maLoai ORDER BY tenGiong ASC";
                $query_giongloai = mysqli_query($mysqli,$sql_giongloai);
                while ($row_giongloai = mysqli_fetch_array($query_giongloai)){
                ?>
                <option value="<?php echo $row_giongloai['maGiong'] ?> "> <?php echo $row_giongloai['tenGiong'] ?> </option>
                <?php
                }
                ?>
            </select>
          </td>
        </tr>
        <tr class="item">
          <td>Tên thú cưng</td>
          <td> <input type="text", name="tenTC"> </td>
        </tr>
        <tr class="item">
          <td>Giá</td>
          <td> <input type="text", name="gia"> </td>
        </tr>
        <tr class="item">
          <td>Hình ảnh</td>
          <td> <input type="file", name="hinhAnh"> </td>
        </tr>
        <tr class="item">
          <td>Mô tả</td>
          <td> <textarea name="moTa" rows="5" ></textarea> </td>
        </tr>
        <tr class="item">
          <td>Ngày sinh</td>
          <td> <input type="date", name="ngaySinh"> </td>
        </tr>
        <tr class="item">
          <td>Giới tính</td>
          <td> <input type="text", name="giong"> </td>
        </tr>
        <tr class="item">
          <td>Màu lông</td>
          <td> <input type="text", name="mau"> </td>
        </tr>
        <tr class="item">
          <td>Số mũi vacxin đã tiêm</td>
          <td> <input type="number", name="vacxin"> </td>
        </tr>
        <tr class="item">
          <td>Giấy tờ</td>
          <td> <input type="text", name="giayTo"> </td>
        </tr>
        <tr class="item">
          <td>Số ngày bảo hành</td>
          <td> <input type="number", name="baoHanh"> </td>
        </tr>
        <tr class="item">
          <td>Ngày có thể về nhà mới</td>
          <td> <input type="date", name="ngayVeNha"> </td>
        </tr>
        <tr class="item">
          <td>Tình trạng thú cưng</td>
          <td> <input type="text", name="tinhTrang"> </td>
        </tr>
        <tr class="item">
          <td colspan="2"><input class="submit" type="submit" name="themthucung" value="Thêm thú cưng" ></td>
        </tr>
      </form>
    </table>
  </div>
  <!-- End Main -->
  <?php
      include("../footer_ad.php");
  ?>
</body>
</html>
