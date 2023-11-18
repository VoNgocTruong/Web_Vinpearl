<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH1-Bai6</title>
</head>
<body>
<?php
    $sd = $_POST['number1'];
    $sh = $_POST['number2'];
    $pt = $_POST['operation'];

    function Cong($a, $b){
        return $cong = $a + $b;
    }

    function Tru($a, $b){
        return $tru = $a - $b;
    }

    function Nhan($a, $b){
        return $nhan = $a * $b;
    }

    function Chia($a, $b){
        if($b == 0)
            return "Không thể chia";
        else
            return $chia = $a/$b;
    }

    if(isset($sd) && isset($sh) && isset($pt)){
        if($pt == "Cong")
            $kq = Cong($sd, $sh);
        if($pt == "Tru")
            $kq = Tru($sd, $sh);
        if($pt == "Nhan")
            $kq = Nhan($sd, $sh);
        if($pt == "Chia")
            $kq = Chia($sd, $sh);
    }
    else{
        $kq = "Dữ liệu không hợp lệ";
    }

?>
    <form action="" method="post">
        <table>
            <tr>
                <td colspan="2"><h2>PHÉP TÍNH VỚI HAI SỐ</h2></td>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <?php echo $pt;?>
                </td>
            </tr>
            <tr>
                <td>Số 1:</td>
                <td><input type="number" step="any" name="number1" value="<?php if (isset($sd)) echo $sd; ?>" readonly></td>
            </tr>
            <tr>
                <td>Số 2:</td>
                <td><input type="number" step="any" name="number2" value="<?php if (isset($sh)) echo $sh; ?>" readonly></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input type="text" name="kq" value="<?php echo $kq ?>" readonly></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <a href='javascript:window.history.back(-1)'>Quay lại trang trước</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>