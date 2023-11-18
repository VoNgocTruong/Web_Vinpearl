<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Sữa</title>
    <style>
        .column {
            font-size: 14px;
            border: 1px solid black;
            float: left;
            width: 20%;
            text-align: center;
            box-sizing: border-box;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .column h2 a {
            text-decoration: none;
            color: blue;
        }

        .column h2 a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
        }

        tr {
            display: flex;
            justify-content: center;
        }

        td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
    include "connectdb.php";

    $sql = 'SELECT Hinh, Ten_sua, Trong_luong, Don_gia FROM sua';
    $result = $conn->query($sql);

    echo "<h2 align='center'>THÔNG TIN CÁC SẢN PHẨM</h2>";

    if (mysqli_num_rows($result) <> 0) {
        echo "<table>";
        while ($rows = mysqli_fetch_row($result)) {
            echo "<tr class='column'>";
            echo "<td>";
            // Tạo liên kết đến trang chi tiết và truyền tên sữa dưới dạng tham số
            echo "<a href='chitiet_bai27.php?tenSua=" . urlencode($rows[1]) . "'>" . $rows[1] . "</a>";
            echo "<p>" . $rows[2] . "gr - " . $rows[3] . "VNĐ" . "</p>";
            echo "<p id='img'><img src='./Hinh_sua/{$rows[0]}' width='100' height='100'></p>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
