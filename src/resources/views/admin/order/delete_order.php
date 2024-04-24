
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $sql1 = "DELETE FROM order_details WHERE order_id = $id";
    $stmt1 = $conn->prepare($sql1);
    $query1 = $stmt1->execute();
    if($query1) {
        $sql2 = "DELETE FROM orders WHERE id = $id";
        $stmt2 = $conn->prepare($sql2);
        $query2 = $stmt2->execute();
        if($query1) {
            header("location:/watch-shop/src/resources/views/admin/order/stored.php");
        }
        else echo "Xoá sản phẩm thất bại!";
    }
    else echo "Xoá sản phẩm thất bại!";
?>
