
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $slug = $_POST['categories_slug'];
    $sql_watch = "SELECT * FROM watch WHERE id = '$id'";
    $stmt_watch = $conn->prepare($sql_watch);
    $query_watch = $stmt_watch->execute();
    $result = $stmt_watch->fetch(PDO::FETCH_ASSOC);
    $category_slug = "";
    if (substr($result['category_slug'], -strlen($slug)) !== $slug) {
        $category_slug = str_replace($slug . ', ', "", $result['category_slug']);
    }
    else $category_slug = str_replace(', ' . $slug, "", $result['category_slug']);
    $sql = "UPDATE watch SET category_slug = '$category_slug' WHERE id = '$id'";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();
    if($query) {
        header("location:/watch-shop/src/resources/views/admin/watch/edit.php?id=$id");
    }
    else echo "Thất bại!";
?>
