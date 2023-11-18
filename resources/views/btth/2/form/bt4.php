<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
</head>
<body>
<?php
    define('dc', 20);
    $msg = "";
    if (isset($_POST['submit'])){
        $toan = $_POST['toan'];
        $ly = $_POST['ly'];
        $hoa = $_POST['hoa'];
        
        if (isset($toan) and $toan>=0 and $toan<=10 and isset($ly) 
        and $ly>=0 and $ly<=10 and isset($hoa) and $hoa>=0 and $hoa<=10){
            $tong = $toan + $ly + $hoa;
            if($tong >= dc and $toan != 0 and $hoa != 0 and $ly != 0){
                $kq = "Đậu";
            }else{
                $tong = $toan + $ly + $hoa;
                $kq = "Rớt";
            }
        }else{
            $msg = "Nhập điểm toán, lý, hóa >= 0 và <= 10";
        }
        
    }
    if (isset($_POST['reset'])){
        $toan = "";
        $ly = "";
        $hoa = "";
        $tong = "";
        $kq = "";
    }
?>
    <form action="bt4.php" method="post">
        <table align="center" bgcolor="#FBE9F9">
            <tr>
                <td align="center" bgcolor="#D65781" colspan="2"><h2>KẾT QUẢ THI ĐẠI HỌC</h2></td>
            </tr>
            <tr>
                <td>Toán:</td>
                <td><input type = "number" step="any" name = "toan" value="<?php if (isset($toan)) echo $toan;?>">
                </td>
            </tr>
            <tr>
                <td>Lý:</td>
                <td><input type = "number" step="any" name = "ly" value="<?php if (isset($ly)) echo $ly;?>"></td>
            </tr>
            <tr>
                <td>Hóa:</td>
                <td><input type = "number" step="any" name = "hoa" value="<?php if (isset($hoa)) echo $hoa;?>"></td>
            </tr>
            <tr>
                <td>Điểm chuẩn:</td>
                <td><input type = "text" name = "dc" value="20" style="color:red;"></td>
            </tr>   
            <tr>
                <td>Tổng điểm:</td>
                <td><input style="background: #FFFEEA" type = "text" name = "tong" value="<?php if (isset($tong)) echo $tong; else echo ""?>" disabled></td>
            </tr>
            <tr>
                <td>Kết quả thi:</td>
                <td><input style="background: #FFFEEA" type = "text" name = "kq" value="<?php if (isset($kq)) echo $kq; else echo ""?>" disabled></td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="color: red">
                    <?php if(isset($msg)) echo $msg; else echo '';?>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type = "submit" name = "submit" value = "Xem kết quả">
                    <input type = "submit" name = "reset" value = "Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>