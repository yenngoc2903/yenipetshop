<!DOCTYPE html>
<html>
  <head>
    <title>Trang cá nhân</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
    <?php
      include("header.php");
      include('admin/connect/connect.php');
      $id_KH = $_SESSION['id_KH'];
	    $sql_lietke_kh = "SELECT * FROM khachhang WHERE  maKH='$id_KH' ";
	    $query_lietke_kh = mysqli_query($mysqli,$sql_lietke_kh);
      if (isset($_GET['sua']) && $_GET['sua'] == 2) {
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
      }elseif (isset($_GET['huydh']) && $_GET['huydh'] == 1) {
        echo '<div id="toast_huydh"> </div>';
        ?>
        <script>
          function toast({title = '', message = '', type = 'info', duration = 3000}) { 
            const main = document.getElementById('toast_huydh')
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
            message: 'Huỷ đơn hàng thành công!',
            type: 'success',
            duration: 3000
          });
        </script>
      <?php
      }
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
    <div id="xacnhan" style="padding-top:20px;display:flex">
          <div class="content" style="width:100%;margin: 0 50px" >
            <div class="thongtin" style="width:60%;border-top:none">
              <table>
                <p>THÔNG TIN KHÁCH HÀNG</p>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($query_lietke_kh)){
                  $i++;
                ?>
                <div class="chitiet">
                  <div class="item"><span>Họ và tên: </span>  <?php echo $row['tenKH'] ?></div>
                  <div class="item"><span>Email: </span> <?php echo $row['email'] ?></div>
                  <div class="item"><span>Số điện thoại:</span> <?php echo $row['SDT'] ?></div>
                  <div class="item"><span>Địa chỉ:</span> <?php echo $row['diaChi'] ?></div>
                  
                </div>
                <div class="action_update">
                    <a href="updata_user.php?maKH=<?php echo $row['maKH'] ?>">Sửa thông tin</a> 
                </div>
                <?php
                  }
                ?>
              </table>
            </div>
          
            <?php
                $id_KH = $_SESSION['id_KH'];
                $sql_lietke_dh = "SELECT * FROM khachhang,donhang WHERE khachhang.maKH=donhang.maKH AND khachhang.maKH='$id_KH' ";
                $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
            ?>
          
            <div class="donhang" style="width:100%;margin: 10px 10px;border-left:1px solid #ccc;">
                    <table style="margin: 0 10px;" >
                    <p>THÔNG TIN ĐƠN HÀNG</p>
                    <tr class="menu">
                      <th >STT</th>
                      <th>MÃ ĐƠN HÀNG</th>
                      <th style="width: 180px;">NGÀY ĐẶT</th>
                      <th>TRẠNG THÁI</th>
                      <th>#</th>
                    </tr>
                    <?php
                      $i = 0;
                      while ($row = mysqli_fetch_array($query_lietke_dh)){
                        $i++;
                    ?>
                    <tr >
                    <td> <?php echo $i ?> </td>
                    <td> <?php echo $row['codeDH'] ?> </td>
                    <td> <?php echo $row['ngayDat'] ?> </td>
                    <td>
                        <?php 
                            // $ngayDat = strtotime($row['ngayDat']);
                            // $ngayHienTai = strtotime(date('Y-m-d'));

                            // $soNgay = ($ngayHienTai - $ngayDat) / (60 * 60 * 24);

                            if ($row['trangThai'] == 1) {
                                // if ($soNgay >= 1 && $soNgay < 6) {
                                //     echo '<a style="text-decoration: none; color: orange;" href="">Đang giao hàng</a>';
                                // } elseif ($soNgay >= 6) {
                                //     echo 'Đã nhận được hàng';
                                // } else {
                                    echo '<a style="text-decoration: none; color: red;" href="">Chưa xác nhận</a>';
                                }else {
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
                            <!-- <a href="xuly_donhang.php?code=<?php echo $row['codeDH'] ?>">Huỷ</a> -->
                            <a href="#" onclick="confirmDelete(<?php echo $row['codeDH'] ?>)">Huỷ</a>
                      
                          <script>
                          function confirmDelete(codeDH) {
                              var confirmDelete = confirm("Xác nhận huỷ đơn hàng?");
                          
                              if (confirmDelete) {
                                  window.location.href = 'xuly_donhang.php?code=' + codeDH;
                              }
                          }
                          </script>
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
          </div>
        </div>
      </div>
    
      
    

    <?php
      include("footer.php");
    ?>
  </body>
</html>