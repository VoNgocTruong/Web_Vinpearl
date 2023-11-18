<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chu vi - Diện tích hình tròn</title>
</head>
<body>
    <?php
        define("pi",3.14);
        $msg = "";
        if(isset($_POST["submit"])){
            $r = $_POST["r"];
            if($r <= 0){
                $msg = "Bán kính phải > 0!";
            }
            else{
                $s = round(pi*pow($r,2));
                $cv = round(2 * pi * $r);
            }
        }
    ?>
    <form method="post">
        <table style="width: 300px; background-color:antiquewhite;">
            <tr style="background-color:burlywood;">
                <td colspan="2">
                    <e><center>DIỆN TÍCH và CHU VI<br>HÌNH TRÒN</center></e>
                </td>
            </tr>
            <tr>
                <td>Bán kính: </td>
                <td><input type="number" required name="r" step="any" value="<?php if(isset($r)) echo $r; ?>"></td>
            </tr>
            <tr>
                <td>Diện tích: </td>
                <td><input readonly type="text" value="<?php if(isset($s)) echo $s; ?>"></td>
            </tr>
            <tr>
                <td>Chu vi: </td>
                <td><input readonly type="text" value="<?php if(isset($cv)) echo $cv; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" step="any" value="Tính"></td>
            </tr>
        </table>
    </form>
    <?php echo $msg; ?>
</body>
</html>