<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tbForm{
            width: 450px;
            background-color: lightblue;
            height: 200px;
        }
        .text{
            width: 270px;
        }
        .center{
            text-align: center;
        }
        .title{
            font-size: 20px;
            font-weight: bold;
            
        }
        .footer{
            background-color: cornflowerblue;
        }
        .color-red{
            color:red;
        }
    </style>
</head>
<body>
    <?php
        
        if(isset($_POST["thay"])){
            $input = $_POST["inputMang"];
            $canThay = $_POST["giaTriCanThay"];
            $thay = $_POST["giaTriThay"];

            $arr = explode(",", $input);
            $tmp = $arr;
            for($i=0;$i<count($tmp);$i++){
                if($tmp[$i]==$canThay) $tmp[$i] = $thay;
            }

            $ketQua = implode(",", $tmp);
        }
        if(isset($_POST["xoa"])){
            $_POST["mang"] = "";
            $_POST["inputMang"] = "";
            $_POST["giaTriCanThay"] = "";
            $_POST["giaTriThay"] = "";
            $_POST["ketQua"] = "";
        }
    ?>
    <form action="array_bt5.php" method="post" name="ten">
        <table id="tbForm">
            <tr>
                <td colspan="2" class="center title footer">
                    THAY THẾ
                </td>
            </tr>
            <tr>
                <td>Nhập các phần tử: </td>
                <td><input type="text" name="inputMang" required value="<?php if(isset($input)) echo $input; ?>" class="text"></td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế: </td>
                <td><input type="number" name="giaTriCanThay" required pattern="[0-9]+" value="<?php if(isset($canThay)) echo $canThay; ?>"></td>
            </tr>
            <tr>
                <td>Giá trị thay thế: </td>
                <td><input type="number" name="giaTriThay" required pattern="[0-9]+" value="<?php if(isset($thay)) echo $thay; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="thay" value="Thay thế" >
                    <input type="submit" name="xoa" value="Xóa" >
                </td>
            </tr>
            <tr>
                <td>Mảng cũ: </td>
                <td><input type="text" name="mang" readonly value="<?php if(isset($input)) echo $input; ?>" class="text"></td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế: </td>
                <td><input type="text" name="ketQua" readonly value="<?php if(isset($ketQua)) echo $ketQua; ?>" class="text color-red"></td>
            </tr>
            <tr>
                <td colspan="2" class="footer center">(Các phần tử trong mảng sễ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>