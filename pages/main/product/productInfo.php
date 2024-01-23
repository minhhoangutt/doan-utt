<?php
if (isset($_SESSION['ID_ThanhVien'])) {
    $id_cus = $_SESSION['ID_ThanhVien'];
}
$sql_product = "SELECT * FROM sanpham  where ID_SanPham='$_GET[id_product]' ORDER BY ID_SanPham DESC";
$query_product = mysqli_query($mysqli, $sql_product);
$row_product = mysqli_fetch_array($query_product);
$sql_comment = "SELECT * FROM binhluan,thanhvien 
where binhluan.ID_SanPham='$_GET[id_product]' and binhluan.ID_ThanhVien=thanhvien.ID_ThanhVien";
$query_comment = mysqli_query($mysqli, $sql_comment);

?>

    <main role="main">
        <div class="container">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                        action="pages/main/cart/add.php?id=<?php echo $row_product['ID_SanPham']; ?>">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="<?php echo $row_product['TenSanPham']; ?>">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="<?php echo $row_product['GiaBan']; ?>">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien"
                            
                            value="<?php echo $row_product['Img']; ?>">
                      
                        <div style="margin-top: 30px;" class="row">
                        <div class="col-lg-6">
                            <div class="card p-3">
                            <h4 class="text-center">THÔNG TIN SẢN PHẨM</h4>
                            <hr>
                            <h4 class="text-center"><?php echo $row_product['TenSanPham']; ?></h4>
                            <h6><i>Giá bán:       </i><?php echo number_format($row_product['GiaBan'] * 1,0,',','.')?> VND</h6>
                            <p style="margin-top: 10px;">
                                <?php echo $row_product['MoTa']; ?>
                            </p>
                            <p><i>Miễn phí giao hàng</i></p>
                           
                            
                            <?php if (isset($_SESSION['TenDangNhap'])) {
                                ?>
                                <div class="form-group">
                                    <label for="soluong"><b>Số lượng:</b></label>
                                    <input type="number"  min="1" class="form-control" id="soluong" name="soluong" value="1" max="<?php echo $row_product['SoLuong'] ;
                                     ?>">
                                     <?php if($row_product['SoLuong'] > 0){
                                        echo '<label for="soluong">Số lượng hiện tại của sản phẩm :';
                                        echo $row_product['SoLuong'] ;}
                                        ?>
                                     
                                </div>
                                <?php if($row_product['SoLuong'] > 0 ){?>
                                <div style="display: flex;justify-content: center; padding:10px;">
                                    
                                    <a href="./index.php?navigate=showProducts"><input type="submit" class="btn btn-danger" name='mua' value="Thêm vào giỏ hàng"></a>
                                </div>
                                <?php } else{?>
                                    <p class="text-danger">Sản phẩm tạm thời hết hàng</p>
                                    <a class="btn btn-danger" href="./index.php?navigate=showProducts">Quay lại mua hàng</a>
                                <?php
                                }
                            }else{
                                echo'<a class="btn btn-danger " href="./index.php?navigate=login">Đăng nhập để mua hàng</a>';
                            }
                            
                            ?>
                            
                        </div>
                    </div>
                            <div class="col-lg-5" id="pic-3">
                               <div class="card ">
                               <img class="rounded"  src="./assets/image/product/<?php echo $row_product['Img'];?>"
                               style="display: block; width: 100%; height: 360px; object-fit: cover; object-position: center center;"
                               >
                            </div>
                        </div>
                        
                            
                    </form>
            </div>
        <div class="container mt-60">
            <h3>Đánh giá</h3>
            <form class="form-floating"
                action="pages/main/product/comment.php?id_product=<?php echo $row_product['ID_SanPham']; ?>"
                method="POST">
                <?php
                    $i = 0;
                    while ($row_comment = mysqli_fetch_array($query_comment)) {
                        $i++;
                        ?>
                        <div class="alert alert-success" role="alert">
                        <small><label for="floatingInputValue" class="font-weight-bold">
                        <?php echo $row_comment['HoVaTen']; ?>
                        </label>
                        <label for="floatingInputValue">
                        <?php echo $row_comment['ThoiGianBinhLuan']; ?>
                        </label>
                        </small>
                        </br>
                        <label for="floatingInputValue">
                        <?php echo $row_comment['NoiDung']; ?>
                        </label>
                        </div>
                        <?php
                    }
                    ?>
                <?php if (isset($_SESSION['TenDangNhap'])) {
                    ?>
                    <div class="form">
                        <textarea class="form-control" placeholder="Hãy bình luận sản phẩm tại đây"
                        id="floatingTextarea2" name="NoiDung" style="height: 100px"></textarea>
                        </br>
                    </div>
                    <div class="action">
                        <input type="submit" class="btn btn-danger" name='comment' value="Bình luận"
                            style="float:right">
                    </div>
                <?php
                }
                ?>
             </form>
        </div>      
    </main>