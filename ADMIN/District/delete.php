<?php
include('../Components/ketnoi.php');

$id = $_GET["id"];
$sql_delete = "DELETE FROM `districts` WHERE `ID` = '$id'";
$result = $conn->query($sql_delete);
if ($result) {
    echo "
        <script>
        alert('Xóa thành công'); window.location='../District';</script>
        ";
} else {
    echo "<script>alert('Có lỗi trong quá trình xử lý'); window.location='../District';</script>";
}
