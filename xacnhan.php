<!DOCTYPE html>
<html>
  <head>
    <title>Xác Nhận Đơn Hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
  <?php
      include("header.php");
      include('admin/connect/connect.php');
      
      if (isset($_GET['huy']) && $_GET['huy'] == 1) {
        echo '<div id="toast_huy"> </div>';
        ?>
        <script>
          function toast({title = '', message = '', type = 'info', duration = 3000}) { 
            const main = document.getElementById('toast_huy')
            if (main) {
              const toast = document.createElement('div');
              toast.classList.add('toast',`toast_${type}`);
              toast.innerHTML = `
                    <div class="toast_icon-success">
                      <i class="fa-solid fa-check"></i>
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
            title: 'Success',
            message: 'Xoá thú cưng khỏi giỏ hàng thành công!',
            type: 'success',
            duration: 3000
          });
        </script>
      <?php
      }elseif (isset($_GET['sua']) && $_GET['sua'] == 1) {
        echo '<div id="toast_sua"> </div>';
        ?>
        <script>
          function toast({title = '', message = '', type = 'info', duration = 3000}) { 
            const main = document.getElementById('toast_sua')
            if (main) {
              const toast = document.createElement('div');
              toast.classList.add('toast',`toast_${type}`);
              toast.innerHTML = `
                    <div class="toast_icon-success">
                      <i class="fa-solid fa-check"></i>
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
            title: 'Success',
            message: 'Sửa thông tin tài khoản thành công!',
            type: 'success',
            duration: 3000
          });
        </script>
      <?php
      }
      ?>
      
    <div id="xacnhan">
      <div class="content">
        <div class="donhang" >
          <table>
            <tr class="menu">
              <th></th>
              <th>HÌNH ẢNH</th>
              <th>TÊN THÚ CƯNG</th>
              <th>GIÁ TIỀN</th>
            </tr>
            <?php
              if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $tongtien = 0;
                foreach ($_SESSION['cart'] as $cart_item) {
                    $tongtien += $cart_item['gia'];
            ?>
            <tr>
              <td class="huy"><a href="cart_add.php?huy=<?php echo $cart_item['id']?>"><i class="fa-regular fa-circle-xmark"></i></a></td>
              <td><img src="admin/quanlythucung/uploads/<?php echo $cart_item['hinhAnh']; ?>" width="150px"></td>
              <td><?php echo $cart_item['tenTC']; ?></td>
              <td><?php echo number_format($cart_item['gia'], 0, ',', '.') . ' VNĐ'; ?></td>
            </tr>
                  
                <?php
                    }
                ?>
            <?php
            }
            ?>
          </table>
        </div>
      </div>
      <div class="content">
        <div class="thongtin">
        <table>
            <p>THÔNG TIN GIAO HÀNG</p>
            <?php
            // Check if the user is logged in
            if (isset($_SESSION['dangky'])) {
                $id_KH = $_SESSION['id_KH'];
                $sql_lietke_kh = "SELECT * FROM khachhang WHERE maKH='$id_KH' ";
                $query_lietke_kh = mysqli_query($mysqli, $sql_lietke_kh);

                // Check if the query was successful and fetch the row
                if ($query_lietke_kh && $row = mysqli_fetch_array($query_lietke_kh)) {
            ?>
                    <div class="chitiet">
                        <div class="item"><span>Họ và tên: </span> <?php echo $row['tenKH'] ?></div>
                        <div class="item"><span>Email: </span> <?php echo $row['email'] ?></div>
                        <div class="item"><span>Số điện thoại:</span> <?php echo $row['SDT'] ?></div>
                        <div class="item"><span>Địa chỉ:</span> <?php echo $row['diaChi'] ?></div>
                    </div>
                    <div class="action_update">
                        <a href="updata_user.php?maKH=<?php echo $row['maKH'] ?>&success=1">Sửa thông tin</a>
                    </div>
            <?php
                }
            }
            ?>
        </table>
        </div>
      

       
          <div class="dathang">
            <table>
              <p>ĐƠN HÀNG CỦA BẠN</p>
              <tr class="menu">
                <th style="text-align: left">SẢN PHẨM</th>
                <th style="text-align: right">TẠM TÍNH</th>
              </tr>
              <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                  $tongtien = 0;
                  foreach ($_SESSION['cart'] as $cart_item) {
                      $tongtien += $cart_item['gia'];
              ?>
              <tr>
                <td class="left"><?php echo $cart_item['tenTC']; ?></td>
                <td class="right"><?php echo number_format($cart_item['gia'], 0, ',', '.') . ' VNĐ'; ?></td>
              </tr>
                  
                  <?php
                      }
                  ?>
              <tr class="total">
                <td class="left">Tổng tiền:  </td>
                <td class="right"><?php echo number_format($tongtien,0,',','.').' VNĐ'  ?></td>
              </tr>  
              <tr >
                <td style="border-bottom: none;font-weight: 500;padding:0 ">Thanh toán khi nhận hàng</td>
              </tr>
              <tr>
                <td style="border-bottom: none;padding:0">Miễn phí vận chuyển toàn quốc</td>
              </tr>
              <?php
              }
              ?>
              
            </table>
            <!-- <a class="dat" href="pay.php">ĐẶT HÀNG</a> -->
            
            <?php
                  if(isset($_SESSION['dangky'])){
                ?>
                <a href="#" class="dat" onclick="confirmDelete()">ĐẶT HÀNG</a>
                <?php
                  }else {
                ?>
                <a class="dat" href="signup.php">ĐĂNG KÝ ĐỂ ĐẶT HÀNG</a></p>
              </div>
              <?php
                }
              ?>
                          <script>
                          function confirmDelete() {
                              var confirmDelete = confirm("Xác nhận đặt hàng?");
                          
                              if (confirmDelete) {
                                  window.location.href = 'pay.php';
                              }
                          }
                          </script>
                      
          </div>
        </div>
        </div>
    </div>
    <?php
      include("footer.php");
    ?>
  </body>
</html>