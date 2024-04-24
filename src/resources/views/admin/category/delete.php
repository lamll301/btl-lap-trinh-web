
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM category WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();
    if($query) {
        header("location:/watch-shop/src/resources/views/admin/category/stored.php");
    }
    else echo "Xoá danh mục thất bại!";
?>
