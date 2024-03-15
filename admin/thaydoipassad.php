<?php
  session_start();
  if(!isset($_SESSION['dangnhap'])){
    header('Location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thay đổi mật khẩu admin</title>
  <link rel="stylesheet" href="assets\css\main.css">
  <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<body>
  <?php
      include("connect/connect.php");
      include("header_ad.php"); 
  ?>
  <?php
	if(isset($_POST['doimatkhau'])){
		$matkhau_cu = $_POST['password_cu'];
		$matkhau_moi = $_POST['password_moi'];
		$sql = "SELECT * FROM admin WHERE password='".$matkhau_cu."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$sql_update = mysqli_query($mysqli,"UPDATE admin SET password='".$matkhau_moi."'");
      echo '<div id="toast_tc"> </div>';
        ?>
        <script>
          function toast({title = '', message = '', type = 'info', duration = 3000}) { 
            const main = document.getElementById('toast_tc')
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
            message: 'Đổi mật khẩu thành công!',
            type: 'success',
            duration: 3000
          });
        </script>
      <?php
      }else{
        echo '<div id="toast_ktc"> </div>';
        ?>
        <script>
          function toast({title = '', message = '', type = 'info', duration = 3000}) { 
            const main = document.getElementById('toast_ktc')
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
            message: 'Mật khẩu hiện tại không chính xác!',
            type: 'error',
            duration: 3000
          });
        </script>
      <?php
      }
      }
      ?>
  <!-- Start Main -->
  <div id="thaydoimatkhau">
    
  <form action="" autocomplete="off" method="POST">
  <p>Thay đổi mật khẩu admin</p>
		<table class="table_change" >
			<tr class="item">
				<td>Mật khẩu cũ</td>
				<td><input type="text" name="password_cu"></td>
			</tr>
			<tr class="item">
				<td>Mật khẩu mới</td>
				<td><input type="text" name="password_moi"></td>
			</tr>
			<tr class="item">
				<td colspan="2"><input class="submit" type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
			</tr>
	</table>
	</form>
  </div>
  <!-- End Main -->
  <?php
      include("footer_ad.php");
  ?>
  
  
</body>
</html>