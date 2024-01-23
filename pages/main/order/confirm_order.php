<?php
  $ID_ThanhVien = $_SESSION['ID_ThanhVien'];
  $id_cart = $_SESSION['ID_GioHang'];
  $sql_cart = "SELECT * FROM giohang WHERE giohang.ID_GioHang = $id_cart";
  $query_cart = mysqli_query($mysqli, $sql_cart);
  $row = mysqli_fetch_array($query_cart);
  $sql_cart_detail = "SELECT chitietgiohang.ID_SanPham, chitietgiohang.SoLuong,
    sanpham.TenSanPham, sanpham.GiaBan
    FROM giohang
    INNER JOIN chitietgiohang ON giohang.id_GioHang = chitietgiohang.id_GioHang
    INNER JOIN sanpham ON chitietgiohang.ID_SanPham = sanpham.id_sanpham
    WHERE giohang.ID_GioHang = $id_cart";
  $query_cart_detail = mysqli_query($mysqli, $sql_cart_detail);
  $_SESSION['NguoiNhan'] = $_POST['NguoiNhan'];
  $_SESSION['DiaChi'] = $_POST['DiaChi'];
  $_SESSION['SoDienThoai'] = $_POST['SoDienThoai'];
  $_SESSION['GhiChu'] = $_POST['GhiChu'];
  $tongtien_vnd = isset($_SESSION['allMoney']) ? $_SESSION['allMoney'] : 0;
?>
<<br>
<div style="padding-bottom:20px; " class="container bg-white">
    <div class="row">
      <div class="col-lg-8 mt-5">
        <table class="table-bordered w-100" cellpadding="5px">           
          <tr class="text-center">
            <td colspan="4"><h4>THÔNG TIN HÓA ĐƠN</h4></td>
          </tr>
          <tr>
            <td colspan="4">Khách hàng: <?php echo $_SESSION['NguoiNhan'] ?></td>
          </tr>
          <tr>
            <td colspan="4">Địa chỉ: <?php echo $_SESSION['DiaChi'] ?></td>
            
            <tr>
            <td colspan="4">Điện thoại: <?php echo $_SESSION['SoDienThoai'] ?></td>
          </tr>
          </tr>
          <tr>
            <td colspan="4">Ghi chú: <?php echo $_SESSION['GhiChu'] ?></td>
          </tr>
            <tr class="text-center">
              <th scope="col">STT</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Giá bán</th>
            </tr>
              <?php 
              $i=0; 
              $allMoney = 0;
              while($row_detail = mysqli_fetch_assoc($query_cart_detail)) {
                $i++;
              ?>
                <tr class="text-center">
                  <td><?= $i?></td>
                  <td>
                    <?= $row_detail['TenSanPham'] ?>
                  </td>
                  <td>
                    <?= $row_detail['SoLuong'] ?>
                  </td>
                  <td>
                    <?= number_format($row_detail['GiaBan'] * 1,0,',','.') ?> VND
                  </td>
                </tr>
              <?php 
              $Money = (int)$row_detail['SoLuong'] * (int)$row_detail['GiaBan'];
              $allMoney += $Money;
              } 
              ?>
              <tr>
                <th colspan="5">Tổng tiền:  <?= number_format($allMoney,0,',','.') ?> VND</th>
              </tr>
              <tr>
            <td colspan="4">Mọi phản hồi xin vui lòng liên hệ qua địa chỉ website cửa hàng. Xin cảm ơn!</td>
          </tr>
        </table>
        <a class="mt-3 btn btn-danger" href="index.php?navigate=cart">Quay lại giỏ hàng</a>
      </div>
      <div class="col-lg-4 mt-5">
      <div>
          <form method="POST" action="pages/main/order/xulythanhtoan.php">
              <p style="font-size: 24px;" class="mt-2 text-center">HÌNH THỨC THANH TOÁN</p>
              <input class="d-block btn btn-danger mt-3 w-100" type="submit" name="cod" value="Thanh toán khi nhận hàng">
              <input class="d-block btn btn-danger mt-3 w-100" type="submit" name="bank" value="Thanh toán bằng mã QR">
          </form>
          <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="pages/main/order/xulythanhtoanmomo.php">
            <input type="hidden" name="tongtien_vnd" value="<?php echo $tongtien_vnd?>">
            <input class="btn btn-danger mt-3 w-100"  type="submit" value="Thanh toán qua MOMO QRCode">              
          </form>
          <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="pages/main/order/xulythanhtoanmomo_atm.php">
            <input type="hidden" name="tongtien_vnd" value="<?php echo $tongtien_vnd?>">
            <input class="btn btn-danger mt-3 w-100"  type="submit" value="Thanh toán qua MOMO ATM">              
          </form>
        </div>
      </div>
  </div>
</div>