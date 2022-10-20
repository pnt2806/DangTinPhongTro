<?php
if (!isset($_POST['username'])) {
    die('');
}
include('../Components/ketnoi.php');

header('Content-Type: text/html; charset=UTF-8');

$username = addslashes($_POST['username']);
$pass = addslashes($_POST['pass']);
$re_pass = addslashes($_POST['re_pass']);
$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);

if (!$username || !$pass || !$re_pass || !$name || !$email) {
    echo '<script>alert("Vui lòng nhập đầy đủ thông tin"); window.location="index.php";</script>';
    exit;
}


$sql = "INSERT INTO `user` (`Name`, `UserName`, `Email`, `Password`, `Role`) VALUES ('$name', '$username', '$email', '$pass', '1')";
$result = $conn->query($sql);
if ($result) {
    echo '<script>alert("Đăng ký thành công"); window.location="../index.php";</script>';
} else {
    echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="index.php";</script>';
}
$conn->close();
