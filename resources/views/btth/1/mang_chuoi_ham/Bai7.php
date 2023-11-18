<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7</title>
</head>

<body>
    <?php
    $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("Hoi.jpg", "Ty.jpg", "Suu.jpg", "Dan.jpg", "Mao.jpg", "Thin.jpg", "Ran.jpg", "Ngo.jpg", "Mui.jpg", "Than.jpg", "Dau.jpg", "Tuat.jpg");

    if (isset($_POST['submit'])) {
        $year = $_POST['nam'];
        $year1 = $year - 3;
        $can = $year1 % 10;
        $chi = $year1 % 12;
        $namal = $mang_can[$can] . " " . $mang_chi[$chi];
        $hinh = $mang_hinh[$chi];
        $img = "<img src='/hinhBTTH/1/img/$hinh' width='150px' height='150px'>";
    }
    ?>
    <form action="Bai7" method="post" style="box-sizing: border-box">
        <table align="center" bgcolor="skyblue">
            <tr>
                <td align="center" bgcolor="#0D62C8" colspan="2">
                    <h1 style="color: white;">TÍNH NĂM ÂM LỊCH</h1>
                </td>
            </tr>
            <tr>
                <td style="display: flex; justify-content: space-between; padding: 0px 25px;">
                    <p>Năm dương lịch</p>
                    <p>Năm âm lịch</p>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nam" style="width:auto;" value="<?php if (isset($year))
                        echo $year; ?>">
                    <input type="submit" name="submit" value="=>">
                    <input type="text" name="namal" style="width:auto;" value="<?php if (isset($namal))
                        echo $namal ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                    <?php if (isset($img))
                        echo $img ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
