<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai3</title>
</head>
<body>
<?php
if(isset($_POST['reset'])) header("refresh:0");
define('dongia',20000);
$msg = "";
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $csc = $_POST['csc'];
    $csm = $_POST['csm'];
    if (empty($name)) $msg .= "Vui lòng nhập tên chủ hộ!<br>";
    if (isset($csc) && isset($csm) && is_numeric($csc) && is_numeric($csm)) {
        if ($csc > 0 && $csm > 0) {
            if ($csc > $csm) {
                $msg .= "Chỉ số cũ không được lớn hơn chỉ số mới!<br>";
            } else {
                $tt = round(($csm-$csc)*dongia);
            }
        } else {
            $msg = "Các chỉ số không được bé hơn hoặc bằng 0!<br>";
        }
    } else {
        $msg .= "Vui lòng nhập hợp lệ chỉ số cũ và chỉ số mới!<br>";
    }
}
?>
<form action="" method="post">
    <table align="center" bgcolor="#FFF9D2">
        <tr>
            <td align="center" bgcolor="orange" colspan="2"><h1 style="color: #924E09">THANH TOÁN TIỀN ĐIỆN</h1></td>
        </tr>
        <tr>
            <td>Tên chủ hộ:</td>
            <td><input type = "text" name = "name" value="<?php if (isset($name)) echo $name;?>">
            </td>
        </tr>
        <tr>
            <td>Chỉ số cũ:</td>
            <td><input type = "text" name = "csc" value="<?php if (isset($csc)) echo $csc;?>">(Kw)</td>
        </tr>
        <tr>
            <td>Chỉ số mới:</td>
            <td><input type = "text" name = "csm" value="<?php if (isset($csm)) echo $csm;?>">(Kw)</td>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td><input type = "text" name = "dongia" value="<?php echo dongia ?>">(VNĐ)</td>
        </tr>
        <tr>
            <td>Số tiền thanh toán:</td>
            <td><input style="background: #F6D9D8" type = "text" name = "tt" value="<?php if (isset($tt)) echo $tt; else echo ""?>" disabled>(VNĐ)</td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type = "submit" name = "submit" value = "Tính">
                <input type = "submit" name = "reset" value = "Reset">
                <p style="font-weight: bold; color: red">
                    <?php echo $msg ?>
                </p>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
