<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lưới phân trang</title>
</head>
<body>
    <?php 
        include"connect_db.php";

        $querry = "SELECT s.Ten_sua, s.Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, s.Trong_luong, s.Don_gia FROM sua s JOIN hang_sua hs JOIN loai_sua ls WHERE s.Ma_hang_sua = hs.Ma_hang_sua and s.Ma_loai_sua = ls.Ma_loai_sua";
        $sua = mysqli_query($conn, $querry);

        
    ?>
    <form action="" method="get">
        <table>
            <tr>
                <th>Số TT</th>
                <th>Tên sữa</th>
                <th>Hãng sữa</th>
                <th>Loại sữa</th>
                <th>Trọng lượng</th>
                <th>Đơn giá</th>
            </tr>
            <?php 
                #Ma_hang_sua, Ten_hang_sua, Dia_chi, Dien_thoai, Email
                $index = 0;
                foreach($sua as $record){
                    $index++;
                    echo "<tr>";
                    echo "<td class='center'>".$index ."</td>";
                    echo "<td class='center'>".$record["Ten_sua"]."</td>";
                    echo "<td>".$record["Ten_hang_sua"]."</td>";
                    echo "<td>".$record["Ten_loai"]."</td>";
                    echo "<td>".$record["Trong_luong"]."gram</td>";
                    echo "<td>".$record["Don_gia"]."VNĐ</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </form>

</body>
</html>