<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thi Đại học</title>
    <style>
        table{
            background-color:blanchedalmond;
            width: 370px;
        }
        table #header{
            background-color:deeppink;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST["submit"])){
            $toan = $_POST["toan"];
            $ly = $_POST["ly"];
            $hoa = $_POST["hoa"];
            $diemChuan = $_POST["diemChuan"];
            $tongDiem = 0;
            $tongDiem = $toan + $ly + $hoa;
            $ketQua = "";
            if($toan == 0 || $ly == 0 || $hoa == 0 || $tongDiem<$diemChuan) $ketQua = "Rớt";
            else $ketQua = "Đậu";
        }
    ?>
    <form method="post">
        <table>
            <tr id="header">
                <td colspan="3">
                    KẾT QUẢ THI ĐẠI HỌC
                </td>
            </tr>
            <tr>
                <td>Toán: </td>
                <td>
                    <input type="number" step="any" required name="toan" value="<?php if(isset($toan)) echo $toan; ?>">
                </td>
            </tr>
            <tr>
                <td>Lý: </td>
                <td>
                    <input type="number" step="any" required name="ly" value="<?php 
                        if(isset($ly)) echo $ly; 
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Hóa: </td>
                <td>
                    <input type="number" step="any" required name="hoa" value="<?php if(isset($hoa)) echo $hoa; ?>">
                </td>
            </tr>
            <tr>
                <td>Điểm chuẩn: </td>
                <td>
                    <input type="number" step="any" name="diemChuan" value="20">
                </td>
            </tr>
            <tr>
                <td>Tổng điểm: </td>
                <td>
                    <input readonly type="number" name="tongDiem" value="<?php if(isset($tongDiem)) echo $tongDiem; ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả thi: </td>
                <td>
                    <input readonly type="text" value="<?php 
                        if(isset($ketQua)) echo $ketQua;
                    ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Xem kết quả">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>