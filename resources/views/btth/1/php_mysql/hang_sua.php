<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2.1</title>
</head>
<body>
    <?php 
    require 'db_connect.php';
    $sql = "SELECT * FROM hang_sua";
    $result = $conn->query($sql);
    ?>
    <h1 align="center">THÔNG TIN HÃNG SỮA</h1>
    <table border="1" style="width: 100%;">
        <tr>
            <th>Mã HS</th>
            <th>Tên hãng sữa</th>
            <th>Địa Chỉ</th>
            <th>Điện Thoại</th>
            <th>Email</th>
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
                <td>
                    <?php echo $each['Ma_hang_sua'] ?>
                </td>
                <td>
                    <?php echo $each['Ten_hang_sua'] ?>
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
        <?php endforeach ?>
        </table>
</body>
</html>