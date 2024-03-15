

    
      <div class="content_info">
        <div class="commit">
          <div class="commit-content">
            <div class="open">
              <p>Xin chào! Tụi mình là Yeni<span>PetShop</span> </p>
            </div>
            <p>YeniPetShop - Gắn kết Yêu Thương. YeNi Pet Shop không chỉ mang đến cho bạn chú cún
            cưng mà bạn yêu thích. Đến với YeNi Pet Shop bạn sẽ tìm cho mình được một người bạn
            trung thành. Từ người bạn này, chúng ta thêm yêu thương cuộc sống và những 
            người xung quanh. Hơn thế nữa, người bạn mới còn giúp bạn rèn luyện tính kiên 
            trì, chăm chỉ, có trách nhiệm, giàu tình yêu thương, nhân ái,... từ những việc
            cho cún ăn, huấn luyện cún, đi thể dục cùng cún và đi cafe cùng cún . . . Tôi 
            tin chắc rằng bạn sẽ có cuộc sống ý nghĩa hơn khi có người bạn này bên cạnh. 
            Sẽ thật thú vị biết bao khi luôn có “người” vẫy đuôi chờ bạn về nhà mỗi ngày. 
            Với sứ mệnh Gắn Kết Yêu Thương. YeNi Pet Shop Hân Hạnh Và Cảm Ơn!</p> <br>
            <a href="info.php">Xem thêm >></a>
          </div>
          <div class="commit-img">
            <img src="./assets/img/img1-info" alt="">
          </div>
        </div>
      </div>
      <div class="about">
        <div class="title_about">
          <p>YeniPetShop có gì nè?</p>
          <b></b>
        </div>
          <?php
            include('admin/connect/connect.php');
            $sql_loaithucung = "select * from loaithucung order by maLoai asc";
            $query_loaithucung = mysqli_query($mysqli,$sql_loaithucung);
          ?>
        <div class="info">
          <div class="item">
            <a href="thucung.php?thucung&id=1"><img src="./assets/img/img2-info.jpg" alt=""></a>
          </div>
          <div class="item">
            <a href="thucung.php?thucung&id=2"><img src="./assets/img/img3-info.jpg" alt=""></a>
          </div>
        </div>
      </div>
      <div class="benefit">
          <div class="content">
                <div class="heading">
                  <h2>Quyền lợi khi mua thú cưng</h2>
                  <b></b>
                </div>
                <div class="row">
                  <div class="col right clearfix">
                    <div class="icon"><i class="icon1"></i></div>
                    <div class="content">
                      <h3>Bảo Hành Sức Khoẻ</h3>
                      <div class="text">Bảo Hành 10 Ngày Toàn Diện - Bảo Hành 1 Đổi 1 Trong Vòng 365 Ngày</div>
                    </div>
                  </div>

                  <div class="col left clearfix">
                    <div class="icon"><i class="icon2"></i></div>
                    <div class="content">
                        <h3>Tư Vấn Chăm Sóc Trọn Đời</h3>
                        <div class="text">Tư Vấn Cách Nuôi, Y Tế, Chăm Sóc, Làm Đẹp, Huấn Luyện, Phối Giống, Sinh Sản  . . .</div>
                    </div>
                  </div>

                  <div class="col right clearfix">
                    <div class="icon"><i class="icon3"></i></div>
                    <div class="content">
                      <h3>Bảo Hành Thuần Chủng</h3>
                      <div class="text">Bảo Hành Thuần Chủng Trọn Đời – Nếu Khách Hàng Nhận Cún Không Thuần Chủng Có Thể Đổi Trả Mọi Lúc</div>
                    </div>
                  </div>

                  <div class="col left clearfix">
                    <div class="icon"><i class="icon4"></i></div>
                    <div class="content">
                        <h3>Đầy Đủ Giấy Tờ Microchip</h3>
                        <div class="text">Hợp Đồng Mua Bán, Giấy Chứng Nhận, Sổ Tiêm Phòng Và Tẩy Giun, Gắn Microchip Chứng Nhận Chủ Sở Hữu Thú Cưng Hợp Pháp . . .</div>
                    </div>
                  </div>

                  <div class="col right clearfix">
                      <div class="icon"><i class="icon5"></i></div>
                      <div class="content">
                        <h3>Miễn Phí Vận Chuyển</h3>
                        <div class="text">Miễn Phí Vận Chuyển Trên Toàn Quốc, Giao Thú Cưng Tại Nhà - Chịu Mọi Trách Nhiệm Trong Quá Trình Vận Chuyển</div>
                      </div>
                  </div>

                  <div class="col left clearfix">
                    <div class="icon"><i class="icon6"></i></div>
                    <div class="content">
                        <h3>Thanh Toán Khi Nhận Thú Cưng</h3>
                        <div class="text">Khách Hàng Không Cần Cọc - Thanh Toán 100% Khi Nhận Thú Cưng</div>
                    </div>
                  </div>

                </div>
          </div>
      </div>

      <div class="contact">
        <h2>Gọi ngay cho chúng tôi</h2>
        <p>Để được tư vấn, gửi hình ảnh, video và các thông tin khác.</p>
        <div class="phone">
          <i class="fa-solid fa-phone fa-2xl" style="color: #ffffff;"></i>
          <a href="">Hotline: 036 72 79 433</a>
        </div>
        <div class="b"></div>
      </div>
      <?php
        include('admin/connect/connect.php');
        $sql_cate = "SELECT * FROM loaithucung ORDER BY maLoai ASC";
        $query_cate = mysqli_query($mysqli, $sql_cate);

        while ($row_title = mysqli_fetch_array($query_cate)) {
          $categoryId = $row_title['maLoai'];
          $sql_pro = "SELECT * FROM thucung WHERE maLoai = $categoryId ORDER BY maTC ASC LIMIT 4";
          $query_pro = mysqli_query($mysqli, $sql_pro);
      ?>

      <div id="content">
        <div class="product">
            <div class="title">
                <h2>
                    <b></b>
                    <span> Mua <?php echo $row_title['tenLoai'] ?> Cảnh Tại YeniPetShop</span>
                    
                  </h2>
            </div>
            <div class="list-product">
                <?php
                while ($row = mysqli_fetch_array($query_pro)) {
                ?>
                    <div class="item">
                        <a href="details.php?thucung&maTC=<?php echo $row['maTC'] ?>&id=<?php echo $row['maLoai'] ?>">
                            <img src="admin/quanlythucung/uploads/<?php echo $row['hinhAnh'] ?>">
                        </a>
                        <div class="name"><?php echo $row['tenTC'] ?></div>
                        <div class="id">MSP: <?php echo $row['maTC'] ?></div>
                        <?php
                        if ($row['tinhTrang'] == 'Còn Hàng') {
                        ?>
                            <div class="price"><?php echo number_format($row['gia'], 0, ',', '.') . ' VNĐ' ?></div>
                        <?php
                        } else {
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
            <div class="more">
                <a href="thucung.php?thucung&id=<?php echo $row_title['maLoai'] ?>">Xem thêm
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="10" fill="currentColor" class="bi bi-caret-right"
                        viewBox="0 0 16 16">
                        <path
                            d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <?php
}
?>
