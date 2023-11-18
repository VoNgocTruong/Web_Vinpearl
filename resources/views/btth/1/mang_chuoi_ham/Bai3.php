<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3</title>
</head>

<body>
    <?php
    $msg = "";
    $kq = "";
    $arr = array();
    function init_array($n)
    {
        global $msg, $arr;
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = rand(0, 20);
        }
    }
    function output_array($arr)
    {
        global $kq;
        $kq = implode(" ", $arr);
    }
    function min_arr($arr)
    {
        $min = $arr[0];
        foreach ($arr as $value) {
            if ($value < $min)
                $min = $value;
        }
        return $min;
    }

    function max_arr($arr)
    {
        $max = $arr[0];
        foreach ($arr as $value) {
            if ($value > $max)
                $max = $value;
        }
        return $max;
    }

    function sum_arr($arr)
    {
        $sum = 0;
        foreach ($arr as $value) {
            $sum = $sum + $value;
        }
        return $sum;
    }
    if (isset($_POST['submit'])) {
        $n = $_POST['so'];
        if(is_numeric($n) && $n > 0) {
            init_array($n);
            output_array($arr);
            $min = min_arr($arr);
            $max = max_arr($arr);
            $sum = sum_arr($arr);
        } else {
            $msg = "Số không hợp lệ!";
        }
    }
    ?>
    <form action="Bai3" method="post">
        <table align="center" bgcolor="#F7F3F7">
            <tr>
                <td bgcolor="#A70E76" colspan="2">
                    <h1>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h1>
                </td>
            </tr>
            <tr bgcolor="#FDD9F5">
                <td>Nhập số phần tử:</td>
                <td><input type="text" name="so" value="<?php if (isset($n))
                    echo $n; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Phát sinh và tính toán">
                </td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td>
                    <input type="text" value="<?php if (isset($kq))
                        echo $kq ?>" disabled style="width: 300px; background-color: #F5A5A1;">
                    </td>
                </tr>
                <tr>
                    <td>GTLN (MAX) trong mảng:</td>
                    <td><input style="background-color: #F5A5A1;" type="text" name="gtln" value="<?php if (isset($max))
                        echo $max; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>GTNN (MIN) trong mảng:</td>
                <td><input style="background-color: #F5A5A1;" type="text" name="gtnn" value="<?php if (isset($min))
                    echo $min; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td><input style="background-color: #F5A5A1;" type="text" name="tongmang" value="<?php if (isset($sum))
                    echo $sum; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#F7F3F7" colspan="2">(<span style="color:red;">Ghi chú: </span>Các phần tử
                    trong mảng có giá trị từ 0-20)
                </td>
                <tr>
                <td align="center" colspan="2"><span style="color:red;"><?php echo $msg ?></span></td>
            </tr>
            </tr>
        </table>
    </form>
</body>

</html>
