<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 7</title>
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
    <form action="kq_bt7.php" method="post">
        <table align="center">
            <tr>
                <td align="center" colspan="2"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></td>
            </tr>
            <tr>
                <td style="color: #944620">Chọn phép tính:</td>
                <td>
                    <input type="radio" name="cal" value="Cộng" <?php if(isset($cal) && $cal == 'Cộng') echo "checked"?>>
                    <label>Cộng</label>
                    <input type="radio" name="cal" value="Trừ" <?php if(isset($cal) && $cal == 'Trừ') echo "checked"?>>
                    <label>Trừ</label>
                    <input type="radio" name="cal" value="Nhân" <?php if(isset($cal) && $cal == 'Nhân') echo "checked"?>>
                    <label>Nhân</label>
                    <input type="radio" name="cal" value="Chia" <?php if(isset($cal) && $cal == 'Chia') echo "checked"?>>
                    <label>Chia</label>
                </td>
            </tr>
            <tr>
                <td style="color: #2242F4">Số thứ nhất:</td>
                <td><input type = "text" name = "first_num" value="<?php if (isset($first)) echo $first;?>"></td>
            </tr>
            <tr>
                <td style="color: #2242F4">Số thứ hai:</td>
                <td><input type = "text" name = "second_num" value="<?php if (isset($second)) echo $second;?>"></td>
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