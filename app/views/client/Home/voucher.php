<div class="page-wrapper">
    <?php 
      require_once "./app/views/" . $data["header"] . ".php";
    ?>

    <div class="container" style="margin-top: 20px; width: 1200px;">
        <div class="row">
            <div class="col-lg-3">
                <div class="side-2 col-12">
                    <style>
                        .router-tag-a {
                        color: #111;
                        font-weight: 400;
                        text-decoration: none;
                        }
                        .router-tag-a:hover {
                            text-decoration: none;
                        }
                    </style>
                    <div class="user-sidebar">
                        <div class="head-box userinfo">
                            <p>Tài khoản của</p>
                            <?php echo '<p class="username">' . $_SESSION['name'] . '</p>'; ?>
                            <!-- <p class="username">Nguyễn Thái Sơn</p> -->
                        </div>
                        <div class="head-body user-sidelink">
                            <ul>
                                <li><a class="router-tag-a acitve" href="http://localhost/Home/info">Thông tin tài khoản</a></li>
                                <li><a class="router-tag-a active" href="http://localhost/Home/address">Sổ địa chỉ</a></li>
                                <li><a class="router-tag-a" href="http://localhost/Home/history">Lịch sử mua hàng</a></li>
                                <li><a class="router-tag-a" href="http://localhost/Home/changepw">Đổi mật khẩu</a></li>
                                <li><a class="router-tag-a" href="http://localhost/Home/voucher">Voucher của tôi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="center-2">
                    <style>
                        @media only screen and (max-width: 768px) {
                            .grid-report-item {
                                text-align: right !important;
                            }

                            #general-info {
                                padding-right: 0px !important;
                            }

                            .edit-wrapper .td-edit {
                                text-align: right;
                                width: 20% !important;
                            }
                        }

                        #main-title-custom {
                            color: #006a31;
                            font-weight: 700;
                            text-transform: uppercase;
                        }

                        @media only screen and (min-width: 769px) {
                            #general-info {
                                text-align: left;
                                padding-left: 0px;
                            }
                        }
                    </style>
                    <div class="col-lg-12">
                        <h2 class="main-title">Voucher của tôi</h2>
                        <p style="margin-top: 10px;">Chưa có voucher nào.</p>
                    
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <?php 
      require_once "./app/views/" . $data["footer"] . ".php";
    ?>

</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var header = document.querySelector('.page-header');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 0) {
            header.classList.add('sticky-header');
        } else {
            header.classList.remove('sticky-header');
        }
    });
});
</script>