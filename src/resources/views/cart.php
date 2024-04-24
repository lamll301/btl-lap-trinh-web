

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../public/css/base.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/vendor/open-iconic-master/font/css/open-iconic-bootstrap.css">
    <link rel="stylesheet" href="../../public/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,500;8..144,700&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="app">
        <?php include 'header.php'; ?>

        <div class="container">
            <div class="tab-pane grid order ">
                <div class="order-upper-part">
                    <div class="order-customer">
                        <h1 class="order-customer-heading">Shopping cart</h1>
                        <div class="order-lower-part">
                            <h3 class="order-customer-text">Chi tiết giỏ hàng</h3>
                            
                            <form method="POST" action="/cart/prod/{{this._id}}?_method=PUT">
                            <div class="order-prod">
                                <img src="https://cdn2.chrono24.com/images/uhren/29912138-4errkpux04fv3t4pts3imkc8-Square280.jpg" alt="" class="order-prod-img">
                                <div class="order-prod-info">
                                    <a href="/product/{{this._id}}" class="order-prod-name">Đồng hồ Rolex GMT-Master II</a>
                                    <br><br><a href="/product/{{this._id}}" class="order-prod-description">Rolex GMT-Master II là một trong những mẫu đồng hồ thượng hạng nổi tiếng của hãng đồng hồ Rolex, được thiết kế đặc biệt để đáp ứng nhu cầu của những người thường xuyên đi lại giữa múi giờ khác nhau hoặc thường xuyên di chuyển qua múi giờ.</a>
                                    <br><br><span class="order-prod-stock-quantity">Còn lại 500 cái.</span>
                                </div>
                                <div class="order-prod-price">
                                    <p class="order-prod-curr-price">
                                        100.000.000 ₫
                                    </p>
                                    <p class="order-prod-old-price">100.000.000 ₫</p>
                                    <p class="order-prod-discount">- 0%</p>
                                    <button class="order-prod-remove">
                                        <i class="fa-solid fa-trash fa-xl"></i>
                                    </button>
                                </div>
                                
                                <div class="order-prod-quantity">Số lượng: 
                                    <input 
                                        type="number" class="order-prod-quantity-input" value="{{this.quantity}}" min="1" name="quantity"
                                    >
                                </div>
                                <input type="hidden" name="act" value="remove">
                            </div>
                            </form>
                            
                            
                        </div>
                    </div>
                    <div class="order-payment">
                        <h3 class="order-payment-heading order-customer-text">Thông tin đơn hàng</h3>
                        <div class="order-payment-row">Tạm tính (1 Sản phẩm)
                            <span class="order-payment-price">100.000.000 ₫</span>
                        </div>
                        <div class="order-payment-row">Phí vận chuyển
                            <span class="order-payment-price">50.000 ₫</span>
                        </div>
                        <div class="order-payment-row order-payment-total">Tổng cộng:
                            <span class="order-payment-price order-payment-total-price">
                                100.050.000 ₫
                            </span>
                        </div>
                        <button onclick="window.location.href='http://localhost:3000/order/products'" class="order-payment-btn header__search-btn">
                            <span class="header__search-btn-text">Xác nhận giỏ hàng</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>
    <script src="../../public/js/jquery-3.7.0.min.js"></script>
    <script src="../../public/js/main.js"></script>
</body>
</html>

<script>
    const quantityInput = document.querySelectorAll('.order-prod-quantity-input');
    
    quantityInput.forEach(input => {
        input.addEventListener('change', () => {
            const form = input.closest('form');
            form.querySelector('[name="act"]').value = 'update';
            form.submit();
        });
    })
</script>