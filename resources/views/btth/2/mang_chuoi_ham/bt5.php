<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 5</title>
</head>
<body>
<?php
    function change_arr($arr, $cu, $moi){
        for($i = 0; $i < count($arr); $i++){
            if($arr[$i] == $cu) $arr[$i] = $moi;
        }
        return $arr;
    }
?>
<?php
    if(isset($_POST['submit'])){
        $n = $_POST['so'];
        $gt1 = $_POST['gtctt'];
        $gt2 = $_POST['gttt'];
    
        $arr = explode(',', $n);
        $kq = implode(" ", $arr);
        $arr2 = change_arr($arr, $gt1, $gt2);
        $kqtt = implode(" ", $arr2);
    }
?>
    <form action="" method="post">
        <table style="width: 30%" align="center" bgcolor="#FBF4FD">
            <tr>
                <td align="center" bgcolor="#96206E" colspan="2"><h1>THAY THẾ</h1></td>
            </tr>
            <tr bgcolor="#F8D7EF">
                <td>Nhập các phần tử:</td>
                <td><input style="width: 85%" type = "text" name = "so" value="<?php if (isset($n)) echo $n;?>">
                </td>
            </tr>
            <tr bgcolor="#F8D7EF">
                <td>Giá trị cần thay thế: </td>
                <td><input style="width: 40%" type = "text" name = "gtctt" value="<?php if (isset($gt1)) echo $gt1;?>">
                </td>
            </tr>
            <tr bgcolor="#F8D7EF">
                <td>Giá trị thay thế: </td>
                <td><input style="width: 40%" type = "text" name = "gttt" value="<?php if (isset($gt2)) echo $gt2;?>">
                </td>
            </tr>
            <tr bgcolor="#F8D7EF">
                <td></td>
                <td>
                    <input style="background: #FFFDB0" type = "submit" name = "submit" value = "Thay thế">
                </td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td>
                    <input style="background: #F1ACA7; width: 85%" type = "text" name = "mangcu" value="<?php if(isset($kq)) echo $kq?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế:</td>
                <td>
                    <input style="background: #F1ACA7; width: 85%" type = "text" name = "mangmoi" value="<?php if(isset($kqtt)) echo $kqtt?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">(<span style="color:red;"><b>Ghi chú:</b> </span>Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>