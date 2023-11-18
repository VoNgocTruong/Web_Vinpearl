<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2.2</title>
</head>
<body>
    <?php 
    require 'db_connect.php';
    $sql = "SELECT * FROM khach_hang";
    $result = $conn->query($sql);
    ?>
    <h1 align="center">THÔNG TIN KHÁCH HÀNG</h1>
    <table border="1" style="width: 100%;">
        <tr align="center" style="font-weight: bold; color:#B42C21">
            <th>Mã KH</th>
            <th>Tên Khách Hàng</th>
            <th>Giới Tính</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
        </tr>
        <?php $count = 0; foreach ($result as $each): ?>
            <tr style="<?php echo ($count % 2 == 0) ? 'background-color:#FEE0C1' : 'background-color:white'; ?>; color:#725350">
                <td>
                    <?php echo $each['Ma_khach_hang'] ?>
                </td>
                <td>
                    <?php echo $each['Ten_khach_hang'] ?>
                </td>
                <td align="center">
                    <?php echo $each['Phai'] ?>
                </td>
                <td>
                    <?php echo $each['Dia_chi'] ?>
                </td>
                <td>
                    <?php echo $each['Dien_thoai'] ?>
                </td>
                <td>
                    <?php echo $each['Email'] ?>
                </td>
            </tr>
            <?php $count++ ?>
        <?php endforeach ?>
        </table>
</body>
</html>