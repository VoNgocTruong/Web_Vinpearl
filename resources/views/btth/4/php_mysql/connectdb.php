<?php
// Thông tin kết nối
$hostname = "localhost"; // Địa chỉ máy chủ MySQL
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL (nếu có)
$dbname = "quanly_ban_sua"; // Tên cơ sở dữ liệu MySQL

// Tạo kết nối đến MySQL
$conn = new mysqli($hostname, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "";
?>