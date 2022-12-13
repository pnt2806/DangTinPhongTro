<?php
$conn = mysqli_connect('localhost', 'root', '', 'gtpt');
if (!$conn) {
    die('Ket noi that bai: ' . mysqli_connect_error());
}
