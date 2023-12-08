<?php
    $conn = mysqli_connect("localhost","root","","pizzaCompany");
    if (!$conn) {
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }
    $id=3;
    $amount=1;
    if (isset($_POST["submit"])) {
        $id=$_POST["submit"];
        $amount=$_POST["quantityorder"];
    }

    $q = "SELECT * FROM `Product` WHERE `Product_ID`='$id'";
    $ret = mysqli_query($conn,$q);
    if ($ret) {
        $row = mysqli_fetch_assoc($ret);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../../public/css/header.css" />
    <link rel="stylesheet" href="../../../../public/css/footer.css" />
    <link rel="stylesheet" href="../../../../public/css/orderlist.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="../../../../public/css/popup_orderlist.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="../../../../public/css/uikit.min.css" />
    <link rel="stylesheet" href="../../../../public/css/payment.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php include '../../components/header.php' ?>
    <form action="" method="POST">
        <div class="container method-container order-container">
            <div>
                <p class="delivery-method-title">Đặt giao hàng</p>
            </div>
            <div>
                <div class="row">
                    <div class="col-md-6 detail-column">
                        <div class="delivery-info-title">Thông tin nhận hàng</div>

                        <div>
                            <label class="form-label detail-label" for="name">Họ và tên: </label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div>
                            <label class="form-label detail-label" for="phone-number">Số điện thoại: </label>
                            <input type="text" class="form-control" name="phone-number">
                        </div>

                        <div>
                            <label class="form-label detail-label" for="take-note">Ghi chú: </label>
                            <input type="text" class="form-control" name="take-note">
                        </div>
                    </div>

                    <div class="col-md-6 detail-column">
                        <div class="delivery-info-title">Địa chỉ nhận hàng</div>

                        <div>
                            <label class="form-label detail-label" for="provinceSelect">Tỉnh/ Thành phố: </label>
                            <select class="form-select" aria-label="Default select example" id="provinceSelect"
                                onchange="updateDistricts()">
                                <option value="HCM">Thành phố Hồ Chí Minh</option>
                                <option value="HN">Thành phố Hà Nội</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label detail-label" for="districtSelect">Quận/Huyện: </label>
                            <select id="districtSelect" class="form-select" aria-label="Default select example">

                            </select>

                        </div>

                        <div>
                            <label class="form-label detail-label" for="detail-address">Địa chỉ chi tiết: </label>
                            <input type="text" class="form-control" name="detail-address">
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>

        </div>
        <div class="container payment-component-container">
            <div class="row gx-5">
                <div class="col-md-7 payment-choice-container">
                    <p class="delivery-method-title">Phương thức thanh toán</p>
                    <div class="container payment-radio-form">
                        <div class="payment-method-container">
                            <div class="col-12 choice">
                                <input type="radio" name="momo" value="momo">
                                <label for="momo">
                                    <div class="row payment-name-container">
                                        <div class="col-2 payment-method-icon align-self-center"
                                            style="border-right: 1px solid rgb(203, 202, 202);">
                                            <img class="delivery-icon mx-auto p-2" src="../../../../public/img/momo.jpeg"
                                                alt="momo-icon">
                                        </div>

                                        <div class="col-10 align-self-center">
                                            <p class="payment-method">MOMO</p>
                                            <p style="color: gray;">Thanh toán qua ví MOMO hoặc ứng dụng ngân hàng</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12">
                                <input type="radio" name="momo" value="momo">
                                <label for="momo">
                                    <div class="row payment-name-container">
                                        <div class="col-2 payment-method-icon align-self-center"
                                            style="border-right: 1px solid rgb(203, 202, 202);">
                                            <img class="delivery-icon mx-auto p-2" src="../../../../public/img/cash.jpeg"
                                                alt="momo-icon">
                                        </div>

                                        <div class="col-10 align-self-center">
                                            <p class="payment-method">Thanh toán khi nhận hàng</p>
                                            <p style="color: gray;">Trả bằng tiền mặt - đơn hàng dưới 1.000.000đ</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-4 payment-choice-container">
                    <div class="delivery-method-title">Đơn hàng của bạn</div>

                    <div class="dish-roll-container">
                        <div class="row dish-detail">
                            <p class="col dish-name"><?php echo $row["Name"];?></p>
                            <p class="col text-end">x1</p>
                        </div>

                        <div class="text-end menu-price"><?php echo $amount ?></div>
                    </div>

                    <div class="temporarily-calculate">
                        <div class="row price-calculate temporarily">
                            <p class="col content-in-bill">Tạm tính</p>
                            <p class="col text-end content-in-bill"><?php echo $amount * $row["Price"]?>đ</p>
                        </div>

                        <div class="row price-calculate">
                            <p class="col content-in-bill">Phụ thu</p>
                            <p class="col text-end content-in-bill">0đ</p>
                        </div>

                        <div class="row price-calculate">
                            <p class="col content-in-bill">Giảm giá</p>
                            <p class="col text-end content-in-bill">0đ</p>
                        </div>

                        <div class="row price-calculate">
                            <p class="col content-in-bill">Thuế</p>
                            <p class="col text-end content-in-bill">0đ</p>
                        </div>

                        <div class="row price-calculate" style="border-bottom: 1px solid rgb(203, 202, 202);;">
                            <p class="col content-in-bill">Phí giao hàng</p>
                            <p class="col text-end content-in-bill">25000đ</p>
                        </div>
                    </div>

                    <div class="row total-price-area">
                        <p class="col total-title">Tổng tiền</p>
                        <p class="col text-end total-price"><?php echo $amount * $row["Price"] + 25000?>đ</p>
                    </div>
                </div>
            </div>


        </div>
        <div class="container method-container">
            <!-- <div class="container"> -->
            <div class="row delivery-method-noti">
                <div>
                    <div id="ship" class="row" onclick="changeColor('ship','seft-take)">
                        <div class="col-3 icon-container">
                            <img class="delivery-icon mx-auto p-2" src="../../../../public/img/delivery_icon.png"
                                alt="delivery-icon">
                        </div>

                        <div class="col-9 align-self-center">
                            <p class="method-choice-title">Đặt giao hàng</p>
                            <p>Giao hàng tận nơi với đơn hàng <span class="emphasized">thực thanh toán</span> từ <span
                                    class="emphasized">100.000đ</span>. Phụ thu phí giao hàng từ <span
                                    class="emphasized">25,000đ</span> cho mỗi đơn đặt hàng qua Hotline 19006066 hoặc
                                Website, bao gồm hoá đơn có các sản phẩm thuộc chương trình khuyến mại.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="buttonmethod" style="margin-top: 3%; margin-bottom: 3%;">
            <div class="popup_button1">
                <a class="btn btn-success orderbut" href="http://localhost/Home" role="button">Tiếp tục mua hàng</a>
            </div>
            <div class="popup_button1">
                <a class="btn btn-success orderbut" href="" role="button">Thanh toán</a>
            </div>
        </div>
        </div>
    </form>

    <?php include '../../components/footer.php' ?>
</body>

Thuỷ Tiên
<script>
        // Simulated district data (replace this with actual data from a database or API)
        const districtData = {
            HCM: ["Quận 1", "Quận 2", "Quận 3", "Quận 4", "Quận 5", "Quận 6", "Quận 7", "Quận 8", "Quận 9", "Quận 10", "Quận 11","Quận 12", "Quận Tân Bình", "Quận Bình Thạnh", "Quận Gò Vấp", "Quận Phú Nhuận", "Thành phố Thủ Đức", "Huyện Bình Chánh", "Huyện Hóc Môn", "Huyện Nhà Bè"],
            HN: ["Huyện Gia Lâm", "Huyện Hoài Đức", "Huyện Thanh Trì", "Quận Ba Đình", "Quận Bắc Từ Liêm", "Quận Cầu Giấy", "Quận Đống Đa", "Quận Hà Đông", "Quận Hai Bà Trưng", "Quận Hoàn Kiếm", "Quận Hoàng Mai", "Quận Long Biên", "Quận Nam Từ Liêm", "Quận Tây Hồ", "Quận Thanh Xuân"]
            // Add more districts for each province
        };

        function updateDistricts() {
            const provinceSelect = document.getElementById("provinceSelect");
            const districtSelect = document.getElementById("districtSelect");
            
            // Get the selected province
            const selectedProvince = provinceSelect.value;

            // Clear existing district options
            districtSelect.innerHTML = "";

            // Populate district options based on the selected province
            if (selectedProvince in districtData) {
                const districts = districtData[selectedProvince];
                districts.forEach(district => {
                    const option = document.createElement("option");
                    option.value = district;
                    option.text = district;
                    districtSelect.appendChild(option);
                });
            } else {
                const defaultOption = document.createElement("option");
                defaultOption.text = "Select a Province first";
                districtSelect.appendChild(defaultOption);
            }
        }

    // Call updateDistricts initially to populate the initial state
    updateDistricts();
</script>

</html>
