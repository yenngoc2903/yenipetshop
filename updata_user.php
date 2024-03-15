<!DOCTYPE html>
<html>
  <head>
    <title>Sửa thông tin tài khoản</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
    <?php
      include('admin/connect/connect.php');
      include("header.php");
      if (isset($_GET['success']) && $_GET['success'] == '1') {
      $sql_lietke_kh = "SELECT * FROM khachhang WHERE  maKH='$_GET[maKH]' ";
      $query_lietke_kh = mysqli_query($mysqli,$sql_lietke_kh);
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
      
    <div id="quanly" style="padding-top:20px;margin:0 20px">
      <p>Sửa thông tin tài khoản</p>
      <table class="quanly_table">
        <?php
          while ($row = mysqli_fetch_array($query_lietke_kh)){
        ?>
          <form action="xuly_user.php?maKH=<?php echo $_GET['maKH'] ?>" method="POST" enctype="multipart/form-data">
            <tr class="item">
              <td>Họ và tên</td>
              <td> <input type="text" value="<?php echo $row['tenKH'] ?>" name="tenKH"> </td>
            </tr>
            <tr class="item">
              <td>Email</td>
              <td> <input type="text" value="<?php echo $row['email'] ?>" name="email"> </td>
            </tr>
            <tr class="item">
              <td>Số điện thoại</td>
              <td> <input type="text" value="<?php echo $row['SDT'] ?>" name="SDT"> </td>
            </tr>
            <tr class="item">
              <td>Địa chỉ</td>
              <td> <input type="text" value="<?php echo $row['diaChi'] ?>" name="diaChi"> </td>
            </tr>
            <tr class="item">
              <td colspan="2"><input class="submit" type="submit" name="suathongtin2" value="Sửa thông tin" ></td>
            </tr>
          </form>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
    <?php
      }else {
    ?>

    <?php
      include("header.php");
      include('admin/connect/connect.php');
	    $sql_lietke_kh = "SELECT * FROM khachhang WHERE  maKH='$_GET[maKH]' ";
	    $query_lietke_kh = mysqli_query($mysqli,$sql_lietke_kh);
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
      
    <div id="quanly" style="padding:20px">
      <p>Sửa thông tin tài khoản</p>
      <table class="quanly_table">
        <?php
          while ($row = mysqli_fetch_array($query_lietke_kh)){
        ?>
          <form action="xuly_user.php?maKH=<?php echo $_GET['maKH'] ?>" method="POST" enctype="multipart/form-data">
            <tr class="item">
              <td>Họ và tên</td>
              <td> <input type="text" value="<?php echo $row['tenKH'] ?>" name="tenKH"> </td>
            </tr>
            <tr class="item">
              <td>Email</td>
              <td> <input type="text" value="<?php echo $row['email'] ?>" name="email"> </td>
            </tr>
            <tr class="item">
              <td>Số điện thoại</td>
              <td> <input type="text" value="<?php echo $row['SDT'] ?>" name="SDT"> </td>
            </tr>
            <tr class="item">
              <td>Địa chỉ</td>
              <td> <input type="text" value="<?php echo $row['diaChi'] ?>" name="diaChi"> </td>
            </tr>
            <tr class="item">
              <td colspan="2"><input class="submit" type="submit" name="suathongtin" value="Sửa thông tin" ></td>
            </tr>
          </form>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
    <?php
      }
    ?>  
    

    <?php
      include("footer.php");
    ?>
  </body>
</html>