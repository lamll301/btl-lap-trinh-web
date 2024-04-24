
<?php 
    include '../../config/connect.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $loginAt = date('Y-m-d H:i:s');
    if (!empty($_POST['login'])) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM account WHERE email = '$email' AND password = '$password'";
            $stmt = $conn->prepare($sql);
            $query = $stmt->execute();
            if ($query) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id = $row['id'];
                $_SESSION['id'] = $row['id'];
                
                $sql = "UPDATE account SET status = 'active', loginAt = '$loginAt' WHERE id = $id";
                $stmt = $conn->prepare($sql);
                $query = $stmt->execute();
                if ($query) {
                    if ($row['roles'] == 'user') {
                        header("Location: {$_SERVER['HTTP_REFERER']}");
                        exit();
                    } 
                    else if ($row['roles'] == 'admin') {
                        header("location:/watch-shop/src/resources/views/admin/watch/stored.php");
                        exit();
                    } 
                }
            }
            else echo "<script>alert('Sai email hoặc mật khẩu.');</script>";
        }
    }
?>