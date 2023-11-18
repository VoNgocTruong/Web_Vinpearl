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
    
    if (isset($start) and $start>0 and isset($end) and $end>0){
        if($end > $start){
            if($start>=10 and $end<=17){
                $tt = ($end - $start)*20000;
            }
            if($start>=17 and $end<=24){
                $tt = ($end - $start)*45000;
            }
            if($start>=10 and $start<=17 and $end>=17 and $end<=24){
                $start1 = (17-$start)*20000;
                $end1 = ($end-17)*45000;
                $tt = $start1 + $end1;
            }
            if($start<10 or $end>24) 
            {
                $tt = "Giờ nghỉ";
            }
        }
        else 
        {
            $tt = "Giờ kết thúc phải > Giờ bắt đầu";
        }
    }
    else{
        $tt = "Dữ liệu không hợp lệ";
    }
}
if (isset($_POST['reset'])){
    $start = "";
    $end = "";
    $tt = "";
}
?>
    <form action="bt5.php" method="post">
        <table align="center" bgcolor="#4FADB4">
            <tr>
                <td align="center" bgcolor="#3D8A8D" colspan="2"><h2>TÍNH TIỀN KARAOKE</h2></td>
            </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td><input type = "number" step="any" name = "start" value="<?php if (isset($start)) echo $start;?>">(h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td><input type = "number" step="any" name = "end" value="<?php if (isset($end)) echo $end;?>">(h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <td><input style="background: #FFFCB1" type = "text" name = "result" value="<?php if (isset($tt)) echo $tt; else echo ""?>" disabled>(VNĐ)</td>
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
