
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM customer WHERE account_id = $id";
    $stmt = $conn -> prepare($sql);
    $query = $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql1 = "SELECT * FROM account WHERE id = $id";
    $stmt1 = $conn -> prepare($sql1);
    $query1 = $stmt1 -> execute();
    $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
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
                <h3>Thông tin khách hàng</h3>
                <div class="form-group mt-4">
                    <label for="fullname">Tên khách hàng</label>
                    <input type="text" class="form-control" value="<?php echo $result['fullname'] ?>" id="fullname" name="fullname">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" value="<?php echo $result['address'] ?>" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" value="<?php echo $result['phone'] ?>" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <input type="text" class="form-control" value="<?php echo $result['gender'] ?>" id="gender" name="gender">
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Ngày sinh</label>
                    <input type="text" class="form-control" value="<?php echo $result['date_of_birth'] ?>" id="date_of_birth" name="date_of_birth">
                </div>
            </div>
            <div class="mt-4">
                <h3>Thông tin tài khoản</h3>
                <div class="form-group mt-4">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" value="<?php echo $result1['id'] ?>" id="id" name="id">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" value="<?php echo $result1['email'] ?>" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="text" class="form-control" value="<?php echo $result1['password'] ?>" id="password" name="password">
                </div>
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

