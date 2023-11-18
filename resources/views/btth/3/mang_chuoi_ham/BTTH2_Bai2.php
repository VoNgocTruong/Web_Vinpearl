<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH2 - Bài 2</title>
</head>
<body>
<?php
    if(isset($_POST['submit'])){
        $ds = $_POST['ds'];
        $arr = explode(',', $ds);
        $tong = 0;
        foreach($arr as $so){
            $so = intval($so);
            $tong += $so;
        }
    }
?>
    <form action="BTTH2_Bai2.php" method="post">
        <table align="center" bgcolor="#D1DED4">
            <tr>
                <td bgcolor="#2F9B99" style="color:#FFFFFF" colspan="2"><h1>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h1></td>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td><input type = "text" name = "ds" value="<?php if (isset($ds)) echo $ds;?>" require><span style="color:red;"> (*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type = "submit" style="background: #EBEAA5"  name = "submit" value = "Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td><input type = "text" style="color:red; background: #D1F9A2" name = "tong" value="<?php if (isset($tong)) echo $tong;?>" readonly>
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