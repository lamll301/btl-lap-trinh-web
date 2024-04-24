<?php 
    include '../../config/connect.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $logoutAt = date('Y-m-d H:i:s');
    if (!empty($_POST['logout'])) {
        if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
            $id_logout = $_SESSION['id'];
            $sql_logout = "UPDATE account SET status = 'no-active', logoutAt = '$logoutAt' WHERE id = '$id_logout'";
            $stmt_logout = $conn->prepare($sql_logout);
            $query_logout = $stmt_logout->execute();
            if ($query_logout) {
                session_unset();
                session_destroy();
                header("Location:/watch-shop/src/resources/views/home.php");
            }
        }
        else echo gettype($_SESSION['id']);
    }
?>