<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH1 - Bài 8</title>
</head>
<body>
    <?php
    if (isset($_POST['gui'])){
        if (!empty($_POST['fullname']) && !empty($_POST['address']) && !empty($_POST['phone']) &&
            !empty($_POST['gender']) && !empty($_POST['country']) &&
            isset($_POST['note']) && isset($_POST['study'])){

            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $country = $_POST['country'];
            $study = implode(", ", $_POST['study']);
            $note = $_POST['note'];

            $url = "BTTH1_Bai8_kq?fullname=" . $fullname .
                    "&address=" . $address . "&phone=" . $phone . "&gender=" . $gender .
                    "&country=" . $country . "&study=" . $study . "&note=" . $note;

            header("Location: " . $url);
            exit();
        }
        else{
            $thongbao = "Vui lòng điền đầy đủ thông tin";
        }
    }

    if (isset($_POST['huy'])){
        $_POST['fullname'] = "";
        $_POST['address'] = "";
        $_POST['phone'] = "";
        $_POST['gender'] = "";
        $_POST['country'] = "";
        $_POST['study'] = array();
        $_POST['note'] = "";
    }
    ?>

    <form action="BTTH1_Bai8.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h2>Enter Your Information</h2></td>
            </tr>
            <tr>
                <td>Fullname:</td>
                <td><input type="text" name="fullname" value="<?php if (isset($_POST['fullname'])) echo $_POST['fullname']; ?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="text" name="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" id="x" value="Nam" <?php if (isset($_POST['gender']) && $_POST['gender'] === "Nam") echo 'checked'; ?>>
                    <label>Nam</label>
                    <input type="radio" name="gender" id="x" value="Nữ" <?php if (isset($_POST['gender']) && $_POST['gender'] === "Nữ") echo 'checked'; ?>>
                    <label>Nữ</label>
                </td>
            </tr>
            <tr>
                <td>Country:</td>
                <td>
                    <select name="country">
                        <option value="Choose country">Choose country</option>
                        <option value="Việt Nam" <?php if (isset($_POST['country']) && $_POST['country'] === 'Việt Nam') echo 'selected'; ?>>Việt Nam</option>
                        <option value="Lào" <?php if (isset($_POST['country']) && $_POST['country'] === 'Hàn Quốc') echo 'selected'; ?>>Lào</option>
                        <option value="Mỹ" <?php if (isset($_POST['country']) && $_POST['country'] === 'Nhật bản') echo 'selected'; ?>>Mỹ</option>
                        <option value="Trung Quốc" <?php if (isset($_POST['country']) && $_POST['country'] === 'Trung Quốc') echo 'selected'; ?>>Trung Quốc</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Study:</td>
                <td>
                    <input type="checkbox" name="study[]" id="myCheck" value="PHP and MySQL" <?php if (isset($_POST['study']) && in_array("PHP and MySQL", $_POST['study'])) echo 'checked'; ?>>
                    <label>PHP & MySQL</label>
                    <input type="checkbox" name="study[]" id="myCheck" value="ASP.NET" <?php if (isset($_POST['study']) && in_array("ASP.NET", $_POST['study'])) echo 'checked'; ?>>
                    <label>ASP.NET</label>
                    <input type="checkbox" name="study[]" id="myCheck" value="CCNA" <?php if (isset($_POST['study']) && in_array("CCNA", $_POST['study'])) echo 'checked'; ?>>
                    <label>CCNA</label>
                    <input type="checkbox" name="study[]" id="myCheck" value="Security+" <?php if (isset($_POST['study']) && in_array("Security+", $_POST['study'])) echo 'checked'; ?>>
                    <label>Security+</label>
                </td>
            </tr>
            <tr>
                <td>Note:</td>
                <td>
                    <textarea name="note" cols="30" rows="5"><?php if (isset($_POST['note'])) echo $_POST['note']; ?></textarea>    
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <?php if (isset($thongbao)) echo $thongbao; ?>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="gui" value="Gửi">
                    <input type="submit" name="huy" value="Hủy">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>