<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp Xếp Dãy Số</title>
    <style>
        #form1{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
            background-color: beige;
        }
        #thead{
            background-color:turquoise;
        }
    </style>
</head>
<body>
<?php
    function sapXepTangDan($arr) {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
        return $arr;
    }    

    function sapXepGiamDan($arr) {
        $n = count($arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($arr[$j] < $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
        return $arr;
    }

    if(isset($_POST['submit'])){
        $mang = $_POST["mang"];
        $mang = explode(",", $mang);

        $isValid = true;
        foreach ($mang as $so) {
            if (!is_numeric($so)) {
                $isValid = false;
                break;
            }
        }

        if (!$isValid) {
            echo "Vui lòng nhập dãy số hợp lệ để sắp xếp.";
        } else {
            $ketQuaTangDan = sapXepTangDan($mang);
            $ketQuaGiamDan = sapXepGiamDan($mang);

            $ketQuaChuoiTangDan = implode(", ", $ketQuaTangDan);
            $ketQuaChuoiGiamDan = implode(", ", $ketQuaGiamDan);
        }
    }
    ?>

    <form action="bai6_array.php" id="form1" method="post">
        <table>
            <th colspan="2" id="thead"><h3>SẮP XẾP MẢNG</h3></th>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type="text" id="mang" value="<?php if(isset($mang)) echo $mang; ?>" name="mang" size="30" required> <font style="color: red;">(*)</font></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Sắp xếp">   
                </td>
            </tr>
            <tr>
                <td>Sau khi sắp xếp</td>
            </tr>
            <tr>
                <td>Mảng tăng dần:</td>
                <td>
                    <input type="text" name="tangdan" 
                        value="<?php if(isset($ketQuaChuoiTangDan)) echo $ketQuaChuoiTangDan; ?>" size="30">
                </td>
            </tr>
            <tr>
                <td>Mảng giảm dần:</td>
                <td>
                    <input type="text" name="giamdan" 
                        value="<?php if(isset($ketQuaChuoiGiamDan)) echo $ketQuaChuoiGiamDan; ?>" size="30">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <font color="red">(*)</font> Các số được nhập cách nhau bằng dấu ","
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
