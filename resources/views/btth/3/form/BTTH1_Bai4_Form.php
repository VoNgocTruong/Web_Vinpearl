<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form - Bài 4</title>
</head>
<body>
<?php
define('DIEM_CHUAN', 20);
$msg = "";

if (isset($_POST['submit'])) {
    $diemToan = $_POST['toan'];
    $diemLy = $_POST['ly'];
    $diemHoa = $_POST['hoa'];
    if (isset($diemToan) && $diemToan >= 0 && $diemToan <= 10 && isset($diemLy) && $diemLy >= 0 && $diemLy <= 10 && isset($diemHoa) && $diemHoa >= 0 && $diemHoa <= 10) {
        $tongDiem = $diemToan + $diemLy + $diemHoa;
        if ($tongDiem >= DIEM_CHUAN && $diemToan != 0 && $diemHoa != 0 && $diemLy != 0) {   //>=điểm chuânr va khac 0
            $ketQuaThi = "Đậu";
        } else {
            $tongDiem = $diemToan + $diemLy + $diemHoa;
            $ketQuaThi = "Rớt";
        }
    } else {
        $msg = "Nhập điểm toán, lý, hóa hợp lệ";
    }
}
?>
<form action="BTTH1_Bai4_Form.php" method="post">
    <table bgcolor="#FDF4D7">
        <tr>
            <td bgcolor="#F8D484" colspan="2">
                <h1>KẾT QUẢ THI ĐẠI HỌC</h1>
            </td>
        </tr>
        <tr>
            <td>Toán:</td>
            <td><input type="number" step="any" name="toan" value="<?php if (isset($diemToan)) echo $diemToan; ?>"></td>
        </tr>
        <tr>
            <td>Lý:</td>
            <td><input type="number" step="any" name="ly" value="<?php if (isset($diemLy)) echo $diemLy; ?>"></td>
        </tr>
        <tr>
            <td>Hóa:</td>
            <td><input type="number" step="any" name="hoa" value="<?php if (isset($diemHoa)) echo $diemHoa; ?>"></td>
        </tr>
        <tr>
            <td>Điểm chuẩn:</td>
            <td><input type="text" name="dc" value="20" style="color:red"></td>
        </tr>
        <tr>
            <td>Tổng điểm:</td>
            <td><input style="background: #F8D6DA" type="text" name="tong" value="<?php if (isset($tongDiem)) echo $tongDiem; else echo "" ?>" disabled></td>
        </tr>
        <tr>
            <td>Kết quả thi:</td>
            <td><input style="background: #F8D6DA" type="text" name="kq" value="<?php if (isset($ketQuaThi)) echo $ketQuaThi; else echo "" ?>" disabled></td>
        </tr>
        <tr>
            <td align="center" colspan="2" style="color: red">
                <?php if (isset($msg)) echo $msg; else echo ''; ?>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="submit" value="Xem kết quả">
            </td>
        </tr>
    </table>
</form>
</body>
</html>