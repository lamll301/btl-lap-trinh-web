
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $slug = $_POST['categories_slug'];
    $sql_watch = "SELECT * FROM watch WHERE id = '$id'";
    $stmt_watch = $conn->prepare($sql_watch);
    $query_watch = $stmt_watch->execute();
    $result = $stmt_watch->fetch(PDO::FETCH_ASSOC);
    if (strpos($result['category_slug'], $slug) === false) {
        $sql = "UPDATE watch SET category_slug = CONCAT(category_slug, ', $slug') WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        if($query) {
            header("location:/watch-shop/src/resources/views/admin/watch/edit.php?id=$id");
        }
        else echo "Thất bại!";
    }
    else header("location:/watch-shop/src/resources/views/admin/watch/edit.php?id=$id");
?>
