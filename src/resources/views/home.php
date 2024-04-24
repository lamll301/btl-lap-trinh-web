<?php
    include '../../config/connect.php';

    $sql = "SELECT * FROM category WHERE type = 'Brands'";
    $stmt_categoryBrands = $conn -> prepare($sql);
    $query = $stmt_categoryBrands -> execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/base.css">
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
            <div class="tab-pane home__page ">
                <div class="slider">
                    <img src="../../public/img/slider1.webp" alt="Slider Image">
                    <img src="../../public/img/slider2.webp" alt="Slider Image">
                    <img src="../../public/img/slider3.webp" alt="Slider Image">
                    <img src="../../public/img/slider4.webp" alt="Slider Image">
                    <img src="../../public/img/slider5.webp" alt="Slider Image">
                    <div class="slider-content">
                        <span class="slider-text">Find your dream watch on the leading marketplace for luxury watches.</span>
                        <div class="slider-rating">
                            <i class="home-product-item__star--gold fa-solid fa-star slider-star"></i>
                            <i class="home-product-item__star--gold fa-solid fa-star slider-star"></i>
                            <i class="home-product-item__star--gold fa-solid fa-star slider-star"></i>
                            <i class="home-product-item__star--gold fa-solid fa-star slider-star"></i>
                            <i class="home-product-item__star--gold fa-solid fa-star slider-star"></i>
                            <span class="slider-rating-number">(137,330)</span>
                        </div>
                        <div class="slider-powered-by">
                            <span class="slider-powered-by-text">Powered by</span>
                            <span class="slider-powered-by-sponsors">Trustpilot</span>
                        </div>
                    </div>
                </div>     
                
                <div class="content">
                    <!-- Popular brands -->
                    <div class="content-section">
                        <h2 class="section-heading">Popular brands</h2>
                        <div class="popular-brands">

                            <?php
                            if ($query) {
                                while ($row = $stmt_categoryBrands->fetch(PDO::FETCH_ASSOC)) {
                                    if ($row['id'] % 2 == 1) {
                                        echo "<div class='popular-brands-list'>";
                                    }
                                    echo "<a href='/watch-shop/src/resources/views/category.php?id=". $row['id'] ."&slug=". $row['slug'] ."' class='popular-brands-item'>". $row['name'] ."</a>";
                                    if ($row['id'] % 2 == 0) {
                                        echo "</div>";
                                    }
                                }
                            }
                            ?>
                            
                        </div>
                        <!-- tạo nút chuyển phần từ thừa -->
                        <ul class="popular-brands-transfer">
                            <li class="dot dot--selected"></li>
                            <li class="dot dot--not-selected"></li>
                        </ul>
                    </div>
                    <!-- about section -->
                    <div class="content-section">
                        <h2 class="section-heading">The Leading Marketplace for Luxury Watches Since 2003</h2>
                        <div class="section-body">
                            <div class="introduce section-body-block">
                                <div class="introduce-content section-body-block-content">
                                    <img src="../../public/img/introduce1.svg" alt="" class="introduce-img">
                                    <h3 class="introduce-text">4.8 out of 5 stars</h3>
                                    <p class="introduce-sub-text">from 137,000 reviews worldwide</p>
                                </div>
                            </div>

                            <div class="introduce section-body-block">
                                <div class="introduce-content">
                                    <img src="../../public/img/introduce2.svg" alt="" class="introduce-img">
                                    <h3 class="introduce-text">9 million</h3>
                                    <p class="introduce-sub-text">watch enthusiasts use Chrono24 each month</p>
                                </div>
                            </div>

                            <div class="introduce section-body-block">
                                <div class="introduce-content">
                                    <img src="../../public/img/introduce3.svg" alt="" class="introduce-img">
                                    <h3 class="introduce-text">Over 200,000</h3>
                                    <p class="introduce-sub-text">customers choose Buyer Protection annually</p>
                                </div>
                            </div>

                            <div class="introduce section-body-block">
                                <div class="introduce-content">
                                    <img src="../../public/img/introduce4.svg" alt="" class="introduce-img">
                                    <h3 class="introduce-text">More than 25,000</h3>
                                    <p class="introduce-sub-text">Trustworthy sellers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- buyer protection -->
                    <div class="content-section">
                        <div class="buyer-protection">
                            <div class="buyer-protection-content">
                                <h2 class="buyer-protection-heading">Chrono24 Buyer Protection</h2>
                                <ul class="buyer-protection-list">
                                    <li class="buyer-protection-item">
                                        <i class="fa-solid fa-check fa-lg buyer-protection-icon"></i>
                                        Payment via the Escrow Service
                                    </li>
                                    <li class="buyer-protection-item">
                                        <i class="fa-solid fa-check fa-lg buyer-protection-icon"></i>
                                        Authenticity Guarantee
                                    </li>
                                    <li class="buyer-protection-item">
                                        <i class="fa-solid fa-check fa-lg buyer-protection-icon"></i>
                                        Global money-back guarantee
                                    </li>
                                    <li class="buyer-protection-item">
                                        <i class="fa-solid fa-check fa-lg buyer-protection-icon"></i>
                                        Strict dealer guidelines
                                    </li>
                                    <li class="buyer-protection-item">
                                        <i class="fa-solid fa-check fa-lg buyer-protection-icon"></i>
                                        Insured Shipments
                                    </li>
                                    <li class="buyer-protection-item">
                                        <i class="fa-solid fa-check fa-lg buyer-protection-icon"></i>
                                        Chrono24's quality & security team
                                    </li>
                                </ul>
                                <a href="" class="buyer-protection-footer">Learn more about security on Chrono24</a>
                            </div>
                            <div class="buyer-protection-img">
                                <img src="../../public/img/buyer-protection3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Our Most Popular Models -->
                    <div class="content-section">
                        <h2 class="section-heading">Our Most Popular Models</h2>
                        <div class="popular-models">
                            <div class="popular-model">
                                <img src="../../public/img/popular-model1.png" alt="" class="popular-model-img">
                                <div class="popular-model-info">
                                    <span class="popular-model-name">Rolex</span>
                                    <strong class="popular-model-type">Datejust</strong>
                                </div>
                            </div>
                            <div class="popular-model">
                                <img src="../../public/img/popular-model1.png" alt="" class="popular-model-img">
                                <div class="popular-model-info">
                                    <span class="popular-model-name">Rolex</span>
                                    <strong class="popular-model-type">Datejust</strong>
                                </div>
                            </div>
                            <div class="popular-model">
                                <img src="../../public/img/popular-model1.png" alt="" class="popular-model-img">
                                <div class="popular-model-info">
                                    <span class="popular-model-name">Rolex</span>
                                    <strong class="popular-model-type">Datejust</strong>
                                </div>
                            </div>
                            <div class="popular-model">
                                <img src="../../public/img/popular-model1.png" alt="" class="popular-model-img">
                                <div class="popular-model-info">
                                    <span class="popular-model-name">Rolex</span>
                                    <strong class="popular-model-type">Datejust</strong>
                                </div>
                            </div>
                            <div class="popular-model">
                                <img src="../../public/img/popular-model1.png" alt="" class="popular-model-img">
                                <div class="popular-model-info">
                                    <span class="popular-model-name">Rolex</span>
                                    <strong class="popular-model-type">Datejust</strong>
                                </div>
                            </div>
                            <div class="popular-model">
                                <img src="../../public/img/popular-model1.png" alt="" class="popular-model-img">
                                <div class="popular-model-info">
                                    <span class="popular-model-name">Rolex</span>
                                    <strong class="popular-model-type">Datejust</strong>
                                </div>
                            </div>
                            <div class="popular-model">
                                <img src="../../public/img/popular-model1.png" alt="" class="popular-model-img">
                                <div class="popular-model-info">
                                    <span class="popular-model-name">Rolex</span>
                                    <strong class="popular-model-type">Datejust</strong>
                                </div>
                            </div>
                            <div class="popular-model">
                                <img src="../../public/img/popular-model1.png" alt="" class="popular-model-img">
                                <div class="popular-model-info">
                                    <span class="popular-model-name">Rolex</span>
                                    <strong class="popular-model-type">Datejust</strong>
                                </div>
                            </div>
                            
                        </div>
                        <ul class="popular-models-list">
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Omega
                                    <strong class="popular-models-item-type">Seamaster</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Breitling
                                    <strong class="popular-models-item-type">Navitimer</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Rolex
                                    <strong class="popular-models-item-type">Oyster Perpetual</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Patek Philippe
                                    <strong class="popular-models-item-type">Grand Complications</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Omega
                                    <strong class="popular-models-item-type">Seamaster</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Breitling
                                    <strong class="popular-models-item-type">Navitimer</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Rolex
                                    <strong class="popular-models-item-type">Oyster Perpetual</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Patek Philippe
                                    <strong class="popular-models-item-type">Grand Complications</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Omega
                                    <strong class="popular-models-item-type">Seamaster</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Breitling
                                    <strong class="popular-models-item-type">Navitimer</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Rolex
                                    <strong class="popular-models-item-type">Oyster Perpetual</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Patek Philippe
                                    <strong class="popular-models-item-type">Grand Complications</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Omega
                                    <strong class="popular-models-item-type">Seamaster</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Breitling
                                    <strong class="popular-models-item-type">Navitimer</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Rolex
                                    <strong class="popular-models-item-type">Oyster Perpetual</strong>
                                </a>
                            </li>
                            <li class="popular-models-item">
                                <a href="" class="popular-models-item-name">Patek Philippe
                                    <strong class="popular-models-item-type">Grand Complications</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- how to buy -->
                    <div class="content-section">
                        <h2 class="section-heading">Buying guide to watch shops</h2>
                        <div class="section-body">
                            <div class="how-to-buy section-body-block">
                                <div class="how-to-buy-content section-body-block-content">
                                    <img src="../../public/img/how-to-buy1.svg" alt="" class="how-to-buy-img">
                                    <p class="how-to-buy-text">1.  Tìm chiếc đồng hồ mơ ước của bạn</p>
                                </div>
                            </div>

                            <div class="how-to-buy section-body-block">
                                <div class="how-to-buy-content section-body-block-content">
                                    <img src="../../public/img/how-to-buy2.svg" alt="" class="how-to-buy-img">
                                    <p class="how-to-buy-text">2.  Thanh toán qua tài khoản kho tiền an toàn</p>
                                </div>
                            </div>
                            <div class="how-to-buy section-body-block">
                                <div class="how-to-buy-content section-body-block-content">
                                    <img src="../../public/img/how-to-buy3.svg" alt="" class="how-to-buy-img">
                                    <p class="how-to-buy-text">3.  Nhận chiếc đồng hồ mới của bạn</p>
                                </div>
                            </div>
                            <div class="how-to-buy section-body-block">
                                <div class="how-to-buy-content section-body-block-content">
                                    <img src="../../public/img/how-to-buy4.svg" alt="" class="how-to-buy-img">
                                    <p class="how-to-buy-text">4.  Chỉ khi đó người bán mới nhận được thanh toán</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- guide -->
                    <div class="content-section">
                        <div class="section-body">
                            <div class="guide section-body-block">
                                <div class="guide-content">
                                    <h3 class="guide-text">Đồng hồ sang trọng</h3>
                                    <p class="guide-sub-text">Đồng hồ sang trọng là một nguồn hấp dẫn đối với mọi người trên khắp thế giới. Nhưng điều gì đủ để xem là một chiếc đồng hồ sang trọng? Một số người có thể nói rằng đó là bất kỳ chiếc đồng hồ nào được làm từ những vật liệu đắt đỏ như vàng hay bạch kim. Người khác có thể tranh luận rằng nó phải là một chiếc đồng hồ cơ với cơ chế thủ công. Sau đó, còn những người xác định sang trọng dựa trên những thương hiệu huyền thoại như Rolex, Patek Philippe và Breitling.</p>
                                    <p class="guide-sub-text">Bất kể bạn đang tìm kiếm điều gì, bạn sẽ tìm thấy các loại đồng hồ sang trọng từ tất cả các thương hiệu nổi tiếng trong mọi mức giá trên Chrono24. Hãy tìm và mua sắm ngay chiếc đồng hồ mơ ước của bạn ngay bây giờ.</p>
                                </div>
                            </div>

                            <div class="guide section-body-block">
                                <div class="guide-content">
                                    <h3 class="guide-text">Đồng hồ đã qua sử dụng</h3>
                                    <p class="guide-sub-text">Không phải chiếc đồng hồ nào cũng phải mới tinh từ nhà máy. Trên thực tế, rất nhiều người yêu thích những chiếc đồng hồ mang thiết kế từ thập kỷ 60 hoặc 70. Những chiếc đồng hồ cổ này bao gồm những món đồ thu hút người sưu tập và những kho báu ẩn chứa chờ được khám phá bởi những người hâm mộ đồng hồ. Tại đây, bạn sẽ tìm thấy cả những hiếm có đắt đỏ cũng như những mảnh đồ huyền thoại mà những phiên bản trước đó có thể mua với mức giá phải chăng.</p>
                                    <p class="guide-sub-text">Tìm kiếm chiếc đồng hồ cổ phù hợp là một phần của trải nghiệm mua sắm tổng thể và thường biến những người mới bắt đầu trở thành những người đam mê đồng hồ.</p>
                                </div>
                            </div>
                            <div class="guide section-body-block">
                                <div class="guide-content">
                                    <h3 class="guide-text">Bán đồng hồ</h3>
                                    <p class="guide-sub-text">Mỗi tháng, hơn 9 triệu người yêu thích đồng hồ tìm kiếm chiếc đồng hồ tiếp theo của họ trên Chrono24 - có thể chiếc đồng hồ của bạn là chiếc mà họ đang tìm kiếm? Tạo một danh sách miễn phí trong vài bước đơn giản và tìm một người mua cho chiếc đồng hồ của bạn.</p>
                                    <p class="guide-sub-text">Khi bạn đã thực hiện bán hàng, phần còn lại là dễ dàng: Người mua chuyển số tiền mua hàng vào một tài khoản giám sát an toàn, sau đó bạn gửi chiếc đồng hồ. Sau khi nó đã đến nơi an toàn, bạn sẽ nhận được thanh toán vào tài khoản ngân hàng của bạn. Chúng tôi giữ lại một khoản phí hoa hồng nhỏ vào thời điểm thanh toán.</p>
                                    <p class="guide-sub-text">Bạn muốn giải phóng không gian cổ tay? Bán ngay chiếc đồng hồ của bạn trên Chrono24.</p>
                                </div>
                            </div>
                            <div class="guide section-body-block">
                                <div class="guide-content">
                                    <h3 class="guide-text">Mua Đồng Hồ</h3>
                                    <p class="guide-sub-text">Bạn đã tìm thấy chiếc đồng hồ mơ ước trên Chrono24 chưa? Đừng ngần ngại biến giấc mơ này thành hiện thực. Cách an toàn nhất để làm điều này là sử dụng Bảo Vệ Người Mua miễn phí của Chrono24. Sự bảo hiểm toàn diện này bao gồm việc thanh toán thông qua Dịch Vụ Kho Tiền. Ở đây, bạn chuyển khoản giá mua hàng vào tài khoản kho tiền của chúng tôi, và sau đó người bán gửi cho bạn chiếc đồng hồ. Khi bạn đã nhận được chiếc đồng hồ của mình, chúng tôi giữ tiền của bạn an toàn trong tài khoản kho tiền của chúng tôi trong vòng 14 ngày, để bạn có thời gian kiểm tra chiếc đồng hồ và đảm bảo rằng nó giống như mô tả.</p>
                                </div>
                            </div>
                        </div>
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
    // phần popular brands
    document.querySelector('.popular-brands-list:nth-child(11)').classList.add('form--closed');
    document.querySelector('.popular-brands-list:last-child').classList.add('form--closed');
    var dot_not_selected = document.querySelector('.dot--not-selected');
    var dot_selected = document.querySelector('.dot--selected');
    dot_not_selected.onclick = function() {
        dot_selected.classList.add('dot--not-selected');
        dot_selected.classList.remove('dot--selected');
        dot_not_selected.classList.add('dot--selected');
        dot_not_selected.classList.remove('dot--not-selected');
        document.querySelector('.popular-brands-list:first-child').classList.add('form--closed');
        document.querySelector('.popular-brands-list:last-child').classList.remove('form--closed');
        document.querySelector('.popular-brands-list:nth-child(2)').classList.add('form--closed');
        document.querySelector('.popular-brands-list:nth-child(11)').classList.remove('form--closed');
        document.querySelector('.popular-brands-list:nth-child(6)').classList.add('ml-8');
        document.querySelector('.popular-brands-list:nth-child(7)').classList.add('mr-0');
    }
    dot_selected.onclick = function() {
        dot_not_selected.classList.add('dot--not-selected');
        dot_not_selected.classList.remove('dot--selected');
        dot_selected.classList.add('dot--selected');
        dot_selected.classList.remove('dot--not-selected');
        document.querySelector('.popular-brands-list:first-child').classList.remove('form--closed');
        document.querySelector('.popular-brands-list:last-child').classList.add('form--closed');
        document.querySelector('.popular-brands-list:nth-child(2)').classList.remove('form--closed');
        document.querySelector('.popular-brands-list:nth-child(11)').classList.add('form--closed');
        document.querySelector('.popular-brands-list:nth-child(6)').classList.remove('ml-8');
        document.querySelector('.popular-brands-list:nth-child(7)').classList.remove('mr-0');
    }
</script>