<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 4</title>
</head>
<body>
<?php
    function find_arr($arr, $findValue) {
        foreach ($arr as $key => $value) {
            if ($value == $findValue) {
                return $key; // Trả về vị trí đầu tiên của giá trị tìm thấy trong mảng
            }
        }
        return -1; // Trả về -1 nếu không tìm thấy giá trị trong mảng
    }
?>
<?php
    if(isset($_POST['submit'])){
        $n = $_POST['value'];
        $findValue = $_POST['findValue'];
    
        $arr = explode(',', $n);
        $kq = implode(",", $arr); 
        $find = find_arr($arr, $findValue);
    }
?>
    <form action="bt4.php" method="post">
        <table style="background: #D3DED5; width: 30%" align="center">
            <tr>
                <td align="center" bgcolor="#51979C" colspan="2"><h1>TÌM KIẾM</h1></td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type = "text" name = "value" value="<?php if (isset($n)) echo $n;?>">
                </td>
            </tr>
            <tr>
                <td>Nhập số cần tìm:</td>
                <td><input type = "text" name = "findValue" value="<?php if (isset($findValue)) echo $findValue;?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input style="background: #A6CEF8" type = "submit" name = "submit" value = "Tìm kiếm">
                </td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td>
                    <input name="" id="mang" cols="25" rows="1" value="<?php if(isset($kq)) echo $kq?>" readonly></input>
                </td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm:</td>
                <td><input style="background: #D6FAFA; color: red" type="text" name="tongmang" value="<?php 
                    if(!empty($findValue)){
                        if (isset($find) && $find != -1){
                            echo "Tìm thấy " . $findValue . " tại vị trí thứ " . ($find + 1) . " của mảng";
                        }else{
                            echo "Không tìm thấy " . $findValue . " trong mảng trên!";
                        }
                    }else{
                        echo "Không được để trống giá trị cần tìm!";
                    }
                ?>" readonly>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#8BCDD1" colspan="2">(Các phần tử trong mảng cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>