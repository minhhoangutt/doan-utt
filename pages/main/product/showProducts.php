<?php
  if(isset($_GET['trang'])){
    $page = $_GET['trang'];
  } else{
    $page = 1;
  }
  if($page == '' || $page == 1){
    $begin = 0;
  } else{
    $begin = ($page*8)-8;
  }
  if(isset($_POST['desc'])){
    $sql_product = "SELECT * FROM sanpham ORDER BY GiaBan *1 DESC LIMIT $begin,8";
  }
  else if(isset($_POST['asc'])){
    $sql_product = "SELECT * FROM sanpham ORDER BY GiaBan *1 ASC LIMIT $begin,8";
  }
  else if(isset($_POST['hot'])){
    $sql_product = "SELECT *
    FROM sanpham
    WHERE ID_SanPham IN (
        SELECT ID_SanPham
        FROM chitietdonhang
        GROUP BY ID_SanPham
        ORDER BY SUM(SoLuong) DESC
    )";
  }
  else if(isset($_POST['saleoff'])){
    $sql_product = "SELECT * FROM sanpham ORDER BY ID_SanPham DESC LIMIT $begin,8";
  }
  else {
    $sql_product = "SELECT * FROM sanpham ORDER BY ID_SanPham DESC LIMIT $begin,8";
  }
  $query_product = mysqli_query($mysqli,$sql_product);
?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 category-list">
        <?php include('pages/main/product/categoryList.php')?>
      </div>
      <div class="container-fluid col-lg-10">
        <div>
        <form action="" method="POST">
          
          
          <div style="padding: 10px 0; display:flex; justify-content:flex-end;" class="dropdown show">
                          <a
                              class=" btn btn-secondary text-white  dropdown-toggle"
                              role="button"
                              id="dropdownMenuLink"
                              data-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                              style="cursor: pointer;"
                          >
                              Sắp xếp theo
                          </a>

                          <div
                              class="dropdown-menu"
                              aria-labelledby="dropdownMenuLink"
                          >
                             
                            <input style="border: none;" class="dropdown-item" type="submit" value="Sản phẩm bán chạy" name="hot">
                              
                            <input class="dropdown-item" type="submit" value="Sản phẩm có giá giảm dần" name="desc">
                            
                            <input class="dropdown-item" type="submit" value="Sản phẩm có giá tăng dần" name="asc">
                              
                          </div>
          </div>
        </form>
        </div>
        <div class="row min-height-100">
        <?php
        while($row_product = mysqli_fetch_array($query_product)){
        ?>    
        <form class="col-lg-3 col-md-4 col-sm-6" action="./index.php?navigate=productInfo&id_product=<?php echo $row_product['ID_SanPham'];?>" method="POST">
          <div class="card text-center mb-4" style="height: 430px;">
            <img class="card-img-top product-img" src="./assets/image/product/<?php echo $row_product['Img'];?>"/>
            <div class="card-body">
              <h5>
                  <?php echo $row_product['TenSanPham']; ?>
              </h5>
              <h6><?php echo number_format($row_product['GiaBan'] * 1,0,',','.')?> VND</h6>
              <?php if(isset($_SESSION['TenDangNhap'])) { 
                ?>
              <input type="submit" class="btn btn-danger" name='submit' value="Xem chi tiết">  
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
        ?>
      </div>
				<?php
				$sql_trang = mysqli_query($mysqli, "SELECT * FROM sanpham");
				$row_count = mysqli_num_rows($sql_trang);  
				$trang = ceil($row_count/8);
				?>				
				<ul class="d-flex justify-content-center list-unstyled">
					<?php
					  for($i=1;$i<=$trang;$i++){ 
					?>
						<li class="m-1 bg-white" <?php if($i==$page){echo 'style="background: #ccc !important;"';}else{ echo '';}?>>
            <a class="d-block p-2 text-dark" href="index.php?navigate=showProducts&trang=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
					<?php
					} 
					?>
				</ul>
      </div>
    </div>
  </div>
