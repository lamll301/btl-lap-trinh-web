
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM order_details WHERE watch_id = $id";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();
    if($query) {
        $sql = "DELETE FROM watch WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        if($query) {
            header("location:/watch-shop/src/resources/views/admin/watch/stored.php");
        }
        else echo "Xoá sản phẩm thất bại!";
    }
    else echo "Xoá sản phẩm thất bại!";

?>
