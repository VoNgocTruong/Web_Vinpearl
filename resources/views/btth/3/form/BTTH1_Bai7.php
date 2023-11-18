<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH1 - Bài 7</title>
</head>
<body>
    <form action="BTTH1_Bai7_kq.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></td>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <input type="radio" name="operation" value="Cộng" <?php if(isset($operation) && $operation == 'Cộng') echo "checked"?>>
                    <label>Cộng</label>
                    <input type="radio" name="operation" value="Trừ" <?php if(isset($operation) && $operation == 'Trừ') echo "checked"?>>
                    <label>Trừ</label>
                    <input type="radio" name="operation" value="Nhân" <?php if(isset($operation) && $operation == 'Nhân') echo "checked"?>>
                    <label>Nhân</label>
                    <input type="radio" name="operation" value="Chia" <?php if(isset($operation) && $operation == 'Chia') echo "checked"?>>
                    <label>Chia</label>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type="text" name="number1" value="<?php if (isset($number1)) echo $number1;?>"></td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td><input type="text" name="number2" value="<?php if (isset($number2)) echo $number2;?>"></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="submit" value="Tính">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>