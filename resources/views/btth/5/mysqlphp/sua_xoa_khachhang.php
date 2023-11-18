<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa xóa khách hàng</title>
    <style>
        #form{
            border-collapse: collapse;
            width: 900px;
            font-size: 20px;
        }
        .tr1{
            background-color: wheat;
        }
        .tr2{
            background-color: white;
        }
        .center{
            text-align: center;
        }
        .t-red{
            color: red;
        }
        #gender_img{
            width: 20px;
        }
        .a{
            text-decoration: none;
            color: black;
        }
        .a:visited{ color: black;}
    </style>
</head>
<body>
    <?php 
        include"connect_db.php";

        $querry = "SELECT * FROM khach_hang";
        $khach_hang = mysqli_query($conn, $querry);
        
        // Ma_khach_hang
        // Ten_khach_hang	
        // Phai	
        // Dia_chi	
        // Dien_thoai
    ?>
    <form action="" method="get">
        <table border="1" id="form">
            <tr class="t-red">
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th><img src="./Hinh_sua/editing.png" width="20" height="20" alt=""></th>
                <th><img src="./Hinh_sua/delete.png" width="20" height="20" alt=""></th>
            </tr>
            <?php 
                function trColor($index){
                    return ($index%2==0)?"\"tr1\"":"\"tr2\"";
                }
                
                $index = 0;
                foreach($khach_hang as $record){
                    $maKhachHang = $record["Ma_khach_hang"];
                    $gender = "Nam";
                    if($record["Phai"] == 1) $gender = "Nữ";
                    echo "<tr class=" . trColor($index) .">";
                    echo "<td class='center'>". $record["Ma_khach_hang"] ."</td>";
                    echo "<td>". $record["Ten_khach_hang"] ."</td>";
                    echo "<td class='center'>". $gender ."</td>";
                    echo "<td>". $record["Dia_chi"] ."</td>";
                    echo "<td  class='center'>0". $record["Dien_thoai"] ."</td>";
                    echo "<td class='center'><a class='a' href='sua_khachhang.php?maKH=$maKhachHang'> Sửa </a></td>";
                    echo "<td class='center'><a class='a' href='xoa_khachhang.php?maKH=$maKhachHang'> Xóa </a></td>";
                    echo "</tr>";
                    $index++;
                }
            ?>
        </table>
    </form>
</body>
</html>