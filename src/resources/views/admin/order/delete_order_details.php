
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM order_details WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();
    if($query) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
    else echo "Xoá sản phẩm thất bại!";
?>
