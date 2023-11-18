<?php
if (isset($_GET['submit'])) {
    $ten = $_GET['Fname'];
    $diachi = $_GET['address'];
    $phone = $_GET['phone'];
    $gender = $_GET['gender'];
    $country = $_GET['country'];
    $note = $_GET['note'];
    
    // Hiển thị thông tin đã nhập
    echo "<h2>Bạn đã đăng nhập thành công!</h2>";
    echo "<p>Họ và tên: $ten</p>";
    echo "<p>Địa chỉ: $diachi</p>";
    echo "<p>Số điện thoại: $phone</p>";
    echo "<p>Giới tính: $gender</p>";
    echo "<p>Quốc gia: $country</p>";
    echo "<p>Ghi chú: $note</p>";
}
?>
