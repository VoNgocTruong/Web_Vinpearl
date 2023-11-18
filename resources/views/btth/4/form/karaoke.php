<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
        $hstart = $_POST['hstart'];
        $hend = $_POST['hend'];
        $gia1 = 20000;
        $gia2 = 45000;
        $tong = 0;

        if ($hstart >= 10 and $hstart <= 17 and $hend >= 10 and $hend <= 17) {
            $tong = ($hend - $hstart) * $gia1;
        }elseif ($hstart >= 17 and $hstart <= 24 and $hend >= 17 and $hend <= 24) {
            $tong = ($hend - $hstart) * $gia2;
        }elseif($hend > 17){
            $gio_tu_17_den_22 = max($hend, 17) - 17;
            $tong += $gio_tu_17_den_22 * $gia2;
        }
        else echo "Quan nghi roi tim quan khac di";
    }
    ?>

<form action="karaoke.php" method="post">
    <table style="background-color: #0099FF;">
        <th colspan="2" style="background-color: blue;">
            <h1>TINH TIEN KARAOKE</h1>
        </th>
        <tr>
            <td>Gio bat dau:</td>
            <td>
                <input type="text" name="hstart" value="<?php if(isset($hstart)) echo $hstart?>" required>
            </td>
        </tr>
        <tr>
            <td>Gio ket thuc:</td>
            <td>
                <input type="text" name="hend" value="<?php if(isset($hend)) echo $hend?>" required>
            </td>
        </tr>
        <tr>
            <td>Tien thanh toan:</td>
            <td>
                <input type="text" name="money" style="background-color: #FFFF66;" value="<?php if(isset($tong)) echo $tong; ?>" disabled>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Tinh tien"></td>
        </tr>
    </table>
</form>
</body>
</html>