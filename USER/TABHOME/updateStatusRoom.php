<?php
include("../Components/header.php");
$id = $_GET["id"];
$change = 0;
$sqlCheck = 'SELECT approve FROM motel WHERE ID = '.$id.'';
$resultCheck = $conn->query($sqlCheck);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['approve'] === 0) {
            $change = 1;
        } else {
            $change = 0;
        }
    }
}
$sql = "UPDATE `motel` SET `approve`= " . $change . " WHERE `ID` = " . $id . "";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<script>alert("Đổi trạng thái thành công"); window.location="./myRoom.php";</script>';
} else {
    echo '<script>alert("Đổi trạng thái thất bại"); window.location="./myRoom.php";</script>';
}
?>