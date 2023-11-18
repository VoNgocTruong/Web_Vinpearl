<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        
        .tr1{
            background-color: wheat;
        }
        .tr2{
            background-color: white;
        }
    </style>
</head>
<body>
<?php
    include"connectdb.php";

    $query2 = 'SELECT * FROM khach_hang';
    $result2 = $conn -> query($query2);
?>
<table>
    <h2>KHÁCH HÀNG</h2>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Phái</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
    <?php
        function trColor($index) {
            return ($index % 2 == 0) ? "tr1" : "tr2";
        }

        $index = 0;

        if (!$result2) {
            die("<br> QUERY FAILED");
        } else {
            foreach ($result2 as $record2) {
                $gender = "man.png";
                if ($record2["Phai"] == 1) {
                    $gender = "woman.png";
                }

                echo "<tr class=" . trColor($index) . ">";
                echo "<td>" . $record2["Ma_khach_hang"] . "</td>";
                echo "<td>" . $record2["Ten_khach_hang"] . "</td>";
                echo "<td id='img'><img src='./gender/$gender' width='50' height='50'></td>";
                echo "<td>" . $record2["Dia_chi"] . "</td>";
                echo "<td>" . $record2["Dien_thoai"] . "</td>";
                echo "<td>" . $record2["Email"] . "</td>";
                echo "</tr>";
                $index++;
            }
        }
    ?>
</table>
</body>
</html>
