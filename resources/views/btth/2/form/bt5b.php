<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
</head>
<body>
<?php
if (isset($_POST['submit'])){
    $start = $_POST['start'];
    $end = $_POST['end'];
    
    if (isset($start) and !empty($start) and isset($end) and !empty($end)){
        $start_time = strtotime($start);
        $end_time = strtotime($end);
        
        if ($end_time > $start_time) {
            $start_hour = date('H', $start_time);
            $end_hour = date('H', $end_time);
            $start_minute = date('i', $start_time);
            $end_minute = date('i', $end_time);
            
            $total_minutes = (($end_hour * 60 + $end_minute) - ($start_hour * 60 + $start_minute));
            
            if ($start_hour >= 10 && $start_hour < 17 && $end_hour >= 10 && $end_hour < 17) {
                $tt = round($total_minutes * (20000 / 60), 2);
            } elseif ($start_hour >= 17 && $start_hour < 24 && $end_hour >= 17 && $end_hour < 24) {
                $tt = round($total_minutes * (45000 / 60), 2);
            } else {
                $tt = "Giờ nghỉ";
            }
        } else {
            $tt = "Giờ kết thúc phải lớn hơn giờ bắt đầu";
        }
    } else {
        $tt = "Dữ liệu không hợp lệ";
    }
}

if (isset($_POST['reset'])){
    $start = "";
    $end = "";
    $tt = "";
}
?>


    <form action="bt5b.php" method="post">
        <table align="center" bgcolor="#4FADB4">
            <tr>
                <td align="center" bgcolor="#3D8A8D" colspan="2"><h2>TÍNH TIỀN KARAOKE</h2></td>
            </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td><input style="width: 67%" type = "time" name = "start" value="<?php if (isset($start)) echo $start;?>" size = "50">(h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td><input style="width: 67%" type = "time" name = "end" value="<?php if (isset($end)) echo $end;?>">(h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <td><input style="background: #FFFCB1; width: 65%" type = "text" name = "result" value="<?php if (isset($tt)) echo $tt; else echo ""?>" disabled>(VNĐ)</td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input style="background: #FBFFE2" type = "submit" name = "submit" value = "Tính tiền">
                    <input style="background: #FBFFE2" type = "submit" name = "reset" value = "Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
