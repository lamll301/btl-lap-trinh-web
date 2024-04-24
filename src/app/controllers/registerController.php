
<?php
    include '../../config/connect.php';
    if (!empty($_POST['register'])){
        if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $sql = "SELECT * FROM account WHERE email = '$email'";
            $stmt = $conn->prepare($sql);
            $query = $stmt->execute();
            
            if($query){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);                    
                if(!$row){
                    $sql = "INSERT INTO account (email, password, fullname, roles, status) 
                    VALUES ('$email', '$password', '$fullname', 'user', 'no-active')";
                    $stmt = $conn->prepare($sql);
                    $query = $stmt->execute(); 
                    if($query){
                        $sql = "SELECT id FROM account WHERE email = '$email'";
                        $stmt = $conn->prepare($sql);
                        $query = $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $account_id = $row['id'];

                        $sql = "INSERT INTO customer (email, fullname, account_id) VALUES ('$email', '$fullname', '$account_id')";
                        $stmt = $conn->prepare($sql);
                        $query = $stmt->execute(); 
                        header("Location: {$_SERVER['HTTP_REFERER']}");
                    }
                    else echo "<script>alert('error');</script>";
                }
                else {
                    echo "<script>alert('Tài khoản đã tồn tại!');</script>";
                }
            }
            else echo "<script>alert('error');</script>";
        }
     }
?>