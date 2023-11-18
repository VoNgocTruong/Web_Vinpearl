<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 6</title>
    <style>
        h2 {
            color: #5476A0; 
        }
        td{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="kq_bt6.php" method="post">
        <table align="center">
            <tr>
                <td align="center" colspan="2"><h2>PHÉP TÍNH TRÊN HAI SỐ</h2></td>
            </tr>
            <tr>
                <td style="color: #944620">Chọn phép tính:</td>
                <td>
                    <input type="radio" name="cal" value="Cộng">
                    <label>Cộng</label>
                    <input type="radio" name="cal" value="Trừ">
                    <label>Trừ</label>
                    <input type="radio" name="cal" value="Nhân">
                    <label>Nhân</label>
                    <input type="radio" name="cal" value="Chia">
                    <label>Chia</label>
                </td>
            </tr>
            <tr>
                <td style="color: #2242F4">Số thứ nhất:</td>
                <td><input type = "number" step="any" name = "first_num" value="<?php if (isset($fn)) echo $fn;?>"></td>
            </tr>
            <tr>
                <td style="color: #2242F4">Số thứ hai:</td>
                <td><input type = "number" step="any" name = "second_num" value="<?php if (isset($sn)) echo $sn;?>"></td>
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