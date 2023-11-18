<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH2-Bai2</title>
</head>
<body>

<?php
    $msg = "";
    $allNumeric = true;
    if(isset($_POST['submit'])){
        if(!empty($_POST['dayso'])) {
            $n = $_POST['dayso'];
            $arr = explode(',', $n);
            foreach($arr as $item) {
                if (!is_numeric($item)) {
                    $allNumeric = false;
                    $msg = "Dãy số không hợp lệ";
                    break;
                }
            }
            if($allNumeric) {
                $sum = array_sum($arr);
            }
        } else {
            $msg = "Không được để trống";
        }
    }
?>
    <form action="Bai2" method="post">
        <table align="center" bgcolor="skyblue">
            <tr>
                <td colspan="2"><h1>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h1></td>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td><input type = "text" name = "dayso" value="<?php if (isset($n)) echo $n;?>"><span style="color:red;"> (*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type = "submit" name = "submit" value = "Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td><input type = "text" style="color:red;" name = "tongmang" value="<?php if (isset($sum)) echo $sum;?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><span style="color:red;">(*) </span>Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
            <tr>
                <td align="center" colspan="2"><span style="color:red;"><?php echo $msg ?></span></td>
            </tr>
        </table>
    </form>
</body>
</html>
