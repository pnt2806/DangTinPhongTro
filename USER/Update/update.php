<?php
include('../Components/ketnoi.php');
$user_name_cookie = $_COOKIE["username"];

if (isset($_POST["update"]) && $_POST["update"]) {
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $avatar;
    $avatar_path = addslashes($_FILES["avatar"]["name"]);
    $target_dir = "../Uploads/User/$user_name_cookie/";
    // Kiểm tra thư mục đã tồn tại hay chưa
    if (!file_exists($target_dir))
        mkdir($target_dir);

    $target_file = $target_dir . basename($avatar_path);
    // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
        $avatar = $avatar_path;
    } else {
        echo '<script language="javascript">alert("Upload không thành công"); window.location="index.php";</script>';
    }
    $sql_update = "UPDATE `user` SET `Name`='$name',`Email`='$email',`Phone`='$phone',`Avatar`='$avatar' WHERE `UserName` = '$user_name_cookie'";
    $result = $conn->query($sql_update);
    if ($result) {
        echo '<script>alert("Cập nhật thành công"); window.location="../HOME";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="index.php";</script>';
    }
} else {
    echo '<script language="javascript">alert("Cập nhật không thành công"); window.location="index.php";</script>';
}
