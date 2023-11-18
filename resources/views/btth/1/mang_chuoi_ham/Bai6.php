<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai6</title>
</head>

<body>
    <?php
    function bubbleSortAscending($arr) {
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
    function bubbleSortDescending($arr) {
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
    $msg = "";
    if(isset($_POST['submit'])) {
        $stringNumber = $_POST['dayso'];
        if(empty($stringNumber)) $msg = "Không được để trống dãy số!";
        else {
            $newArr = explode(",",$stringNumber);
            $check = true;
            foreach($newArr as $val) {
                if(!is_numeric($val)) {
                    $msg = "Có phần tử không phải là số!";
                    $check = false;
                }
            }
            if($check) {
                $sortAscending = bubbleSortAscending($newArr);
                $sortAscending = implode(",",$sortAscending);
                $sortDescending = bubbleSortDescending($newArr);
                $sortDescending = implode(",",$sortDescending);
            }
        }
    }
    ?>
    <form action="Bai6" method="post">
        <table align="center" bgcolor="#D1DED4">
            <tr>
                <td align="center" bgcolor="#319999" colspan="2">
                    <h1>SẮP XẾP MẢNG</h1>
                </td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td><input style="width: 300px;" type="text" name="dayso" style="width:auto;" value="<?php if (isset($stringNumber))
                    echo $stringNumber; ?>"><span
                        style="color:red;"> (*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Sắp xếp tăng/giảm">
                </td>
            </tr>
            <tr>
                <td style="color:red">Sau khi sắp xếp:</td>
                <td></td>
            </tr>
            <tr>
                <td>Tăng dần:</td>
                <td>
                    <input style="width: 300px;" type="text" name="tangdan" style="width:auto;" value="<?php if (isset($sortAscending))
                        echo $sortAscending ?>"
                            disabled>
                    </td>
                </tr>
                <tr>
                    <td>Giảm dần:</td>
                    <td>
                        <input style="width: 300px;" type="text" name="giamdan" style="width:auto;" value="<?php if (isset($sortDescending))
                        echo $sortDescending ?>"
                            disabled>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><span style="color:red;">(*) </span>Các phần tử trong mảng cách nhau bằng
                        dấu ","</td>
                </tr>
                <tr>
                <td align="center" colspan="2"><span style="color:red;"><?php echo $msg ?></span></td>
            </tr>
            </table>
        </form>
    </body>

    </html>
