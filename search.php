<!DOCTYPE html>
<html>
  <head>
    <title>Yeni Pet Shop</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
  </head>
  <body>
    <?php
    include("header.php");
    include('admin/connect/connect.php');
    if(isset($_POST['timkiem'])){
      $tukhoa = $_POST['tukhoa'];
    }
    $sql_pro = "SELECT * FROM loaithucung, thucung, giongloai WHERE loaithucung.maLoai = thucung.maLoai AND thucung.maGiong=giongloai.maGiong
                AND (thucung.maTC LIKE '%".$tukhoa."%' 
                    OR thucung.tenTC LIKE '%".$tukhoa."%'
                    OR loaithucung.tenLoai LIKE '%".$tukhoa."%'
                    OR giongloai.tenGiong LIKE '%".$tukhoa."%'
                    OR loaithucung.maLoai LIKE '%".$tukhoa."%')";
    
    $query_pro = mysqli_query($mysqli,$sql_pro);
    
?>
    <div class="content_search">
      <div id="content">
        <div class="product">
          <div class="title">
            <h2> 
              <b></b>
              <span>Từ khoá tìm kiếm: <?php echo $_POST['tukhoa']; ?></span>
            </h2>
          </div>
          <div class="list-product">
            <?php
            while ($row= mysqli_fetch_array($query_pro)){
            ?>
              <div class="item">
              <a href="details.php?thucung&maTC=<?php echo $row['maTC'] ?>&id=<?php echo $row['maLoai'] ?>">
                  <img src="admin/quanlythucung/uploads/<?php echo $row['hinhAnh'] ?>" >
                </a>
                <div class="name"><?php echo $row['tenTC'] ?></div>
                <div class="id">MSP: <?php echo $row['maTC'] ?></div>
                <div class="price"><?php echo number_format($row['gia'],0,',','.').' VNĐ' ?></div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>          
    

    <?php
      include("footer.php");
    ?>
  </body>
</html>

