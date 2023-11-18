<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền Karaoke</title>
    <style>
        table{
            background-color:aquamarine;
        }
        table #head{
            background-color:darkcyan;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_POST["submit"])){
            $hs = $_POST["gioBatDau"];
            $he = $_POST["gioKetThuc"];
            define("truoc17h", 20000);
            define("sau17h", 45000);
            $msg = "";
            if($he <= 24 && $hs <=24 && $hs >= 10 && $he >= 10){
                if($hs < $he){
                    if($hs <= 17 && $he >= 17) $tienThanhToan = ((17 - $hs)*truoc17h) + (($he - 17)*sau17h);
                    if($hs >= 17 && $he > 17) $tienThanhToan = ($he - $hs)*sau17h;
                    if($hs < 17 && $he <= 17) $tienThanhToan = ($he - $hs)*truoc17h;
                }
                else{
                    $msg =  "Giờ kết thúc phải > giờ bắt đầu";
                }
            }
            else $msg = "Thời gian mở cửa: 10h - 24h";
        }
    ?>
    <form method="post">
        <table>
            <tr id="head">
                <td colspan="3"><center>TÍNH TIỀN KARAOKE</center></td>
            </tr>
            <tr>
                <td>Giờ bắt đầu: </td>
                <td><input type="number" min="0" require name="gioBatDau" value="<?php if(isset($hs)) echo $hs ?>"></td>
                <td>(h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc: </td>
                <td><input type="number" min="0" require name="gioKetThuc" value="<?php if(isset($he)) echo $he ?>"></td>
                <td>(h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán: </td>
                <td><input type="text" readonly name="tienThanhToan" value="<?php if(isset($tienThanhToan)) echo $tienThanhToan ?>"></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" name="submit" value="Tính tiền">
                </td>
            </tr>
        </table>
    </form>
    <?php echo $msg; ?>
</body>
</html>