
<?php
    include '../../config/connect.php';
    // render trang
    $id = $_GET['id'];
    $sql = "SELECT * FROM watch WHERE id = '$id'";
    $stmt = $conn -> prepare($sql);
    $query = $stmt -> execute();
    if ($query) {
        $watch = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

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
            <!-- Product details -->
            <div class="tab-pane grid product__details">
                
                <div class="grid__row app__content">
                    <div class="product__details-img">
                        <img src="<?php echo $watch['image']; ?>" alt="">
                    </div>
                    <div class="product__details-info">
                        <h1 class="product__details-heading">Đồng hồ <?php echo $watch['name']; ?></h1>
                        <p class="product__details-description"><?php echo $watch['description']; ?></p>
                        <span class="product__details-current-price">đ<?php echo preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $watch['current_price']); ?></span>
                        <div class="product__details-old-price">
                            <span class="product__details-old-price-text">đ<?php echo preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $watch['old_price']); ?></span>
                            <span class="product__details-percent-discount">( -<?php echo $watch['discount']; ?>% )</span>
                        </div>
                        <p class="product__details-manufacturer">Nguồn gốc:
                            <span class="product__details-manufacturer-content"><?php echo $watch['origin']; ?></span>
                        </p>
                        <div class="product__details-quantity">
                            <span class="product__details-quantity-text">Số lượng:</span>
                            <input type="number" class="product__details-quantity-num" id="quantity_prod" name="quantity" min="1">
                            <span class="product__details-quantity-text"><?php echo $watch['stock_quantity']; ?> sản phẩm có sẵn</span>
                        </div>
                        <div class="product__details-btn-buy product__details-btn">
                            <a href="" id="buy_link" onclick="buttonBuy(<?php echo $watch['id']; ?>)">Mua</a>
                        </div>
                        <form method="POST" action="/watch-shop/src/resources/views/cart.php">
                        <button class="product__details-btn-add-to-cart product__details-btn">
                            Thêm vào giỏ hàng
                        </button>
                        
                        
                        <input type="hidden" name="_id" value="{{watches._id}}">
                        <input type="hidden" name="name" value="{{watches.name}}">
                        <input type="hidden" name="image" value="{{watches.image}}">
                        <input type="hidden" name="description" value="{{watches.description}}">
                        <input type="hidden" name="stock_quantity" value="{{watches.stock_quantity}}">
                        <input type="hidden" name="origin" value="{{watches.origin}}">
                        <input type="hidden" name="price" value="{{watches.price}}">
                        <input type="hidden" name="discount" value="{{watches.discount}}">

                    </div>
                    
                    <div class="authenticity-guarantee">
                        <h2 class="authenticity-guarantee-heading">
                            Chrono24's Authenticity Guarantee
                        </h2>
                        <div class="section-body">
                            <div class="authenticity-guarantee-body section-body-block ">
                                <div class="contact-return-content section-body-block-content">
                                    <img src="../../public/img/Buyer-Protection-3.svg" alt="" class="contact-return-img">
                                    <h3 class="contact-return-text">Guaranteed Authentic Watches</h3>
                                    <ul class="authenticity-guarantee-sub">
                                        <li class="contact-return-sub-text authenticity-guarantee-sub-text">Every new and used watch on Chrono24 is authentic</li>
                                    </ul>
                                    <ul class="authenticity-guarantee-sub">
                                        <li class="contact-return-sub-text authenticity-guarantee-sub-text">Dealers inspect each watch's authenticity</li>
                                    </ul>
                                    <ul class="authenticity-guarantee-sub">
                                        <li class="contact-return-sub-text authenticity-guarantee-sub-text">Any deviations from the original condition are listed</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="authenticity-guarantee-body contact-buyer-protection-body section-body-block ">
                                <div class="contact-return-content section-body-block-content">
                                    <img src="../../public/img/Buyer-Protection4.svg" alt="" class="contact-return-img">
                                    <h3 class="contact-return-text">14 days to get your money back</h3>
                                    <ul class="authenticity-guarantee-sub">
                                        <li class="contact-return-sub-text authenticity-guarantee-sub-text">A return policy with extra protection: Receive a full refund of the purchase price</li>
                                    </ul>
                                    <ul class="authenticity-guarantee-sub">
                                        <li class="contact-return-sub-text authenticity-guarantee-sub-text">Simply reach out to our support team within 14 days of receiving your watch</li>
                                    </ul>
                                    <ul class="authenticity-guarantee-sub">
                                        <li class="contact-return-sub-text authenticity-guarantee-sub-text">Our promise applies to all purchases from professional dealers worldwide</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="authenticity-guarantee-body contact-buyer-protection-body section-body-block ">
                                <div class="contact-return-content section-body-block-content">
                                    <img src="../../public/img/Buyer-Protection7.svg" alt="" class="contact-return-img">
                                    <h3 class="contact-return-text">We're here for you</h3>
                                    <ul class="authenticity-guarantee-sub">
                                        <li class="contact-return-sub-text authenticity-guarantee-sub-text">A 40-person quality & security team that monitors the marketplace around the clock</li>
                                    </ul>
                                    <ul class="authenticity-guarantee-sub">
                                        <li class="contact-return-sub-text authenticity-guarantee-sub-text">If you have any questions or concerns, our support team is always ready to help</li>
                                    </ul>
                                    <ul class="authenticity-guarantee-sub">
                                        <li class="contact-return-sub-text authenticity-guarantee-sub-text">Whatever the case, we always find an optimal solution</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="any-questions">
                        <h2 class="any-questions-heading">Do you have any questions?</h2>
                        <div class="any-questions-content">
                            <span class="any-questions-number">
                                <i class="fa-solid fa-phone"></i>+852 3002 0310</span>
                            <a href="" class="any-questions-contact">
                                <i class="fa-regular fa-message"></i>Contact</a>
                        </div>
                        <span class="any-questions-doubt-text">I have found an item I would like to buy. How should I proceed?</span>
                        <span class="any-questions-doubt-text">I would like to negotiate a price with the seller. What should I do?</span>
                        <a href="" class="any-questions-btn">More questions and answers</a>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>
    <script src="../../public/js/jquery-3.7.0.min.js"></script>
    <script src="../../public/js/main.js"></script>
</body>
</html>

