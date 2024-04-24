
<?php
    include '../../config/connect.php';
    include '../../app/controllers/loginController.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // render trang
    $id = $_GET['prod_id'];
    $sql = "SELECT * FROM watch WHERE id = '$id'";
    $stmt = $conn -> prepare($sql);
    $query = $stmt -> execute();
    if ($query) {
        $watch = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // lưu đơn hàng
    if (isset($_SESSION['id'])) $account_id = $_SESSION['id'];
    else $account_id = null;
    if (!empty($_POST['submit'])) {
        if (isset($_POST['customer_name']) && isset($_POST['customer_number']) && isset($_POST['customer_address']) && 
            isset($_POST['customer_city']) && isset($_POST['customer_district']) && isset($_POST['customer_ward'])) {
            $customer_name = $_POST['customer_name'];
            $customer_number = $_POST['customer_number'];
            $customer_address = $_POST['customer_address'];
            $customer_city = $_POST['customer_city'];
            $customer_district = $_POST['customer_district'];
            $customer_ward = $_POST['customer_ward'];
            $delivery_price = 50000;
            $quantity = $_GET['quantity'];
            $product_price = $watch['current_price'] * $quantity;
            $total_price = $product_price + $delivery_price;
            $createdAt = date('Y-m-d H:i:s');
            $status = "not-approved";

            $sql_saveOrder = "INSERT INTO orders (customer_name, customer_number, customer_address, customer_city, customer_district, customer_ward, delivery_price, total_price, createdAt, updatedAt) 
            VALUES ('$customer_name', '$customer_number', '$customer_address', '$customer_city', '$customer_district', '$customer_ward', '$delivery_price', '$total_price', '$createdAt', '$createdAt')"; 
            $stmt_saveOrder = $conn->prepare($sql_saveOrder);
            $query_saveOrder = $stmt_saveOrder->execute();
            if ($query_saveOrder) {
                $order_id = $conn->lastInsertId();
                $sql_saveOrderDetails = "INSERT INTO order_details (order_id, watch_id, quantity, product_price, status, account_id) 
                VALUES ('$order_id', '$id', '$quantity', '$product_price', '$status', '$account_id')"; 
                $stmt_saveOrderDetails = $conn->prepare($sql_saveOrderDetails);
                $query_saveOrderDetails = $stmt_saveOrderDetails->execute();
                if($sql_saveOrderDetails) {
                    header("location:/watch-shop/src/resources/views/home.php");
                }
                else echo "Thêm đơn hàng thất bại!";
            }
        }
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
            <div class="tab-pane grid order">
                <form method="POST">
                    <div class="order-upper-part">
                        <div class="order-customer">
                            <h1 class="order-customer-heading">Your Order</h1>
                            <div class="order-customer-info">
                                <h3 class="order-customer-text">Thông tin khách hàng</h3>
                                <div class="order-customer-content">
                                    <div class="order-customer-row">
                                        <label for="" class="order-customer-row-label">Họ tên *</label>
                                        <input type="text" class="order-customer-row-input" id="customer_name" name="customer_name">
                                    </div>
                                    <div class="order-customer-row">
                                        <label for="" class="order-customer-row-label">Số điện thoại *</label>
                                        <input type="text" class="order-customer-row-input" id="customer_number" name="customer_number">
                                    </div>
                                    <div class="order-customer-row">
                                        <label for="" class="order-customer-row-label">Địa chỉ nhận hàng *</label>
                                        <input type="text" class="order-customer-row-input" id="customer_address" name="customer_address">
                                    </div>
                                    <div class="order-customer-row">
                                        <label for="province" class="order-customer-row-label">Tỉnh/Thành phố *</label>
                                        <select id="province" name="customer_city" class="order-customer-row-input" onchange="loadDistricts()">
                                            <option value="">Chọn tỉnh/thành phố</option>
                                        </select>
                                    </div>
                                    <div class="order-customer-row">
                                        <label for="district" class="order-customer-row-label">Quận/Huyện *</label>
                                        <select id="district" name="customer_district" class="order-customer-row-input" onchange="loadWards()">
                                            <option value="">Chọn quận/huyện</option>
                                        </select>
                                    </div>
                                    <div class="order-customer-row">
                                        <label for="ward" class="order-customer-row-label">Phường/Xã *</label>
                                        <select id="ward" name="customer_ward" class="order-customer-row-input">
                                            <option value="">Chọn phường/xã</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-payment">
                            <h3 class="order-payment-heading order-customer-text">Thông tin đơn hàng</h3>
                            <div class="order-payment-row">Tạm tính (1 Sản phẩm)
                                <span class="order-payment-price">
                                    <?php 
                                    $product_price = $watch['current_price'] * $_GET['quantity'];
                                    echo preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $product_price); 
                                    ?> ₫
                                </span>
                            </div>
                            <div class="order-payment-row">Phí vận chuyển
                                <!-- cố định 1 sản phẩm 50k -->
                                <span class="order-payment-price">50.000 ₫</span>
                            </div>
                            <div class="order-payment-row order-payment-total">Tổng cộng:
                                <span class="order-payment-price order-payment-total-price">
                                <?php 
                                    $total_price = $product_price + 50000;
                                    echo preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $total_price); 
                                    ?> ₫
                                </span>
                            </div>
                            <button class="order-payment-btn header__search-btn" name="submit" value="submit">
                                <span class="header__search-btn-text">Đặt hàng</span>
                            </button>
                            <input type="hidden" name="delivery_price" value="50000">
                            <input type="hidden" name="total_price" value="{{sum (multiplication (calculatePrice watches.price watches.discount) (getQuantityValueFromURL urlCurrent)) 50000}}">
                            <input type="hidden" name="account_id" value="{{account._id}}">
                            <input type="hidden" name="status" value="not-approved">
                        </div>
                    </div>

                    <div class="order-lower-part">
                        <h3 class="order-customer-text">Chi tiết đơn hàng</h3>

                        <div class="order-prod">
                            <img src="<?php echo $watch['avatar']; ?>" alt="" class="order-prod-img">
                            <div class="order-prod-info">
                                <a href="/watch-shop/src/resources/views/product.php?id=" class="order-prod-name">Đồng hồ <?php echo $watch['name']; ?></a>
                                <br><br><a href="/product/{{this._id}}" class="order-prod-description"><?php echo $watch['description']; ?></a>
                                <br><br><span class="order-prod-stock-quantity">Còn lại <?php echo $watch['stock_quantity']; ?> cái.</span>
                            </div>
                            <div class="order-prod-price">
                                <p class="order-prod-curr-price"><?php echo preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $watch['current_price']); ?> ₫</p>
                                <p class="order-prod-old-price"><?php echo preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $watch['old_price']); ?> ₫</p>
                                <p class="order-prod-discount">- <?php echo $watch['discount']; ?>%</p>
                                <a href="" class="order-prod-remove">
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </a>
                            </div>
                            <div class="order-prod-quantity" id="quantityDiv">Số lượng: 0</div>

                            <input type="hidden" name="products[0][_id]" value="{{watches._id}}">
                            <input type="hidden" name="products[0][name]" value="{{watches.name}}">
                            <input type="hidden" name="products[0][image]" value="{{watches.image}}">
                            <input type="hidden" name="products[0][description]" value="{{watches.description}}">
                            <input type="hidden" name="products[0][manufacturer]" value="{{watches.manufacturer}}">
                            <input type="hidden" name="products[0][old_price]" value="{{watches.price}}">
                            <input type="hidden" name="products[0][current_price]" value="{{calculatePrice watches.price watches.discount}}">
                            <input type="hidden" name="products[0][quantity]" value="" id="quantityInput">
                            <input type="hidden" name="products[0][pay_price]" value="{{multiplication (calculatePrice watches.price watches.discount) (getQuantityValueFromURL urlCurrent)}}">
                            <input type="hidden" name="products[0][stock_quantity]" value="{{watches.stock_quantity}}">
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

<script>
    const dataMap = {
        provinces: {},
        districts: {},
        wards: {}
    };

    function fetchProvinces() {
        fetch('https://vapi.vnappmob.com/api/province')
            .then(response => response.json())
            .then(data => {
                const provinceSelect = document.getElementById("province");

                // Điền danh sách các tỉnh thành phố vào list box
                data.results.forEach(function (province) {
                    const option = document.createElement("option");
                    option.value = province.province_name;
                    option.textContent = province.province_name;
                    provinceSelect.appendChild(option);

                    // Lưu thông tin vào dataMap để sử dụng sau này
                    dataMap.provinces[province.province_name] = province.province_id;
                });
            })
            .catch(error => {
                console.error('Error fetching provinces:', error);
            });
    }

    function loadDistricts() {
        const provinceSelect = document.getElementById("province");
        const districtSelect = document.getElementById("district");
        const wardSelect = document.getElementById("ward");

        // Xóa tất cả các tùy chọn cũ trong danh sách quận/huyện và phường/xã
        districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
        wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';

        const selectedProvinceName = provinceSelect.value;

        // Nếu đã chọn một tỉnh/thành phố, điền danh sách quận/huyện tương ứng
        if (selectedProvinceName) {
            // Lấy id của tỉnh/thành phố được chọn từ dataMap
            const selectedProvinceId = dataMap.provinces[selectedProvinceName];

            // Gửi yêu cầu API để lấy dữ liệu quận huyện cho tỉnh/thành phố được chọn
            fetch(`https://vapi.vnappmob.com/api/province/district/${selectedProvinceId}`)
                .then(response => response.json())
                .then(data => {
                    // Điền danh sách các quận/huyện vào list box
                    data.results.forEach(function (district) {
                        const option = document.createElement("option");
                        option.value = district.district_name;
                        option.textContent = district.district_name;
                        districtSelect.appendChild(option);

                        // Lưu thông tin vào dataMap để sử dụng sau này
                        dataMap.districts[district.district_name] = district.district_id;
                    });
                })
                .catch(error => {
                    console.error('Error fetching districts:', error);
                });
        }
    }

    function loadWards() {
        const districtSelect = document.getElementById("district");
        const wardSelect = document.getElementById("ward");

        // Xóa tất cả các tùy chọn cũ trong danh sách phường/xã
        wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';

        const selectedDistrictName = districtSelect.value;

        // Nếu đã chọn một quận/huyện, điền danh sách phường/xã tương ứng
        if (selectedDistrictName) {
            // Lấy id của quận/huyện được chọn từ dataMap
            const selectedDistrictId = dataMap.districts[selectedDistrictName];

            // Gửi yêu cầu API để lấy dữ liệu phường xã cho quận/huyện được chọn
            fetch(`https://vapi.vnappmob.com/api/province/ward/${selectedDistrictId}`)
                .then(response => response.json())
                .then(data => {
                    // Điền danh sách các phường/xã vào list box
                    data.results.forEach(function (ward) {
                        const option = document.createElement("option");
                        option.value = ward.ward_name;
                        option.textContent = ward.ward_name;
                        wardSelect.appendChild(option);

                        // Lưu thông tin vào dataMap để sử dụng sau này
                        dataMap.wards[ward.ward_name] = ward.ward_id;
                    });
                })
                .catch(error => {
                    console.error('Error fetching wards:', error);
                });
        }
    }

    // Hàm đổi id thành tên
    function getNameById(id, dataType) {
        switch (dataType) {
            case "province":
                return id; // Vì id đã là tên tỉnh/thành phố
            case "district":
                return dataMap.districts[id] || "Không xác định";
            case "ward":
                return dataMap.wards[id] || "Không xác định";
            default:
                return "Không xác định";
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        fetchProvinces();
    });
    
    // Lấy URL hiện tại
    const currentURL = new URL(window.location.href);

    // Trích xuất giá trị quantity từ URL
    const urlParams = new URLSearchParams(currentURL.search);
    const quantityValue = urlParams.get('quantity');

    // Kiểm tra và đặt giá trị vào các thẻ HTML
    if (quantityValue) {
    // Đặt giá trị vào thẻ div
    const quantityDiv = document.getElementById('quantityDiv');
    quantityDiv.textContent = `Số lượng: ${quantityValue}`;

    // Đặt giá trị vào thẻ input
    const quantityInput = document.getElementById('quantityInput');
    quantityInput.value = quantityValue;
    }
    
</script>
