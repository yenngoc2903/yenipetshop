<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
<?php
  session_start();
  include('admin/connect/connect.php');
  //Xoá sản phẩm
  if(isset($_SESSION['cart']) && $_GET['xoa']){
    $id=$_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item){
      if($cart_item['id'] != $id){
        $product[] = array('tenTC'=>$cart_item['tenTC'],'id'=>$cart_item['id'],'gia'=>$cart_item['gia'],'hinhAnh'=>$cart_item['hinhAnh'],'maTC'=>$cart_item['maTC']);
      }
    $_SESSION['cart'] = $product;
    header('Location:cart.php?success=xoa');
    }
  }
  if(isset($_SESSION['cart']) && $_GET['huy']){
    $id=$_GET['huy'];
    foreach($_SESSION['cart'] as $cart_item){
      if($cart_item['id'] != $id){
        $product[] = array('tenTC'=>$cart_item['tenTC'],'id'=>$cart_item['id'],'gia'=>$cart_item['gia'],'hinhAnh'=>$cart_item['hinhAnh'],'maTC'=>$cart_item['maTC']);
      }
    $_SESSION['cart'] = $product;
    header('Location:xacnhan.php?huy=1');
    }
  }
  //Xoá tất cả
  if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
    unset($_SESSION['cart']);
    header('Location:cart.php?success=xoatatca');
  }

  //Thêm sản phẩm vào giỏ hàng
  if (isset($_POST['themgiohang'])) {
    // $sql_loai = "SELECT * FROM loaithucung";
    // $query_loai = mysqli_query($mysqli, $sql_loai);
    // if ($query_loai) {
    //   $row_loai = mysqli_fetch_array($query_loai);
    //   $maLoai = $row_loai['maLoai'];
    // }
    // session_destroy();
    $maGiong=$_GET['maGiong'];
    $id=$_GET['maTC'];
    $maLoai=$_GET['id'];
    $sql = "SELECT * FROM thucung WHERE maTC='".$id."' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if($row) {
      $new_product = array(array('tenTC'=>$row['tenTC'],'id'=>$id,'gia'=>$row['gia'],'hinhAnh'=>$row['hinhAnh'],'maTC'=>$row['maTC']));
      //Kiểm tra sesion giỏ hàng tồn tại
      if(isset($_SESSION['cart'])){
        $found = false;
        foreach($_SESSION['cart'] as $cart_item){
          if($cart_item['id'] == $id){
              
            $product[] = array('tenTC'=>$cart_item['tenTC'],'id'=>$cart_item['id'],'gia'=>$cart_item['gia'],'hinhAnh'=>$cart_item['hinhAnh'],'maTC'=>$cart_item['maTC']);
            $found = true;
          }else {
            $product[] = array('tenTC'=>$cart_item['tenTC'],'id'=>$cart_item['id'],'gia'=>$cart_item['gia'],'hinhAnh'=>$cart_item['hinhAnh'],'maTC'=>$cart_item['maTC']);
            
          }
        }
        if($found == false){
          $_SESSION['cart'] = array_merge($product, $new_product);
        }else {
          $_SESSION['cart'] =$product;
        }
      }else {
        $_SESSION['cart'] = $new_product;
      }
    }
    $cartCount = count($_SESSION['cart']);
    // Thêm sản phẩm vào giỏ hàng thành công
  header("Location: details.php?thucung&maTC=$id&id=$maLoai&maGiong=$maGiong&success=1&cart_count=" . count($_SESSION['cart']));


    exit();
  }elseif (isset($_POST['chuasansang'])) {
   
    $maGiong=$_GET['maGiong'];
    $id=$_GET['maTC'];
    $maLoai=$_GET['id'];
    header('Location: details.php?thucung&maTC='.$id.'&id='.$maLoai.'&maGiong='.$maGiong.'&success=2');
  }elseif (isset($_POST['daban'])) {
    
    $maGiong=$_GET['maGiong'];
    $id=$_GET['maTC'];
    $maLoai=$_GET['id'];
    header('Location: details.php?thucung&maTC='.$id.'&id='.$maLoai.'&maGiong='.$maGiong.'&success=3');
  }
?>
</script>

