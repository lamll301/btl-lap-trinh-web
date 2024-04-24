
<?php
    include '../../app/controllers/settingsController.php';

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
            <div class="tab-pane grid account__settings">
                <div class="order-upper-part">
                    <div class="order-customer account__settings-tabs">
                        <h1 class="order-customer-heading">Quản lý tài khoản</h1>
                        
                        <div class="account__settings-tabs-container">
                            <div class="account__settings-tab account__settings-tab-active">
                                <a href="" class="account__settings-tab--links">Thông tin cá nhân</a>
                            </div>
                            <div class="account__settings-tab ">
                                <a href="" class="account__settings-tab--links">Đổi mật khẩu</a>
                            </div>
                            <div class="account__settings-tab">
                                <a href="" class="account__settings-tab--links">Đơn mua</a>
                            </div>
                        </div>
                        <!-- thông tin cá nhân -->
                        <form class="mt-4" method="POST">
                        <div class="account__settings-tab-pane order-lower-part">
                            <h3 class="order-customer-text account__settings-text">Thông tin cá nhân</h3>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Tên</span>
                                <div class="account__settings-block-content">
                                    <input name="fullname" type="text" class="account__settings-block-content-input" value="<?php echo $result_customer_settings['fullname'];?>"></input>
                                </div>
                            </div>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Giới tính</span>
                                <div class="account__settings-block-content">
                                    <div class="account__settings-block-content-gender">
                                        <input type="radio" name="gender" class="account__settings-block-content-radio" value="Nam" 
                                            <?php
                                            if ($result_customer_settings['gender'] == 'Nam') echo 'checked';
                                            ?>
                                            ></input>
                                        Nam
                                    </div>
                                    <div class="account__settings-block-content-gender">
                                        <input type="radio" name="gender" class="account__settings-block-content-radio" value="Nữ"
                                            <?php
                                            if ($result_customer_settings['gender'] == 'Nữ') echo 'checked';
                                            ?>
                                            ></input>
                                        Nữ
                                    </div>
                                </div>
                            </div>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Email</span>
                                <div class="account__settings-block-content">
                                    <input name="email" type="text" class="account__settings-block-content-input" value="<?php echo $result_customer_settings['email'];?>" readonly></input>
                                </div>
                            </div>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Số điện thoại</span>
                                <div class="account__settings-block-content">
                                    <input name="phone" type="text" class="account__settings-block-content-input" value="<?php echo $result_customer_settings['phone'];?>"></input>
                                </div>
                            </div>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Ngày sinh</span>
                                <div class="account__settings-block-content">
                                    <input name="date_of_birth" type="date" class="account__settings-block-content-input" value="<?php echo $result_customer_settings['date_of_birth'];?>">
                                </div>
                            </div>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Địa chỉ</span>
                                <div class="account__settings-block-content">
                                    <textarea name="address" class="account__settings-block-content-input account__settings-block-content-textarea"><?php echo $result_customer_settings['address'];?></textarea>
                                </div>
                            </div>
                            <button name="save" value="save" class="account__settings-btn">Lưu</button>
                        </div>
                        </form>
                        <!-- đổi mk -->
                        <form class="mt-4" method="POST">
                        <div class="account__settings-tab-pane order-lower-part form--closed">
                            <h3 class="order-customer-text account__settings-text">Đổi mật khẩu</h3>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Email</span>
                                <div class="account__settings-block-content">
                                    <input name="email" type="text" class="account__settings-block-content-input" value="<?php echo $result_customer_settings['fullname'];?>" readonly></input>
                                </div>
                            </div>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Mật khẩu cũ</span>
                                <div class="account__settings-block-content">
                                    <input name="old_password" type="password" class="account__settings-block-content-input"></input>
                                </div>
                            </div>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Mật khẩu mới</span>
                                <div class="account__settings-block-content">
                                    <input name="new_password" type="password" class="account__settings-block-content-input"></input>
                                </div>
                            </div>
                            <div class="account__settings-block">
                                <span class="account__settings-block-text">Xác nhận mật khẩu</span>
                                <div class="account__settings-block-content">
                                    <input name="confirm_password" type="password" class="account__settings-block-content-input"></input>
                                </div>
                            </div>
                            <button name="changePassword" value="changePassword" class="account__settings-btn">Lưu</button>
                        </div>
                        </form>
                        <!-- đơn mua -->
                        <div class="account__settings-tab-pane form--closed">
                            <h3 class="order-customer-text account__settings-text">Đơn mua</h3>
                                <?php
                                    if ($query_order_details) {
                                        while ($row = $stmt_order_details->fetch(PDO::FETCH_ASSOC)) {
                                            $watch_id = $row['watch_id'];
                                            $sql_watch = "SELECT * FROM watch WHERE id = $watch_id";
                                            $stmt_watch = $conn -> prepare($sql_watch);
                                            $query_watch = $stmt_watch -> execute();
                                            $result_watch = $stmt_watch->fetch(PDO::FETCH_ASSOC);

                                            $order_id = $row['order_id'];
                                            $sql_order = "SELECT * FROM orders WHERE id = $order_id";
                                            $stmt_order = $conn -> prepare($sql_order);
                                            $query_order = $stmt_order -> execute();
                                            $result_order = $stmt_order->fetch(PDO::FETCH_ASSOC);
                                            echo "
                                            <div class='account__settings-purchase-order'>
                                                <div class='account__settings-purchase-order-header'>
                                                    <div>
                                                        <span class='account__settings-purchase-order-favourite'>Yêu thích</span>
                                                        <span class='account__settings-purchase-order-manufacturer'>Nguồn gốc: ".$result_watch['origin']."</span>
                                                    </div>
                                                    <div class='account__settings-purchase-order-header-right'>
                                                        <span class='account__settings-purchase-order-status black-color'>Mã đơn hàng: ".$row['order_id']."</span>
                                                        ";
                                                        if ($row['status'] === 'approved') {
                                                            echo "
                                                            <i class='fa-solid fa-truck-fast blue-color'></i>
                                                            <span class='account__settings-purchase-order-status blue-color'>Đơn hàng đang trong quá trình vận chuyển</span>
                                                            ";
                                                        }
                                                        else if ($row['status'] === 'done') {
                                                            echo "
                                                            <i class='fa-solid fa-truck account__settings-purchase-order-icon'></i>
                                                            <span class='account__settings-purchase-order-status'>Đơn hàng đã được giao thành công</span>
                                                            ";
                                                        }
                                                        else if ($row['status'] === 'canceled') {
                                                            echo "
                                                            <i class='fa-solid fa-circle-xmark red-color'></i>
                                                            <span class='account__settings-purchase-order-status red-color'>Đơn hàng đã bị hủy bỏ</span>
                                                            ";
                                                        }
                                                        else {
                                                            echo "
                                                            <i class='fa-solid fa-tablet-button yellow-color account__settings-purchase-order-evaluate-container'></i>
                                                            <span class='account__settings-purchase-order-status yellow-color'>Đơn hàng đang chờ được xét duyệt</span>
                                                            ";
                                                        }
                                                        echo "
                                                        <div class='account__settings-latest-updates-icon'>
                                                            <i class='fa-regular fa-circle-question'></i>
                                                            <div class='account__settings-purchase-order-evaluate-popup'>
                                                                Cập nhật mới nhất
                                                                <br>
                                                                <span>".$result_order['updatedAt']."</span>
                                                            </div>
                                                        </div>
                                                        <span class='account__settings-purchase-order-evaluate'>ĐÁNH GIÁ</span>
                                                    </div>
                                                </div>
                                                <div class='account__settings-purchase-order-content'>
                                                    <img src='".$result_watch['avatar']."' alt='' class='account__settings-purchase-order-img'>
                                                    <div class='account__settings-purchase-order-prod'>
                                                        <div class='account__settings-purchase-order-about-prod'>
                                                            <span class='account__settings-purchase-order-name'>".$result_watch['name']."</span>
                                                            <div class='account__settings-purchase-order-describe'>".$result_watch['description']."</div>
                                                            <div class='account__settings-purchase-order-quantity'>x".$row['quantity']."</div>
                                                        </div>
                                                        <div class='account__settings-purchase-order-price'>
                                                            <span class='account__settings-purchase-order-old-price'>đ".preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $result_watch['old_price'])."</span>
                                                            <span class='account__settings-purchase-order-current-price'>đ".preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $result_watch['current_price'])."</span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class='account__settings-purchase-block-pay-price'>
                                                    <span class='account__settings-purchase-pay-price-text'>Thành tiền:</span>
                                                    <span class='account__settings-purchase-pay-price'>đ".preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $row['product_price'] + 50000)."</span>
                                                </div>
                                                <div class='account__settings-purchase-btns'>
                                                    <a href='/watch-shop/src/resources/views/product.php?id=".$result_watch['id']."' class='account__settings-purchase-btn account__settings-purchase-acquisition'>Mua Lại</a>
                                                    <a href='' class='account__settings-purchase-btn account__settings-purchase-contact'>Liên Hệ Người Bán</a>
                                                </div>
                                            </div>";
                                        }
                                    }
                                ?>
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
    // tab ui
    const settings_tabs = document.querySelectorAll('.account__settings-tab');
    const settings_panes = document.querySelectorAll('.account__settings-tab-pane');
    settings_tabs.forEach((tab, index) => {
        const pane = settings_panes[index];
        tab.onclick = function (event) {
            event.preventDefault();
            document.querySelector('.account__settings-tab-pane:not(.form--closed)').classList.add('form--closed');
            pane.classList.remove('form--closed');
            document.querySelector('.account__settings-tab.account__settings-tab-active').classList.remove('account__settings-tab-active');
            this.classList.add('account__settings-tab-active')
        }
    })
</script>