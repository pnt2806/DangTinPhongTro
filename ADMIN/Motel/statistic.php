<?php
include('../Components/ketnoi.php');
if (isset($_POST["search"])) {
    $title = addslashes($_POST['title']);
    $account = addslashes($_POST['account']);
    $time = addslashes($_POST['time']);
    $price = addslashes($_POST['price']);
    $sort = addslashes($_POST['sort']);

    $sql = "SELECT `ID`, `title`, `description`, `price`, `images`, `utilities`, `phone`, `approve`, `status` FROM `motel` WHERE `ID` = '$id'";
    $result = $conn->query($sql);
    if ($result) {
        echo '<script>window.location="../../Home";</script>';
    } else {
        echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../../Home";</script>';
    }
}
