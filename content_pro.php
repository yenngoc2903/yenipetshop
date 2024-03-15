<?php
    // ob_start();
    // session_start();
    if(isset($_GET['trang'])){
      $page = $_GET['trang'];
    }else {
      $page = 1;
    }
    if($page == '' || $page == 1){
      $begin = 0;
    }else {
      $begin = ($page*8)-8;
    }
    include('admin/connect/connect.php');
    $sql_pro = "SELECT * FROM thucung,loaithucung WHERE loaithucung.maLoai=thucung.maLoai  AND thucung.maLoai='$_GET[id]' order by maTC DESC LIMIT $begin, 8";
    $query_pro = mysqli_query($mysqli,$sql_pro);

    

    
    // lấy tên loại thú cưng
    $id =$_GET['id'];
    $sql_cate = "SELECT * FROM loaithucung WHERE  loaithucung.maLoai = '$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>
    <!-- Start Content -->
      <div id="content_pro">
        <div class="cate">
          <aside>
            <div class="title">
              <p>Loại Giống</p>
            </div>
            <?php
              $sql_giong = "SELECT * FROM giongloai WHERE  maLoai='$_GET[id]' ORDER BY tenGiong ASC ";
              $query_giong = mysqli_query($mysqli,$sql_giong);
            ?>
            <ul>
            
              <a href=""><li>Tất cả</li></a>
              <?php
              while ($row_giong = mysqli_fetch_array($query_giong)){
              ?>
              <a href="giong.php?magiong=<?php echo $row_giong['maGiong'] ?>&id=<?php echo $id?>"><li><?php echo $row_giong['tenGiong'] ?></li></a>
              <?php
                }
              ?>
            </ul>
          </aside>
        </div>
        <div class="product">
          <div class="title">
            <h2> 
              <span> <?php echo $row_title['tenLoai'] ?> Cảnh Thuần Chủng Đang Bán</span>
            </h2>
          </div>
          <div class="list-product">
              <?php
              while ($row_pro = mysqli_fetch_array($query_pro)){
              ?>
              <div class="item">
              <a href="details.php?thucung&maTC=<?php echo $row_pro['maTC'] ?>&id=<?php echo $row_pro['maLoai'] ?>&maGiong=<?php echo $row_pro['maGiong']?>">
                  <img src="admin/quanlythucung/uploads/<?php echo $row_pro['hinhAnh'] ?>" >
                </a>
                <div class="name"><?php echo $row_pro['tenTC'] ?></div>
                <div class="id">MSP: <?php echo $row_pro['maTC'] ?></div>
                <?php
                  if($row_pro['tinhTrang']=='Còn Hàng'){
                ?>
                <div class="price"><?php echo number_format($row_pro['gia'],0,',','.').' VNĐ' ?></div>
                <?php
                  }else{
                ?>
                <div class="price" style="color:red;">Đã bán</div>
              <?php
                }
              ?>
              </div>
              <?php
              }
              ?>
          </div>
        
          <div style="clear:both;"></div>
        <?php
          $sql_trang = mysqli_query($mysqli,"SELECT * FROM thucung WHERE maLoai = '$_GET[id]'");
          $row_count = mysqli_num_rows($sql_trang);
          $row_trang = mysqli_fetch_array($sql_trang);
          $trang = ceil($row_count/8);
        ?>
        <?php
            for($i=1;$i<=$trang;$i++){
          ?>
        <ul class="list_page">
          <li <?php if($i==$page){echo 'style="background: #FFB35A;"';}else{echo '';} ?>><a href="?id=<?php echo $row_trang['maLoai'] ?>&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
          <?php
            }
          ?>
        </ul>
        </div>
      </div>
    <!-- End Content -->