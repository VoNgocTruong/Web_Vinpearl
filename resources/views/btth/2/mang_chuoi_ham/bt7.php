<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 7</title>
</head>
<body>
<?php
    $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("Hoi.jpg", "Ty.jpg", "Suu.jpg", "Dan.jpg", "Mao.jpg", "Thin.jpg", "Ran.jpg", "Ngo.jpg", "Mui.jpg", "Than.jpg", "Dau.jpg", "Tuat.jpg");

    if(isset($_POST['submit'])){
        $nam = $_POST['nam'];
        
        $can = ($nam-3)%10;
        $chi = ($nam-3)%12;
        $namal = $mang_can[$can] . " " . $mang_chi[$chi];
        $hinh = $mang_hinh[$chi];
        $img = "<img src='http://localhost/php/Array_String_Function/img/$hinh' width='150px' height='150px'>";
    }
?>
    <form action="" method="post">
        <table align="center" bgcolor="#C4ECFD">
            <tr>
                <td align="center" bgcolor="#2D64C3" colspan="2"><h1>TÍNH NĂM ÂM LỊCH</h1></td>
            </tr>
            <tr>
                <td>
                        Năm dương lịch
                    <div style="float: right;">
                        Năm âm lịch
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type = "number" name = "nam" style="width:auto;" value="<?php if (isset($nam)) echo $nam;?>">
                    <input style="background: #FDFCDC" type = "submit" name = "submit" value = "=>">
                    <input style="background: #FDFCDC; color: red" type = "text" name = "mangcu" style="width:auto;" value="<?php if(isset($namal)) echo $namal?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="center"><?php if(isset($img)) echo $img?></td>
            </tr>
        </table>
    </form>
</body>
</html>