<header class="page-header">
    <div class="page-header__container">
        <div class="page-header__top">
            <div class="container container-horizontal">
                <img src="http://thepizzacompany.vn/images/thumbs/000/0003645_VN_ngang_n.png" alt="logo" class="page-header__img">

                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary">Left</button>
                    <button type="button" class="btn btn-outline-primary">Right</button>
                </div>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>

                <div class="right-wrap">
                    <?php

                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                        {
                            echo '<div class="dropdown">
                                    <a href="http://localhost/Home/info" class="dropdown-toggle"> '. $_SESSION['name'] .' </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="http://localhost/Home/info">Tài khoản</a></li>
                                        <li><a class="dropdown-item" href="http://localhost/Home/sign_out">Đăng xuất</a></li>
                                    </ul>
                                </div>';
                        }
                        else
                        {
                            echo '<div>
                                    <a href="http://localhost/Home/sign_in" class="btn btn-outline-success">Đăng nhập</a>
                                    <a href="http://localhost/Home/sign_up" class="btn btn-outline-success">Tạo tài khoản</a>
                                </div>';
                        }

                    ?>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="me-auto mb-2 mb-lg-0">
                <div class="container-fluid navbar-container">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Khuyến mãi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">#unBox</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Pizza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Khai vị</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Mỳ Ý</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Salad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Thức uống</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Thế mới chất!!</a>
                        </li>                        
                    </ul>
                    <!-- <div id="cart">
                        <button type="button" class="btn btn-outline-success">
                            <span class="cart-icon">🛒</span>
                            Giỏ hàng
                        </button>
                        <span class="cart-count">0</span>
                    </div> -->
                    
                    <button type="button" class="btn btn-outline-success">
                        <span class="cart-icon">🛒</span>
                        Giỏ hàng
                        <span class="cart-count">0</span>
                    </button>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- <header class="page-header">
<div class="container">
    <div class="top-wrap">
        <div class="left-wrap">
            <div class="logo">
                <img src="public/img/logo-real.png" alt="logo" class="page-header__img">
            </div>
        </div>

        <div class="mid-wrap">
            <div class="form-group list-radio">
                <div class="form-radio">
                    <input type="radio" id="order-delivery" name="order" checked="checked" onclick="">
                    <label for="order-delivery">Đặt giao hàng</label>
                </div>
                <div class="form-radio">
                    <input type="radio" id="put-to-get" name="order" checked="checked" onclick="">
                    <label for="put-to-get">Đặt đến lấy</label>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </div>
        </div>

        <div class="right-wrap">
            <div class="account">
                <a href="http://localhost/ltw_pizza/account/sign-in" class="btn btn-outline-success">Đăng nhập</a>
                <a href="http://localhost/ltw_pizza/account/sign-up" class="btn btn-outline-success">Đăng ký</a>
            </div>
        </div>
    </div>

    <div class="bottom-wrap">
        <div class="left-wrap">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Khuyến mãi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">#unBox</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Pizza</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Khai vị</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Mỳ Ý</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Salad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Thức uống</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Thế mới chất!!</a>
                </li>                        
            </ul>
        </div>

        <div class="right-wrap">
            <button type="button" class="btn btn-outline-success">
                <span class="cart-icon">🛒</span>
                Giỏ hàng
                <span class="cart-count">0</span>
            </button>
        </div>
    </div>
</div>
</header> -->

<script>
    document.querySelector('.dropdown').addEventListener('mouseover', function() {
        document.querySelector('.dropdown-menu').style.display = 'block';
    });

    document.querySelector('.dropdown').addEventListener('mouseout', function() {
        document.querySelector('.dropdown-menu').style.display = 'none';
    });
</script>