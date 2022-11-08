<?php
include('../Components/ketnoi.php');
$id = $_GET["id"];
$sql = "SELECT `status` FROM `motel` WHERE `ID` = '$id'";
$record = $conn->query($sql);
if ($record->num_rows > 0) {
    $row = $record->fetch_assoc();
    $status = $row['status'];
}
$status = $status == 1 ? 2 : 1;
$sql_update = "UPDATE `motel` SET `status`='$status' WHERE `ID` = '$id'";
$result = $conn->query($sql_update);
if ($result) {
    echo '<script>window.location="../Motel";</script>';
} else {
    echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="../Motel";</script>';
}
