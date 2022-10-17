<?php
if (!isset($_POST['username'])) {
    die('');
}
include('../../Components/ketnoi.php');

header('Content-Type: text/html; charset=UTF-8');

$username = addslashes($_POST['username']);
$pass = addslashes($_POST['pass']);
$re_pass = addslashes($_POST['re_pass']);
$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);

if (!$username || !$pass || !$re_pass || !$name || !$email) {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

// $sql = "INSERT INTO `user` (`ID`, `Name`, `UserName`, `Email`, `Password`, `Role`, `Phone`, `Avatar`) VALUES ('', '', '', '', '', '', '', '')";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo 'hello';
//     }
// } else {
//     echo 'Khong co ban ghi nao';
// }
$conn->close();
