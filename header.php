<?php
    require('carbon/autoload.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
     
    ob_start();
    session_start();
    include('admin/connect/connect.php');
    $sql_loaithucung = "select * from loaithucung order by maLoai asc";
    $query_loaithucung = mysqli_query($mysqli,$sql_loaithucung);
    
  ?>
<?php
  if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
    unset($_SESSION['dangky']);
  }
?>
    <!-- Start Header -->
      <div id="header">
          <a href="index.php" class="logo">
              <img src="assets/img/icon.jpg" width="200" height="70" alt="Yeni Pet Shop">
          </a>
          <ul id="menu">
              <li class="item">
                <a href="info.php">Giới thiệu</a>
              </li>
              <li class="item"><a href="index.php">Trang chủ</a></li>
              <li class="item">
                  <a href="">Thú cưng đang bán
                      <i class="fa-solid fa-angle-down fa-sm" style="color: #000000;"></i>
                  </a>
                  <ul class="detail">
                      <?php
                      while ($row_loaithucung = mysqli_fetch_array($query_loaithucung)) {
                      ?>
                          <li><a class="name-item" href="thucung.php?thucung&id=<?php echo $row_loaithucung['maLoai'] ?>"><?php echo $row_loaithucung['tenLoai'] ?></a></li>
                      <?php
                      }
                      ?>
                  </ul>
              </li>
          </ul>
          <div id="actions">
            <form action="search.php" method="POST">  
              <div class="box">
                <div class="search-box">
                  <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
                </div>
              </div>
              <div class="search">
                <input class="submit" type="submit" name="timkiem" value="Tìm">
              </div>
            </form>
            
            <div class="cart" id="cartIcon">
                <a href="xacnhan.php"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #000000;"></i></a>
                <span class="cart-count"><?php echo countCartItems(); ?></span>
            </div>

            <?php
              function countCartItems() {
                  $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                  return $cartCount;
              }
            ?>

            <div class="notification" >
                <?php if(isset($_SESSION['dangky'])): ?>
                    <i class="fa-regular fa-bell fa-xl" style="color: #000000; cursor: pointer;" onclick="toggleNotificationPopup()"></i>
                  
                <?php else: ?>
                    <i class="fa-regular fa-bell fa-xl" style="color: #999999;"></i>
                <?php endif; ?>
            </div>
            <div class="notification-popup" id="notificationBlock">
                <?php
                if(isset($_SESSION['id_KH'])) {
                    $id_KH = $_SESSION['id_KH'];

                    // Truy vấn đơn hàng của khách hàng, sắp xếp theo ngày đặt hàng giảm dần
                    $sql_lietke_dh = "SELECT * FROM donhang INNER JOIN khachhang ON donhang.maKH=khachhang.maKH WHERE donhang.maKH='$id_KH' ORDER BY donhang.ngayDat DESC";
                    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);

                    // Duyệt qua tất cả các đơn hàng
                    while ($row = mysqli_fetch_array($query_lietke_dh)) {
                          if ($row['trangThai'] == 0) {
                            ?>
                            <p class="noti_dh">Đơn hàng đã được xác nhận: <a style="color: #7BA3CD; text-decoration: none;" href="xem_donhang.php?code=<?php echo $row['codeDH'] ?>"><?php echo $row['codeDH'] ?></a></p>

                            <?php
                          $ngayDat = strtotime($row['ngayXacNhan']);
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
                        <p class="noti_dh">Đơn hàng đã đặt thành công: <a style="color: #7BA3CD; text-decoration: none;" href="xem_donhang.php?code=<?php echo $row['codeDH'] ?>"><?php echo $row['codeDH'] ?></a></p>

                        <?php
                        
                        // $ngayDat = strtotime($row['ngayDat']);
                        // $ngayHienTai = strtotime("now");

                        $ngayDat = strtotime($row['ngayDat']);
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

            
            
          



            <?php
              if(isset($_SESSION['dangky'])){
            ?>
            <div class="item">
                <a href="" style="text-decoration: none; color: #000000;"><?php echo $_SESSION['dangky'] ?></a>
              <ul class="detail">
                <li><a href="user.php" class="name-item">Trang cá nhân</a></li>
                <li><a href="doimatkhau.php" class="name-item">Đổi mật khẩu</a></li>
                <li><a href="index.php?dangxuat=1&dx=1" class="name-item">Đăng xuất</a></li>
              </ul>
            <?php
              }else{
            ?>
            <div class="item">
              <a href=""><i class="fa-solid fa-user fa-xl" style="color: #000000;"></i> </a>
              <ul class="detail">
                <li><a href="login.php" class="name-item">Đăng nhập</a></li>
                <li><a href="signup.php" class="name-item">Đăng ký</a></li>
              </ul>
            <?php
              }
            ?>
            </div>
          </div>
      </div>
    <!-- End Header -->
