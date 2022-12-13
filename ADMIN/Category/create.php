<?php
include('../Components/ketnoi.php');
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST["create"])) {
    $name = addslashes($_POST['name']);
    if (!$name) {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin"); window.location="../Category/add.php";</script>';
        exit;
    }
    $sqlSelectUser = 'SELECT `Name` FROM `categories`';
    $resultSelectUser = $conn->query($sqlSelectUser);
    if ($resultSelectUser->num_rows > 0) {
        while ($row = $resultSelectUser->fetch_assoc()) {
            if ($name == $row['Name']) {
                echo '<script>alert("Tên loại phòng đã tồn tại"); window.location="../Category/add.php";</script>';
                exit;
            }
        }
    }

    $sql = "INSERT INTO `categories`(`Name`) VALUES ('$name')";
    $result = $conn->query($sql);
    if ($result) {
        echo '<script>alert("Thêm mới thành công"); window.location="../Category/index.php";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../Category/add.php";</script>';
    }
} else {
    echo '<script language="javascript">alert("Tạo mới không thành công"); window.location="../Category/add.php";</script>';
}
