<?php
$id_cus = $_SESSION['ID_ThanhVien'];
$sql_cart = "SELECT sanpham.ID_SanPham, chitietgiohang.SoLuong, sanpham.Img, sanpham.TenSanPham, sanpham.GiaBan
FROM giohang
INNER JOIN chitietgiohang ON giohang.id_GioHang = chitietgiohang.id_GioHang
INNER JOIN sanpham ON chitietgiohang.ID_SanPham = sanpham.id_sanpham
WHERE giohang.ID_ThanhVien = $id_cus";
$query_cart = mysqli_query($mysqli, $sql_cart);
?>

<div class=" min-height-100">
  <br>
    <h2 style= " margin-top: -23px;padding:30px;" class="text-left bg-white">Giỏ hàng của tôi</h2>
    <div class="container" style="padding-top: -40px;">
      <?php
      if (isset($_SESSION['ID_ThanhVien'])) {
        ?>
        <form method="POST" action="index.php?navigate=customer_info">
            <?php
            if (mysqli_num_rows($query_cart) > 0) {
              $i = 0;
              $allMoney = 0;
              $allAmount = 0;
              ?>
          <table class="bg-white table-bordered w-100" cellpadding="5px">           
              <thead>
              <tr class="text-center">
              
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Tùy chọn</th>
              </tr>
              </thead>
              <tbody>
                <?php while($row = mysqli_fetch_array($query_cart)) {
                 
                  ?>
                  <tr class="text-center">
        
                    <td>
                      <?= $row['TenSanPham'] ?>
                    </td>
                    <td><img class="product-img" style="width: 260px" src="./assets/image/product/<?= $row['Img'] ?>"></td>
                    <td>
                      <a class="text-dark" href="pages/main/cart/change.php?change=minus&id=<?= $row['ID_SanPham']?>"><i class="small fa fa-minus"></i></a>
                      <?= $row['SoLuong'] ?>
                      <a class="text-dark" href="pages/main/cart/change.php?change=plus&id=<?= $row['ID_SanPham']?>"><i class="small fa fa-plus"></i></a>
                    </td>
                    <td>
                      <?= number_format($row['GiaBan'] * 1,0,',','.') ?> VND
                    </td>
                    <td>
                      <a class="btn btn-danger mr-2 ml-2" href="pages/main/cart/delete.php?id_delete=<?= $row['ID_SanPham'] ?>">Xóa</a>
                    </td>
                  </tr>
                  
                  <?php
                $Money = (int)$row['SoLuong'] * (int)$row['GiaBan'];
                $amount = $row['SoLuong'];
                $allMoney += $Money;
                $allAmount += (int)$amount;
              }
              ?>
              </tbody>
            <tr>
              <th colspan="3">Tổng tiền: <?= number_format($allMoney,0,',','.') ?> VND</th>
              <th colspan="1">Tổng số lượng: <?= $allAmount ?></th>
              <th colspan="2">
                <a class="btn btn-danger w-100" href="pages/main/cart/delete.php?deleteAll">Xóa hết</a>
              </th>              
            </tr>
            
           
              
            
            
            
          </table>
          <div class="container" style="padding: 10px 0;display:inline-flex; justify-content:space-between">
          <a href="./index.php?navigate=showProducts" style="width:200px" class="btn btn-danger text-white">Tiếp tục mua hàng</a>
              
              <input style="width:250px" type="submit" class="btn btn-danger  " name='submit' value="Đặt hàng"></div>
          <?php
            $_SESSION['allMoney'] = $allMoney;
            $_SESSION['allAmount'] = $allAmount;
          } else {
          ?>
          <h4 class="text-center">Giỏ hàng của bạn đang trống. Hãy đặt món ngay!  <a href="./index.php?navigate=showProducts" class="btn btn-danger text-white rounded">Bắt đầu đặt hàng</a></h4>
         
          <?php
          }                       
          ?>
      </form>
      <?php
      } else {
        ?>
      <h4 class="text-center">Vui lòng đăng nhập để xem giỏ hàng! 
      </h4>
      <?php
      }
      ?>
  </div>  
</div>