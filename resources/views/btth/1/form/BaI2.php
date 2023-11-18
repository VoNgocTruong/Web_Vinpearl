<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai2</title>
</head>
<body>
<?php
if (isset($_POST['reset'])) {
    header("refresh:0");
}
if (isset($_POST['submit'])) {
    $r = $_POST['R'];

    if (isset($r) && is_numeric($r) && $r > 0) {
        $s = round(M_PI * $r * $r, 1);
        $p = round(2 * M_PI * $r, 1);
    } else {
        $r = "Bán kính không hợp lệ";
    }
}
?>
<form action="" method="post">
    <table align="center" bgcolor="#FFFADA">
        <tr>
            <td bgcolor="#FCDB79" colspan="2"><h1 style="color: #874D06">DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</h1></td>
        </tr>
        <tr>
            <td>Bán kính:</td>
            <td><input type="text" name="R" value="<?php if (isset($r)) echo $r;?>">
            </td>
        </tr>
        <tr>
            <td>Diện tích:</td>
            <td><input style="background: #FED7DB" type="text" name="S" value="<?php if (isset($s)) echo $s; else echo "";?>" readonly></td>
        </tr>
        <tr>
            <td>Chu vi:</td>
            <td><input style="background: #FED7DB" type="text" name="P" value="<?php if (isset($p)) echo $p; else echo "";?>" readonly></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" name="submit" value="Tính">
                <input type="submit" name="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
