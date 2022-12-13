<?php
include('../Components/ketnoi.php');
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST["create"])) {
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
    $address = addslashes($_POST['address']);
    $latlng = addslashes($_POST['latlng']);
    $phone = addslashes($_POST['phone']);
    $price = addslashes($_POST['price']);
    $utilities = addslashes($_POST['utilities']);
    $approve = addslashes($_POST['approve']);
    $category = addslashes($_POST['category']);
    $district = addslashes($_POST['district']);
    $image = addslashes($_FILES["image"]["name"]);
    $status = addslashes($_POST["status"]);
    if (
        !$title ||
        !$description ||
        !$address ||
        !$latlng ||
        !$phone ||
        !$price ||
        !$utilities ||
        !$category ||
        !$district ||
        !$image
    ) {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin"); window.location="./addRoom.php";</script>';
        exit;
    }
    $image_path = $image;
    $target_dir = "../../USER/Uploads/Motel/";
    // Kiểm tra thư mục đã tồn tại hay chưa
    if (!file_exists($target_dir)) {
        mkdir($target_dir);
    }
    if ($image_path) {
        $target_file = $target_dir . basename($image_path);
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $image_path;
        } else {
            echo '<script language="javascript">alert("Upload không thành công"); window.location="./addRoom.php";</script>';
        }
    }
    $username = $_COOKIE["username"];
    $admin_id;
    $sql_admin = "SELECT `ID` FROM `user` WHERE `UserName` = '$username'";
    $result_admin = $conn->query($sql_admin);
    if ($result_admin->num_rows > 0) {
        $row = $result_admin->fetch_assoc();
        $admin_id = $row['ID'];
    }
    $sql = "INSERT INTO `motel`(`title`, `description`, `price`, `address`, `latlng`, `images`, `user_id`, `category_id`, `district_id`, `utilities`, `phone`, `approve`, `status`) VALUES ('$title', '$description', '$price', '$address', '$latlng' ,'$image','$admin_id','$category','$district','$utilities','$phone','$approve','$status')";
    $result = $conn->query($sql);
    if ($result) {
        echo '<script>alert("Thêm mới thành công"); window.location="./myRoom.php";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="./addRoom.php";</script>';
    }
} else {
    echo '<script language="javascript">alert("Tạo mới không thành công"); window.location="./addRoom.php";</script>';
}
