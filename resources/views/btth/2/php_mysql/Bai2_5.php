<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 5</title>
    <style>
        b {
            margin-bottom: 10px;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php
// Kết nối Database
include('connection.php');
?>

<table align="center" width="auto" border="1">
    <tr>
        <td align="center" bgcolor="#FCEFE7" colspan="2"><h2 style="color: #E5752E">THÔNG TIN CÁC SẢN PHẨM</h2></td>
    </tr>
    <?php
    $conn = get_connection();
    $sql = "SELECT * FROM sua INNER JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
            INNER JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_array($result)) {
            $imageDirectory = "../hinhBTTH/2/img/Hinh_sua/";
            $imageFilename = $row['Hinh'];
            $imagePath = $imageDirectory . $imageFilename;
            
            echo "<tr>";
            echo "<td align='center'><img alt='" . $row['Hinh'] . "' src='" . $imagePath . "' width='100px' height='100px' style='padding: 5px 20px'></td>";
            echo "<td style='padding-left: 10px'>" .
                "<b>" . $row['Ten_sua'] . "</b>" .
                "<p>Nhà sản xuất: " . $row['Ten_hang_sua'] . "</p>" .
                "<p>" . $row['Ten_loai'] . " - " . $row['Trong_luong'] . " gr - " . $row['Don_gia'] . " VND" . "</p>"
                . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
</body>
</html>
