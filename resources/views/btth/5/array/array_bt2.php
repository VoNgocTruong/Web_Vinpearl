<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <?php
        $msg = "";
        if(isset($_POST["submit"])){
            $input = trim($_POST["input"],"\n");
            
            $arr = explode(",",$input);
            $tong = 0;
            foreach($arr as $i){
                if(is_numeric($i)) $tong += $i;
            }
        }
    ?>

    <form method="post" name="tinhDaySo" action="array_bt2.php">
        <table style="border: 1px solid black; width: 350px; background-color:darkseagreen;">
            <tr style="background-color:lightseagreen;">
                <td colspan="2" style="text-align: center; font-size:larger">
                    NHẬP VÀ TÍNH TRÊN DÃY SỐ
                </td>
            </tr>
            <tr>
                <td>Nhập dãy số</td>
                <td><input style="width: 200px;" required pattern="[0-9]\," type="text" name="input" value="<?php if(isset($input)) echo $input; ?>"><e style="color: red;">(*)</e></td>
            </tr>
            <tr>
                <td></td>
                <td><input name="submit" type="submit" value="Tổng dãy số" style="background-color:bisque;"></td>
            </tr>
            <tr>
                <td>Tổng dãy số</td>
                <td><input style="width: 100px; background-color:greenyellow;" type="text" name="result" readonly value="<?php if(isset($tong)) echo $tong; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2">
                    <e style="color: red;">(*)</e> Các số được nhập cách nhau bằng dấu ","
                </td>
            </tr>
        </table>
    </form>
</body>
</html>