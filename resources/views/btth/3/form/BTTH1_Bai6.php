<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH1-Bai6</title>

</head>
<body>
    <form action="BTTH1_Bai6_kq.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h2>PHÉP TÍNH TRÊN HAI SỐ</h2></td>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <input type="radio" name="operation" value="Cong">
                    <label>Cộng</label>
                    <input type="radio" name="operation" value="Tru">
                    <label>Trừ</label>
                    <input type="radio" name="operation" value="Nhan">
                    <label>Nhân</label>
                    <input type="radio" name="operation" value="Chia">
                    <label>Chia</label>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type="number" step="any" name="number1" value="<?php if (isset($num1)) echo $num1; ?>"></td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td><input type="number" step="any" name="number2" value="<?php if (isset($num2)) echo $num2; ?>"></td>
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