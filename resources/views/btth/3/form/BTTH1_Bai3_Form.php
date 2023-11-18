<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form - Bài 3</title>
</head>
<body>
<?php
define('DON_GIA', 20000);
$msg = "";
$totalPayment = "";

if (isset($_POST['submit'])) {
    $chuHoName = $_POST['chuHoName']; // Tên chủ hộ
    $oldIndex = $_POST['oldIndex']; // Chỉ số cũ
    $newIndex = $_POST['newIndex']; // Chỉ số mới

    if (!empty($chuHoName)) {
        if (isset($oldIndex) && is_numeric($oldIndex) && $oldIndex > 0 && isset($newIndex) && is_numeric($newIndex) && $newIndex > 0) {
            if ($oldIndex < $newIndex) {
                $totalPayment = ($newIndex - $oldIndex) * DON_GIA;
            } else {
                $msg = "Chỉ số cũ phải nhỏ hơn chỉ số mới";
            }
        } else {
            $msg = "Chỉ số cũ và chỉ số mới phải là số lớn hơn 0";
        }
    } else {
        $msg = "Vui lòng nhập tên chủ hộ";
    }
}
?>

<form action="BTTH1_Bai3_Form.php" method="post">
    <table bgcolor="#FDF4D7">
        <tr>
            <td bgcolor="#F8D484" colspan="2"><h1>THANH TOÁN TIỀN ĐIỆN</h1></td>
        </tr>
        <tr>
            <td>Tên chủ hộ:</td>
            <td><input type="text" name="chuHoName" value="<?php if (isset($chuHoName)) echo $chuHoName; ?>" placeholder="Tên chủ hộ"></td>
        </tr>
        <tr>
            <td>Chỉ số cũ:</td>
            <td><input type="text" name="oldIndex" value="<?php if (isset($oldIndex)) echo $oldIndex; ?>" placeholder="Chỉ số cũ">(Kw)
            </td>
        </tr>
        <tr>
            <td>Chỉ số mới:</td>
            <td><input type="text" name="newIndex" value="<?php if (isset($newIndex)) echo $newIndex; ?>" placeholder="Chỉ số mới">(Kw)
            </td>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td><input type="text" name="dongia" value="20000" disabled>(VNĐ)</td>
        </tr>
        <tr>
            <td>Số tiền thanh toán:</td>
            <td><input style="background: #F8D6DA" type="text"
                value="<?php if (isset($totalPayment)) echo $totalPayment; else echo ""; ?>" disabled>(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="2" style="color: red">
                <?php if (isset($msg)) echo $msg; else echo ''; ?>
            </td>
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