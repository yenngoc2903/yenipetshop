<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
    <?php
      include('admin/connect/connect.php');
      include("header.php");
      include("slider_cart.php");
      if (isset($_GET['success']) && $_GET['success'] == 'xoatatca') {
        echo '<div class="notification show">Xoá tất cả thú cưng trong giỏ hàng thành công!</div>';
      }
      if (isset($_GET['success']) && $_GET['success'] == 'xoa') {
        echo '<div class="notification show">Xoá thú cưng trong giỏ hàng thành công!</div>';
      }
    ?>
  
    <div id="content_cart">
      <table >
        <div class="cart_client">
          <p>
          <?php
            if (isset($_SESSION['dangky'])) {
              echo 'Giỏ hàng: '. $_SESSION['dangky'];
            }
            ?>
          </p>
        </div >
          <tr class="menu_cart">
            <th>STT</th>
            <th>Mã Thú Cưng</th>
            <th>Tên Thú Cưng</th>
            <th>Hình Ảnh</th>
            <th>Giá</th>
            <th>Quản Lý</th>
          </tr>
            <?php
              if(isset($_SESSION['cart'])){
                $i = 0;
                $tongtien = 0;
                $doanhthu = 0;
                foreach($_SESSION['cart'] as $cart_item){
                  $tongtien+=$cart_item['gia'];
                  $i++;
            ?>
          <tr class="menu_cart" >
            <td><?php echo $i ?></td>
            <td><?php echo $cart_item['maTC']; ?></td>
            <td><?php echo $cart_item['tenTC']; ?></td>
            <td><img src="admin/quanlythucung/uploads/<?php echo $cart_item['hinhAnh'] ?>" width=150px></td>
            <td><?php echo number_format($cart_item['gia'],0,',','.').' VNĐ' ?></td>
            <td><a href="cart_add.php?xoa=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-trash fa-2xl" style="color: #ad0101;"></i></a></td>
          </tr>
          <?php
                }
          ?>
          
          <tr class="total">
            <td  colspan="7">
              <p class="total_money">Tổng Tiền: <?php echo number_format($tongtien,0,',','.').' VNĐ'  ?></p>
              <div class="total_pay">
                <p ><a class="delete_all" href="cart_add.php?xoatatca=1">Xoá tất cả</a></p>
                <div style="clear:both;"></div>
                <?php
                  if(isset($_SESSION['dangky'])){
                ?>
                <p><a class="delete_all" href="xacnhan.php">Xác nhận đặt hàng</a></p>
                <?php
                  }else {
                ?>
                <p><a class="delete_all" href="signup.php">Đăng ký để đặt hàng</a></p>
              </div>
              <?php
                }
              ?>
            </td>
          </tr>
          <?php
              }else {
          ?>
          <tr>
            <td colspan="6"><p>Hiện tại giỏ hàng trống</p></td>
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
  <script>
    setTimeout(function() {
        var notification = document.querySelector('.notification');
        notification.classList.add('show');
        setTimeout(function() {
            notification.classList.remove('show');
        }, 3000); // Ẩn thông báo sau 3 giây
    }, 500); // Delay 0.5 giây trước khi hiển thị thông báo
  </script>
</html>
