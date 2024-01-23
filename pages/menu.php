<div class="menu sticky-top">
    <nav class="navbar navbar-expand-lg primary-background">
        <div class="container-fluid font-weight-bold">
            <a class="navbar-branch" href="./index.php">
                <img class="logo" src="./assets/image/logo/logo.png" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#collapsibleNavbar"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="justify-content:space-around;" class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li style="margin-right: 60px;" class="nav-item">
                        <a
                            class="nav-link text-danger"
                            href="./index.php"
                            >TRANG CHỦ</a
                        >
                    </li>
                    <li style="margin-right: 60px;" class="nav-item">
                        <a
                            class="nav-link text-danger"
                            href="./index.php?navigate=showProducts"
                            >THỰC ĐƠN</a
                        >
                    </li>
                    
                    <li style="margin-right: 60px;" class="nav-item">
                        <a
                            class="nav-link text-danger"
                            href="./index.php?navigate=feedback"
                            >HỆ THỐNG NHÀ HÀNG</a
                        >
                    </li>
                    <?php if(isset($_SESSION['TenDangNhap'])) { ?>
                   
                        
                    <li style="margin-right: 60px;" class="nav-item">
                    <a
                                    href="./index.php?navigate=cart"
                                    class="nav-link text-danger"
                                    >GIỎ HÀNG </a
                                >
                    </li>
                    <li style="margin-right: 60px;" class="nav-item">
                        <div class="dropdown show">
                            <a
                                class="nav-link text-danger dropdown-toggle"
                                role="button"
                                id="dropdownMenuLink"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                style="cursor: pointer;"
                            >
                                TÀI KHOẢN
                            </a>

                            <div
                                class="dropdown-menu"
                                aria-labelledby="dropdownMenuLink"
                            >
                                <a
                                    href="./index.php?navigate=profile"
                                    class="dropdown-item"
                                    >Tài khoản của tôi</a
                                >
                               
                                <a
                                    class="dropdown-item"
                                    href="./index.php?navigate=orderHistory"
                                    >Lịch sử đặt hàng</a
                                >
                                <a
                                    class="dropdown-item"
                                    href="./pages/main/account/logout.php"
                                    >Đăng xuất</a
                                >
                            </div>
                        </div>
                    </li>
                    

                    <?php } else {?>
                    <li style="margin-left: 20px;" class="nav-item">
                        <a
                            class="nav-link text-danger"
                            href="./index.php?navigate=login"
                            >ĐĂNG NHẬP</a
                        >
                    </li>
                    
                    <?php }?>
                </ul>
            </div>
            <form
                action="index.php?navigate=timkiem"
                class="d-flex"
                role="search"
                method="POST"
            >
                <div class="input-group">
                    <input
                    id="search-input"
                        type="search"
                        placeholder="Nhập tìm kiếm..."
                        class="form-control bg-transparent rounded"
                        name="tukhoa"
                    />
                    <div style="margin-left: 3px;" class="input-group-btn">
                        <input
                       
                            type="submit"
                            class="btn bg-danger rounded text-white"
                            name="timkiem"
                            value="Tìm kiếm"
                        />
                    </div>
                </div>
            </form>
        </div>
    </nav>
</div>