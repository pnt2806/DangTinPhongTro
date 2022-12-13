<?php
include('../Components/ketnoi.php');
$id = $_GET["id"];
$name;
if (isset($_POST["update"])) {
    $name = addslashes($_POST['name']);
    $sql_update = "UPDATE `categories` SET `Name`='$name' WHERE `ID` = '$id'";
    $result = $conn->query($sql_update);
    if ($result) {
        echo '<script>alert("Cập nhật thành công"); window.location="../../Category";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../../Category";</script>';
    }
} else {
    echo '<script language="javascript">alert("Cập nhật không thành công"); window.location="../../Category";</script>';
}
