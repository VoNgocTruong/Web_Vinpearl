<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 2</title>
</head>
<body>

<?php
    if(isset($_POST['submit'])){
        $txt = $_POST['array'];
        $arr = explode(',', $txt);
        $tong = 0;
        for($i = 0; $i < count($arr); $i++){
            // Chuyển đổi giá trị thành số nguyên
            $arr[$i] = intval($arr[$i]);
            
            // Cộng giá trị vào tổng
            $tong += $arr[$i];
        }
    }
?>
    <form action="bt2.php" method="post">
        <table align="center" bgcolor="#CED9D0">
            <tr>
                <td bgcolor="#4D9091" colspan="2"><h1>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h1></td>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td><input type = "text" name = "array" value="<?php if (isset($txt)) echo $txt;?>" require><span style="color:red;"> (*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type = "submit" style="background: #F5F5A8; width: 32%" name = "submit" value = "Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td><input type = "text" style="color:red; background: #D1F9A2; width: 30%" name = "tong" value="<?php if (isset($tong)) echo $tong;?>" readonly>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><span style="color:red;">(*) </span>Các số được nhập cách nhau bằng dấu ","</td>
            </tr>

            <tr>
                <td align="center" colspan="2">
                    <?php if(isset($msg)) echo $msg; else echo '';?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>