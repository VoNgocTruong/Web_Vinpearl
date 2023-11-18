<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai4</title>
</head>
<body>
<?php
if (isset($_POST['reset'])) header("refresh:0");
define('dc', 20);
$msg = "";
$kq = "";
function isValidScore($score) {
    return is_numeric($score) && $score >= 0 && $score <= 10;
}
if (isset($_POST['submit'])) {
    $toan = $_POST['toan'];
    $ly = $_POST['ly'];
    $hoa = $_POST['hoa'];
    if (isValidScore($toan) && isValidScore($ly) && isValidScore($hoa)) {
        $tong = round($toan + $ly + $hoa,1);
        if ($tong >= dc) {
            $kq = "Đậu";
        } else {
            $kq = "Rớt";
        }
    } else {
        if (!isValidScore($toan)) {
            $msg .= "Điểm toán không hợp lệ!<br>";
        }
        if (!isValidScore($ly)) {
            $msg .= "Điểm lý không hợp lệ!<br>";
        }
        if (!isValidScore($hoa)) {
            $msg .= "Điểm hoá không hợp lệ!<br>";
        }
    }
}
?>
<form action="" method="post">
    <table align="center" bgcolor="#FFE8FA">
        <tr>
            <td align="center" bgcolor="#E84C81" colspan="2"><h1 style="color: white">KẾT QUẢ THI ĐẠI HỌC</h1></td>
        </tr>
        <tr>
            <td>Toán:</td>
            <td><input type = "text" name = "toan" value="<?php if (isset($toan)) echo $toan;?>">
            </td>
        </tr>
        <tr>
            <td>Lý:</td>
            <td><input type = "text" name = "ly" value="<?php if (isset($ly)) echo $ly;?>"></td>
        </tr>
        <tr>
            <td>Hóa:</td>
            <td><input type = "text" name = "hoa" value="<?php if (isset($hoa)) echo $hoa;?>"></td>
        </tr>
        <tr>
            <td>Điểm chuẩn:</td>
            <td><input type = "text" name = "dc" value="20" style="color:red;"></td>
        </tr>
        <tr>
            <td>Tổng điểm:</td>
            <td><input type = "text" name = "tong" value="<?php if (isset($tong)) echo $tong; else echo ""?>" disabled></td>
        </tr>
        <tr>
            <td>Kết quả thi:</td>
            <td><input type = "text" name = "kq" value="<?php if (isset($kq)) echo $kq; else echo ""?>" disabled></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type = "submit" name = "submit" value = "Xem kết quả">
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
