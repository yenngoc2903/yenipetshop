<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
    <?php
      session_start();
      include('connect/connect.php');
      if(isset($_POST['dangnhapad'])){
        $taikhoan = $_POST['username'];
        $matkhau = $_POST['password'];
        $sql = "SELECT * FROM admin WHERE username = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count>0){
          $_SESSION['dangnhap'] = $taikhoan;
          header("Location:index.php?ad=1");
        }else {
            echo '<div id="toast_sua"> </div>';
            ?>
            <script>
              function toast({title = '', message = '', type = 'info', duration = 3000}) { 
                const main = document.getElementById('toast_sua')
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
                message: 'Chỉ có thể đăng nhập bằng tài khoản admin!',
                type: 'error',
                duration: 3000
              });
            </script>
          <?php
          }
        }
      
    ?>
  <div class="sign-up">
  <div class="sign-up-main">
    <form action="" method="POST">
      <table>
        <h1 class="sign-up-main-heading">Đăng nhập ADMIN</h1>
        <label class="sign-up-main-label">Tên đăng nhập</label>
        <input type="text" name="username" class="sign-up-main-input-gmail" placeholder="Nhập tên đăng nhập.." >
        <label class="sign-up-main-label">Mật khẩu</label>
        <input type="password" name="password" class="sign-up-main-input-password" placeholder="Nhập mật khẩu..">   
        <input class="sign-up-main-submit" type="submit" name="dangnhapad" value="Đăng nhập"></td>
      </table>
    </form>
  </div>
  </div>
    <?php
      include("../footer.php");
    ?>
   
  </body>
</html>
