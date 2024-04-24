
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM category WHERE id = $id";
    $stmt = $conn -> prepare($sql);
    $query = $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($_POST['submit'])) {
        if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['slug'])) {
            $name = $_POST['name'];
            $type = $_POST['type'];
            $slug = $_POST['slug'];
            $sql_categoryEdit = "UPDATE category SET name = '$name', type = '$type', slug = '$slug' WHERE id = $id";
            $stmt_categoryEdit = $conn->prepare($sql_categoryEdit);
            $query_categoryEdit = $stmt_categoryEdit->execute();
            if ($query_categoryEdit) {
                header("location:/watch-shop/src/resources/views/admin/category/stored.php");
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
                <h3>Cập nhật danh mục</h3>
                <form class="mt-4" method="POST">
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input type="text" class="form-control" value="<?php echo $result['name'] ?>" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="type">Phân loại</label>
                        <input type="text" class="form-control" value="<?php echo $result['type'] ?>" id="type" name="type">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" value="<?php echo $result['slug'] ?>" id="slug" name="slug">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Lưu lại</button>
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

