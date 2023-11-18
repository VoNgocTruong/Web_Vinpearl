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
$sd = $_GET['sodau'];
$sh = $_GET['sohai'];
$pt = $_GET['pheptinh'];

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

if(isset($sd) and isset($sh) and isset($pt)){
    if($pt == "Cộng") $kq = Cong($sd, $sh);
    if($pt == "Trừ") $kq = Tru($sd, $sh);
    if($pt == "Nhân") $kq = Nhan($sd, $sh);
    if($pt == "Chia") $kq = Chia($sd, $sh);
}

?>
    <form action="" method="post">
        <table align="center" bgcolor="pink">
            <tr>
                <td align="center" bgcolor="orange" colspan="2"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></td>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <?php echo $pt;?>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type = "text" name = "sodau" value="<?php if (isset($sd)) echo $sd;?>"disabled></td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td><input type = "text" name = "sohai" value="<?php if (isset($sh)) echo $sh;?>"disabled></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input type = "text" name = "kq" value="<?php echo $kq?>" disabled></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <a href='javascript:window.history.back(-1)'><input type='button' name="quaylai" value='Quay lại trang trước'></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>