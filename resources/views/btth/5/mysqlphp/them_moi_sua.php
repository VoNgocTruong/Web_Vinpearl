<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #form{
            background-color: lightblue;
        }
        .tdl{
            width: 180px;
        }
        textarea{
            resize: none;
        }
        .title{
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            color:white;
            font-size: 20px;
            background-color:deepskyblue;
        }
        .center{
            text-align: center;
        }
        .successText{
            padding: 30px 0 0 30px;
            font-weight: bold;
            font-size: 20px;
        }
        .ketQua{
            border: 1px solid black;
        }
        .tenSua{
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            color:burlywood;
        }
        .center{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php 
        include"connect_db.php";
        
        function autoID($string, $index){
            $num = 6 - strlen($string) - strlen($index);
            for($i=0;$i<$num;$i++){
                $string .= '0';
            }
            return $string.=$index+1;
        }
        if(isset($_GET["themMoi"])){
            $tenSua = $_GET["tenSua"];
            $hangSua = $_GET["hangSua"];
            $loaiSua = $_GET["loaiSua"];
            $trongLuong = $_GET["trongLuong"];
            $donGia = $_GET["donGia"];
            $tpDinhDuong = $_GET["thanhPhanDinhDuong"];
            $loiIch = $_GET["loiIch"];
            $hinh = $_GET["hinhAnh"];
            
            
            $suaCungHang = mysqli_query($conn, "SELECT Ma_hang_sua FROM sua WHERE Ma_hang_sua = '$hangSua'");

            $maSua = autoID($hangSua, mysqli_num_rows($suaCungHang));

            $insert = mysqli_query($conn, "INSERT INTO `sua` (`Ma_sua`, `Ten_sua`, `Ma_hang_sua`, `Ma_loai_sua`, `Trong_luong`, `Don_gia`, `TP_Dinh_Duong`, `Loi_ich`, `Hinh`) VALUES ('$maSua', '$tenSua', '$hangSua', '$loaiSua', '$trongLuong', '$donGia', '$tpDinhDuong', '$loiIch', '$hinh')");
        }
    ?>
    <form action="" method="get">
        <table id='form'>
            <tr>
                <td colspan="2" class='title center'>
                    THÊM MỚI SỮA
                </td>
            </tr>
            <tr>
                <td class="tdl"><label for="hangSua">Hãng sữa: </label></td>
                <td>
                    <select name="hangSua" id="">
                        <option value="AB"<?php if(isset($hangSua)) if($hangSua=='AB') echo "selected"; ?>>Abbott</option>
                        <option value="DL"<?php if(isset($hangSua)) if($hangSua=='DL') echo "selected"; ?>>Dutch Lady</option>
                        <option value="DS"<?php if(isset($hangSua)) if($hangSua=='DS') echo "selected"; ?>>Daisy</option>
                        <option value="MJ"<?php if(isset($hangSua)) if($hangSua=='MJ') echo "selected"; ?>>Mead Jonhson</option>
                        <option value="NTF"<?php if(isset($hangSua)) if($hangSua=='NTF') echo "selected"; ?>>Nutifood</option>
                        <option value="VNM" <?php if(isset($hangSua)) if($hangSua=='VNM') echo "selected"; ?>>Vinamilk</option>
                    </select> 
                </td>
            </tr>
            <tr>
                <td>Tên sữa: </td>
                <td><input type="text" required name="tenSua"  value="<?php if(isset($tenSua)) echo $tenSua; ?>"></td>
            </tr>
            <tr>
                <td><label for="loaiSua">Loại sữa: </label></td>
                <td>
                    <select name="loaiSua" id="">
                        <option value="SB" <?php if(isset($loaiSua)) if($loaiSua=='SB') echo "selected"; ?>>Sữa bột</option>
                        <option value="SC" <?php if(isset($loaiSua)) if($loaiSua=='SC') echo "selected"; ?>>Sữa chua</option>
                        <option value="SD" <?php if(isset($loaiSua)) if($loaiSua=='SD') echo "selected"; ?>>Sữa đặc</option>
                        <option value="ST" <?php if(isset($loaiSua)) if($loaiSua=='ST') echo "selected"; ?>>Sữa tươi</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trọng lượng: </td>
                <td><input type="number" required min="0" pattern="[0-9]" name="trongLuong" value="<?php if(isset($trongLuong)) echo $trongLuong; ?>"></td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input type="number" required min="1000" name="donGia" value="<?php if(isset($donGia)) echo $donGia; ?>"></td>
            </tr>
            <tr>
                <td>Thành phần dinh dưỡng: </td>
                <td>
                    <textarea name="thanhPhanDinhDuong"  value="<?php if(isset($tpDinhDuong)) echo $tpDinhDuong; ?>" cols="30" rows="2"></textarea>
                </td>
            </tr>
            <tr>
                <td>Lợi ích: </td>
                <td>
                    <textarea name="loiIch" value="<?php if(isset($loiIch)) echo $loiIch; ?>" cols="30" rows="2"></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh: </td>
                <td>
                    <input type="file" name="hinhAnh" class='fileInput' value="<?php if(isset($hinh)) echo $hinh; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="themMoi" value="Thêm mới"></td>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($insert)){
            if($insert){
                echo "<p class='successText'>Thêm mới thành công!</p>";
                echo "<table>";
                echo "<tr>";
                    echo "<td colspan='2' class='tenSua center'>".$tenSua." - ".$maSua."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td class='bl'><img src='./Hinh_sua/".$hinh."' width='200' height='200' alt=''></td>";
                    echo "<td class='bl'>";
                    echo "<p><b>Thành phần dinh dưỡng:</b><br>
                            ".$tpDinhDuong."<br>
                            <b>Lợi ích:</b><br>
                            ".$loiIch."<br>
                            <b>Trọng lượng:</b> ".$trongLuong."gr - <b>Đơn giá:</b> ".$donGia."VND
                        </p>";
                    echo "</td></tr>";
                echo "</table>";
            }
        }
    ?>
</body>
</html>