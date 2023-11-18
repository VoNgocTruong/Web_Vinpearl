<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát Sinh Mảng</title>
    <style>
        #form1{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
            background-color: beige;
        }
        #thead{
            background-color:rosybrown;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
        $soluong = $_POST['soluong'];

        function taoMang($n) {
            $mang = [];
            for ($i = 0; $i < $n; $i++) {
                $mang[] = rand(0, 20);
            }
            return $mang;
        }

        function xuatMang($mang) {
            echo implode(", ", $mang);
        }

        function timMin($mang) {
            return min($mang);
        }
    
        function timMax($mang) {
            return max($mang);
        }

        function tinhTong($mang) {
            return array_sum($mang);
        }

        $mang = taoMang($soluong);

    }
    ?>
    <form action="bai3_array.php" id="form1" method="post">
        <table id="tb1">
            <th colspan="2" id="thead">
                <h1>Phát Sinh Mảng</h1>
            </th>
            <tr>
                <td>
                    Nhập số lượng phần tử:
                </td> 
                <td>
                    <input type="number" id="soluong" name="soluong" size="50" value="<?php if(isset($mang)) echo xuatMang($mang)?>" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Phát sinh và tính toán"></input>
                </td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td>
                    <input type="text" name="mang" value="<?php if(isset($mang)) xuatMang($mang);?>" size="30" disabled>
                </td>
            </tr>
            <tr>
                <td>GTLN: </td>
                <td>
                    <input type="text" name="max" value="<?php if(isset($mang)) echo timMax($mang);?>" size="30" disabled>
                </td>
            </tr>
            <tr>
                <td>GTNN: </td>
                <td>
                    <input type="text" name="min" value="<?php if(isset($mang)) echo timMin($mang);?>" size="30" disabled>
                </td>
            </tr>
            <tr>
                <td>Tổng mảng: </td>
                <td>
                    <input type="text" name="tong" value="<?php if(isset($mang)) echo tinhTong($mang)?>" size="30" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    (<font color="red">Ghi chú:</font> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
