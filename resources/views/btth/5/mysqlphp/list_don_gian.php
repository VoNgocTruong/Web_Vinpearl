<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List đơn giản</title>
    <style>
        #form{
            border-collapse: collapse;
        }
        .img{
            width: 100px;
            margin-left: 30px;
        }
        .imgDiv{
            width: 200px;
        }
        .td{
            margin-left: 10px;
        }
        .title{
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            background-color:darksalmon;
            color:orangered;
            font-family:Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <?php 
        include"connect_db.php";
        $querry = "SELECT s.Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, s.Trong_luong, s.Don_gia, s.Hinh FROM sua s JOIN hang_sua hs JOIN loai_sua ls WHERE s.Ma_hang_sua = hs.Ma_hang_sua and s.Ma_loai_sua = ls.Ma_loai_sua";

        $sua = mysqli_query($conn,$querry);

    ?>
    <form action="" method="get">
        <table id="form" border="1">
            <tr>
                <td class='title' colspan="2">THÔNG TIN CÁC SẢN PHẨM</td>
            </tr>
            <?php 
            foreach($sua as $record){
                echo "<tr>";
                    echo "<td class='imgDiv'><img class='img' src='./Hinh_sua/". $record["Hinh"] ."' alt=''></td>";
                    echo "<td><div class='td'><b>". $record["Ten_sua"] ."</b><br>Nhà sản xuất: ".$record["Ten_hang_sua"]."<br>".$record["Ten_loai"]." - ".$record["Trong_luong"]."gr - ".$record["Don_gia"]."VNĐ</div></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </form>
</body>
</html>