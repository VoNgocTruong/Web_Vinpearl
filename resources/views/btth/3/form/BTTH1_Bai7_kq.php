<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH1 - Bài 7</title>
</head>
<body>

<?php
$msg = "";
if (isset($_POST['submit'])){
    if(isset($_POST['operation']) && isset($_POST['number1']) && isset($_POST['number2'])){
        $operation = $_POST['operation'];
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        if ($operation == "Chia" && $number2 == 0){
            $msg = "Không thể chia cho 0!";
        } elseif (!is_numeric($number1) || !is_numeric($number2)) {
            $msg = "Dữ liệu không hợp lệ. Vui lòng nhập lại số hợp lệ.";
        } else {
            $result = performOperation($operation, $number1, $number2);
        }
    } else {
        $msg = "Vui lòng nhập đầy đủ các trường!";
    }

    if(!empty($msg)){
        header("refresh:2;url=BTTH1_Bai7");
    }
}

function performOperation($operation, $a, $b) {
    switch ($operation) {
        case "Cộng":
            return $a + $b;
        case "Trừ":
            return $a - $b;
        case "Nhân":
            return $a * $b;
        case "Chia":
            if($b == 0)
                return "Không thể chia";
            else
                return $a / $b;
        default:
            return 0;
    }
}
?>
<form action="" method="post">
    <table>
        <tr>
            <td colspan="2"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></td>
        </tr>
        <tr>
            <td>Chọn phép tính:</td>
            <td>
                <?php if(!empty($operation))
                        echo $operation;
                    else echo "<p style='color: red;'>Chưa chọn phép tính</p>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Số thứ nhất:</td>
            <td><input type="text" name="number1" value="<?php if (isset($number1)) echo $number1;?>"></td>
        </tr>
        <tr>
            <td>Số thứ hai:</td>
            <td><input type="text" name="number2" value="<?php if (isset($number2)) echo $number2;?>"></td>
        </tr>
        <tr>
            <td>Kết quả:</td>
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