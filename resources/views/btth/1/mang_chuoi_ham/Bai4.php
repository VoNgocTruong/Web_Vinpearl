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
    $msg = "";
    function find_arr($arr,$n)
    {
        global $msg;
        $count = 0;
        foreach($arr as $value) {
            if($value == $n)
            return $count;
            $count++;
        }
        $msg = "Không tìm thấy số trong mảng!";
    }
    ?>
    <?php
    if (isset($_POST['submit'])) {
        $arr = $_POST['dayso'];
        $n = $_POST['socantim'];
        if(empty($arr)) {
            $msg = "Không được để trống mảng!";
        } elseif(empty($n)) {
            $msg = "Không được để trống số!";
        } else {
            $check = true;
            $newArr = explode(',', $arr);
            foreach($newArr as $value) {
                if(!is_numeric($value)) {
                    $check = false;
                    $msg = "Có phần tử không phải là số!";
                } else {
                    $oldArr = implode(",", $newArr);
                    $find = find_arr($newArr,$n);
                }
            }
        }
    }
    ?>
    <form action="Bai4" method="post">
        <table align="center" bgcolor="#D1DED4">
            <tr>
                <td align="center" bgcolor="#32999B" colspan="2">
                    <h1>TÌM KIẾM</h1>
                </td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td><input style="width: 300px;" type="text" name="dayso" value="<?php if (isset($oldArr))
                    echo $oldArr; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập số cần tìm:</td>
                <td><input type="text" name="socantim" value="<?php if (isset($n))
                    echo $n; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Tìm kiếm">
                </td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td>
                    <input style="width: 300px;" type="text" disabled value="<?php if (isset($oldArr))
                        echo $oldArr ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kết quả tìm kiếm:</td>
                    <td><input style="width: 300px; background-color:#CDFBFA" type="text" name="tongmang" style="color:red;"
                            value="<?php if (isset($find))
                        echo "Tìm thấy " . $n . " tại vị trí thứ " . $find . " của mảng"; ?>"
                        disabled>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#32999B" colspan="2">(Các phần tử trong mảng cách nhau bằng dấu ",")</td>
            </tr>
            <tr>
                <td align="center" colspan="2"><span style="color:red;"><?php echo $msg ?></span></td>
            </tr>
        </table>
    </form>
</body>

</html>
