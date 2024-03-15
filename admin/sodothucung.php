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
  <title>Thú Cưng Đã Bán</title>
  <link rel="stylesheet" href="assets\css\main.css">
  <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<body>
  <?php
      include("connect/connect.php");
      include("header_ad.php");
      $sql_thongke = "SELECT * FROM thongke ORDER BY id_thongke ASC  ";
      $query_thongke = mysqli_query($mysqli,$sql_thongke);
      $tongdoanhthu = 0;
      while ($row_thongke = mysqli_fetch_array($query_thongke)) {
        $tongdoanhthu = $tongdoanhthu + $row_thongke['doanhThu'];
      }
  ?>
  <!-- Start Main -->
  <div id="quanly" style="padding-top:150px;margin:0 20px;padding-bottom:50px">
    <div class="thongke">
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
          <h4>Tổng Thú Cưng Đã Bán</h4>
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
      <div class="sodo1">
      <div class="date">
          <h5>Sơ đồ thống kê thú cưng đã bán theo:  </h5>
          <p>
          <form>
            <label for="duration">Chọn khoảng thời gian:</label>
            <select class="select-date">
                <option value="custom">Tùy chọn ngày</option>
                <option value="1">1 ngày</option>
                <option value="7">7 ngày</option>
                <option value="30">30 ngày</option>
            </select>

            <div id="custom-date-range">
                <label for="start-date">Từ ngày:</label>
                <input type="date" id="start-date" name="start-date">

                <label for="end-date">Đến ngày:</label>
                <input type="date" id="end-date" name="end-date">

                <button type="button" id="submit-custom-date">Submit</button>
            </div>
        </form>

          </p> 
        </div>
        <div id="thucung" style="height: 300px;"></div>
        
      </div>
    </div>
   
 
    
  </div>
  <!-- End Main -->
  <?php
      include("footer_ad.php");
  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    var chart = new Morris.Bar({
        element: 'thucung',
        xkey: 'ngayDat',
        ykeys: ['cho', 'meo'],
        labels: ['Số lượng Chó', 'Số lượng Mèo'],
        barSizeRatio: 0.5
    });

    thongke(); 

    $('.select-date').change(function () {
        var thoigian = $(this).val();
        var dateRange = getDateRange();

        $.ajax({
            url: "thongkethucung.php",
            method: "POST",
            dataType: "JSON",
            data: {
                thoigian: thoigian,
                start_date: dateRange.start,
                end_date: dateRange.end
            },
            success: function (data) {
                chart.setData(data);
                $('#text-date').text(dateRange.text);
            }
        });
    });

    $('#submit-custom-date').click(function () {
        var dateRange = getDateRange();

        $.ajax({
            url: "thongkethucung.php",
            method: "POST",
            dataType: "JSON",
            data: {
                start_date: dateRange.start,
                end_date: dateRange.end
            },
            success: function (data) {
                chart.setData(data);
                $('#text-date').text(dateRange.text);
            }
        });
    });

    function thongke() {
        var text = '365 ngày qua';
        $('#text-date').text(text);
        $.ajax({
            url: "thongkethucung.php",
            method: "POST",
            dataType: "JSON",
            success: function (data) {
                chart.setData(data);
                $('#text-date').text(text);
            }
        });
    }

    function getDateRange() {
        var startDate = $('#start-date').val();
        var endDate = $('#end-date').val();
        var text = 'Tùy chọn ngày';

        if (startDate && endDate) {
            text = startDate + ' đến ' + endDate;
        }

        return {
            start: startDate,
            end: endDate,
            text: text
        };
    }
});

</script>


  
</body>
</html>