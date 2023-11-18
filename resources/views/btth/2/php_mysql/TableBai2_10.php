<table align="center" width="700px" border = "1" >
    <?php
        $sql = "SELECT * FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
            inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
        $result = mysqli_query ($conn , $sql);

        // Phân trang
        $sp = 2;
        $tsp = mysqli_num_rows($result);
        $tst = ceil($tsp/$sp);
        if(isset($_GET['p'])) $p=$_GET['p'];
        else $p=1;
        $vt=($p-1)*$sp;
        $sql = "SELECT * FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
        inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT $vt,$sp";
        $result = mysqli_query ($conn , $sql );

        if( mysqli_num_rows ( $result ) !=0){
            while ( $row = mysqli_fetch_array($result)) {
                $imageDirectory = "../php_mysql/img/Hinh_sua/"; // Update the directory path
                $imageFilename = $row['Hinh'];
                $imagePath = $imageDirectory . $imageFilename;

                echo "<tr>";
                echo "<td align='center' bgcolor='pink' colspan='2' width='auto' height='auto'>".
                    "<h2>".$row['Ten_sua']."</h2>".
                "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td align='center'><img alt='".$row['Hinh']."' src='".$imagePath."' width='100px' height='100px' style='padding: 5px 20px'></td>";
                echo "<td style='padding-left: 10px'>".
                    "<b>". "Thành phần dinh dưỡng:" ."</b>".
                    "<br/>".
                    $row['TP_Dinh_Duong'].
                    "<br/>".
                    "<b>". "Lợi ích:" ."</b>".
                    "<br/>".
                    $row['Loi_ich'].
                    "<br/>".
                    "<p>". "<b>"."Trọng lượng: "."</b>". "<span>".$row['Trong_luong']." gr</span> - ". "<b>"."Đơn giá: "."</b>". "<span>".$row['Don_gia']. " VND</span>". "</p>".
                "</td>";
                echo "</tr>";
            }
        }
    ?>
</table>
<p align="center">
<?php?>
    <a href="Bai2_10?p=<?php echo 1;?>"><<</a>
    <a href="Bai2_10?p=<?php if($p>1) echo $p-1; else echo $p;?>"><</a>
<?php?>
    <?php for ($i=1; $i <= $tst; $i++) {?>
    <a href="Bai2_10?p=<?php echo $i;?>"><?php echo $i;?></a>
<?php }?>
<?php?>
    <a href="Bai2_10?p=<?php if($p>=1 && $p<$tst) echo $p+1; else echo $tst;?>">></a>
    <a href="Bai2_10?p=<?php echo $tst;?>">>></a>
<?php?>
</p>