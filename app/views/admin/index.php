<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="Public/header.css">
    <link rel="stylesheet" href="Public/sidebar.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- header -->
            <?php include_once 'Components/header.php' ;?>

            <!-- side bar -->
            <?php include_once 'Components/sidebar.php' ;?>

            <!-- content -->
            <div class="content col-md-10 p-0">
                <div class="grid-container">
                    <!-- Grid items -->
                    <div id="manage-product" class="manage-btn product"><i class="fas fa-project-diagram"></i><br>Quản
                        lý Sản phẩm</div>
                    <div id="manage-customer" class="manage-btn manage-customer"><i class="fa-solid fa-user"></i><br>Quản lý Khách hàng
                    </div>
                    <div id="manage-report" class="manage-btn manage-report"><i
                            class="fas fa-chart-line"></i></i><br>Thống
                        kê và Báo cáo</div>
                    <div id="manage-order" class="manage-btn order"><i class="fas fa-paperclip"></i><br>Quản lý Đơn Hàng
                    </div>
                    <div id="manage-news" class="manage-btn manage-news"><i class="fa-solid fa-ticket"></i><br>Tin tức và
                        khuyến mãi</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="./handel.js"></script>
</body>

</html>