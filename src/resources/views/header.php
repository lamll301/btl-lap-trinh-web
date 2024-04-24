<?php
    include '../../config/connect.php';
    include '../../app/controllers/loginController.php';
    include '../../app/controllers/logoutController.php';
    $sql = "SELECT * FROM category WHERE type = 'Brands'";
    $stmt = $conn -> prepare($sql);
    $query = $stmt -> execute();
    // notify
    if (isset($_SESSION['id'])) $account_id = $_SESSION['id'];
    else $account_id = null;
    $sql_order_details_header = "SELECT * FROM order_details WHERE account_id = '$account_id'";
    $stmt_order_details_header = $conn -> prepare($sql_order_details_header);
    $query_order_details_header = $stmt_order_details_header -> execute();
    // get fullname
    $sql_getAccountFullname = "SELECT fullname FROM account WHERE id = '$account_id'";
    $stmt_getAccountFullname = $conn -> prepare($sql_getAccountFullname);
    $query_getAccountFullname = $stmt_getAccountFullname -> execute();
    $result_getAccountFullname = $stmt_getAccountFullname->fetch(PDO::FETCH_ASSOC);
?>

<header class="header">
    <div class="header__navbar--underline">
        <div class="grid">
            <nav class="header__navbar">
                <ul class="header__navbar-list header__navbar-list--left">
                    <?php
                        if (isset($_SESSION['id']) && $_SESSION['id'] !== null) {
                            echo "
                            <form method='POST'>
                                <li class='header__navbar-item header__navbar-user'>Hi
                                    <span class='header__navbar-user-name'>".$result_getAccountFullname['fullname']."!</span>
                                    <i class='fa-solid fa-chevron-down'></i>
        
                                    <ul class='header__navbar-user-menu'>
                                        <li class='header__navbar-user-item '>
                                            <a href='' class='header__navbar-user-item-info'>
                                                <img src='https://securepics.ebaystatic.com/aw/pics/social/profile_avatar_60x60.png' alt='' class='header__navbar-user-item-avatar'>
                                                <p class='header__navbar-user-item-name'>".$result_getAccountFullname['fullname']."</p>
                                            </a>
                                        </li>
                                        <li class='header__navbar-user-item header__navbar-user-item-option'>
                                            <a href='/watch-shop/src/resources/views/settings.php' class='header__navbar-user-item-settings'>Cài đặt tài khoản</a>
                                        </li>
                                        <li class='header__navbar-user-item header__navbar-user-item-option'>
                                            <button name='logout' value='logout' class='header__navbar-user-item-logout'>Đăng xuất</button>
                                        </li>
                                    </ul>
                                </li>
                                <input type='hidden' name='_id' value='{{account._id}}'>
                            </form>
                            ";
                        }
                        else {
                            echo "
                            <li class='header__navbar-item'>Hi!
                                <a href='' class='header__navbar-item-link--blue login-link'>Đăng nhập</a>
                                hoặc
                                <a href='' class='header__navbar-item-link--blue register-link'>Đăng ký</a>
                            </li>
                            ";
                        }
                    ?>

                    <li class="header__navbar-item header__navbar-item--has-qr">Tải ứng dụng
                        <!-- Header qr-code -->
                        <div class="header__qr">
                            <img src="../../public/img/qr_code.png" alt="QR code" class="header__qr-img">
                            <div class="header__qr-apps">
                                <a href="" class="header__qr-link">
                                    <img src="../../public/img/google_play.png" alt="Google Play" class="header__qr-download-img">
                                </a>
                                <a href="" class="header__qr-link">
                                    <img src="../../public/img/app_store.png" alt="App Store" class="header__qr-download-img">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="header__navbar-item">Kết nối
                        <a href="" class="header__navbar-icon-link">
                            <i class="header__navbar-icon--blue header__navbar-icon fa-brands fa-facebook fa-xl"></i>
                        </a>
                        <a href="" class="header__navbar-icon-link">
                            <i class="header__navbar-icon--blue header__navbar-icon fa-brands fa-instagram fa-xl"></i>
                        </a>
                    </li>
                </ul>
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">Hỗ trợ</a>
                    </li>
                    <!-- header notify -->
                    <li class="header__navbar-item header__navbar-item--has-notify">
                        <a href="" class="header__navbar-item-link">
                            <i class="fa-regular fa-bell fa-xl"></i>
                        </a>
                        <div class="header__notify">
                            <header class="header__notify-header">
                                <h3>Thông báo mới nhận</h3>
                            </header>
                            <ul class="header__notify-list">
                                <?php
                                if ($query_order_details_header) {
                                    while ($row = $stmt_order_details_header->fetch(PDO::FETCH_ASSOC)) {
                                        $watch_id = $row['watch_id'];
                                        $sql_watch_header = "SELECT * FROM watch WHERE id = $watch_id";
                                        $stmt_watch_header = $conn -> prepare($sql_watch_header);
                                        $query_watch_header = $stmt_watch_header -> execute();
                                        $result_watch_header = $stmt_watch_header->fetch(PDO::FETCH_ASSOC);
                                        echo "
                                        <li class='header__notify-item'>
                                            <a href='/watch-shop/src/resources/views/settings.php' class='header__notify-link'>
                                                <span>
                                                    <img src='".$result_watch_header['avatar']."' alt='' class='header__notify-img'>
                                                </span>
                                                <div class='header__notify-info'>
                                                    <span class='header__notify-name'>".$result_watch_header['name']."</span>";
                                                    if ($row['status'] === 'approved') {
                                                        echo "<span class='header__notify-description blue-color'>Đơn hàng đang trong quá trình vận chuyển</span>";
                                                    }
                                                    else if ($row['status'] === 'done') {
                                                        echo "<span class='header__notify-description green-color'>Đơn hàng đã được giao thành công</span>";
                                                    }
                                                    else if ($row['status'] === 'canceled') {
                                                        echo "<span class='header__notify-description red-color'>Đơn hàng của bạn đã bị hủy bỏ</span>";
                                                    }
                                                    else echo "<span class='header__notify-description yellow-color'>Đơn hàng đang chờ được xét duyệt</span>";
                                                echo " 
                                                </div>
                                            </a>
                                        </li>
                                        ";
                                    }
                                }
                            ?>
                            </ul>
                            <footer class="header__notify-footer">
                                <a href="/watch-shop/src/resources/views/settings.php" class="header__notify-footer-btn">Xem tất cả</a>
                            </footer>
                        </div>
                    </li>
                    <!-- cart layout -->
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link header__cart">
                            <i class="header__navbar-icon--blue fa-solid fa-cart-shopping fa-xl"></i>
                            <span class="header__cart-notice">0</span>
                            <div class="header__cart-list "> 
                            <img src="../../public/img/no_cart.png" alt="" class="header__cart-no-cart-img form--closed">
                                <p class="header__cart-list--no-cart-msg form--closed">
                                    Chưa có sản phẩm
                                </p>

                                <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                                <ul class="header__cart-list-item">
                                    {{#each cart.products}}
                                    <form method="POST" action="/cart/prod/{{this._id}}?_method=PUT">
                                    <li class="header__cart-item">
                                        <img src="{{this.image}}" alt="" class="header__cart-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">{{this.name}}</h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price">đ{{addDotsToNumber (calculatePrice this.price this.discount)}}</span>
                                                    <span class="header__cart-item-multiply">x</span>
                                                    <span class="header__cart-item-quantity">{{this.quantity}}</span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-describe">{{this.description}}</span>
                                                <button class="header__cart-item-remove">Xóa
                                                    <i class="fa-solid fa-trash fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="act" value="remove">
                                    </li>
                                    </form>
                                    {{/each}}

                                </ul>
                                <button class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</button>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="grid">
        <!-- header with search -->
        <form action="/watch-shop/src/resources/views/category.php" method="GET">
        <div class="header-with-search">
            <div class="header__logo">
                <a href="/watch-shop/src/resources/views/home.php">
                    <img src="../../public/img/logo-chrono24.svg" class="header__logo-img" alt="Logo">
                </a>
            </div>
            <div class="header__search">
                <div class="header__search-input-wrap">
                    <input type="text" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm" name="key">
                    <!-- search history -->
                    <div class="header__search-history">
                        <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                        <ul class="header__search-history-list">
                            <li class="header__search-history-list-item">
                                <a href="" class="">Hãng đồng hồ Rolex</a>
                            </li>
                            <li class="header__search-history-list-item">
                                <a href="" class="">Thương hiệu đồng hồ Cartier</a>
                            </li>
                            <li class="header__search-history-list-item">
                                <a href="" class="">Hãng đồng hồ nổi tiếng Audemars Piguet</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <button class="header__search-btn">
                <span class="header__search-btn-text">Search</span>
            </button>
            <div class="header__btn">

            </div>
        </div>
        </form>
    </div>
    <!-- func bar  -->
    <div class="grid">
        <div class="header-function-bar">
            <ul class="header-function-bar-list">
                <li class="tab-item header-function-bar-item">
                    <a href="/watch-shop/src/resources/views/home.php" class="header-function-bar-name">TRANG CHỦ</a>
                </li>
                <!-- func bar menu -->
                <li class="header-function-bar-item header-function-bar-item-menu">
                    <a href="" class="header-function-bar-name">
                        MENU
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <div class="header-function-bar-menu">
                        <div class="header-function-bar-menu-contain">
                            <?php 
                            if ($query) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    if ($row['id'] % 5 == 3) {
                                        echo "<div class='header-function-bar-menu-items'>";
                                        echo "<h3 class='header-function-bar-menu-title'>Theo hãng</h3>";
                                        echo "<ul class='header-function-bar-menu-list'>";
                                    }
                                    echo "<li class='header-function-bar-menu-item'>";
                                    echo "<a href='/watch-shop/src/resources/views/category.php?id=". $row['id'] ."&slug=". $row['slug'] ."' class='header-function-bar-menu-name'>" . $row['name'] . "</a>";
                                    echo "</li>";
                                    if ($row['id'] % 5 == 2) {
                                        echo "</ul>";
                                        echo "</div>";
                                    }
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                </li>
                <li class="tab-item header-function-bar-item">
                    <a href="/watch-shop/src/resources/views/category.php?id=1&slug=dong-ho-nam" class="header-function-bar-name">ĐỒNG HỒ NAM</a>
                </li>
                <li class="tab-item header-function-bar-item">
                    <a href="/watch-shop/src/resources/views/category.php?id=2&slug=dong-ho-nu" class="header-function-bar-name">ĐỒNG HỒ NỮ</a>
                </li>
                <li class="tab-item header-function-bar-item">
                    <a href="/watch-shop/src/resources/views/contact.php" class="header-function-bar-name">LIÊN HỆ</a>
                </li>
            </ul>
        </div>
    </div>
    
</header>

<div class="modal form--closed">
    <div class="modal__overlay"></div>
    <div class="modal__body">
        <!-- Register form -->
        <form action="/watch-shop/src/app/controllers/registerController.php" method="POST" class="form form--closed" id="form-1">
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng ký</h3>
                        <button class="auth-form__close-button">X</button>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input id="fullname" name="fullname" type="text" class="auth-form__input" placeholder="Họ tên">
                            <span class="auth-form__msg"></span>
                        </div>
                        <div class="auth-form__group">
                            <input id="email-1" name="email" type="text" class="auth-form__input" placeholder="Email">
                            <span class="auth-form__msg"></span>
                        </div>
                        <div class="auth-form__group">
                            <input id="password-1" name="password" type="password" class="auth-form__input" placeholder="Mật khẩu">
                            <span class="auth-form__msg"></span>
                        </div>
                    </div>
                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">Bằng việc đăng ký, bạn đồng ý với chúng tôi về
                            <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                            <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                        </p>
                    </div>
                    <div class="auth-form__controls">
                        <button name="register" value="register" class="btn btn--primary auth-form__controls-btn">ĐĂNG KÝ</button>
                    </div>
                    <span class="auth-form__option">
                        <p class="auth-form__option-line">_______________________</p>
                        <p class="auth-form__option-text">HOẶC</p>
                        <p class="auth-form__option-line">_______________________</p>
                    </span>
                    <div class="auth-form__socials">
                        <a href="" class="btn btn--with-icon auth-form__socials-text">
                            <i class="fa-brands fa-facebook fa-xl auth-form__socials-icon-fb"></i>
                            Facebook
                        </a>
                        <a href="" class="btn btn--with-icon auth-form__socials-text">
                            <i class="fa-brands fa-google fa-xl"></i>
                            Google
                        </a>
                    </div>
                    <div class="auth-form__login-text">Bạn đã có tài khoản?
                        <a href="" class="auth-form__login-text-btn login-link">Đăng nhập</a>
                    </div>
                </div>
            </div>
            <input type="hidden" name="roles" value="user">
        </form>
        

        <!-- login form -->
        <form method="POST" action="/watch-shop/src/app/controllers/loginController.php" class="form form--closed" id="form-2">
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng nhập</h3>
                        <button class="auth-form__close-button">X</button>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input id="email-2" name="email" type="text" class="auth-form__input" placeholder="Email">
                            <span class="auth-form__msg"></span>
                        </div>
                        <div class="auth-form__group">
                            <input id="password-2" name="password" type="password" class="auth-form__input" placeholder="Mật khẩu">
                            <span class="auth-form__msg"></span>
                        </div>
                    </div>
                    
                    <div class="auth-form__controls">
                        <button name="login" value="login" class="btn btn--primary auth-form__controls-btn auth-form__controls-btn-login">ĐĂNG NHẬP</button>
                    </div>
                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="" class="auth-form__help-link">Quên mật khẩu</a>
                            <a href="" class="auth-form__help-link">Cần trợ giúp</a>
                        </div>
                    </div>
                    <span class="auth-form__option">
                        <p class="auth-form__option-line">_______________________</p>
                        <p class="auth-form__option-text">HOẶC</p>
                        <p class="auth-form__option-line">_______________________</p>
                    </span>
                    <div class="auth-form__socials">
                        <a href="" class="btn btn--with-icon auth-form__socials-text">
                            <i class="fa-brands fa-facebook fa-xl auth-form__socials-icon-fb"></i>
                            Facebook
                        </a>
                        <a href="" class="btn btn--with-icon auth-form__socials-text">
                            <i class="fa-brands fa-google fa-xl"></i>
                            Google
                        </a>
                    </div>
                    <div class="auth-form__login-text">Bạn chưa có tài khoản?
                        <a href="" class="auth-form__login-text-btn register-link">Đăng ký</a>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>

<script>
    // nếu giỏ hàng không có sản phẩm render ra header__cart-list--no-cart
    const cartNotice = document.querySelector('.header__cart-notice');
    if (cartNotice.textContent === '') cartNotice.textContent = '0';
    if (cartNotice.textContent === '0') {
        const heading = document.querySelector('.header__cart-heading');
        const cartList = document.querySelector('.header__cart-list-item');
        const viewCartButton = document.querySelector('.header__cart-view-cart');
        
        heading.classList.add('form--closed');
        cartList.classList.add('form--closed');
        viewCartButton.classList.add('form--closed');
        
        const noCartImg = document.querySelector('.header__cart-no-cart-img');
        const noCartMsg = document.querySelector('.header__cart-list--no-cart-msg');
        const cartListContainer = document.querySelector('.header__cart-list');
        
        noCartImg.classList.remove('form--closed');
        noCartMsg.classList.remove('form--closed');
        cartListContainer.classList.add('header__cart-list--no-cart');
    }

    // thêm class color--black vào thẻ <h3> trong thẻ div đầu tiên
    const firstMenuDiv = document.querySelector('.header-function-bar-menu-items:first-child');
    const firstMenuTitle = firstMenuDiv.querySelector('.header-function-bar-menu-title');
    firstMenuTitle.classList.add('color--black');

    // login/register
    document.addEventListener('DOMContentLoaded', function () {
        const closeBtn = document.querySelectorAll('.auth-form__close-button');
        const modal = document.querySelector('.modal');
        const loginLink = document.querySelectorAll('.login-link');
        const registerLink = document.querySelectorAll('.register-link');
        const loginForm = document.getElementById('form-2');
        const registerForm = document.getElementById('form-1');
        // click x
        closeBtn.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                modal.classList.add('form--closed');
            });
        });
        // click login
        loginLink.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                if (modal.classList.contains('form--closed')) {
                    modal.classList.remove('form--closed');
                    loginForm.classList.remove('form--closed');
                    registerForm.classList.add('form--closed');
                }
                else {
                    registerForm.classList.add('form--closed');
                    loginForm.classList.remove('form--closed');
                }
            });
        });
        // click register
        registerLink.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                if (modal.classList.contains('form--closed')) {
                    modal.classList.remove('form--closed');
                    registerForm.classList.remove('form--closed');
                    loginForm.classList.add('form--closed');
                }
                else {
                    loginForm.classList.add('form--closed');
                    registerForm.classList.remove('form--closed');
                }
            });
        });
    })

</script>
