<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 6</title>
</head>
<body>
<?php

    function swap(&$a, &$b){
        $tam = $a;
        $a = $b;
        $b = $tam;
    }

    function Sort_up($arr){
        $n = count($arr);
        for($i = 0; $i < $n-1; $i++){
            for($j = $i + 1; $j < $n; $j++){
                if($arr[$i] > $arr[$j]){
                    swap($arr[$i], $arr[$j]); 
                }        
            }
        }
        return $arr;
    }

    function Sort_down($arr){
        $n = count($arr);
        for($i = 0; $i < $n-1; $i++){
            for($j = $i + 1; $j < $n; $j++){
                if($arr[$i] < $arr[$j]){
                    swap($arr[$i], $arr[$j]);
                }
            }
        }
        return $arr;
    }
?>
<?php
    if(isset($_POST['submit'])){
        $n = $_POST['so'];
    
        $arr = explode(',', $n);
        $arr_up = Sort_up($arr);
        $result_sort_up = implode(",", $arr_up);
        $arr_down = Sort_down($arr);
        $result_sort_down = implode(",", $arr_down);
    }
?>
    <form action="" method="post">
        <table style="width: 25%" align="center" bgcolor="#D3DED5">
            <tr>
                <td align="center" bgcolor="#529898" colspan="2"><h1>SẮP XẾP MẢNG</h1></td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type = "text" name = "so" style="width:auto;" value="<?php if (isset($n)) echo $n;?>"><span style="color:red;"> (*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type = "submit" name = "submit" value = "Sắp xếp tăng/giảm">
                </td>
            </tr>
            <tr>
                <td style="color:red">Sau khi sắp xếp:</td>
                <td></td>
            </tr>
            <tr style="background: #D1E5E7">
                <td>Tăng dần:</td>
                <td>
                    <input type = "text" name = "mangtang" style="width:auto;" value="<?php if(isset($result_sort_up)) echo $result_sort_up?>" disabled>
                </td>
            </tr>
            <tr style="background: #D1E5E7">
                <td>Giảm dần:</td>
                <td>
                    <input type = "text" name = "manggiam" style="width:auto;" value="<?php if(isset($result_sort_down)) echo $result_sort_down?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><span style="color:red;">(*) </span>Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
</body>
</html>