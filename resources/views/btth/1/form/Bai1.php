<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai1</title>
</head>
<body>
<?php
$thongbao = ""; // Khởi tạo thông báo
if (isset($_POST['submit'])) {
    $cd = $_POST['cd'];
    $cr = $_POST['cr'];

    if (is_numeric($cd) && is_numeric($cr)) {
        if ($cd <= 0 || $cr <= 0) {
            $thongbao = "Kích thước chiều dài hoặc chiều rộng không hợp lệ!";
        }
        elseif ($cd > $cr) {
            $s = $cd * $cr;
        } else {
            $thongbao = "Chiều rộng không hợp lệ";
        }
    } else {
        $thongbao = "Chiều dài hoặc chiều rộng không hợp lệ";
    }
    if (empty($cd) || empty($cr)) {
        $thongbao = "Nhập đầy đủ các trường";
    }
}
?>
<form action="" method="post">
    <table align="center" bgcolor="#FBF5D9">
        <tr>
            <td colspan="2"><h1>DIỆN TÍCH HÌNH CHỮ NHẬT</h1></td>
        </tr>
        <tr>
            <td>Chiều dài:</td>
            <td><input type = "text" name = "cd" value="<?php if (isset($cd)) echo $cd;?>">
            </td>
        </tr>
        <tr>
            <td>Chiều rộng:</td>
            <td><input type = "text" name = "cr" value="<?php if (isset($cr)) echo $cr;?>">
            </td>
        </tr>
        <tr>
            <td>Diện tích:</td>
            <td><input type = "text" name = "dientich" value="<?php if (isset($s)) echo $s; else echo "";?>" disabled></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <?php if(isset($thongbao)) echo $thongbao; else echo '';?>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type = "submit" name = "submit" value = "Tính">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
