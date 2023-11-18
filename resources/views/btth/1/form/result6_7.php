<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai6</title>
</head>
<style>
    table {
        border: solid 3px black;
        padding: 5px 20px;
        border-radius: 5px;
    }
    body {
        background-color: #F0FDFF;
    }
    label {
        font-weight: bold;
    }
    td.align-center {
        text-align: center;
    }
    input[type="button"] {
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
<body>
<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$pt = $_POST['pheptinh'];
$msg = "";
if(isset($_POST['reset'])) {
    header("Location:Bai6_7");
    exit();
}
function checkIsValid($num1, $num2, $pt){
    if(!empty($num1) && !empty($num2 && is_numeric($num1) && is_numeric($num2))) {
        return false;
    } else return true;
}
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
    if($b == 0) return "Không thể chia";
    else return $chia = $a/$b;
}
if(isset($num1) && isset($num2)) {
    if(checkIsValid($num1, $num2,$pt)) {
        header("Location:index6.php");
        exit();
    }
    if($pt == "Cộng") $kq = Cong($num1, $num2) ;
    if($pt == "Trừ") $kq = Tru($num1, $num2);
    if($pt == "Nhân") $kq = Nhan($num1, $num2);
    if($pt == "Chia") $kq = Chia($num1, $num2);
} else {

}
?>
<form action="" method="post">
    <table align="center">
        <tr>
            <td colspan="2"><h1 align="center" style="color: #050DE1">Phép Tính Trên Hai Số</h1></td>
        </tr>
        <tr>
            <td style="font-weight: bold; color: #B36740">Chọn phép tính:</td>
            <td>
                <?php echo $pt;?>
            </td>
        </tr>
        <tr>
            <td style="font-weight: bold; color: #6A87FE">Số thứ nhất:</td>
            <td><input type = "text" name = "sodau" value="<?php if (isset($num1)) echo $num1;?>"disabled></td>
        </tr>
        <tr>
            <td style="font-weight: bold; color: #6A87FE">Số thứ hai:</td>
            <td><input type = "text" name = "sohai" value="<?php if (isset($num2)) echo $num2;?>"disabled></td>
        </tr>
        <tr>
            <td style="font-weight: bold; color: #6A87FE">Kết quả:</td>
            <td><input type = "text" name = "kq" value="<?php echo $kq?>" disabled></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <a href='javascript:window.history.back(-1)'><input type='button' name="back" value='Quay lại trang trước'></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
