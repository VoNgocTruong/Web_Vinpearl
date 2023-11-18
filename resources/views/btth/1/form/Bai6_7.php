<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai6</title>
    <style>
        table {
            border: solid 3px black;
            padding: 5px 20px;
            border-radius: 5px;
        }
        body {
            background-color: #F0FDFF;
        }
        label {
            font-weight: bold;
        }
        td.align-center {
            text-align: center;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<form action="result6_7" method="post">
    <table align="center">
        <tr>
            <td colspan="2"><h1 align="center" style="color: #050DE1">Phép Tính Trên Hai Số</h1></td>
        </tr>
        <tr>
            <td style="font-weight: bold; color: #B36740">Chọn phép tính:</td>
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
            <td style="font-weight: bold; color: #6A87FE">Số thứ nhất:</td>
            <td><input type="text" name="num1" value=""></td>
        </tr>
        <tr>
            <td style="font-weight: bold; color: #6A87FE">Số thứ hai:</td>
            <td><input type="text" name="num2" value=""></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="submit" value="Tính">
                <input type="submit" name="reset" value="Reset">
                <p style="font-weight: bold; color: red">
                </p>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
