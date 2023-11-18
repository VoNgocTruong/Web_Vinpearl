<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #form1{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
            background-color: beige;
        }
    </style>
</head>
<body>
    <?php
    $tenErr = $diachiErr = $phoneErr = "";
    $ten = $diachi = $phone = $gender = $country = $note = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["Fname"])) {
            $tenErr = "Họ và tên không được để trống";
        } else {
            $ten = $_POST["Fname"];
        }

        if (empty($_POST["address"])) {
            $diachiErr = "Địa chỉ không được để trống";
        } else {
            $diachi = $_POST["address"];
        }

        if (empty($_POST["phone"])) {
            $phoneErr = "Số điện thoại không được để trống";
        } else {
            $phone = $_POST["phone"];
            // Kiểm tra nếu $phone không phải là số điện thoại hợp lệ (ví dụ: 1234567890)
            if (!preg_match("/^[0-9]{10}$/", $phone)) {
                $phoneErr = "Số điện thoại không hợp lệ (phải có 10 chữ số)";
                $phone = "";
            }
        }
    }
    ?>
    <form id="form1" action="xulybai8.php" method="get">
        <table id="tb1">
            <th colspan="2"><h2>Enter Your Information</h2></th>
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="Fname" value="<?php if(isset($ten)) echo $ten ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value="<?php if(isset($diachi)) echo $diachi?>"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="number" name="phone" value="<?php if(isset($phone)) echo $phone ?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="" checked>Male
                    <input type="radio" name="gender" value="">Female
                    <input type="radio" name="gender" value="">Other
                </td>
            </tr>
            <tr>
                <td>Country</td>
                <td>
                    <select name="country">
                        <option value="vn">Vietnam</option>
                        <option value="us">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="german">German</option>
                        <option value="cn">Chi Na</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Study</td>
                <td>
                    <input type="checkbox" name="php" value="">PHP & MySQL
                    <input type="checkbox" name="asp" value="">ASP.NET
                    <input type="checkbox" name="ccna" value="">CCNA
                    <input type="checkbox" name="security" value="">Security+
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
                    <input type="submit" name="submit" value="Gửi">
                    <input type="reset" name="reset" value="Hủy">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>