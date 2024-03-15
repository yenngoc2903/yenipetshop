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
  <title>Thú Cưng Tồn Kho</title>
  <link rel="stylesheet" href="assets\css\main.css">
  <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script>
        
        window.onload = function() {
            if (sessionStorage.getItem('scrollPosition')) {
                window.scrollTo(0, sessionStorage.getItem('scrollPosition'));
            }

  
            window.onbeforeunload = function() {
                sessionStorage.setItem('scrollPosition', window.scrollY);
            };
        };
    </script>
</head>
<body>
  <?php
      include("connect/connect.php");
      include("header_ad.php"); 
  ?>
  
  <div id="quanly" style="padding-top:150px;margin:0 20px;padding-bottom:50px">
    <div class="thongke">

    <?php
      
      $sql_thongke = "SELECT * FROM thongke ORDER BY id_thongke ASC  ";
      $query_thongke = mysqli_query($mysqli,$sql_thongke);
      $tongdoanhthu = 0;
      while ($row_thongke = mysqli_fetch_array($query_thongke)) {
        $tongdoanhthu = $tongdoanhthu + $row_thongke['doanhThu'];
      }
  ?>

      <a href="index.php">
        <div class="item" style="background-color: #a7c2df;">
        <h4>Tổng Doanh Thu</h4>
        <p><?php echo number_format($tongdoanhthu, 0, ',', '.') . ' VNĐ'; ?></p>
        </div>
      </a>

      <?php
        $sql_thucung = "SELECT * FROM thucung ORDER BY maTC ASC ";
        $query_thucung = mysqli_query($mysqli,$sql_thucung);
        $tongthucung = 0;
        while ($row_thucung = mysqli_fetch_array($query_thucung)) {
          $tongthucung = $tongthucung + 1;
        }
      ?>

      <a href="quanlythucung/lietke.php">
        <div class="item" style="background-color: rgb(233, 219, 194);">
          <h4>Tổng Thú Cưng</h4>
          <p><?php echo $tongthucung ?></p>
        </div>
      </a>

      <?php
        $sql_thucung = "SELECT * FROM thucung WHERE tinhTrang='Hết Hàng' ORDER BY maTC ASC ";
        $query_thucung = mysqli_query($mysqli,$sql_thucung);
        $tongthucung = 0;
        while ($row_thucung = mysqli_fetch_array($query_thucung)) {
          $tongthucung = $tongthucung + 1;
        }
      ?>

      <a href="sodothucung.php">
        <div class="item" style="background-color: rgb(243, 210, 243);">
          <h4>Đã Bán</h4>
          <p><?php echo $tongthucung ?></p>
        </div>
      </a>

      <?php
        $sql_thucung = "SELECT * FROM thucung WHERE tinhTrang='Còn Hàng' ORDER BY maTC ASC ";
        $query_thucung = mysqli_query($mysqli,$sql_thucung);
        $tongthucung = 0;
        while ($row_thucung = mysqli_fetch_array($query_thucung)) {
          $tongthucung = $tongthucung + 1;
        }
      ?>

      <a href="tonkho.php">
        <div class="item" style="">
          <h4>Tồn Kho</h4>
          <p><?php echo $tongthucung ?></p>
        </div>
      </a>

      <?php
        $sql_donhang = "SELECT * FROM donhang ORDER BY maDH ASC ";
        $query_donhang = mysqli_query($mysqli,$sql_donhang);
        $tongdonhang = 0;
        while ($row_donhang = mysqli_fetch_array($query_donhang)) {
          $tongdonhang = $tongdonhang + 1;
        }
      ?>

      <a href="quanlydonhang/lietke.php">
        <div class="item" style="background-color: rgb(207, 234, 209);">
          <h4>Tổng Đơn Hàng</h4>
          <p><?php echo $tongdonhang ?></p>
        </div>
      </a>

      <?php
        $sql_khachhang = "SELECT * FROM khachhang ORDER BY maKH ASC ";
        $query_khachhang = mysqli_query($mysqli,$sql_khachhang);
        $tongnguoidung = 0;
        while ($row_khachhang = mysqli_fetch_array($query_khachhang)) {
          $tongnguoidung = $tongnguoidung + 1;
        }
      ?>

      <a href="quanlynguoidung/lietke.php">
        <div class="item" style="background-color: rgb(234, 207, 207);">
          <h4>Tổng người dùng</h4>
          <p><?php echo $tongnguoidung ?></p>
        </div>
      </a>
    </div>
    <div class="bieudo">
    <div class="sodo1" >
      <h5>Sơ đồ thống kê số lượng thú cưng tồn kho</h5>
      <div id="tonkho" style="height: 300px;margin: 30px 200px;z-indez:1"></div>
      <h5>Danh sách thú cưng tồn kho</h5>
      
      <div class="bieudo">
        <div class="sodo1">
          <div class="date">
            <p>
              <form method="post">

              

                <label for="duration">Chọn khoảng thời gian:</label>
                <select class="select-date" name="selected_date">
                    <option value="custom">Tùy chọn ngày</option>
                    <option value="7">7 ngày</option>
                    <option value="30">30 ngày</option>
                    <option value="60">60 ngày</option>
                </select>


                <div id="custom-date-range">
                    <label for="start-date">Từ ngày:</label>
                    <input type="date" id="start-date" name="start-date">

                    <label for="end-date">Đến ngày:</label>
                    <input type="date" id="end-date" name="end-date">

                    
                </div>
                <label for="duration">Lọc:</label>
                <select class="select-date" name="selected_pet">
                    <option value="custom">Tuỳ chọn</option>
                    <option value="cho">Chó</option>
                    <option value="meo">Mèo</option>
                </select>
                <label for="duration">Giá:</label>
                <select class="select-date" name="sapxep">
                    <option value="custom">Tuỳ chọn</option>
                    <option value="tang">Tăng dần</option>
                    <option value="giam">Giảm dần</option>
                </select>
                
                <button type="submit" id="submit-custom-date">Submit</button>
              </form>
            </p> 
          </div>
            
        </div>
      </div>
   <?php   
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql_tonkho = "SELECT *
                   FROM thucung
                   INNER JOIN giongloai ON thucung.maGiong = giongloai.maGiong
                   INNER JOIN loaithucung ON thucung.maLoai = loaithucung.maLoai
                   WHERE tinhTrang = 'Còn Hàng'";

    // Xử lý lựa chọn ngày
    if (isset($_POST['selected_date']) && $_POST['selected_date'] == 'custom') {
        $start_date = $_POST['start-date'];
        $end_date = $_POST['end-date'];
        if (!empty($start_date) && !empty($end_date)) {
            $sql_tonkho .= " AND ngayThem >= '$start_date' AND ngayThem <= '$end_date'";
        }
    } else {
        $interval = 0;
        if (isset($_POST['selected_date'])) {
            switch ($_POST['selected_date']) {
                case '7':
                    $interval = 7;
                    break;
                case '30':
                    $interval = 30;
                    break;
                case '60':
                    $interval = 60;
                    break;
            }
            $sql_tonkho .= " AND ngayThem >= DATE_SUB(CURDATE(), INTERVAL $interval DAY)";
        }
    }
    
    // Xử lý lựa chọn loại thú cưng
if (isset($_POST['selected_pet']) && $_POST['selected_pet'] != 'custom') {
  $selected_pet = $_POST['selected_pet'];
  $sql_tonkho .= " AND loaithucung.tenLoai = '$selected_pet'";
}

// Xử lý lựa chọn giá
if (isset($_POST['sapxep']) && $_POST['sapxep'] != 'custom') {
  if ($_POST['sapxep'] == 'tang') {
      $sql_tonkho .= " ORDER BY gia ASC";
  } elseif ($_POST['sapxep'] == 'giam') {
      $sql_tonkho .= " ORDER BY gia DESC";
  }
}


} else {
    $sql_tonkho = "SELECT *
                   FROM thucung
                   INNER JOIN giongloai ON thucung.maGiong = giongloai.maGiong
                   INNER JOIN loaithucung ON thucung.maLoai = loaithucung.maLoai
                   WHERE tinhTrang = 'Còn Hàng'";
}

$query_pro = mysqli_query($mysqli, $sql_tonkho);
?>

    
  <div class="content" style="margin-top:20px;">
    <div class="donhang">
      <table class="quanly_table" >
        <tr>
          <th style="width: 100px">Ảnh</th>
          <th style="width:170px">Mã thú cưng</th>
          <th style="width:170px">Tên thú cưng</th>
          <th style="width:170px">Loại thú cưng</th>
          <th style="width:80px">Giống</th>
          <th style="width: 10px">Giá</th>
          <th style="width: 100px">Ngày sinh</th>
          <th style="width: 10px">Giới tính</th>
          <th style="width: 10px">Màu</th>
          <th style="width: 10px">Vacxin</th>
          <th style="width: 100px">Giấy tờ</th>
          <th style="width: 100px">Ngày về nhà mới</th>
          <th style="width: 90px">Tình trạng </th>
          <th style="width: 90px">Ngày thêm </th>
          
        </tr>
        <?php
              $data = array();
              while ($row= mysqli_fetch_array($query_pro)){
                $data[] = $row; 
             
              ?>
        <tr>
          <td> <img src="quanlythucung/uploads/<?php echo $row['hinhAnh'] ?>" width=100px; height=100px>  </td>
          <td> <?php echo $row['maTC'] ?> </td>
          <td> <?php echo $row['tenTC'] ?> </td>
          <td> <?php echo $row['tenLoai'] ?> </td>
          <td> <?php echo $row['tenGiong'] ?> </td>
          <td> <?php echo $row['gia']  ?> </td>
          <td> <?php echo $row['ngaySinh'] ?> </td>
          <td> <?php echo $row['giong'] ?> </td>
          <td> <?php echo $row['mau'] ?> </td>
          <td> <?php echo $row['vacxin'] ?> </td>
          <td> <?php echo $row['giayTo'] ?> </td>
          <td> <?php echo $row['ngayVeNha'] ?> </td>
          <td> <?php echo $row['tinhTrang'] ?> </td>
          <td> <?php echo $row['ngayThem'] ?> </td>
        </tr> 
        
        <?php
          }
          $_SESSION['query_pro_data'] = $data; 
      
        ?>
      </table>
        <a id="xuatfile" href="xuatfile.php">Xuất file</a>
        
    </div>  
    </div>  
  </div>    

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var chart = new Morris.Bar({
            element: 'tonkho',
            xkey: 'tenLoai',
            ykeys: ['soLuong'],
            labels: ['Số Lượng'],
            barSizeRatio: 0.5
        });

        thongke();

        function thongke() {
            $.ajax({
                url: "thongketonkho.php",
                method: "POST",
                dataType: "JSON",
                success: function (data) {
                    chart.setData(data);
                    displayLoaiLinks(data);
                }
            });
        }
});
    
</script>
  </div>
<?php
      include("footer_ad.php");
?>

  
</body>
</html>