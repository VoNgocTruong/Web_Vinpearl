<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH1-Bai6</title>
</head>
<body>
    <form action="xulybai6.php" method="post">
        <table align="center" bgcolor="pink">
            <tr>
                <td align="center" bgcolor="orange" colspan="2"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></td>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <input type="radio" name="pheptinh" value="Cộng">
                    <label>Cộng</label>
                    <input type="radio" name="pheptinh" value="Trừ">
                    <label>Trừ</label>
                    <input type="radio" name="pheptinh" value="Nhân">
                    <label>Nhân</label>
                    <input type="radio" name="pheptinh" value="Chia">
                    <label>Chia</label>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type = "text" name = "sodau" value="<?php if (isset($sd)) echo $sd;?>"></td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td><input type = "text" name = "sohai" value="<?php if (isset($sh)) echo $sh;?>"></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type = "submit" name = "submit" value = "Tính">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>