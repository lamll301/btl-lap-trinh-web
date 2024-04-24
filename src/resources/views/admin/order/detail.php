<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM orders WHERE id = $id";
    $stmt = $conn -> prepare($sql);
    $query = $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql_order_details = "SELECT * FROM order_details WHERE order_id = $id";
    $stmt_order_details = $conn -> prepare($sql_order_details);
    $query_order_details = $stmt_order_details -> execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../../../public/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="app">
        <?php include '../header.php'; ?>

        <div class="container">
            <div class="mt-4">
                <h3>Thông tin khách hàng</h3>
                <div class="form-group mt-4">
                    <label for="name">Mã đơn hàng</label>
                    <input type="text" class="form-control" value="<?php echo $result['id'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="slug">Tên khách hàng</label>
                    <input type="text" class="form-control" value="<?php echo $result['customer_name'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="slug">Số điện thoại</label>
                    <input type="text" class="form-control" value="<?php echo $result['customer_number'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="slug">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control" value="<?php echo $result['customer_address'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="slug">Tỉnh/Thành phố</label>
                    <input type="text" class="form-control" value="<?php echo $result['customer_city'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="slug">Quận/Huyện</label>
                    <input type="text" class="form-control" value="<?php echo $result['customer_district'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="slug">Phường/Xã</label>
                    <input type="text" class="form-control" value="<?php echo $result['customer_ward'] ?>" readonly>
                </div>
                <h3 class="mt-4 mb-4">Chi tiết đơn hàng</h3>
                <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Số lượng mua</th>
                        <th scope="col">Giá tiền phải trả</th>
                        <th scope="col" colspan="4"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($query_order_details) {
                        while ($row = $stmt_order_details->fetch(PDO::FETCH_ASSOC)) {
                            $watch_id = $row['watch_id'];
                            $sql_find_watch = "SELECT * FROM watch WHERE id = $watch_id";
                            $stmt_find_watch = $conn -> prepare($sql_find_watch);
                            $query_find_watch = $stmt_find_watch -> execute();
                            $result_find_watch = $stmt_find_watch->fetch(PDO::FETCH_ASSOC);
                            echo "
                            <tr>
                                <th scope='row'>".$row['id']."</th>
                                <td>".$result_find_watch['name']."</td>
                                <td>
                                    <div class='admin-prod-img'>
                                        <img class='admin-prod-img-content' src='".$result_find_watch['avatar']."' alt=''>
                                    </div>
                                </td>
                                <td>đ".preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $result_find_watch['current_price'])."</td>
                                <td>".$row['quantity']."</td>
                                <td>đ".preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $row['product_price'])."</td>
                            ";
                            if ($row['status'] === 'not-approved') {
                                echo "
                                <td>
                                    <a href='/watch-shop/src/resources/views/admin/order/update_status.php?id=". $row['id'] ."&status=approved&order_id=". $row['order_id'] ."' class='btn btn-primary' type='submit'>Duyệt</a>
                                </td>
                                <td>
                                    <a href='/watch-shop/src/resources/views/admin/order/update_status.php?id=". $row['id'] ."&status=canceled&order_id=". $row['order_id'] ."' class='btn btn-primary' type='submit'>Hủy đơn</a>
                                </td>
                                ";
                            }
                            else if ($row['status'] === 'approved') {
                                echo "
                                <td>
                                    <a href='/watch-shop/src/resources/views/admin/order/update_status.php?id=". $row['id'] ."&status=done&order_id=". $row['order_id'] ."&watch_id=". $row['watch_id'] ."&quantity=". $row['quantity'] ."' class='btn btn-primary' type='submit'>Xong</a>
                                </td>
                                <td>
                                    <a href='/watch-shop/src/resources/views/admin/order/update_status.php?id=". $row['id'] ."&status=canceled&order_id=". $row['order_id'] ."' class='btn btn-primary' type='submit'>Hủy đơn</a>
                                </td>
                                ";
                            }
                            else if ($row['status'] === 'canceled' || $row['status'] === 'done') {
                                echo "
                                <td>".$row['status']."</td>
                                ";
                            }
                            echo "</tr>"; 
                        }
                    }
                ?>

                </tbody>
                </table>
                <h3 class="mt-4">Thông tin đơn hàng</h3>
                <div class="form-group mt-4">
                    <label for="slug">Phí vận chuyển</label>
                    <input type="text" class="form-control" value="đ<?php echo preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $result['delivery_price']);?>" readonly>
                </div>
                <div class="form-group">
                    <label for="slug">Tổng tiền</label>
                    <input type="text" class="form-control" value="đ<?php echo preg_replace('/\B(?=(\d{3})+(?!\d))/i', '.', $result['total_price']);?>" readonly>
                </div>
            </div>
        </div>

        <?php include '../footer.php'; ?>
    </div>
    <script src="../../../../public/js/jquery-3.7.0.min.js"></script>
    <script src="../../../../public/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

