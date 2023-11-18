<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 6</title>
    <style>
        h2 {
            color: #5476A0; 
        }
        td{
            font-weight: bold;
        }
        td.lable1{
            color: #9D5731;
        }
        td.lable2{
            color: #2242F4;
        }
    </style>
</head>
<body>
    
<?php
    $fn = $_POST['first_num'];
    $sn = $_POST['second_num'];
    $cal = $_POST['cal'];

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

    if(isset($fn) && isset($sn) && isset($cal)){
        if($cal == "Cộng") 
            $result = Cong($fn, $sn);
        if($cal == "Trừ") 
            $result = Tru($fn, $sn);
        if($cal == "Nhân") 
            $result = Nhan($fn, $sn);
        if($cal == "Chia") 
            $result = Chia($fn, $sn);
    }
    else{
        $result = "Dữ liệu không hợp lệ";
    }

?>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td align="center" colspan="2"><h2>PHÉP TÍNH TRÊN HAI SỐ</h2></td>
            </tr>
            <tr>
                <td class="lable1">Chọn phép tính:</td>
                <td class="lable1">
                    <?php echo $cal;?>
                </td>
            </tr>
            <tr>
                <td class="lable2">Số 1:</td>
                <td><input type = "number" step="any" name = "first_num" value="<?php if (isset($fn)) echo $fn;?>" readonly></td>
            </tr>
            <tr>
                <td class="lable2">Số 2:</td>
                <td><input type = "number" step="any" name = "second_num" value="<?php if (isset($sn)) echo $sn;?>" readonly></td>
            </tr>
            <tr>
                <td class="lable2">Kết quả:</td>
                <td><input type = "text" name = "result" value="<?php echo $result?>" readonly></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <a href='javascript:window.history.back(-1)' style="text-decoration: none; color: purple">Quay lại trang trước</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>