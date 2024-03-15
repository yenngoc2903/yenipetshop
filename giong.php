
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni | Thú cưng cảnh đang bán</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="assets\css\main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=65ef04bafb80f87c09755fca" async="async"></script>
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
      include("header.php");
  ?>

<?php
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
    $id =$_GET['id'];
    $sql_pro = "SELECT * FROM thucung,giongloai WHERE giongloai.maGiong=thucung.maGiong  AND thucung.maGiong='$_GET[magiong]' order by maTC DESC LIMIT $begin,8";
    $query_pro = mysqli_query($mysqli,$sql_pro);

    // lấy tên loại thú cưng
    $sql_cate = "SELECT * FROM loaithucung,giongloai WHERE loaithucung.maLoai=giongloai.maLoai AND  loaithucung.maLoai = '$_GET[id]' AND giongloai.maGiong='$_GET[magiong]' LIMIT 1";
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>
       <div id="price">
  <div class="banggia">
    <?php
        $magiong = $_GET['magiong'];
        if ($magiong == 10) {
            echo "<h2>Bảng giá giống chó Akita Inu</h2>";
            echo "<h3>Akita Inu là giống có mức giá cao ở Việt Nam</h3>";
            echo "<table border='1'>
                    <tr>
                        <th>GIÁ</th>
                        <th>THÔNG TIN</th>
                    </tr>
                    <tr>
                        <td>Từ 20–30 triệu</td>
                        <td>Giống chó Akita con được sinh sản tại Việt Nam; ba hoặc mẹ đều được nhân giống tại Việt Nam.</td>
                    </tr>
                    <tr>
                        <td>Từ 30 triệu</td>
                        <td>Giống chó Akita con được sinh tại Việt Nam nhưng ba mẹ là giống nhập từ nước ngoài hoặc có thể là chó Akita con nhập khẩu từ Thái.</td>
                    </tr>
                    <tr>
                        <td>Từ 50 triệu</td>
                        <td>Giống chó Akita con thuần chủng nhập khẩu từ Mỹ hoặc Nhật.</td>
                    </tr>
                </table>";
        }elseif ($magiong == 26) {
          echo "<h2>Bảng giá giống chó Alaska</h2>";
          echo "<table border='1'>
                  <tr>
                      <th>MÀU SẮC</th>
                      <th>VIỆT NAM</th>
                      <th>THÁI LAN</th>
                      <th>NGA</th>
                      <th>MỸ - CHÂU ÂU</th>
                  </tr>
                  <tr>
                      <td>Đen trắng </td>
                      <td>Từ 10-11 triệu</td>
                      <td>Từ 15-16 triệu</td>
                      <td>Từ 50-53 triệu</td>
                      <td>Hơn 100 triệu</td>
                  </tr>
                  <tr>
                      <td>Xám trắng </td>
                      <td>Từ 11-12 triệu</td>
                      <td>Từ 16-17 triệu</td>
                      <td>Từ 53-55 triệu</td>
                      <td>Hơn 100 triệu</td>
                  </tr>
                  <tr>
                      <td>Nâu đỏ</td>
                      <td>Từ 12-14 triệu</td>
                      <td>Từ 17-19 triệu</td>
                      <td>Từ 55-57 triệu</td>
                      <td>Hơn 100 triệu</td>
                  </tr>
                  <tr>
                      <td>Hồng phấn</td>
                      <td>Từ 18-22 triệu</td>
                      <td>Từ 20-25 triệu</td>
                      <td>Từ 57-60 triệu</td>
                      <td>Hơn 100 triệu</td>
                  </tr>
              </table>";
      }elseif ($magiong == 14) {
        echo "<h2>Bảng giá giống chó Chihuahua</h2>";
        echo "<table border='1'>
                <tr>
                    <th>GIÁ</th>
                    <th>THÔNG TIN</th>
                </tr>
                <tr>
                    <td>Từ 1-3 triệu </td>
                    <td>Chó Chihuahua lai </td>
                </tr>
                <tr>
                    <td>Từ 3-5 triệu</td>
                    <td>Chó Chihuahua sinh ra tại Việt Nam</td>
                </tr>
                <tr>
                    <td>Từ 5-10 triệu</td>
                    <td>Chó Chihuahua nhập khẩu từ Thái Lan</td>
                </tr>
                <tr>
                    <td>Trên 20 triệu</td>
                    <td>Chó Chihuahua nhập khẩu từ Châu Âu</td>
                </tr>
            </table>";
    }elseif ($magiong == 15) {
      echo "<h2>Bảng giá giống chó Đốm Dalmatian</h2>";
      echo "<table border='1'>
              <tr>
                  <th>MÀU SẮC</th>
                  <th>VIỆT NAM</th>
                  <th>THÁI LAN</th>
                  <th>CHÂU ÂU</th>
              </tr>
              <tr>
                  <td>Đen trắng </td>
                  <td>Từ 4-5 triệu</td>
                  <td>Từ 7-10 triệu</td>
                  <td>Trên 20 triệu</td>
              </tr>
              <tr>
                  <td>Nâu trắng </td>
                  <td>Từ 6-7 triệu</td>
                  <td>Từ 9-12 triệu</td>
                  <td>Trên 25 triệu</td>
              </tr>
          </table>";
    }elseif ($magiong == 11) {
    echo "<h2>Bảng giá giống chó Phốc Sóc</h2>";
    echo "<table border='1'>
            <tr>
                <th>VIỆT NAM</th>
                <th>THÁI LAN, MALAYSIA</th>
                <th>CHÂU ÂU</th>
            </tr>
            <tr>
                <td>Từ 10-15 triệu: Chó Phốc Sóc mini thuần chủng, không giấy tờ</td>
                <td>Từ 20-23 triệu: Chó Phốc Sóc mini thuần chủng, không giấy tờ</td>
                
            </tr>
            <tr>
                <td>Từ 15-18 triệu: Chó Phốc Sóc mini thuần chủng, có giấy tờ</td>
                <td>Từ 23-30 triệu: Chó Phốc Sóc mini thuần chủng, có giấy tờ</td>
                <td>Từ 40-50 triệu: Chó Phốc Sóc mini thuần chủng, có giấy tờ</td>
            </tr>
            <tr>
                <td>Từ 18-20 triệu: Chó Phốc Sóc Teacup</td>
                <td>Từ 40-50 triệu: Chó Phốc Sóc Teacup</td>
                <td>Từ 100 triệu: Chó Phốc Sóc mini có gia phả 'cực xịn'. Có ba mẹ từng tham gia và đoạt giải trong các cuộc thi DogShow</td>
            </tr>
        </table>";
      echo "<p>Chó Phốc sóc mini: chiều cao <20cm và cân nặng <2kg</p>
            <p>Chó Phốc sóc Teacup: chiều cao <15cm và cân nặng <1,5kg</p>";
    }elseif ($magiong == 1) {
    echo "<h2>Bảng giá giống chó Corgi</h2>";
    echo "<table border='1'>
            <tr>
                <th>MÀU SẮC</th>
                <th>VIỆT NAM</th>
                <th>THÁI LAN, MALAYSIA</th>
                <th>MỸ - CHÂU ÂU</th>
            </tr>
            <tr>
                <td>Vàng trắng </td>
                <td>Từ 20-25 triệu</td>
                <td>Từ 35-40 triệu</td>
                <td>Từ 50-80 triệu</td>
            </tr>
            <tr>
                <td>Ba màu Tricolor</td>
                <td>Từ 25-30 triệu</td>
                <td>Từ 35-40 triệu</td>
                <td>Từ 50-80 triệu</td>
            </tr>
            <tr>
                <td>Cardigan</td>
                <td>Từ 30-35 triệu</td>
                <td>Từ 35-40 triệu</td>
                <td>Từ 50-80 triệu</td>
            </tr>
            <tr>
                <td>Vàng Sậm Sable</td>
                <td>Từ 35-40 triệu</td>
                <td>Từ 35-40 triệu</td>
                <td>Từ 50-80 triệu</td>
            </tr>
        </table>";
    }elseif ($magiong == 9) {
      echo "<h2>Bảng giá giống chó Golden Retriever</h2>";
      echo "<table border='1'>
              <tr>
                  <th>THÔNG TIN</th>
                  <th>VIỆT NAM</th>
                  <th>ĐÔNG NAM Á: THÁI LAN, INDO, SINGAPORE, MALAYSIA</th>
                  <th>PHƯƠNG TÂY: ANH, MỸ, ÚC, CANADA</th>
              </tr>
              <tr>
                  <td>Chó không có giấy tờ</td>
                  <td>Từ 6-8 triệu</td>
                  <td>Từ 10-18 triệu</td>
                  <td>Từ 22-40 triệu</td>
              </tr>
              <tr>
                  <td>Chó có giấy tờ</td>
                  <td>Từ 8-15 triệu</td>
                  <td>Từ 15-22 triệu</td>
                  <td>Từ 30-50 triệu</td>
              </tr>
          </table>";
    }elseif ($magiong == 25) {
      echo "<h2>Bảng giá giống chó Husky</h2>";
      echo "<table border='1'>
              <tr>
                  <th>MÀU SẮC</th>
                  <th>VIỆT NAM</th>
                  <th>THÁI LAN</th>
                  <th>MỸ, CHÂU ÂU, CANADA, NGA</th>
              </tr>
              <tr>
                  <td>Đen trắng</td>
                  <td>Từ 6-8 triệu</td>
                  <td>Từ 15-20 triệu</td>
                  <td>Trên 50 triệu</td>
              </tr>
              <tr>
                  <td>Xám trắng</td>
                  <td>Từ 8-10 triệu</td>
                  <td>Từ 15-20 triệu</td>
                  <td>Trên 50 triệu</td>
              </tr>
              <tr>
                  <td>Nâu đỏ</td>
                  <td>Từ 10-12 triệu</td>
                  <td>Từ 15-20 triệu</td>
                  <td>Trên 50 triệu</td>
              </tr>
              <tr>
                  <td>Hồng phấn</td>
                  <td>Từ 12-14 triệu</td>
                  <td>Từ 15-20 triệu</td>
                  <td>Trên 50 triệu</td>
              </tr>
              <tr>
                  <td>Trắng</td>
                  <td>Từ 15-20 triệu</td>
                  <td>Từ 15-20 triệu</td>
                  <td>Trên 50 triệu</td>
              </tr>
          </table>";
      }elseif ($magiong == 16) {
        echo "<h2>Bảng giá giống chó Lạp Xưởng Dachshund</h2>";
        echo "<table border='1'>
                <tr>
                    <th>GIÁ</th>
                    <th>THÔNG TIN</th>
                </tr>
                <tr>
                    <td>Từ 2-3 triệu </td>
                    <td>Chó Lạp Xưởng lai </td>
                </tr>
                <tr>
                    <td>Từ 3-5 triệu</td>
                    <td>Chó Lạp Xưởng sinh ra tại Việt Nam</td>
                </tr>
                <tr>
                    <td>Từ 7-8 triệu</td>
                    <td>Chó Lạp Xưởng nhập khẩu từ Thái Lan, Indo</td>
                </tr>
                <tr>
                    <td>Từ 12-15 triệu</td>
                    <td>Chó Lạp Xưởng nhập khẩu từ Nga, Ukraina</td>
                </tr>
                <tr>
                    <td>Từ 20-25 triệu</td>
                    <td>Chó Lạp Xưởng nhập khẩu từ quê hương Đức</td>
                </tr>
            </table>";
      }elseif ($magiong == 12) {
        echo "<h2>Bảng giá giống chó Poodle</h2>";
        echo "<table border='1'>
                <tr>
                    <th>VIỆT NAM</th>
                    <th>THÁI LAN</th>
                    <th>CHÂU ÂU</th>
                </tr>
                <tr>
                    <td>Từ 5-7 triệu: Chó Poodle phổ biến</td>
                    <td>Từ 15-20 triệu</td>
                    <td>Từ 60-80 triệu</td>
                </tr>
                <tr>
                    <td>Từ 7-9 triệu: Chó Tiny-Toy Poodle, Standard Poodle, Mini Poodle</td>
                    <td>Từ 15-20 triệu</td>
                    <td>Từ 60-80 triệu</td>
                </tr>
                <tr>
                    <td>Từ 12-15 triệu: Chó Teacup Poodle</td>
                    <td>Từ 15-20 triệu</td>
                    <td>Từ 60-80 triệu</td>
                </tr>
            </table>";
        }elseif ($magiong == 7) {
          echo "<h2>Bảng giá giống chó Shiba Inu</h2>";
          echo "<table border='1'>
                  <tr>
                      <th>GIÁ</th>
                      <th>THÔNG TIN</th>
                  </tr>
                  <tr>
                      <td>Từ 20–30 triệu</td>
                      <td>Chó shiba inu dược sinh sản tại Việt Nam.</td>
                  </tr>
                  <tr>
                      <td>Từ 40-50 triệu</td>
                      <td>Shiba có bố mẹ nhập từ nước ngoài.</td>
                  </tr>
                  <tr>
                      <td>Từ 120 triệu</td>
                      <td>Shiba inu có giấy tờ tại Nhật Bản.</td>
                  </tr>
              </table>";
      }elseif ($magiong == 27) {
        echo "<h2>Bảng giá giống chó BullDog</h2>";
        echo "<table border='1'>
                <tr>
                    <th>GIỐNG</th>
                    <th>VIỆT NAM</th>
                    <th>THÁI LAN</th>
                    <th>CHÂU ÂU</th>
                </tr>
                <tr>
                    <td>Bull Anh</td>
                    <td>Từ 15-25 triệu</td>
                    <td>Từ 17-25 triệu</td>
                    <td>Từ 58 triệu</td>
                </tr>
                <tr>
                    <td>Bull Pháp</td>
                    <td>Từ 17-28 triệu</td>
                    <td>Từ 20-28 triệu</td>
                    <td>Từ 58 triệu</td>
                </tr>
            </table>";
    }elseif ($magiong == 28) {
      echo "<h2>Bảng giá giống chó Doberman</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 5-7 triệu</td>
                  <td>Chó Doberman sinh tại Việt Nam, không giấy tờ</td>
              </tr>
              <tr>
                  <td>Từ 8-12 triệu</td>
                  <td>Chó Doberman sinh tại Việt Nam, có đầy đủ giấy tờ</td>
              </tr>
              <tr>
                  <td>Từ 12-15 triệu</td>
                  <td>Chó Doberman nhập từ Thái Lan</td>
              </tr>
              <tr>
                  <td>Từ 30 triệu</td>
                  <td>Chó Doberman nhập từ các nước phương Tây</td>
              </tr>
          </table>";
    }elseif ($magiong == 29) {
    echo "<h2>Bảng giá giống chó Pug</h2>";
    echo "<table border='1'>
            <tr>
                <th>GIÁ</th>
                <th>THÔNG TIN</th>
            </tr>
            <tr>
                <td>Từ 10-12 triệu</td>
                <td>Chó Pug sinh tại Việt Nam, có đầy đủ giấy tờ</td>
            </tr>
            <tr>
                <td>Từ 20-25 triệu</td>
                <td>Chó Pug nhập từ Thái Lan, có đầy đủ giấy tờ</td>
            </tr>
            <tr>
                <td>Từ 42-60 triệu</td>
                <td>Chó Pug nhập trực tiếp từ Châu Âu</td>
            </tr>
        </table>";
    }elseif ($magiong == 30) {
      echo "<h2>Bảng giá giống chó Samoyed</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 7-9 triệu</td>
                  <td>Chó Samoyed sinh tại Việt Nam, có đầy đủ giấy tờ</td>
              </tr>
              <tr>
                  <td>Từ 10-20 triệu</td>
                  <td>Chó Samoyed nhập từ Thái Lan, có đầy đủ giấy tờ. Có chất lượng gần với những chú chó từ Châu Âu.</td>
              </tr>
              <tr>
                  <td>Trên 22 triệu</td>
                  <td>Chó Samoyed nhập trực tiếp từ Châu Âu, Mỹ, Nga</td>
              </tr>
          </table>";
    }elseif ($magiong == 20) {
      echo "<h2>Bảng giá giống Mèo Anh lông dài</h2>";
      echo "<table border='1'>
              <tr>
                  <th>MÀU SẮC</th>
                  <th>VIỆT NAM</th>
                  <th>THÁI LAN</th>
                  <th>CHÂU ÂU, MỸ</th>
              </tr>
              <tr>
                  <td>Xám xanh</td>
                  <td>Từ 7-10 triệu</td>
                  <td>Từ 12-20 triệu</td>
                  <td>Trên 35 triệu</td>
              </tr>
              <tr>
                  <td>Đen trắng</td>
                  <td>Từ 9-13 triệu</td>
                  <td>Từ 15-25 triệu</td>
                  <td>Trên 48 triệu</td>
              </tr>
              <tr>
                  <td>Tricolor(tam thể)</td>
                  <td>Từ 12-16 triệu</td>
                  <td>Từ 16-25 triệu</td>
                  <td>Trên 70 triệu</td>
              </tr>
              <tr>
                  <td>Vàng</td>
                  <td>Từ 20-25 triệu</td>
                  <td>Từ 25-35 triệu</td>
                  <td>Trên 75 triệu</td>
              </tr>
          </table>";
    }elseif ($magiong == 17) {
      echo "<h2>Bảng giá giống Mèo Anh lông ngắn</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 4-7 triệu</td>
                  <td>Mèo được nhân giống tại Việt Nam</td>
              </tr>
              <tr>
                  <td>Từ 12-20 triệu</td>
                  <td>Mèo được nhập từ Thái Lan</td>
              </tr>
              <tr>
                  <td>Từ 40-50 triệu</td>
                  <td>Mèo được nhập từ Châu Âu</td>
              </tr>
          </table>";
    }elseif ($magiong == 39) {
      echo "<h2>Bảng giá giống Mèo Ba Tư</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 7-10 triệu</td>
                  <td>Mèo nhân giống tại Việt Nam</td>
              </tr>
              <tr>
                  <td>Từ 10-15 triệu</td>
                  <td>Mèo được nhập từ Thái Lan, Malaysia</td>
              </tr>
              <tr>
                  <td>Trên 25 triệu</td>
                  <td>Mèo được nhập từ Châu Âu, Châu Mỹ</td>
              </tr>
          </table>";
    }elseif ($magiong == 18) {
      echo "<h2>Bảng giá giống Mèo Munchkin chân ngắn</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 10-15 triệu</td>
                  <td>Mèo nhân giống tại Việt Nam</td>
              </tr>
              <tr>
                  <td>Từ 20-30 triệu</td>
                  <td>Mèo có màu lông sliver, golden, lilac</td>
              </tr>
              <tr>
                  <td>Từ 30-40 triệu</td>
                  <td>Mèo được nhập từ nước ngoài</td>
              </tr>
          </table>";
    }elseif ($magiong == 36) {
      echo "<h2>Bảng giá giống Mèo Mướp</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 500.000-1 triệu</td>
                  <td>Mèo nhân giống tại Việt Nam</td>
              </tr>
              <tr>
                  <td>Từ 1-2 triệu</td>
                  <td>Mèo lai từ dòng Scottish hay British</td>
              </tr>
              <tr>
                  <td>Từ 2-3 triệu</td>
                  <td>Mèo được nhập từ nước ngoài</td>
              </tr>
          </table>";
    }elseif ($magiong == 21) {
      echo "<h2>Bảng giá giống Mèo Mỹ lông dài Maine Coon</h2>";
      echo "<h3>Mèo Mỹ lông dài thuần chủng ở Việt Nam rất hiếm và hầu như không sinh sản được ở Việt Nam do điều kiện khí hậu môi trường.</h3>";
      echo "<h3>Các bé mèo Maine Coon hiện nay phần lớn là mèo nhập khẩu từ các nước châu Á: Thái Lan, Malaysia, Trung Quốc hay “xịn” hơn là từ Mỹ, Anh.</h3>";
      echo "<h3>Chính vì thế giá mèo Mỹ lông dài khá đắt so với các giống mèo khác</h3>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 24-48 triệu</td>
                  <td>Mèo giống đực được nhập từ Thái Lan, Malaysia, Trung Quốc</td>
              </tr>
              <tr>
                  <td>Từ 48-73 triệu</td>
                  <td>Mèo giống cái được nhập từ Thái Lan, Malaysia, Trung Quốc</td>
              </tr>
              <tr>
                  <td>Trên 73 triệu</td>
                  <td>Mèo được nhập từ Châu Âu-Mỹ</td>
              </tr>
          </table>";
    }elseif ($magiong == 32) {
      echo "<h2>Bảng giá giống Mèo Mỹ lông ngắn</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 2-3 triệu</td>
                  <td>Mèo nhân giống tại Việt Nam</td>
              </tr>
              <tr>
                  <td>Từ 5-8 triệu</td>
                  <td>Mèo được nhập khẩu từ Hoa Kỳ</td>
              </tr>
          </table>";
    }elseif ($magiong == 24) {
      echo "<h2>Bảng giá giống Mèo Ragdoll</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 10-15 triệu</td>
                  <td>Mèo Ragdoll không có đầy đủ giấy tờ</td>
              </tr>
              <tr>
                  <td>Từ 15-20 triệu</td>
                  <td>Mèo Ragdoll có đầy đủ giấy tờ</td>
              </tr>
          </table>";
    }elseif ($magiong == 19) {
      echo "<h2>Bảng giá giống Mèo tai cụp</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 8-10 triệu</td>
                  <td>Mèo tai cụp tương đối chất lượng. Được phối giống với mèo Anh lông ngắn.</td>
              </tr>
              <tr>
                  <td>Từ 15-25 triệu</td>
                  <td>Mèo tai cụp được nhập từ Thái Lan</td>
              </tr>
              <tr>
                  <td>Trên 25 triệu</td>
                  <td>Mèo tai cụp được nhập từ Châu Âu-Mỹ</td>
              </tr>
          </table>";
    }elseif ($magiong == 23) {
      echo "<h2>Bảng giá giống Mèo tam thể</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>GIỚI TÍNH</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 500.000-1 triệu</td>
                  <td>Con cái</td>
                  <td>Mèo tam thể Việt Nam</td>
              </tr>
              <tr>
                  <td>Từ 1-3 triệu</td>
                  <td>Con đực</td>
                  <td>Mèo tam thể Việt Nam</td>
              </tr>
              <tr>
                  <td>Từ 3-5 triệu</td>
                  <td>Con cái</td>
                  <td>Mèo tam thể Ba Tư</td>
              </tr>
              <tr>
                  <td>Từ 5-8 triệu</td>
                  <td>Con đực</td>
                  <td>Mèo tam thể Ba Tư</td>
              </tr>
              <tr>
                  <td>Từ 2-5 triệu</td>
                  <td>Con cái</td>
                  <td>Mèo tam thể Mỹ lông ngắn</td>
              </tr>
              <tr>
                  <td>Từ 5-8 triệu</td>
                  <td>Con đực</td>
                  <td>Mèo tam thể Mỹ lông ngắn</td>
              </tr>
              <tr>
                  <td>Từ 10-20 triệu</td>
                  <td>Con cái</td>
                  <td>Mèo tam thể Anh lông ngắn</td>
              </tr>
              <tr>
                  <td>Từ 20-30 triệu</td>
                  <td>Con đực</td>
                  <td>Mèo tam thể Anh lông ngắn</td>
              </tr>
          </table>";
    }elseif ($magiong == 37) {
      echo "<h2>Bảng giá giống Mèo Xiêm</h2>";
      echo "<table border='1'>
              <tr>
                  <th>GIÁ</th>
                  <th>THÔNG TIN</th>
              </tr>
              <tr>
                  <td>Từ 1-1,5 triệu</td>
                  <td>Mèo Xiêm lai được nhân giống tại Việt Nam.</td>
              </tr>
              <tr>
                  <td>Từ 2-4 triệu</td>
                  <td>Mèo Xiêm được nhân giống tại Việt Nam.</td>
              </tr>
              <tr>
                  <td>Từ 9-16 triệu</td>
                  <td>Mèo Xiêm nhập từ Thái.</td>
              </tr>
              <tr>
                  <td>Từ 15-30 triệu</td>
                  <td>Mèo tai cụp được nhập từ Châu Âu.</td>
              </tr>
          </table>";
    }
    ?>
  </div>
</div>

    <!-- Start Content -->
      <div id="content_pro">
        
        <div class="cate">
          <aside>
            <div class="title">
              <p>Loại Giống</p>
            </div>
            <?php
              $sql_giong = "SELECT * FROM giongloai WHERE  maLoai='$_GET[id]' ORDER BY tenGiong ASC  ";
              $query_giong = mysqli_query($mysqli,$sql_giong);
            ?>
            <ul>
              <a href="thucung.php?id=<?php echo $id ?>"><li>Tất cả</li></a>
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
            
              <span> <?php echo $row_title['tenLoai'] ?> <?php echo $row_title['tenGiong'] ?>  Thuần Chủng Đang Bán</span>
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
        
          <?php
          $sql_trang = mysqli_query($mysqli,"SELECT * FROM thucung WHERE maGiong = '$_GET[magiong]' AND maLoai = '$_GET[id]'");
          $row_count = mysqli_num_rows($sql_trang);
          $row_trang = mysqli_fetch_array($sql_trang);
          $trang = ceil($row_count/8);
        ?>
        <?php
            for($i=1;$i<=$trang;$i++){
          ?>
        <ul class="list_page">
          <li <?php if($i==$page){echo 'style="background: #FFB35A;"';}else{echo '';} ?>><a href="?magiong=<?php echo $row_trang['maGiong'] ?>&id=<?php echo $row_trang['maLoai'] ?>&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
          <?php
            }
          ?>
        </ul>
        </div>
      </div>
    <!-- End Content -->

  <?php
    include("footer.php");
  ?>
    

    
  </body>
</html>