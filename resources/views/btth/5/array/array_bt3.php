<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #form{
            width: 500px;
            border: 1px solid black;
            background-color: lightblue;
            
        }
        .center{
            text-align: center;
        }
        .title{
            font-size: 20px;
            font-weight: bold;
            background-color:cornflowerblue;
        }
        .bg-red{
            background-color:lightcoral;
            width: 100px;
        }
        .arr{
            background-color:lightcoral;
            width: 250px;
        }
        .td-left{
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_POST["submit"])){
            $n = $_POST["soPhanTu"];
            
            $min = 0;
            $tongMang = 0;

            $dem = 0;
            $arr = array();
            while($dem < $n){
                $arr[$dem] = rand(0,20);
                $dem++;
            }
            $max = $arr[0];
            $min = $arr[0];
            for($i=0;$i<count($arr);$i++){
                if($max < $arr[$i]) $max = $arr[$i];
                if($min > $arr[$i]) $min = $arr[$i];
                $tongMang += $arr[$i];
            }

            $mang = implode(" ", $arr);
        }
    ?>
    <form action="array_bt3.php" name="formPhatSinhMang" method="post">
        <table id="form">
            <tr>
                <td class="center title" colspan="2">
                    PHÁT SINH MẢNG VÀ TÍNH TOÁN
                </td>
            </tr>
            <tr>
                <td class="td-left">
                    <e class="td-left">Nhập số phần tử:</e>
                </td>
                <td>
                    <input type="number" min="1" name="soPhanTu" value="<?php if(isset($n)) echo $n; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Phát sinh và tính toán">
                </td>
            </tr>
            <tr>
                <td>
                    <e class="td-left">Mảng:</e>
                </td>
                <td>
                    <input type="text" readonly name="mang" value="<?php if(isset($mang)) echo $mang; ?>" class="arr">
                </td>
            </tr>
            <tr>
                <td>
                    <e class="td-left">GTLN(MAX) trong mảng:</e> 
                </td>
                <td>
                    <input type="text" readonly name="gtMax" value="<?php if(isset($max)) echo $max; ?>" class="bg-red">
                </td>
            </tr>
            <tr>
                <td>
                    <e class="td-left">TTNN(MIN) trong mảng:</e>
                </td>
                <td>
                    <input type="text" readonly name="gtMin" value="<?php if(isset($min)) echo $min; ?>" class="bg-red">
                </td>
            </tr>
            <tr>
                <td>
                    <e class="td-left">Tổng mảng:</e>
                </td>
                <td>
                    <input type="text" readonly name="tongMang" value="<?php if(isset($tongMang)) echo $tongMang; ?>" class="bg-red">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="center">(<e>Ghi chú:</e> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</p>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>