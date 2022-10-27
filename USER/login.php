<?php
session_start();
if (!isset($_POST['username'])) {
    die('');
}
include('./Components/ketnoi.php');

header('Content-Type: text/html; charset=UTF-8');

$username = addslashes($_POST['username']);
$pass = addslashes($_POST['pass']);

if (!$username || !$pass) {
    echo '<script>alert("Vui lòng nhập đầy đủ thông tin"); window.location="index.php";</script>';
    exit;
}

$salt;
$sqlSalt = "SELECT `UserName` FROM `user`WHERE `UserName` = '$username'";
$resultSalt = $conn->query($sqlSalt);
if ($resultSalt->num_rows > 0) {
    while ($row = $resultSalt->fetch_assoc()) {
        $salt = $row['Salt'];
    }
}

$pass .= $salt;
$pass = md5($pass);

$sql = "SELECT * FROM `user` WHERE `UserName` = '$username' AND `Password` = '$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
    setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 day
    // $_COOKIE[$cookie_name];
    // $_SESSION['username'] = $username;
    // echo $_SESSION['username'];
    // Thực thi hành động sau khi lưu thông tin vào session
    // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
    echo '<script language="javascript">window.location="./home.php";</script>';
} else {
    echo '<script language="javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng"); window.location="index.php";</script>';
}
?>
