<?php
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

$sql = "SELECT * FROM `user` WHERE `UserName` = '$username' AND `Password` = '$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
    $_SESSION['username'] = $username;
    // Thực thi hành động sau khi lưu thông tin vào session
    // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
    echo '<script language="javascript">window.location="./Home/index.php";</script>';
} else {
    echo '<script language="javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng"); window.location="index.php";</script>';
}
?>
