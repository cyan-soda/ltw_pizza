
<header class="page-header">
    <div class="page-header__container">
    <div class="page-header__top">
        <!-- <div class="container"> -->
            <!-- <div class="row"> -->
                <div class="logo-wrap">
                    <img src="http://thepizzacompany.vn/images/thumbs/000/0003645_VN_ngang_n.png" alt="logo" class="page-header__img">
                </div>
                <div class="right-wrap">
                    <!-- <a href="http://localhost/Home/sign_in" class="btn btn-success my-2 my-sm-0">Đăng nhập</a>
                    <a href="http://localhost/Home/sign_up" class="btn btn-success my-2 my-sm-0">Đăng ký</a> -->
                    <?php
                    if(isset($_SESSION['Logged']) && $_SESSION['Logged']==true){
                        echo '
                            <a href="http://localhost/Home/info" class="btn btn-success my-2 my-sm-0">Tài khoản</a>
                            <a href="http://localhost/Home/sign_out" class="btn btn-success my-2 my-sm-0">Đăng xuất</a>
                            ';
                        }
                        else{ 
                        echo '
                            <a href="http://localhost/Home/sign_in" class="btn btn-success my-2 my-sm-0">Đăng nhập</a>
                            <a href="http://localhost/Home/sign_up" class="btn btn-success my-2 my-sm-0">Đăng ký</a>
                            ';
                        }
                    ?>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>

        <form action="./menu_grid.php" method="POST">
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="me-auto mb-2 mb-lg-0">
                <div class="container-fluid navbar-container">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#" >Khuyến mãi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">#unBox</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" aria-current="page" href="#">Pizza</a> -->
                            <input type="submit" name="submit" value="Pizza" class="nav-link nav-input-button" aria-current="page">
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" aria-current="page" href="#">Khai vị</a> -->
                            <input type="submit" name="submit" value="Khai vị" class="nav-link nav-input-button" aria-current="page">
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" aria-current="page" href="#">Mỳ Ý</a> -->
                            <input type="submit" name="submit" value="Mỳ Ý" class="nav-link nav-input-button" aria-current="page">
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" aria-current="page" href="#">Salad</a> -->
                            <input type="submit" name="submit" value="Salad" class="nav-link nav-input-button" aria-current="page">
                        </li>
                        <li class="nav-item">
                        <input type="submit" name="submit" value="Thức uống" class="nav-link nav-input-button" aria-current="page">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Thế mới chất!!</a>
                        </li>                        
                    </ul>
                    
                    <button type="button" class="btn btn-outline-success" >
                        <span class="cart-icon">🛒</span>
                        Giỏ hàng
                        <span class="cart-count">0</span>
                    </button>
                </div>
            </div>
        </nav>
        </form>
    </div>
</header>


<script>
    document.querySelector('.dropdown').addEventListener('mouseover', function() {
    document.querySelector('.dropdown-menu').style.display = 'block';
    });

    document.querySelector('.dropdown').addEventListener('mouseout', function() {
    document.querySelector('.dropdown-menu').style.display = 'none';
    });
</script>