
<?php
    include '../../config/connect.php';
    include '../../app/controllers/loginController.php';
    if (isset($_SESSION['id'])) $account_id = $_SESSION['id'];
    else $account_id = null;
    // settings orders
    $sql_order_details = "SELECT * FROM order_details WHERE account_id = '$account_id'";
    $stmt_order_details = $conn -> prepare($sql_order_details);
    $query_order_details = $stmt_order_details -> execute();
    // update customer
    $sql_customer_settings = "SELECT * FROM customer WHERE account_id = $account_id";
    $stmt_customer_settings = $conn -> prepare($sql_customer_settings);
    $query_customer_settings = $stmt_customer_settings -> execute();
    $result_customer_settings = $stmt_customer_settings->fetch(PDO::FETCH_ASSOC);
    if (!empty($_POST['save'])) {
        if (isset($_POST['phone']) && isset($_POST['fullname']) && isset($_POST['address']) && isset($_POST['gender'])
        && isset($_POST['date_of_birth'])) {
            $phone = $_POST['phone'];
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $date_of_birth = $_POST['date_of_birth'];
            $sql_customerEdit = "UPDATE customer SET phone = '$phone', fullname = '$fullname', address = '$address', gender = '$gender'
            , date_of_birth = '$date_of_birth' WHERE account_id = $account_id";
            $stmt_customerEdit = $conn->prepare($sql_customerEdit);
            $query_customerEdit = $stmt_customerEdit->execute();
            if ($query_customerEdit) {
                $sql_accountEditFullname = "UPDATE account SET fullname = '$fullname' WHERE id = $account_id";
                $stmt_accountEditFullname = $conn->prepare($sql_accountEditFullname);
                $query_accountEditFullname = $stmt_accountEditFullname->execute();
                if ($query_accountEditFullname) header("location:/watch-shop/src/resources/views/settings.php");
            }
            else echo "Sửa thất bại!";
        }
    }
    // change password
    if (!empty($_POST['changePassword'])) {
        if(isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])){
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
            $sql_getPassword = "SELECT password FROM account WHERE id = $account_id";
            $stmt_getPassword = $conn -> prepare($sql_getPassword);
            $query_getPassword = $stmt_getPassword -> execute();
            $result_getPassword = $stmt_getPassword->fetch(PDO::FETCH_ASSOC);
            if ($old_password != $result_getPassword['password']) {
                echo "<script>alert('Mật khẩu cũ không đúng!')</script>";
            }
            else {
                if ($new_password != $confirm_password) {
                    echo "<script>alert('Mật khẩu không trùng khớp, mời bạn nhập lại!')</script>";
                }
                else {
                    $sql = "UPDATE account SET password = '$new_password' WHERE id = $account_id";
                    $stmt = $conn->prepare($sql);
                    $query = $stmt->execute();
                    header("location:/watch-shop/src/resources/views/settings.php");
                }
            }
        }
    }
?>