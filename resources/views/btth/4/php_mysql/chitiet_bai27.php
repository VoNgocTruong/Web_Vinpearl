<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sữa</title>
</head>
<body>
    <?php
    include "connectdb.php";

    if (isset($_GET['tenSua'])) {
        $tenSua = $_GET['tenSua'];

        $sql = "SELECT Hinh, Ten_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich FROM sua WHERE Ten_sua = '$tenSua'";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo "<h2>{$row['Ten_sua']}</h2>";
            echo "<p>Thành phần dinh dưỡng: {$row['TP_Dinh_Duong']}</p>";
            echo "<p>Lợi ích: {$row['Loi_ich']}</p>";
            echo "<p>Trọng lượng: {$row['Trong_luong']}gr</p>";
            echo "<p>Đơn giá: {$row['Don_gia']}VNĐ</p>";
            echo "<p><img src='./Hinh_sua/{$row['Hinh']}' width='200' height='200'></p>";

            echo "<a href='bai2_7.php'>Quay lại danh sách</a>";
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
    } else {
        echo "Không có thông tin sản phẩm để hiển thị.";
    }

    $conn->close();
    ?>
</body>
</html>
