<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 7</title>
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

$msg = "";

if (isset($_POST['submit'])){
    if(isset($_POST['cal']) && isset($_POST['first_num']) && isset($_POST['second_num'])){
        $cal = $_POST['cal'];
        $first = $_POST['first_num'];
        $second = $_POST['second_num'];

        // Kiểm tra xem số thứ 2 có phải là 0 trong phép chia hay không
        if ($cal == "Chia" && $second == 0){
            $msg = "Không thể chia cho 0!";
        } elseif (!is_numeric($first) || !is_numeric($second)) {       //kiểm tra số đầu và số 2 có phải là chữ số không
            $msg = "Dữ liệu không hợp lệ. Vui lòng nhập lại số hợp lệ.";
        } else {
            if($cal == "Cộng") 
            $result = Cong($first, $second);
            if($cal == "Trừ") 
                $result = Tru($first, $second);
            if($cal == "Nhân") 
                $result = Nhan($first, $second);
            if($cal == "Chia") 
                $result = Chia($first, $second);
        }
    } else {
        $msg = "Vui lòng nhập đầy đủ các trường!";        
    }

    //nếu có thông báo lỗi thì sẽ quay lại trang trước
    if(!empty($msg)){
        header("refresh:2;url=bt7.php");
    }
}

    //các hàm tính toán
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

?>

<form action="" method="post">
    <table align="center">
        <tr>
            <td align="center" colspan="2"><h2>PHÉP TÍNH TRÊN HAI SỐ</h2></td>
        </tr>
        <tr>
            <td class="lable1">Chọn phép tính:</td>
            <td class="lable1">
                <?php if(!empty($cal)) 
                        echo $cal;
                    else echo "<p style='color: red;'>Chưa chọn phép tính</p>";
                ?>
            </td>
        </tr>
        <tr>
            <td class="lable2">Số thứ nhất:</td>
            <td><input type = "text" name = "first_num" value="<?php if (isset($first)) echo $first;?>"></td>
        </tr>
        <tr>
            <td class="lable2">Số thứ hai:</td>
            <td><input type = "text" name = "second_num" value="<?php if (isset($second)) echo $second;?>"></td>
        </tr>
        <tr>
            <td class="lable2">Kết quả:</td>
            <td>
                <?php
                if (!empty($msg)) {
                    echo "<p style='color:red;'>$msg</p>";
                } else {
                    echo "<input type='text' name='result' value='$result' readonly>";
                }
                ?>
            </td>
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
