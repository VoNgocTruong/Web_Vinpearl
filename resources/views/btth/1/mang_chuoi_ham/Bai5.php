<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
</head>

<body>
    <?php
    function changeArr($arr, $new, $old)
    {
        foreach($arr as &$value) {
            if($value == $old)
            $value = $new;
        }
        return $arr;
    }
    ?>
    <?php
    $msg = "";
    if (isset($_POST['submit'])) {
        $stringNumber = $_POST['dayso'];
        $old = $_POST['gtctt'];
        $new = $_POST['gttt'];
        if(empty($stringNumber) || empty($old) || empty($new)) {
            $msg = "Không được để trống các trường!";
        } elseif(!is_numeric($old) || !is_numeric($new)) {
            $msg .= "Giá trị thay thế và được thay thế phải là số!";
        } else {
            $arr = explode(',', $stringNumber);
            foreach($arr as $value) {
                if(!is_numeric($value)) {
                    $msg .= "Có giá trị trong mảng k phải là số!";
                } else {
                    $newArr = changeArr($arr, $new, $old);
                    $result = implode(", ", $newArr);
                }
            }
        }
    }
    ?>
    <form action="Bai5" method="post">
        <table align="center" bgcolor="#FED6F1">
            <tr>
                <td align="center" bgcolor="#A00B6D" colspan="2">
                    <h1 style="color:white">THAY THẾ</h1>
                </td>
            </tr>
            <tr>
                <td>Nhập các phần tử:</td>
                <td><input style="width: 300px;" type="text" name="dayso" value="<?php if (isset($stringNumber))
                    echo $stringNumber; ?>">
                </td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế:</td>
                <td><input style="width: 300px;" type="text" name="gtctt" value="<?php if (isset($old))
                    echo $old; ?>">
                </td>
            </tr>
            <tr>
                <td>Giá trị thay thế:</td>
                <td><input style="width: 300px;" type="text" name="gttt" value="<?php if (isset($new))
                    echo $new; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Thay thế">
                </td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td>
                    <input style="width: 300px;background-color: #E99794" type="text" name="mangcu" value="<?php if (isset($stringNumber))
                        echo $stringNumber ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Mảng sau khi thay thế:</td>
                    <td>
                        <input style="width: 300px; background-color:#E99794" type="text" name="mangmoi" value="<?php if (isset($result))
                        echo $result ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">(<span style="color:red;">Ghi chú: </span>Các phần tử trong mảng cách
                        nhau bằng dấu ",")</td>
                </tr>
                <tr>
                <td align="center" colspan="2"><span style="color:red;"><?php echo $msg ?></span></td>
            </tr>
            </table>
        </form>
    </body>

    </html>
