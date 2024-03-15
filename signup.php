<?php
     session_start();
     require('carbon/autoload.php');
     use Carbon\Carbon;
     use Carbon\CarbonInterval;
  include("admin/connect/connect.php");
  if(isset($_POST['dangky'])){
    $tenKH = $_POST['tenKH'];
    $email = $_POST['email'];
    $SDT = $_POST['SDT'];
    $diaChi = $_POST['diaChi'];
    $matkhau = $_POST['matkhau'];

    if (empty($tenKH) || empty($email) || empty($SDT) || empty($diaChi) || empty($matkhau) ) {
      echo '<div id="toast"> </div>';
      ?>
      <script>
        function toast({title = '', message = '', type = 'info', duration = 3000}) { 
          const main = document.getElementById('toast')
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
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo '<div id="toast"> </div>';
      ?>
      <script>
        function toast({title = '', message = '', type = 'info', duration = 3000}) { 
          const main = document.getElementById('toast')
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
          message: 'Email không hợp lệ!',
          type: 'error',
          duration: 3000
        });
      </script>
    <?php
    }elseif (!preg_match('/^\d{10,11}$/', $SDT)) {
      echo '<div id="toast"> </div>';
      ?>
      <script>
        function toast({title = '', message = '', type = 'info', duration = 3000}) { 
          const main = document.getElementById('toast')
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
          message: 'Số điện thoại không hợp lệ!',
          type: 'error',
          duration: 3000
        });
      </script>
    <?php
     
  }elseif (strlen($matkhau) < 6 || !preg_match('/[A-Za-z]/', $matkhau) || !preg_match('/\d/', $matkhau)) {
    echo '<div id="toast"> </div>';
      ?>
      <script>
        function toast({title = '', message = '', type = 'info', duration = 3000}) { 
          const main = document.getElementById('toast')
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
          message: 'Mật khẩu phải từ 6 ký tự, bao gồm chữ và số!',
          type: 'error',
          duration: 3000
        });
      </script>
    <?php
  }else {
     $now = Carbon::now('Asia/Ho_Chi_Minh');
     $sql_dangky = mysqli_query($mysqli, "INSERT INTO khachhang(tenKH,email,diaChi,matkhau,SDT,ngayDK) 
                                          VALUE ('".$tenKH."','".$email."','".$diaChi."','".$matkhau."','".$SDT."','".$now."')");
    if($sql_dangky){
      $_SESSION['dangky'] = $tenKH;
      $_SESSION['id_KH'] = mysqli_insert_id($mysqli);
      header("Location:index.php?dk=1");
    }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký thành viên</title>
  <link rel="stylesheet" href="assets\css\main.css">
  <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
    <?php
      include("header.php");
    ?>
    
  <div class="sign-up">
  <div class="sign-up-main">
    <form action="" method="POST">
      <table>
        <h1 class="sign-up-main-heading">Đăng ký thành viên</h1>

        <label class="sign-up-main-label">Họ và tên</label>
        <input type="text" name="tenKH" class="sign-up-main-input-gmail" placeholder="Nhập họ và tên.." >
        
        <label class="sign-up-main-label">Email</label>
        <input type="text" name="email" class="sign-up-main-input-password" placeholder="Nhập email.."> 
        
        <label class="sign-up-main-label">Số điện thoại</label>
        <input type="text" name="SDT" class="sign-up-main-input-gmail" placeholder="Nhập số điện thoại.." >
        
        <label class="sign-up-main-label">Địa chỉ</label>
        <input type="text" name="diaChi" class="sign-up-main-input-password" placeholder="Nhập địa chỉ..">  
        
        <label class="sign-up-main-label">Mật khẩu</label>
        <input type="text" name="matkhau" class="sign-up-main-input-password" placeholder="Nhập mật khẩu..">  

        <input class="sign-up-main-submit" type="submit" name="dangky" value="Đăng ký thành viên"></td>
        <p class="sign-up-main-signup">
          <span>Bạn đã có tài khoản? Đăng nhập <a href="login.php"class="sign-up-main-signup-link">Tại đây</a></span>
        </p>
      </table>
    </form>
  </div>
  </div>
    <?php
      include("footer.php");
    ?>
  <script src="./assets/js/signup.js"></script>
 
</body>
</html>

 