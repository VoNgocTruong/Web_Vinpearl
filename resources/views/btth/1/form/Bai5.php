<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai5</title>
</head>
<body>
<?php
$msg = "";
if (isset($_POST['reset'])) header("refresh:0");
if (isset($_POST['submit'])){
    $gbd = $_POST['gbd'];
    $gkt = $_POST['gkt'];

    list($gio_bd, $phut_bd) = explode(":", $gbd);
    list($gio_kt, $phut_kt) = explode(":", $gkt);
    $thoi_gian_1 = ($gio_bd * 60) + $phut_bd;
    $thoi_gian_2 = ($gio_kt * 60) + $phut_kt;
    $tong_thoi_gian = $thoi_gian_2 - $thoi_gian_1;
    if (isset($gbd) && isset($gkt)) {
        if(is_numeric($gio_bd) && is_numeric($gio_kt)) {
            if($gio_bd > 0 && $gio_kt > 0) {
                $tt = null;
                if($gio_kt >= $gio_bd) {
                    if($gio_bd>=10 and $gio_kt<=17) $tt = round($tt = $tong_thoi_gian * (20000/60));
                    if($gio_bd>=17 and $gio_kt<=24) $tt = $tong_thoi_gian * (45000/60);
                    if($gio_bd>=10 and $gio_bd<=17 and $gio_kt>=17 and $gio_kt<=24){
                        $gbd1 = (((17*60)) - $thoi_gian_1) * (20000/60);
                        $gkt1 = ($thoi_gian_2 - (17*60)) * (45000/60);
                        $tt = $gbd1 + $gkt1;
                        $tt = round($tt);
                    }
                    if($gio_bd<10 or $gio_kt>24) $msg .= "Giờ nghỉ";
                } else $msg .= "Giờ kết thúc phải lớn hơn giờ bắt đầu!<br>";
            } else $msg .= "Số giờ không được âm!<br>";
        } else $msg .= "Hãy nhập số hợp lệ!<br>";
    } else $msg .= "Hãy nhập giờ bắt đầu và kết thúc!<br>";
}
?>
<form action="" method="post">
    <table align="center" bgcolor="#03B0B6">
        <tr>
            <td align="center" bgcolor="#028A8E" colspan="2"><h1 style="color: white">TÍNH TIỀN KARAOKE</h1></td>
        </tr>
        <tr>
            <td>Giờ bắt đầu:</td>
            <td><input style="width: 72%;" type = "time" name = "gbd" value="<?php if (isset($gbd)) echo $gbd;?>">(h)</td>
        </tr>
        <tr>
            <td>Giờ kết thúc:</td>
            <td><input style="width: 72%;" type = "time" name = "gkt" value="<?php if (isset($gkt)) echo $gkt;?>">(h)</td>
        </tr>
        <tr>
            <td>Tiền thanh toán:</td>
            <td><input type = "text" name = "tt" value="<?php if (isset($tt)) echo $tt; else echo ""?>" disabled>(VNĐ)</td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type = "submit" name = "submit" value = "Tính tiền">
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
