<?php 

    include("../../config/connection.php"); 
    if (isset($_POST['submit'])) {
        $msg = 'Thành công';
        $TenSanPham = $_POST['TenSanPham'];
        $GiaBan = $_POST['GiaBan'];
        $SoLuong = $_POST['SoLuong'];
        $MoTa = $_POST['MoTa'];
        $imageName = $_FILES['Img']['name'];
        $imageTemp = $_FILES['Img']['tmp_name'];
        move_uploaded_file($imageTemp, "../../../assets/image/product/" . $imageName);
        $ID_DanhMuc = $_POST['danhmuc'];
        
        $sql_add = "INSERT INTO sanpham(ID_DanhMuc,TenSanPham,MoTa,GiaBan,SoLuong,Img) VALUES('".$ID_DanhMuc."','".$TenSanPham."','".$MoTa."','".$GiaBan."','".$SoLuong."','".$imageName."')";
        mysqli_query($mysqli,$sql_add);
        
        }
  
    header('location: ../../index.php?product=list-product');
    $_SESSION['msg'] = $msg;
    
   
?>