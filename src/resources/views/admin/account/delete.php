
<?php
    include '../../../../config/connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM customer WHERE account_id = $id";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();
    if ($query) {
        $sql1 = "DELETE FROM order_details WHERE account_id = $id";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        if ($query1) {
            $sql2 = "DELETE FROM account WHERE id = $id";
            $stmt2 = $conn->prepare($sql2);
            $query2 = $stmt2->execute();
            if ($query2) {
                header("location:/watch-shop/src/resources/views/admin/account/stored.php");
            }
            else echo "Xoá tài khoản thất bại!";
        }
    }
?>
