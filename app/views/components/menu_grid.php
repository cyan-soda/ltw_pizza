<?php
    $conn = mysqli_connect("localhost","root","","shop");
    if (!$conn) {
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }
    $q = "SELECT * FROM `products`";
    $ret = mysqli_query($conn,$q);

    
    while($row = mysqli_fetch_assoc($ret)){
        $myArray[] = $row;
    }

    $information = json_encode($myArray, JSON_HEX_QUOT);    
?>


        <div class="container">
            <div class="row menu-grid">
                <script>
                    try {
                        const list = <?= $information ?>;
                        const menuGrid = document.querySelector(".menu-grid");
                        let count = 0;
                        let menuHTML = "";

                        // if (window.innerWidth > 600 ) {
                            for (var i = 0; i < list.length; i++) {
                                menuHTML += `    
                                    <div class="col-sm-12 col-lg-3 grid-cell">
                                        <div class="row">
                                            <div class="col d-flex align-items-center dish-cover-container"><img class="dish-cover" src="${list[i].image}"></div>
                                            <div class="col pl-2">
                                                <div class="row dish-name"><a class="dish-link">${list[i].name}</a></div>
                                                <div class="row dish-description" >${list[i].description}</div>
                                                <div class="row price-row">
                                                    <div class="col d-block d-md-flex price-detail">
                                                        <p class="price-from">Giá chỉ từ</p>
                                                        <p class="price">${list[i].price} VND</p>
                                                    </div>

                                                    <div class="col inside-column buy-button-container">
                                                        <button type="button" class="buy-button">Mua ngay </button>
                                                    </div>
                                                </div>
                                            </div>   
                                        </div> 
                                    </div>
                                `;
                            }
                            menuGrid.innerHTML = menuHTML;
                    }
                    catch (error) {
                        console.error("Error:", error);
                    }
                </script>
            </div>
        </div>
