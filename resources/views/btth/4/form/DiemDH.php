<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $toan = $_POST['toan'];
            $ly = $_POST['ly'];
            $hoa = $_POST['hoa'];
            $diemchuan = $_POST['diemchuan'];

            if($toan != 0 || $ly != 0 || $hoa = 0){
                if($toan >= 0 and $ly >= 0 and $hoa >= 0){
                    $tongdiem = $toan + $ly +$hoa;
                }
                else echo "Du lieu sai vui long nhap lai";
            }
        }

    ?>
    <form action="DiemDH.php" method="post">
        <table style="background-color: #22cd70;">
            <tr  style="background-color: lightcoral;">
                <td colspan="2"><h1>KET QUA THI DAI HOC</h1></td>
            </tr>
            <tr>
                <td>Toan:</td>
                <td><input type="text" name="toan" value="<?php if(isset($toan)) echo $toan; ?>" required></td>
            </tr>
            <tr>
                <td>Ly:</td>
                <td><input type="text" name="ly" value="<?php if(isset($ly)) echo $ly; ?>" required></td>
            </tr>
            <tr>
                <td>Hoa:</td>
                <td><input type="text" name="hoa" value="<?php if(isset($hoa)) echo $hoa; ?>" required></td>
            </tr>
            <tr>
                <td>Diem chuan:</td>
                <td><input type="text" name="diemchuan" style="color: palevioletred;" value="20" required></td>
            </tr>
            <tr>
                <td>Tong diem:</td>
                <td><input type="text" style="background-color: beige;" name="tongdiem" value="
                <?php
                    if(isset($tongdiem)) echo $tongdiem;
                ?>
                " disabled></td>
            </tr>
            <tr>
                <td>Ket qua thi:</td>
                <td><input type="text" style="background-color: beige;" name="ketquathi" value="
                <?php
                
                    if(isset($tongdiem)){
                        if($tongdiem >= $diemchuan){
                            echo "dau";
                        }
                        else echo "rot";
                    }
                ?>
                " disabled></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><input type="submit" name="submit" value="Kiem tra"></td>
            </tr>
        </table>
    </form>
</body>
</html>