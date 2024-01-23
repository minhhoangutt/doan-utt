<?php
if (isset($_GET['id'])) {
  $sql_category_product = "SELECT * FROM sanpham where ID_DanhMuc='$_GET[id]' ORDER BY ID_SanPham DESC";
  $query_category_product = mysqli_query($mysqli, $sql_category_product);
}
?>
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-2 category-list">
            <?php include('pages/main/product/categoryList.php')?>
          </div>
          <div class="container col-lg-10">
          
            <div style="padding-top: 10px;" class="row min-height-100">             
            <?php
            if (isset($_GET['id'])) {
              ?>
              <?php
              while ($row_category_product = mysqli_fetch_array($query_category_product)) {
                ?>
                
                <form class="col-lg-3 col-md-4 col-sm-6"
                  action="./index.php?navigate=productInfo&id_product=<?php echo $row_category_product['ID_SanPham']; ?>" method="POST">
                  <div class="card text-center mb-4" style="height: 430px;">
                      <img class="product-img" src="./assets/image/product/<?php echo $row_category_product['Img'];?>"/>
                      <div class="card-body">
                        <h5>
                            <?php echo $row_category_product['TenSanPham']; ?>
                        </h5>
                         
                          <h6><?php echo number_format($row_category_product['GiaBan'] )?> VND</h6>
                        <?php if(isset($_SESSION['TenDangNhap'])) { 
                          ?>
                        <input type="submit" class="btn btn-danger" name='submit' value="Mua">  
                        <?php }else{ ?>
                        <input type="submit" class="btn btn-danger" name='submit' value="Xem chi tiết">
                        <?php 
                        } 
                        ?>
                      </div>        
                    </div>
                </form>
                <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
  </div>