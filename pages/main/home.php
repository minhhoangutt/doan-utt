<?php
  $sql_product = "SELECT *
  FROM sanpham
  WHERE ID_SanPham IN (
      SELECT ID_SanPham
      FROM chitietdonhang
      inner join donhang
      on chitietdonhang.ID_DonHang = donhang.ID_DonHang
      where donhang.XuLy = 1
      GROUP BY ID_SanPham
      ORDER BY SUM(SoLuong) DESC
  ) LIMIT 8";
  $query_product = mysqli_query($mysqli, $sql_product);

?>

<div>
    <!-- Slides -->
    <div id="slides" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
            <li data-target="#slides" data-slide-to="3"></li>
          </ul>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="intro-slide" src="./assets/image/banner/b1.jpg" alt="banner">
              <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px 2px #000;">
                
              </div>
            </div>
            <div class="carousel-item">
              <img class="intro-slide" src="./assets/image/banner/b2.jpg" alt="banner">
              <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px 2px #000;">
                
              </div>
            </div>
            <div class="carousel-item">
              <img class="intro-slide" src="./assets/image/banner/b3.jpg" alt="banner">
              <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px 2px #000;">
               
              </div>
            </div>
            <div class="carousel-item">
              <img class="intro-slide" src="./assets/image/banner/b4.jpg" alt="banner">
              <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px 2px #000;">
               
              </div>
            </div>
            
          </div>
        </div>
         
        <!-- Featured products -->
        <div style="margin-top: 30px;" class="container ">
            <h3 style="margin-bottom: 10px;" class="text-danger text-center">SẢN PHẨM NỔI BẬT</h3>
            <div class="row" style="margin-top: 30px;">
            <?php
            while ($row_product = mysqli_fetch_array($query_product)) {
            ?>
                <form class="col-lg-3 col-md-4 col-sm-6" action="index.php?navigate=productInfo&id_product=<?php echo $row_product['ID_SanPham']; ?>" method="POST">
                    <div class="card text-center mb-4" style="height: 430px;">
                      <img src="./assets/image/product/<?php echo $row_product['Img']; ?>" class="card-img-top product-img">
                      <div class="card-body">
                        <h5>
                          <?php echo $row_product['TenSanPham']; ?>
                        </h5>
                        
                        <h6><?php echo number_format($row_product['GiaBan']* 1,0,',','.')?> VND</h6>
                        <?php if(isset($_SESSION['TenDangNhap'])) { 
                          ?>
                          <input type="submit" class="btn btn-danger" name='submit' value="Mua">  
                        <?php } else{ ?>
                          <input type="submit" class="btn btn-danger" name='submit' value="Xem chi tiết">
                        <?php 
                        } 
                        ?>
                      </div>
                    </div>
                </form>
                <?php
              }
            ?>
            </div>     
        </div>
              
    <!-- Suppliers -->
  
</div>