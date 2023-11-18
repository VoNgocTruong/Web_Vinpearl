<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BT8</title>
</head>
<body>
<?php
if (isset($_POST['gui'])) {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $study = isset($_POST['study']) ? implode(", ", $_POST['study']) : "";
    $note = isset($_POST['note']) ? $_POST['note'] : "";

    if (!empty($fullname) && !empty($address) && !empty($phone) &&
        !empty($gender) && !empty($country)) {
        header("Location:config?fullname=$fullname&address=$address&phone=$phone&gender=$gender&country=$country&study=$study&note=$note");
        exit();
    } else {
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
<form action="Bai8" method="post">
    <table align="center">
        <tr>
            <td align="center" colspan="2"><h2>Enter Your Information</h2></td>
        </tr>
        <tr>
            <td>Fullname:</td>
            <td><input type = "text" name = "fullname" value="<?php if (isset($_POST['fullname'])) echo $_POST['fullname'];?>"></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><input type = "text" name = "address" value="<?php if (isset($_POST['address'])) echo $_POST['address'];?>"></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type = "text" name = "phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'];?>"></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <input type="radio" name="gender" value="Nữ" <?php if(isset($_POST['gender']) && $_POST['gender'] == "Nữ") echo 'checked';?>>
                <label>Nữ</label>
                <input type="radio" name="gender" value="Nam" <?php if(isset($_POST['gender']) && $_POST['gender'] == "Nam") echo "checked";?>>
                <label>Nam</label>
            </td>
        </tr>
        <tr>
            <td>Country:</td>
            <td>
                <select name='country' >
                    <option value='Choose country'>Choose country</option>
                    <option value='Việt Nam' <?php if (isset($_POST['country']) && $_POST['country'] === 'Việt Nam') echo 'selected'; ?>>Việt Nam</option>
                    <option value='Lào' <?php if (isset($_POST['country']) && $_POST['country'] === 'Lào') echo 'selected'; ?>>Lào</option>
                    <option value='Mỹ' <?php if (isset($_POST['country']) && $_POST['country'] === 'Mỹ') echo 'selected'; ?>>Mỹ</option>
                    <option value='Trung Quốc' <?php if (isset($_POST['country']) && $_POST['country'] === 'Trung Quốc') echo 'selected'; ?>>Trung Quốc</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Study:</td>
            <td>
                <input type="checkbox" name="study[]" id="myCheck" value="PHP and MySQL" <?php if(isset($_POST['study']) == "PHP & MySQL") echo "checked";?>>
                <label>PHP & MySQL</label>
                <input type="checkbox" name="study[]" id="myCheck" value="ASP.NET" <?php if(isset($_POST['study']) == "ASP.NET") echo "checked";?>>
                <label>ASP.NET</label>
                <input type="checkbox" name="study[]" id="myCheck" value="CCNA" <?php if(isset($_POST['study']) == "CCNA") echo "checked";?>>
                <label>CCNA</label>
                <input type="checkbox" name="study[]" id="myCheck" value="Security+" <?php if(isset($_POST['study']) == "Security+") echo "checked";?>>
                <label>Security+</label>
            </td>
        </tr>
        <tr>
            <td>Note:</td>
            <td>
                <textarea name="note" cols="30" rows="5" value="<?php if (isset($_POST['note'])) echo $_POST['note'];?>"></textarea>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <?php if (isset($thongbao)) echo $thongbao;?>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type = "submit" name = "gui" value = "Gửi">
                <input type = "submit" name = "huy" value = "Hủy">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
