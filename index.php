
<!DOCTYPE html>
<html>
  <head>
    <title>Yeni Pet Shop</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <!--Start of Fchat.vn--><script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=65ef04bafb80f87c09755fca" async="async"></script><!--End of Fchat.vn-->
  </head>
  <body>
    <?php
      if (isset($_GET['dn']) && $_GET['dn'] == 1) {
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
            message: 'Đăng nhập thành công!',
            type: 'success',
            duration: 3000
          });
        </script>
      <?php
      }elseif (isset($_GET['dx']) && $_GET['dx'] == 1) {
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
            message: 'Đăng xuất thành công!',
            type: 'success',
            duration: 3000
          });
        </script>
      <?php
      }elseif (isset($_GET['dk']) && $_GET['dk'] == 1) {
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
            message: 'Đăng ký tài khoản thành công!',
            type: 'success',
            duration: 3000
          });
        </script>
      <?php
      }
      include("header.php");
      include("slider_index.php");
      
      
      include("content.php");
      include("footer.php");
    ?>
  </body>
</html>
