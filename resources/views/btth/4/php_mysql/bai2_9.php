<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm sữa</title>
    <style>
        #td1{
            background-color:crimson;
            color:yellow;
        }
        
        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}

        .highlight {
            font-weight: bold;
            color:darkmagenta; 
        }

        form{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Tìm kiếm sản phẩm sữa</h1>
    <form action="" method="post">
        <input type="text" name="ten_sua" placeholder="Nhập tên sản phẩm sữa" value="<?php if(isset($_POST['ten_sua'])) echo $_POST['ten_sua']?>">
        <input type="submit" value="Tìm kiếm">

        <?php
        include "connectdb.php";
        if (isset($_POST['ten_sua'])) {
            $ten_sua = $_POST["ten_sua"];

            $query = "SELECT * FROM sua WHERE Ten_sua LIKE '%$ten_sua%'";

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo "<table align='center' width='80%' border='1' style='border-collapse:collapse' >";
                echo "<h2>Kết quả tìm kiếm:</h2>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td colspan='2' align='center' id='td1'> <b>{$row['Ten_sua']}</b><br></td>";
                    echo"</tr>";
                    echo "<tr>";
                    echo "<td width='20%' height='200px' align='center'><img width='150px' src='./Hinh_sua/{$row['Hinh']}' alt=''></td>";
                    echo "<td>
                    <b>Thành phần dinh dưỡng</b>: {$row['TP_Dinh_Duong']}<br>
                    <b>Lợi ích</b>: {$row['Loi_ich']}<br>
                    <b>Trọng lượng: </b><span class='highlight'>{$row['Trong_luong']} gr</span> - <b>Đơn giá: </b><span class='highlight'>{$row['Don_gia']} VNĐ</span>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "Tìm thấy " . $result->num_rows . " sản phẩm sữa.";
            } else {
                echo "Không tìm thấy sản phẩm này.";
            }
        }
        ?>
    </form>
</body>
</html>
