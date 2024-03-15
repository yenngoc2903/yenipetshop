<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
<?php
include('../connect/connect.php');

$maTC = $_POST['maTC'];
$tenLoai = $_POST['tenLoai'];
$tenGiong = $_POST['tenGiong'];
$tenTC = $_POST['tenTC'];
$gia = $_POST['gia'];

//Thêm hình ảnh
$hinhAnh = $_FILES['hinhAnh']['name'];
$hinhAnh_tmp = $_FILES['hinhAnh']['tmp_name'];
$hinhAnh_time = time().'_'.$hinhAnh;

//Thêm nhiều ảnh 
// $hinhAnhs = $_FILES['hinhAnhs']['name'];
// $hinhAnh_tmps = $_FILES['hinhAnhs']['tmp_name'];


$moTa = $_POST['moTa'];
$ngaySinh = $_POST['ngaySinh'];
$giong = $_POST['giong'];
$mau = $_POST['mau'];
$vacxin = $_POST['vacxin'];
$giayTo = $_POST['giayTo'];
$baoHanh = $_POST['baoHanh'];
$ngayVeNha = $_POST['ngayVeNha'];
$tinhTrang = $_POST['tinhTrang'];


if (isset($_POST['themthucung'])) {
  //Thêm
  

  if (empty($tenTC) || empty($gia) || empty($hinhAnh) || empty($moTa) || empty($ngaySinh) || empty($giong) || empty($mau) || empty($vacxin) || empty($giayTo) || empty($baoHanh) || empty($ngayVeNha) || empty($tinhTrang)) {
    header('Location:../quanlythucung/them.php?them=1');
  }else {
  $sql_them = "insert into thucung(maTC, maLoai, maGiong, tenTC, gia, hinhAnh, moTa, ngaySinh, giong, mau, vacxin, giayTo, baoHanh, ngayVeNha, tinhTrang ) 
  value ('".$maTC."', '".$tenLoai."', '".$tenGiong."', '".$tenTC."', '".$gia."', '".$hinhAnh."', '".$moTa."', '".$ngaySinh."', '".$giong."', '".$mau."', '".$vacxin."', '".$giayTo."', '".$baoHanh."', '".$ngayVeNha."', '".$tinhTrang."')";
  mysqli_query($mysqli, $sql_them);
  move_uploaded_file($hinhAnh_tmp,'uploads/'.$hinhAnh);
  header('Location:../quanlythucung/lietke.php?them=1');
}
}elseif(isset($_POST['suathucung'])){
  //Sửa
  if ($hinhAnh != ''){
    move_uploaded_file($hinhAnh_tmp,'uploads/'.$hinhAnh);
  
    
    $sql_update = "UPDATE thucung SET maTC = '".$maTC."', maLoai = '".$tenLoai."', maGiong = '".$tenGiong."', tenTC = '".$tenTC."', gia = '".$gia."', 
    hinhAnh = '".$hinhAnh."', moTa = '".$moTa."', ngaySinh = '".$ngaySinh."', giong = '".$giong."', 
    mau = '".$mau."', vacxin = '".$vacxin."', giayTo = '".$giayTo."', baoHanh = '".$baoHanh."', 
    ngayVeNha = '".$ngayVeNha."', tinhTrang = '".$tinhTrang."' WHERE maTC = '$_GET[matc]'";

    $sql = "SELECT * FROM thucung WHERE maTC = '$_GET[matc]' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)){
    unlink('uploads/'.$row['hinhAnh']);
  }
  }else {
    $sql_update = "UPDATE thucung SET maTC = '".$maTC."', maLoai = '".$tenLoai."', maGiong = '".$tenGiong."', tenTC = '".$tenTC."', gia = '".$gia."', 
    moTa = '".$moTa."', ngaySinh = '".$ngaySinh."', giong = '".$giong."', 
    mau = '".$mau."', vacxin = '".$vacxin."', giayTo = '".$giayTo."', baoHanh = '".$baoHanh."', 
    ngayVeNha = '".$ngayVeNha."', tinhTrang = '".$tinhTrang."' WHERE maTC = '$_GET[matc]'";
  }
  mysqli_query($mysqli, $sql_update);
  header('Location:../quanlythucung/lietke.php?sua=1');
}else{
  //Xoá
  
  $id = $_GET['matc'];
  $sql = "SELECT * FROM thucung WHERE maTC = '$id' LIMIT 1";
  $query = mysqli_query($mysqli, $sql);
  while ($row = mysqli_fetch_array($query)){
    unlink('uploads/'.$row['hinhAnh']);
  }
  $sql_xoa = "DELETE FROM thucung WHERE maTC = '".$id."'";
  mysqli_query($mysqli, $sql_xoa);
  
  header('Location:../quanlythucung/lietke.php?xoa=1');
  
  
}

?>
</script>