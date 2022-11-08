<?php
include('../Components/ketnoi.php');
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST["create"])) {
    $username = addslashes($_POST['user_name']);
    $pass = addslashes($_POST['pass']);
    $re_pass = addslashes($_POST['re_pass']);
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $role = addslashes($_POST['role']);
    if (!$username || !$pass || !$re_pass || !$name || !$email || !$role) {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin"); window.location="../User/add.php";</script>';
        exit;
    }
    $sqlSelectUser = 'SELECT `UserName` FROM `user`';
    $resultSelectUser = $conn->query($sqlSelectUser);
    if ($resultSelectUser->num_rows > 0) {
        while ($row = $resultSelectUser->fetch_assoc()) {
            if ($username == $row['UserName']) {
                echo '<script>alert("Tên đăng nhập đã tồn tại"); window.location="../User/add.php";</script>';
                exit;
            }
        }
    }

    if ($pass !== $re_pass) {
        echo '<script>alert("Nhập lại mật khẩu không đúng"); window.location="../User/add.php";</script>';
        exit;
    }

    $salt = strtotime("now");
    $pass .= $salt;
    $pass = md5($pass);
    $avatar = "";
    $avatar_path = addslashes($_FILES["avatar"]["name"]);
    $target_dir = "../../USER/Uploads/User/$username/";
    // Kiểm tra thư mục đã tồn tại hay chưa
    if (!file_exists($target_dir)) {
        mkdir($target_dir);
    }
    if ($avatar_path) {
        $target_file = $target_dir . basename($avatar_path);
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $avatar = $avatar_path;
        } else {
            echo '<script language="javascript">alert("Upload không thành công"); window.location="../User/add.php";</script>';
        }
    }
    echo "'$name', '$username', '$email', '$pass', '$role' ,'$phone','$avatar','$salt'";

    $sql = "INSERT INTO `user`(`Name`, `UserName`, `Email`, `Password`, `Role`, `Phone`, `Avatar`, `Salt`) VALUES ('$name', '$username', '$email', '$pass', '$role' ,'$phone','$avatar','$salt')";
    $result = $conn->query($sql);
    if ($result) {
        echo '<script>alert("Thêm mới thành công"); window.location="../User/index.php";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../User/add.php";</script>';
    }
} else {
    echo '<script language="javascript">alert("Tạo mới không thành công"); window.location="../User/add.php";</script>';
}
