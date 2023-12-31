<?php
    $conn = mysqli_connect("localhost","root","","pizzaCompany");
    if (!$conn) {
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }

    if (isset($_POST["submit"])) {
        $id=$_POST["submit"];
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php include '../../components/header.php' ?>
    <form action="../payment/payment_delivery.php" method="POST">
    <div class="orderpage container mx-auto">
        <div class="titlepage">
            <h3>Sản phẩm</h3>
        </div>
        <div class="tableorder">
             <form action="../payment/payment_delivery.php" method="POST">
            <div class="row rowproduct">
                <div class="orderleft row col-sm-6 col-12">
                    <div class="order_productimage col-sm-4 col-6">
                        <img src="<?php echo $row["Photo"];?>" class="productimage" alt="Ảnh của product"></img>
                    </div>
                    <div class="order_productinfor col-sm-8 col-6">
                        <div class="order_product_inforname"><?php echo $row["Name"];?></div>
                        <div class="order_product_select"><?php echo $row["Type"];?></div>
                    </div>
                </div>
                <div class="orderright row col-sm-6 col-12">
                    <div class="order_productamount col-6">
                        <div class="input-container">
                            <div class="col-2"><button type="button" onclick="decreaseValue()" class="amountbutton">-</button></div>
                            <div class="col-8"><input name="quantityorder" type="text" id="quantity" value="1"
                                    oninput="updateTotalPrice()" onchange="updateTotalPrice()"
                                    style="width:100%; border:none; text-align: center;"></div>
                            <div class="col-2"><button type="button" onclick="increaseValue()" class="amountbutton">+</button></div>
                        </div>
                    </div>

                    <div id="order_producttotalprice" class="col-4"><?php echo $row["Price"];?>đ</div>
                    <div class="order_productdelete col-2">
                        <a href="#" onclick="handleImageClick()">
                            <img src="https://media.istockphoto.com/id/1266558557/vi/vec-to/x%C3%B3a-lo%E1%BA%A1i-b%E1%BB%8F-k%C3%BD-hi%E1%BB%87u-th%C3%B9ng-r%C3%A1c-th%C3%B9ng-r%C3%A1c-bi%E1%BB%83u-t%C6%B0%E1%BB%A3ng-th%C3%B9ng-r%C3%A1c-th%C3%B9ng-r%C3%A1c-x%C3%B3a-bi%E1%BB%83u-t%C6%B0%E1%BB%A3ng-cho.jpg?s=612x612&w=0&k=20&c=-8msDkXcItVzxBgBFN_Rn5uP0yh1fJyUUmrLENy1dY8="
                                alt="Clickable Image" class="deletebutton">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="totalprice">
            <div>
                <h2>Tổng tiền: </h2>
            </div>
            <div id="order_producttotalpricetoltal"
                style="color: red; text-align: center;margin-left: 30px; font-size: 30px;"><?php echo $row["Price"];?>đ
            </div>
        </div>
        <div class="buttonmethod">
            <div class="popup_button1">
                <a class="btn btn-success orderbut" href="http://localhost/Home" role="button">Quay lại mua hàng</a>
            </div>
            <button type="submit" name="submit" value="<?php echo $id ?>" class="btn btn-success orderbut">Thanh
                toán</button>
           
        </div>
    </div>
    </form>
    <?php include '../../components/footer.php' ?>
</body>



</html>

<script>
function increaseValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('quantity').value = value;
    updateTotalPrice();
}

function decreaseValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 0) {
        value--;
    }
    document.getElementById('quantity').value = value;
    updateTotalPrice();
}

function updateTotalPrice() {
    var quantityInput = document.getElementById('quantity');

    // Lấy giá trị từ ô nhập số
    var quantity = parseInt(quantityInput.value, 10);

    // Tính toán giá tổng dựa trên số lượng
    var totalPrice = quantity * 79000; // Ví dụ: giá 1 sản phẩm là $10

    // Cập nhật nội dung của cột giá tổng
    document.getElementById('order_producttotalprice').textContent = totalPrice + 'đ';
    document.getElementById('order_producttotalpricetoltal').textContent = totalPrice + 'đ';
}
</script>