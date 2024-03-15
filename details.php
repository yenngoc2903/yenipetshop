<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết thú cưng</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
  <?php
      session_start();
      include('admin/connect/connect.php');
      include("header.php");
      require('carbon/autoload.php');
      if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo '<div id="toast"> </div>';
        ?>
        <script>
          function toast({title = '', message = '', type = 'info', duration = 3000}) { 
            const main = document.getElementById('toast')
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
            message: 'Thêm thú cưng vào giỏ hàng thành công!',
            type: 'success',
            duration: 3000
          });
        </script>
      <?php
      }elseif (isset($_GET['success']) && $_GET['success'] == 2) {
        echo '<div id="toast_css"> </div>';
        ?>
        <script>
          function toast({title = '', message = '', type = 'info', duration = 3000}) { 
            const main = document.getElementById('toast_css')
            if (main) {
              const toast = document.createElement('div');
              toast.classList.add('toast',`toast_${type}`);
              toast.innerHTML = `
                    <div class="toast_icon-error">
                      <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="toast_body">
                      <h3 class="toast_title_error">${title}</h3>
                      <p class="toast_msg">${message}</p>
                    </div>
              `;
              main.appendChild(toast);
            }
          }

          toast({
            title: 'Error',
            message: 'Rất tiếc! Bé chưa sẵn sàng về nhà mới!',
            type: 'error',
            duration: 3000
          });
        </script>
      <?php
      }elseif (isset($_GET['success']) && $_GET['success'] == 3) {
        echo '<div id="toast_db"> </div>';
        ?>
        <script>
          function toast({title = '', message = '', type = 'info', duration = 3000}) { 
            const main = document.getElementById('toast_db')
            if (main) {
              const toast = document.createElement('div');
              toast.classList.add('toast',`toast_${type}`);
              toast.innerHTML = `
                    <div class="toast_icon-error">
                      <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="toast_body">
                      <h3 class="toast_title_error">${title}</h3>
                      <p class="toast_msg">${message}</p>
                    </div>
              `;
              main.appendChild(toast);
            }
          }

          toast({
            title: 'Error',
            message: 'Rất tiếc! Bé đã có nhà mới!',
            type: 'error',
            duration: 3000
          });
        </script>
      <?php
      }
      ?>
      <?php
      use Carbon\Carbon;
      use Carbon\CarbonInterval;
      $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
  ?>

  <?php
    $sql_chitiet = "SELECT * FROM thucung,loaithucung,giongloai WHERE loaithucung.maLoai=giongloai.maLoai AND thucung.maLoai = loaithucung.maLoai 
                    AND thucung.maTC = '$_GET[maTC]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    $maGiong = $_GET['maGiong'];
    $id = $_GET['id'];
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) { 
    // $giongloai = $row_chitiet['maGiong'];
  ?>
    
    <!-- Start Main -->
    <div id="main">
      <div class="container">
        <div class="product-content">
          <div class="product-content-left">
            <div class="product-content-left-big-img">
              <img src="admin/quanlythucung/uploads/<?php echo $row_chitiet['hinhAnh'] ?>" alt="">
            </div>
          </div>
          <form method="POST" action="cart_add.php?maTC=<?php echo $row_chitiet['maTC'] ?>&maGiong=<?php echo $maGiong ?>&id=<?php echo $id ?>" class="product-content-right">
              <div class="product-content-right-product-name">
                <span><?php echo $row_chitiet['tenTC'] ?></span>
                <p>MSP: <?php echo $row_chitiet['maTC'] ?></p>
              </div>
              <div class="product-content-right-product-price">
                <p><?php echo number_format($row_chitiet['gia'],0,',','.').' VNĐ' ?></p>
              </div>
              <?php
                if($row_chitiet['tinhTrang']=='Còn Hàng'){
                  if ($row_chitiet['ngayVeNha'] <= $now && $row_chitiet['vacxin'] == 3) {
              ?>
                  <div class="product-content-right-product-input" >
                    <input  type="submit" name="themgiohang"  value="Đưa bé về nhà"></input>
                  </div>
                <?php
                  }else{
                ?>
                  <div class="product-content-right-product-input" >
                    <input style="text-align: center;" type="submit" name="chuasansang" value="Bé chưa sẵn sàng" ></input>
                  </div>
                  <?php
                    }
                }else {
                  ?>
                <div class="product-content-right-product-input" >
                    <input style="text-align: center;" type="submit" name="daban" value="Đã bán"></input>
                </div> 
                <?php
                    }
                
                  ?>
              <div class="product-content-right-product-details">
                <p><?php echo $row_chitiet['moTa'] ?></p>
              </div>
              <div class="product-content-right-product-info">
                <div class="product-content-right-product-info-name">
                  <p>THÔNG TIN CỦA BÉ CÚN<br>
                  <span>-------------------------------------------------------------------</span></p>
                </div>
                <div class="product-content-right-product-info-content">
                  <ul>
                    <li>Ngày sinh: <?php echo $row_chitiet['ngaySinh'] ?></li>
                    <li>Giới tính: <?php echo $row_chitiet['giong'] ?></li>
                    <li> Màu: <?php echo $row_chitiet['mau'] ?> </li>
                    <li>Vacxin: Đã tiêm <?php echo $row_chitiet['vacxin'] ?> mũi</li>
                    <li>Giấy tờ: <?php echo $row_chitiet['giayTo'] ?></li>
                    <li>Bảo hành: <?php echo $row_chitiet['baoHanh'] ?> ngày </li>
                    <li>Ngày có thể về nhà mới: <?php echo $row_chitiet['ngayVeNha'] ?></li>
                    <li>Tình trạng: <?php echo $row_chitiet['tinhTrang'] ?></li>
                  </ul>
                </div>
              </div>
          </form>
        </div>
      </div>
        <?php
          }
        ?>
        <?php
        include('admin/connect/connect.php');
        $sql_pro = "SELECT * FROM loaithucung, thucung WHERE   loaithucung.maLoai = thucung.maLoai
                    AND thucung.maLoai = '$_GET[id]' 
                    AND thucung.maTC != '$_GET[maTC]'
                    AND thucung.maGiong = '$_GET[maGiong]' 
                    order by rand() asc LIMIT 4";
        $query_pro = mysqli_query($mysqli, $sql_pro);
        
        $sql_cate = "SELECT * FROM loaithucung WHERE loaithucung.maLoai = '$_GET[id]' LIMIT 1";
        $query_cate = mysqli_query($mysqli, $sql_cate);
        $row_title = mysqli_fetch_array($query_cate);
      ?>
        <div class="product">
          <div class="title">
            <h2> 
              <b></b>
              <span>Các Bé <?php echo $row_title['tenLoai'] ?> Khác</span>
            </h2>
        </div>
        <div class="list-product">
            <?php
            while ($row= mysqli_fetch_array($query_pro)){
            ?>
              <div class="item">
               <a href="details.php?thucung&maTC=<?php echo $row['maTC'] ?>&maGiong=<?php echo $maGiong ?>&id=<?php echo $id ?>">
                  <img src="admin/quanlythucung/uploads/<?php echo $row['hinhAnh'] ?>" >
                </a>
                <div class="name"><?php echo $row['tenTC'] ?></div>
                <div class="id">MSP: <?php echo $row['maTC'] ?></div>
                <?php
                  if($row['tinhTrang']=='Còn Hàng'){
                ?>
                <div class="price"><?php echo number_format($row['gia'],0,',','.').' VNĐ' ?></div>
                <?php
                  }else{
                ?>
                <div class="price" style="color:red;">Đã bán</div>
              <?php
                }
              ?>
              </div>
            <?php
            }
            ?>
        </div>
        
        <div class="more">
              <a href="thucung.php?thucung&id=<?php echo $row_title['maLoai'] ?>">Xem thêm
              
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="10" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                  <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                </svg>
              </a>
              
        </div>
      </div>
         
    </div>
    <!-- End Main -->
    <?php
      include("footer.php");
    ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>





  </body>
  
</html>