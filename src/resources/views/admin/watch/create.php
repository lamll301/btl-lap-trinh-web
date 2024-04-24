

<?php
    include '../../../../config/connect.php';
    $sql = "SELECT * FROM category";
    $stmt = $conn -> prepare($sql);
    $query = $stmt -> execute();
    // watchSave()
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
            $category_slug = $_POST['category_slug'];
            $current_price = $_POST['current_price'];

            $sql_saveWatch = "INSERT INTO watch (name, description, avatar, image, old_price, discount, current_price, stock_quantity, origin, category_slug) 
            VALUES ('$name', '$description', '$avatar', '$image', '$old_price', '$discount', '$current_price', '$stock_quantity', '$origin', '$category_slug')"; 
            $stmt_saveWatch = $conn->prepare($sql_saveWatch);
            $query_saveWatch = $stmt_saveWatch->execute();
            if ($query_saveWatch) {
                header("location:/watch-shop/src/resources/views/admin/watch/stored.php");
            }
            else echo "Thêm sản phẩm thất bại!";
            
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
                <h3>Thêm đồng hồ</h3>
                <form class="mt-4" method="POST">
                    <div class="form-group">
                        <label for="name">Tên đồng hồ</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả đồng hồ</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Ảnh đồng hồ [Square360]</label>
                        <input type="text" class="form-control" id="avatar" name="avatar">
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh đồng hồ [ExtraLarge]</label>
                        <input type="text" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="old_price">Giá gốc đồng hồ</label>
                        <input type="text" class="form-control" id="old_price" name="old_price">
                    </div>
                    <div class="form-group">
                        <label for="discount">Phần trăm giảm</label>
                        <input type="text" class="form-control" id="discount" name="discount" placeholder="Nhập phần trăm giảm (0-100)" pattern="^(100|[1-9]?[0-9])$">
                    </div>
                    <div class="form-group">
                        <label for="stock_quantity">Số lượng trong kho</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity">
                    </div>
                    <div class="form-group">
                        <label for="origin">Nguồn gốc</label>
                        <input type="text" class="form-control" id="origin" name="origin">
                    </div>
                    <div class="form-group">
                        <label for="category_slug">Phân loại</label>
                        <select class="custom-select" id="category_slug" name="category_slug">
                            <?php
                            if ($query) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                   echo "<option value='" . $row['slug'] . "'>" . $row['name'] . "</option>"; 
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="current_price" id="current_price" value="">
                    
                    <button value="submit" name="submit" type="submit" class="btn btn-primary" onclick="calculateCurrentPrice(this.form.old_price.value, this.form.discount.value)">Thêm đồng hồ</button>
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

