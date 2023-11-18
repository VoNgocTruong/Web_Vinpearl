<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .center{
            text-align: center;
            font-weight: bold;
        }
        .title{
            font-size: 20px;
            background-color: #0000ff57;
            font-family: 'Courier New', Courier, monospace;
        }
        .input{
            width: 150px;
        }
        .img{
            width: 80%;
        }
        #form{
            width:320px;
            background-color: lightblue;
            border: 2px solid #0000ff57;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_POST["submit"])){
            $nam = $_POST["duongLich"];
            $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
            $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Muồi", "Thân", "Dậu", "Tuất");
            $mang_hinh = array("hoi.png", "ty.png", "suu.png", "dan.png", "mao.png", "thin.png", "ty.png", "ngo.png", "muoi.png", "than.png", "dau.png", "tuat.png");
            
            
            $tmp = $nam;
            $tmp -= 3;
            $can = $tmp%10;
            $chi = $tmp%12;

            $nam_al = $mang_can[$can]. " ". $mang_chi[$chi];

            $hinhAnh = $mang_hinh[$chi];
            $image = "./assets/$hinhAnh";
        }
    ?>
    <form action="array_bt7.php" method="post">
        <table id="form">
            <tr>
                <td colspan="3" class="title center">TÍNH NĂM ÂM LỊCH</td>
            </tr>
            <tr>
                <td class="bold center">Năm dương lịch</td>
                <td></td>
                <td class="bold center">Năm âm lịch</td>
            </tr>
            <tr>
                <td><input type="number" name="duongLich" required max="2050" min="1" value="<?php if(isset($nam)) echo $nam; ?>" class="input"></td>
                <td><input type="submit" value="=>" name="submit"></td>
                <td><input type="text" readonly value="<?php if(isset($nam_al)) echo $nam_al; ?>" class="input"></td>
            </tr>
            <tr>
                <td colspan="3" class="center">
                    <img class="img" src="<?php if(isset($nam_al)) echo $image ?>" alt="">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>