<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa thông tin khách hàng</title>
    <style>
        .bt{
            text-decoration: none;
            color: black;
        }
        .bt:visited{
            color:black;
        }
        h4{
            color: red;
        }
        .center{
            text-align: center;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
        include"connect_db.php";
        $maKH = $_GET['maKH'];
        $msg = "";


        $hoaDon = mysqli_query($conn, "SELECT * FROM `hoa_don` WHERE Ma_khach_hang = '$maKH'");
        if($hoaDon) echo "!!!!!!!!";
        // if(mysqli_num_rows($hoaDon) > 0){
        //     $msg = "Khách hàng $maKH đã mua hàng nên không thể xóa được";
        // }
        // else{
        //     $khachHang = mysqli_query($conn, "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$maKH'");
        //     $row = mysqli_fetch_array($khachHang);

            
        //     $maKH = $row['Ma_khach_hang'];
        //     $tenKH = $row['Ten_khach_hang'];
        //     $phai = $row['Phai'];
        //     $diaChi = $row['Dia_chi'];
        //     $sdt = $row['Dien_thoai'];
        //     $email = $row['Email'];
            

        //     if(isset($_GET['xacNhan'])){
        //         $xoaKhachHang = mysqli_query($conn, "DELETE FROM `khach_hang` WHERE `khach_hang`.`Ma_khach_hang` = '$maKH'");
        //     }
        // }
        
    ?>
    <form action="" method="get">
        <table>
            <tr>
                <td colspan="2"><h4>BẠN MUỐN XÓA THÔNG TIN KHÁCH HÀNG NÀY?</h4></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class='center'>
                        <input type="submit" name="xacNhan" value="Xác nhận">
                        <button><a class='bt' href="sua_xoa_khachhang.php">Hủy</a></button>
                    </div>
                </td>
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
                    <input type="text" name="tenKhachHang" readonly id="" value="<?php if(isset($tenKH)) echo $tenKH; ?>">
                </td>
            </tr>
            <tr>
                <td>Phái: </td>
                <td>
                    <input type="text" name="phai" readonly value="<?php 
                        $gender = "Nam";
                        if($phai == 1){
                            $gender = "Nữ";
                        }
                        echo $gender;
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td>
                    <input type="text" name="diaChi" readonly id="" value="<?php if(isset($diaChi)) echo $diaChi; ?>">
                </td>
            </tr>
            <tr>
                <td>Điện thoại: </td>
                <td>
                    <input type="text" name="sdt" readonly id="" value="<?php if(isset($sdt)) echo $sdt;  ?>">
                </td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>
                    <input type="text" name="email" readonly id="" value="<?php if(isset($email)) echo $email; ?>">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>