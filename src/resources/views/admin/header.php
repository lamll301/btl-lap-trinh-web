
<?php
    // include '../../../app/controllers/settingsController.php';
    // $id = $_SESSION['id'];
    // $sql = "SELECT fullname FROM account WHERE id = $id";
    // $stmt = $conn->prepare($sql);
    // $query = $stmt->execute();
    // if ($query) {
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="">ADMIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Quản lý sản phẩm
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/watch/create.php">Thêm sản phẩm</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/watch/stored.php">Tất cả sản phẩm</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Quản lý danh mục
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/category/create.php">Thêm danh mục</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/category/stored.php">Tất cả danh mục</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Quản lý đơn hàng
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/order/stored_order_details.php?status=not-approved">Đơn hàng chưa duyệt</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/order/stored_order_details.php?status=approved">Đơn đang được vận chuyển</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/order/stored_order_details.php?status=done">Đơn hàng đã xong</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/order/stored_order_details.php?status=canceled">Đơn hàng bị hủy</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/order/stored.php">Tất cả đơn hàng</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Quản lý tài khoản
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/watch-shop/src/resources/views/admin/account/stored.php">Tất cả tài khoản</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a class="navbar-brand" href="/watch-shop/src/resources/views/home.php">HOME</a>
            </ul>
        </div>
    </div>
</nav>

