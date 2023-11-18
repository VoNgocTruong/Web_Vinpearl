<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form - Bài 5</title>
</head>
<body>
<?php
if (isset($_POST['submit'])){
    $gioBatDau = $_POST['start'];
    $gioKetThuc = $_POST['end'];
    if (isset($gioBatDau) and $gioBatDau > 0 and isset($gioKetThuc) and $gioKetThuc > 0){
        if ($gioKetThuc > $gioBatDau){
            if ($gioBatDau >= 10 and $gioKetThuc <= 17){
                $thanhToan = ($gioKetThuc - $gioBatDau) * 20000;
            }
            if ($gioBatDau >= 17 and $gioKetThuc <= 24){
                $thanhToan = ($gioKetThuc - $gioBatDau) * 45000;
            }
            if ($gioBatDau >= 10 and $gioBatDau <= 17 and $gioKetThuc >= 17 and $gioKetThuc <= 24){
                $thanhToanBatDau = (17 - $gioBatDau) * 20000;
                $thanhToanKetThuc = ($gioKetThuc - 17) * 45000;
                $thanhToan = $thanhToanBatDau + $thanhToanKetThuc;
            }
            if ($gioBatDau < 10 or $gioKetThuc > 24){
                $thanhToan = "Giờ nghỉ";
            }
        }
        else {
            $thanhToan = "Giờ kết thúc phải lớn hơn giờ bắt đầu";
        }
    }
    else{
        $thanhToan = "Dữ liệu không hợp lệ";
    }
}

?>
    <form action="BTTH1_Bai5_Form.php" method="post">
        <table align="center" bgcolor="#4FAMC4">
            <tr>
                <td align="center" bgcolor="#3D7A7D" colspan="2"><h1>TÍNH TIỀN KARAOKE</h1></td>
            </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td><input type="number" step="any" name="start" value="<?php if (isset($gioBatDau)) echo $gioBatDau;?>">(h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td><input type="number" step="any" name="end" value="<?php if (isset($gioKetThuc)) echo $gioKetThuc;?>">(h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <td><input style="background: #FFFCB1" type="text" name="result" value="<?php if (isset($thanhToan)) echo $thanhToan; else echo ""?>" disabled>(VNĐ)</td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input style="background: #FBFFE2" type="submit" name="submit" value="Tính tiền">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>