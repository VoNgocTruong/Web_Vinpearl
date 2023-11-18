<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH2 - Bài 6</title>
</head>
<body>
<?php

    function hoan_vi(&$a, &$b){
        $tam = $a;
        $a = $b;
        $b = $tam;
    }

    function sx_tang($mang){
        $n = count($mang);
        for($i = 0; $i < $n-1; $i++){
            for($j = $i + 1; $j < $n; $j++){
                if($mang[$i] > $mang[$j]){
                    hoan_vi($mang[$i], $mang[$j]);
                }
            }
        }
        return $mang;
    }

    function sx_giam($mang){
        $n = count($mang);
        for($i = 0; $i < $n-1; $i++){
            for($j = $i + 1; $j < $n; $j++){
                if($mang[$i] < $mang[$j]){
                    hoan_vi($mang[$i], $mang[$j]);
                }
            }
        }
        return $mang;
    }
?>
<?php
    if(isset($_POST['submit'])){
        $n = $_POST['so'];
        $mang = explode(',', $n);
        $mang_tang = sx_tang($mang);
        $kq_tang = implode(",", $mang_tang);
        $mang_giam = sx_giam($mang);
        $kq_giam = implode(",", $mang_giam);
    }
?>
    <form action="" method="post">
        <table style="width: 35%" align="center" bgcolor="#D3DED5">
            <tr>
                <td align="center" bgcolor="#2F9B99" style="color:#FFFFFF" colspan="2"><h1>SẮP XẾP MẢNG</h1></td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type = "text" name = "so" style="width: 90%" value="<?php if (isset($n)) echo $n;?>"><span style="color:red;"> (*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type = "submit" name = "submit" value = "Sắp xếp tăng/giảm">
                </td>
            </tr>
            <tr style="background: #CCE6E7">
                <td style="color:red">Sau khi sắp xếp:</td>
                <td></td>
            </tr>
            <tr style="background: #CCE6E7">
                <td>Tăng dần:</td>
                <td>
                    <input type = "text" name = "mangtang" style="width: 90%"" value="<?php if(isset($kq_tang)) echo $kq_tang?>" disabled>
                </td>
            </tr>
            <tr style="background: #CCE6E7">
                <td>Giảm dần:</td>
                <td>
                    <input type = "text" name = "manggiam" style="width: 90%" value="<?php if(isset($kq_giam)) echo $kq_giam?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><span style="color:red;">(*) </span>Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
</body>
</html>