
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="assets\css\main.css">
  <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  <script src="https://www.gstatic.com/firebasejs/9.6.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.6.0/firebase-auth.js"></script>
</head>
<body>
    <?php
    session_start();
      include("header.php");
      include('admin/connect/connect.php');
      if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = $_POST['password'];
        $sql = "SELECT * FROM khachhang WHERE email = '".$email."' AND matkhau = '".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        
        if($count>0){
          $row_data = mysqli_fetch_array($row);
          $_SESSION['dangky'] = $row_data['tenKH'];
          $_SESSION['id_KH'] = $row_data['maKH'];
          header("Location:index.php?dn=1");
        }else {
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
          message: 'Email hoặc mật khẩu không chính xác!',
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
        <h1 class="sign-up-main-heading">Đăng nhập</h1>
        <label class="sign-up-main-label">Email</label>
        <input type="text" name="email" class="sign-up-main-input-gmail" placeholder="Nhập email.." >
        <label class="sign-up-main-label">Mật khẩu</label>
        <input type="password" name="password" class="sign-up-main-input-password" placeholder="Nhập mật khẩu..">   
        <input class="sign-up-main-submit" type="submit" name="dangnhap" value="Đăng nhập">
     
        <button onclick="signInWithGoogle()" class="sign-up-main-submit2">Đăng nhập bằng Google</button>
        <p class="sign-up-main-signup">
          <span>Bạn chưa có tài khoản? Đăng ký <a href="signup.php"class="sign-up-main-signup-link">Tại đây</a></span>
        </p>
      </table>
    </form>
  </div>
  </div>
  <!-- Start Footer -->
  <?php
    include("footer.php");
  ?>
  <!-- End Footer -->
  <script>
   function signInWithGoogle() {
      var provider = new firebase.auth.GoogleAuthProvider();

      firebase.auth().signInWithPopup(provider)
         .then((result) => {
            var user = result.user;
            console.log('User:', user);

            // Thêm logic xử lý tại đây, ví dụ: gửi thông tin về server để xác thực
         })
         .catch((error) => {
            console.error('Error:', error);
         });
   }
</script>

<!-- <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBfE38ozxP2YAPHNyhVhZu3H488mkUhXng",
    authDomain: "yenipetshop2023.firebaseapp.com",
    projectId: "yenipetshop2023",
    storageBucket: "yenipetshop2023.appspot.com",
    messagingSenderId: "768017674883",
    appId: "1:768017674883:web:e69755bab7fd3f9e86a1b6",
    measurementId: "G-7ZXS9FW5VZ"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script> -->

</body>
</html>