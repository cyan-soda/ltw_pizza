
<div class="overplay">
    <div class="popup_productdetail">
        <div class="popupproductleft col-6">
            <div class="popup_productimage">
                <img src="https://thepizzacompany.vn/images/thumbs/000/0003791_caramelized-french-onion-cheese-tart_500.jpeg" class="productimage"  alt="Ảnh của product"></img>
            </div>
            <div id="popup_productprice" class="popup_price">
                79000đ
            </div>
        </div>
        <div class="popupright_product col-6">
            <div class="popup_infor">
                <div class="popup_productname">
                    <h3 class="popup_name">
                        Product Name
                    </h3>
                    <p>
                        Đây là mô tả chi tiết của món ăn
                    </p>
                </div>
                    <p class="popup_namecolor">Size</p>
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                    <label class="btn btn-outline-success" for="success-outlined">Size S</label>

                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off" >
                    <label class="btn btn-outline-success" for="danger-outlined">Size M</label>
                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined1" autocomplete="off" >
                    <label class="btn btn-outline-success" for="danger-outlined1">Size X</label>

                    <p class="popup_namecolor">Số lượng sản phẩm</p>
                    <div class="input-container" style="width: 120px">
                        <div class="col-2"><button onclick="decreaseValue()" class="amountbutton">-</button></div>
                        <div class="col-8"><input type="text" id="quantityhihi" value="1" oninput="updateTotalPrice()" onchange="updateTotalPrice()"  style="width:100%; border:none; text-align: center;"></div>
                        <div class="col-2"><button onclick="increaseValue()" class="amountbutton">+</button></div>
                    </div>
                    <p class="popup_namecolor">GHI CHÚ</p>
                    <textarea id="popup_note" name="popup_note" rows="1" placeholder="Thêm ghi chú của bạn ở đây"></textarea>
                
            </div>
            <div class="popup_button">
                <a class="btn btn-success" href="" role="button" style="width: 100%; ">Thêm vào giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<script>
    function increaseValue() {
        var value = parseInt(document.getElementById('quantityhihi').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('quantityhihi').value = value;
        updateTotalPrice();
    }   

    function decreaseValue() {
        var value = parseInt(document.getElementById('quantityhihi').value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 0) {
            value--;
        }
        document.getElementById('quantityhihi').value = value;
        updateTotalPrice();
    }

    function updateTotalPrice() {   
        var quantityInput = document.getElementById('quantityhihi');

        // Lấy giá trị từ ô nhập số
        var quantity = parseInt(quantityInput.value, 10);

        // Tính toán giá tổng dựa trên số lượng
        var totalPrice = quantity * 79000; // Ví dụ: giá 1 sản phẩm là $10

        // Cập nhật nội dung của cột giá tổng
        document.getElementById('popup_productprice').textContent = totalPrice + 'đ';
        console.log('Giá đã được cập nhật thành công:', totalPrice);
    }
</script>