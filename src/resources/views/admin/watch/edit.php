
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM watch WHERE id = $id";
    $stmt = $conn -> prepare($sql);
    $query = $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($_POST['submit'])) {
        if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['avatar']) && isset($_POST['image']) &&
        isset($_POST['old_price']) && isset($_POST['discount']) && isset($_POST['stock_quantity']) && isset($_POST['origin'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $avatar = $_POST['avatar'];
            $image = $_POST['image'];
            $old_price = $_POST['old_price'];
            $discount = $_POST['discount'];
            $stock_quantity = $_POST['stock_quantity'];
            $origin = $_POST['origin'];
            $current_price = round(($old_price - $old_price * $discount / 100) / 1000) * 1000;
            $sql_watchEdit = "UPDATE watch SET name = '$name', description = '$description', avatar = '$avatar', image = '$image'
            , old_price = '$old_price', discount = '$discount', current_price = '$current_price', stock_quantity = '$stock_quantity'
            , origin = '$origin' WHERE id = $id";
            $stmt_watchEdit = $conn->prepare($sql_watchEdit);
            $query_watchEdit = $stmt_watchEdit->execute();
            if ($query_watchEdit) {
                header("location:/watch-shop/src/resources/views/admin/watch/stored.php");
            }
            else echo "Sửa thất bại!";
        }
    }
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
                <h3>Cập nhật đồng hồ</h3>
                <form class="mt-4" method="POST">
                    <div class="form-group">
                        <label for="name">Tên đồng hồ</label>
                        <input type="text" class="form-control" value="<?php echo $result['name'] ?>" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả đồng hồ</label>
                        <textarea class="form-control" id="description" name="description"><?php echo $result['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Ảnh đồng hồ [Square360]</label>
                        <input type="text" class="form-control" value="<?php echo $result['avatar'] ?>" id="avatar" name="avatar">
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh đồng hồ [ExtraLarge]</label>
                        <input type="text" class="form-control" value="<?php echo $result['image'] ?>" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="old_price">Giá gốc đồng hồ</label>
                        <input type="text" class="form-control" value="<?php echo $result['old_price'] ?>" id="old_price" name="old_price">
                    </div>
                    <div class="form-group">
                        <label for="discount">Phần trăm giảm</label>
                        <input type="number" class="form-control" value="<?php echo $result['discount'] ?>" id="discount" name="discount" placeholder="Nhập phần trăm giảm (0-100)" pattern="^(100|[1-9]?[0-9])$">
                    </div>
                    <div class="form-group">
                        <label for="stock_quantity">Số lượng trong kho</label>
                        <input type="text" class="form-control" value="<?php echo $result['stock_quantity'] ?>" id="stock_quantity" name="stock_quantity">
                    </div>
                    <div class="form-group">
                        <label for="origin">Nguồn gốc</label>
                        <input type="text" class="form-control" value="<?php echo $result['origin'] ?>" id="origin" name="origin">
                    </div>
                    <input type="hidden" name="current_price" id="current_price" value="">
                    <button type="submit" class="btn btn-primary" value="submit" name="submit">Lưu lại</button>
                </form>

                <label for="categories_slug" class="mt-4">Phân loại [
                    <?php
                        echo $result['category_slug'];
                    ?>
                ]</label>

                <form method="POST" action="/watch-shop/src/resources/views/admin/watch/add_category.php?id=<?php echo $id;?>">
                    <div class="input-group">
                        <select class="custom-select" id="categories_slug" name="categories_slug">
                            <?php
                                $sql = "SELECT * FROM category";
                                $stmt = $conn -> prepare($sql);
                                $query = $stmt -> execute();
                                if ($query) {
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "
                                            <option value='" . $row['slug'] . "'>" . $row['name'] . "</option>
                                        ";
                                    }
                                }
                            ?>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Thêm</button>
                        </div>
                    </div>
                </form>

                <form method="POST" action="/watch-shop/src/resources/views/admin/watch/remove_category.php?id=<?php echo $id;?>">
                    <div class="input-group mt-2">
                        <select class="custom-select" id="categories_slug" name="categories_slug">
                            <?php
                                $arr = explode(', ', $result['category_slug']);
                                foreach ($arr as $item) {
                                    echo "<option value='$item'>$item</option>";
                                }
                            ?>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Xóa</button>
                        </div>
                    </div>
                </form>
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

