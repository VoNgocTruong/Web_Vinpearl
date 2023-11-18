<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện tích hình chữ nhật</title>
</head>
<body>
    <?php 
        if(isset($_POST["submit"])){
            $cd = $_POST["cd"];
            $cr = $_POST["cr"];
            if($cd <= 0 || $cr <= 0) echo "Không được nhập giá trị <=0!";
            elseif($cd < $cr) echo "Chiều dài phải lớn hơn chiều rộng!";
            else $dt = $cd * $cr;
        }
    ?>
    <form method="post">
        <table style="width: 300px; background-color:antiquewhite;">
            <tr style="background-color:burlywood; text-align:center;">
                <td colspan="2">DIỆN TÍCH HÌNH CHỮ NHẬT</td>
            </tr>
            <tr>
                <td>Chiều dài</td>
                <td><input type="number" name="cd" step="any" value="<?php if(isset($cd)) echo $cd; ?>"></td>
            </tr>
            <tr>
                <td>Chiều rộng</td>
                <td><input type="number" name="cr" step="any" value="<?php if(isset($cr)) echo $cr; ?>"></td>
            </tr>
            <tr>
                <td>Diện tích</td>
                <td><input readonly type="number" step="any" value="<?php echo $dt; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" step="any" value="Tính"></td>
            </tr>
        </table>
    </form>
</body>
</html>