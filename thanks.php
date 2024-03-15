
<!DOCTYPE html>
<html>
  <head>
    <title>Thanh toán thành công</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
    <?php
      include("header.php");
      if (isset($_GET['dat']) && $_GET['dat'] == 1) {
        echo '<div id="toast_dat"> </div>';
        ?>
        <script>
          function toast({title = '', message = '', type = 'info', duration = 3000}) { 
            const main = document.getElementById('toast_dat')
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
            message: 'Đặt hàng thành công!',
            type: 'success',
            duration: 3000
          });
        </script>
      <?php
      }
      ?>
   
    <div id="slider-info">
        <img src="./assets/img/slider_thanks.jpg"  style="width:100%">
    </div>
    <div id="content_thanks">
        <h2>
          <span>Đặt hàng thành công</span>
        </h2>
        <?php
          $id_KH = $_SESSION['id_KH'];
          $sql_lietke_dh = "SELECT * from donhang, khachhang where donhang.maKH=khachhang.maKH AND donhang.maKH='$id_KH'  order by donhang.maDH DESC";
          $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
          $row = mysqli_fetch_array($query_lietke_dh)
        ?>
      <div class="content_thanks-item">
        <p>Cảm ơn quý khách đã đặt hàng với mã đơn hàng: <a style="color: #7BA3CD; text-decoration: none;" href="xem_donhang.php?code=<?php echo $row['codeDH']  ?>"> <?php echo $row['codeDH']  ?></a> </p> 
        <p>Chúng tôi sẽ liên hệ quý khách trong thời gian sớm nhất.</p> 
        <p>Chúc quý khách một ngày tốt lành.</p>
      </div>

    </div>
    <?php
      include("footer.php");
    ?>
  </body>
</html>
