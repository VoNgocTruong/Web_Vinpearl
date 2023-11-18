<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH1 - Bài 5</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
    $bd = $_POST['bd'];
    $kt = $_POST['kt'];

    if (isset($bd) and !empty($bd) and isset($kt) and !empty($kt)) {
        $thoiGianBatDau = strtotime($bd);
        $thoiGianKetThuc = strtotime($kt);

        if ($thoiGianKetThuc > $thoiGianBatDau) {
            $gioBatDauHour = date('H', $thoiGianBatDau);
            $gioKetThucHour = date('H', $thoiGianKetThuc);
            $gioBatDauMinute = date('i', $thoiGianBatDau);
            $gioKetThucMinute = date('i', $thoiGianKetThuc);
            $tongPhut = (($gioKetThucHour * 60 + $gioKetThucMinute) - ($gioBatDauHour * 60 + $gioBatDauMinute));
            if ($gioBatDauHour >= 10 && $gioBatDauHour < 17 && $gioKetThucHour >= 10 && $gioKetThucHour < 17) {
                $thanhTien = round($tongPhut * (20000 / 60), 2);
            } elseif ($gioBatDauHour >= 17 && $gioBatDauHour < 24 && $gioKetThucHour >= 17 && $gioKetThucHour < 24) {
                $thanhTien = round($tongPhut * (45000 / 60), 2);
            } else {
                $thanhTien = "Giờ nghỉ";
            }
        } else {
            $thanhTien = "Giờ kết thúc phải lớn hơn giờ bắt đầu";
        }
    } else {
        $thanhTien = "Dữ liệu không hợp lệ";
    }
}

if (isset($_POST['reset'])) {
    $bd = "";
    $kt = "";
    $thanhTien = "";
}
?>
    <form action="BTTH1_Bai5_NC.php" method="post">
        <table bgcolor="#4MAMC4">
            <tr>
                <td bgcolor="#3K7A7D" colspan="2"><h2>TÍNH TIỀN KARAOKE</h2></td>
            </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td><input style="width: 67%" type="time" name="bd" value="<?php if (isset($bd)) echo $bd;?>" size="50">(h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td><input style="width: 67%" type="time" name="kt" value="<?php if (isset($kt)) echo $kt;?>">(h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <td><input style="Background: #FFFCB1; width: 65%" type="text" name="result" value="<?php if (isset($thanhTien)) echo $thanhTien; else echo ""?>" disabled>(VNĐ)</td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input style="background: #FBFFE2" type="submit" name="submit" value="Tính tiền">
                    <input style="background: #FBFFE2" type="submit" name="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>