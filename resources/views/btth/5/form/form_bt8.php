<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tb1{
            width: 500px;
            border: 0.5px solid black;
            margin-left: 10px;
        }
        #title{
            font-weight: bold;
            font-size: 20px;
        }
        fieldset{
            width: 210px;
            background: white;
            border: none;
            margin-top: -20px;
        }
    </style>
</head>
<body>
    <form action="config_bt8.php" method="get">
        <div class="tb1">
            <table>
                <tr>
                    <td colspan="2" id="title">
                        <fieldset>Enter your information</fieldset>
                    </td>
                </tr>
                <tr> 
                    <td>Fullname</td>
                    <td><input type="text" name="name" id=""></td>
                </tr>
                <tr> 
                    <td>Address</td>
                    <td><input type="text" name="add" id=""></td>
                </tr>
                <tr> 
                    <td>Phone</td>
                    <td><input type="text" name="phone" id=""></td>
                </tr>
                <tr> 
                    <td>Gender</td>
                    <td>
                        <input type="radio" checked name="gender" value="nam">Nam
                        <input type="radio" name="gender" value="nu">Nữ
                    </td>
                </tr>
                <tr> 
                    <td>Country</td>
                    <td>
                        <select name="country">
                            <option selected value="vn">Việt Nam</option>
                            <option value="us">Hoa Kỳ</option>
                            <option value="cn">Trung Quốc</option>
                            <option value="jp">Nhật Bản</option>
                            <option value="kr">Hàn Quốc</option>
                            <option value="rus">Liên Bang Nga</option>
                            <option value="lao">Lào</option>
                            <option value="uk">Anh Quốc</option>
                        </select>
                    </td>
                </tr>
                <tr> 
                    <td>Study</td>
                    <td>
                        <input type="checkbox" name="study" value="php-mysql" id="">PHP & MySQL
                        <input type="checkbox" name="study" value="asp-net">ASP.NET
                        <input type="checkbox" name="study" value="ccna">CCNA
                        <input type="checkbox" name="study" value="security">Securty+
                    </td>
                </tr>
                <tr>
                    <td>Note</td>
                    <td>
                        <textarea name="note" id="" cols="30" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="gui" value="Gửi">
                        <input type="submit" name="huy" value="Hủy">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>