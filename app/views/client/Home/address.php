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
                            <p class="username">Nguyễn Thái Sơn</p>
                        </div>
                        <div class="head-body user-sidelink">
                            <ul>
                                <li><a class="router-tag-a acitve" href="/account/info">Thông tin tài khoản</a></li>
                                <li><a class="router-tag-a" href="/account/address">Sổ địa chỉ</a></li>
                                <li><a class="router-tag-a" href="#">Lịch sử mua hàng</a></li>
                                <li><a class="router-tag-a" href="/account/changepw">Đổi mật khẩu</a></li>
                                <li><a class="router-tag-a" href="/account/voucher">Voucher của tôi</a></li>
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
                        <h2 class="main-title">Sổ địa chỉ</h2>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Họ và Tên: </label> <p style="color: red; display: inline;">*</p>
                                <input type="text" class="form-control" name="name" id="name">
                            </div> 
                            <div class="form-group">
                                <label for="name">Tỉnh/Thành: </label> <p style="color: red; display: inline;">*</p>
                                <input type="text" class="form-control" name="name" id="name">
                            </div> 
                            <div class="form-group">
                                <label for="name">Quận/Huyện: </label> <p style="color: red; display: inline;">*</p>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>  
                            <div class="form-group">
                                <label for="name">Phường/Xã: </label> <p style="color: red; display: inline;">*</p>
                                <input type="text" class="form-control" name="name" id="name">
                            </div> 
                            <div class="form-group">
                                <label for="name">Tên đường: </label> <p style="color: red; display: inline;">*</p>
                                <p>Vui lòng nhập tên đường. Ưu tiên chọn tên đường từ gợi ý.</p>
                                <input type="text" class="form-control" name="name" id="name">
                            </div> 
                            <div class="form-group">
                                <label for="name">Số nhà: </label> <p style="color: red; display: inline;">*</p>
                                <p>
                                    Vui lòng nhập thông tin theo cú pháp: số cụ thể, phần chữ hoặc Hẻm hoặc Ngõ hoặc Kiệt nhập ở ô Thông tin chi tiết. <br>
                                    VD1: Nhà số 6 Hẻm hoặc Ngõ hoặc Kiệt 12 => Nhập: 12 <br>
                                    VD2: Nhà số 6A hoặc 6bis hoặc H6 hoặc L6 => Nhập: 6 <br>
                                    *Nếu nhà không có số, vui lòng nhập: 1
                                </p>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Số điện thoại: </label> <p style="color: red; display: inline;">*</p>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div style="display: flex; align-items: center; padding: 5px;">
                                <input type="checkbox" name="agree" id="agree" style="margin: 5px;">
                                <label for="agree" style="display: inline; cursor: pointer;">Địa chỉ mặc định</label>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" value="Thêm" class="btn btn-primary register-button">
                            </div>
                        </form>


                        <div class="history-table" style="padding: 15px; margin-bottom: 15px;">
                        <p id="main-title-custom">ĐƠN HÀNG GẦN ĐÂY NHẤT</p>
                        <table style="margin-top: 15px;">
                            <thead>
                                <tr>
                                    <th class="code">Mã</th>
                                    <th class="code">Sản phẩm</th>
                                    <th class="code">Ngày mua</th>
                                    <th class="code">Tổng tiền</th>
                                    <th class="code">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    
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