<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin khách hàng</title>
    <style>
        .bt{
            text-decoration: none;
            color: black;
        }
        .bt:visited{
            color:black;
        }
    </style>
</head>
<body>
    <?php
        include"connect_db.php";
        $maKH = $_GET['maKH'];
        $khachHang = mysqli_query($conn, "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$maKH'");
        $row = mysqli_fetch_array($khachHang);

        $maKH = $row['Ma_khach_hang'];
        $tenKH = $row['Ten_khach_hang'];
        $phai = $row['Phai'];
        $diaChi = $row['Dia_chi'];
        $sdt = $row['Dien_thoai'];
        $email = $row['Email'];
        

        
        if(isset($_GET['capNhat'])){
            $maKH = $_GET['maKH'];
            $tenKH = $_GET['tenKhachHang'];
            $phai = $_GET['phai'];
            $diaChi = $_GET['diaChi'];
            $sdt = $_GET['sdt'];
            $email = $_GET['email'];

            $querry = "UPDATE `khach_hang` SET `Ten_khach_hang` = '$tenKH', `Phai` = '$phai', `Dia_chi` = '$diaChi', `Email` = '$email' WHERE `khach_hang`.`Ma_khach_hang` = '$maKH'";
            $updateKhachHang = mysqli_query($conn, $querry);
        }
    ?>
    <form action="" method="get">
        <table>
            <tr>
                <td colspan="2">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</td>
            </tr>
            <tr>
                <td>Mã khách hàng: </td>
                <td>
                    <input type="text" name="maKH" readonly id="" value="<?php if(isset($maKH)) echo $maKH; ?>">
                </td>
            </tr>
            <tr>
                <td>Tên khách hàng: </td>
                <td>
                    <input type="text" name="tenKhachHang" id="" value="<?php if(isset($tenKH)) echo $tenKH; ?>">
                </td>
            </tr>
            <tr>
                <td>Phái: </td>
                <td>
                    <?php 
                        if($phai == 0){
                            echo "<input type='radio' value='0' name='phai' checked> Nam";
                            echo "<input type='radio' value='1' name='phai'> Nữ";
                        }
                        else{
                            echo "<input type='radio' value='0' name='phai'> Nam";
                            echo "<input type='radio' value='1' name='phai' checked> Nữ";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td>
                    <input type="text" name="diaChi" id="" value="<?php if(isset($diaChi)) echo $diaChi; ?>">
                </td>
            </tr>
            <tr>
                <td>Điện thoại: </td>
                <td>
                    <input type="text" name="sdt" id="" value="<?php if(isset($sdt)) echo $sdt;  ?>">
                </td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>
                    <input type="text" name="email" id="" value="<?php if(isset($email)) echo $email; ?>">
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type="submit" name="capNhat" value="Cập nhật">
                    <button><a class='bt' href="sua_xoa_khachhang.php">Hủy</a></button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>