<?php
include('../Components/ketnoi.php');
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST["create"])) {
    $name = addslashes($_POST['name']);
    if (!$name) {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin"); window.location="../District/add.php";</script>';
        exit;
    }

    $sql = "INSERT INTO `districts`(`Name`) VALUES ('$name')";
    $result = $conn->query($sql);
    if ($result) {
        echo '<script>alert("Thêm mới thành công"); window.location="../District/index.php";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../District/add.php";</script>';
    }
} else {
    echo '<script language="javascript">alert("Tạo mới không thành công"); window.location="../District/add.php";</script>';
}
