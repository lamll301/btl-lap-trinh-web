
<?php
    include '../../../../config/connect.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $updatedAt = date('Y-m-d H:i:s');
    $id = $_GET['id'];
    $order_id = $_GET['order_id'];
    $status = $_GET['status'];
    if ($status === 'done') {
        $watch_id = $_GET['watch_id'];
        // tính update_quantity
        $sql_stock_quantity = "SELECT stock_quantity FROM watch WHERE id = $watch_id";
        $stmt_stock_quantity = $conn -> prepare($sql_stock_quantity);
        $query_stock_quantity = $stmt_stock_quantity -> execute();
        $result_stock_quantity = $stmt_stock_quantity->fetch(PDO::FETCH_ASSOC);
        $stock_quantity = $result_stock_quantity['stock_quantity'];
        $buy_quantity = $_GET['quantity'];
        $update_quantity = $stock_quantity - $buy_quantity;
        // update lại stock_quantity
        $sql_update_quantity = "UPDATE watch SET stock_quantity = $update_quantity WHERE id = $watch_id";
        $stmt_update_quantity = $conn -> prepare($sql_update_quantity);
        $query_update_quantity = $stmt_update_quantity -> execute();
        if ($query_update_quantity) {
            // update lại status
            $sql1 = "UPDATE order_details SET status = '$status' WHERE id = $id";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute();
            // update updatedAt
            $sql2 = "UPDATE orders SET updatedAt = '$updatedAt' WHERE id = $order_id";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        else echo "Update failed!";
    }
    else {
        $sql = "UPDATE order_details SET status = '$status' WHERE id = $id";
        $stmt = $conn -> prepare($sql);
        $query = $stmt -> execute();
        if ($query) {
            $sql_updatedAt = "UPDATE orders SET updatedAt = '$updatedAt' WHERE id = $order_id";
            $stmt_updatedAt = $conn -> prepare($sql_updatedAt);
            $stmt_updatedAt->execute();
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        else echo "Update failed!";
    }
?>