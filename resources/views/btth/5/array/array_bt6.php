<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tbForm{
            background-color: lightblue;
            width: 400px;
            height: 220px;
        }
        .title{
            background-color:cornflowerblue;
            font-size: 20px;
            font-weight: bold;
        }
        .text{
            width: 260px;
        }
        .center{
            text-align: center;
        }
        .red{
            color: red;
            font-weight: bold;
        }
        .result{
            width: 100%;
            background-color:aquamarine;
            height: 80px;
        }
    </style>
</head>
<body>
    <?php
        function sxTang($arr){
            for($i=0;$i<count($arr)-1;$i++){
                for($j=$i+1;$j<count($arr);$j++){
                    if($arr[$i] > $arr[$j]){
                        $tmp = $arr[$i];
                        $arr[$i] = $arr[$j];
                        $arr[$j] = $tmp;
                    }
                }
            }
            return $arr;
        }
        function sxGiam($arr){
            for($i=0;$i<count($arr)-1;$i++){
                for($j=$i+1;$j<count($arr);$j++){
                    if($arr[$i] < $arr[$j]){
                        $tmp = $arr[$i];
                        $arr[$i] = $arr[$j];
                        $arr[$j] = $tmp;
                    }
                }
            }
            return $arr;
        }
        if(isset($_POST["submit"])){
            $input = $_POST["input"];
            $arr = explode(",",$input);

            $tangDan = sxTang($arr);
            $giamDan = sxGiam($arr);
            
            $kqTang = implode(", ",$tangDan);
            $kqGiam = implode(", ",$giamDan);
        }
    ?>
    <form action="array_bt6.php" method="post">
        <table id="tbForm">
            <tr>
                <td colspan="2" class="center title">SẮP XẾP MẢNG</td>
            </tr>
            <tr>
                <td>Nhập mảng: </td>
                <td>
                    <input type="text" name="input" required class="text" value="<?php if(isset($input)) echo $input; ?>"><e class="red">(*)</e>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Sắp xếp tăng/giảm" readonly>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="result">
                        <tr>
                            <td colspan="2" class="red">Sau khi sắp xếp:</td>
                        </tr>
                        <tr>
                            <td>Tăng dần: </td>
                            <td>
                                <input type="text" name="tangDan" readonly class="text" value="<?php if(isset($kqTang)) echo $kqTang ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Giảm dần: </td>
                            <td>
                                <input type="text" name="giamDan" readonly class="text" value="<?php if(isset($kqGiam)) echo $kqGiam; ?>">
                            </td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="center"><e class="red">(*) </e>Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
</body>
</html>