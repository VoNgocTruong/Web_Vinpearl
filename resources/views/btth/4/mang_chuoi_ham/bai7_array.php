<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Năm Âm Lịch</title>
    <style>
        #form1{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
            background-color: beige;
        }
        #thead{
            background-color:turquoise;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_POST['namDuongLich'])) {
        $namDuongLich = $_POST['namDuongLich'];

        if (!is_numeric($namDuongLich)) {
            echo "Năm Dương lịch phải là số.";
        } else {
            $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
            
            $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
            
            $mang_hinh = array("hoi.jpg", "ti.jpg", "suu.jpg", "dan.jpg", "meo.jpg", "thin.jpg", "ty.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");
            
            $namDuongLich = $namDuongLich - 3;
            $can = $namDuongLich % 10;
            $chi = $namDuongLich % 12;
            
            $nam_am_lich = $mang_can[$can] . " " . $mang_chi[$chi];
            
            $hinh_anh = "conGiap/" . $mang_hinh[$chi];
        }
    }
    ?>
    
    <form action="bai7_array.php" id="form1" method="post">
        <table>
            <th colspan="2" id="thead">
                <h1>Tính Năm Âm Lịch</h1>
            </th>
            <tr>
                <td>
                    Năm Dương lịch:
                </td> 
                <td>
                    <input type="text" name="namDuongLich" size="30" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="calculate" value="=>">
                </td>
            </tr>
            <tr>
                <td>Năm âm lịch:</td>
                <td>
                    <input type="text" name="namAmLich" value="<?php if (isset($nam_am_lich)) echo $nam_am_lich; ?>" size="30" disabled style="color: red;">
                </td>
            </tr>
            <tr>
                <td>Hình ảnh con vật:</td>
                <td>
                    <?php if (isset($hinh_anh)) echo "<img src='$hinh_anh' alt='Con Vật'>"; ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
