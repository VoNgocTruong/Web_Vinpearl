<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 7</title>
    <style>
        b{
            margin-bottom:10px;
        }
    </style>
</head>
<body>
<?php
//Ket noi Database
    include('connection.php');
?>
<table align="center" width="auto" border = "1" >
    <tr>
        <td align="center" bgcolor="pink" colspan="5"><h1>THÔNG TIN CÁC SẢN PHẨM</h1></td>
    </tr>
    <?php
        $conn = get_connection();
        $sql = "SELECT * FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
         inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
        $result = mysqli_query ($conn , $sql );
        // Phân trang
        $sp = 10;
        $tsp = mysqli_num_rows($result);
        $tst = ceil($tsp/$sp);
        if(isset($_GET['p'])) $p=$_GET['p'];
        else $p=1;
        $vt=($p-1)*$sp;
        $sql = "SELECT * FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
         inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT $vt,$sp";
        $result = mysqli_query ($conn , $sql );

        if( mysqli_num_rows ( $result ) !=0){
            $dem=0;
            while ( $row = mysqli_fetch_array($result)) {
                $n = mysqli_num_rows($result);
                if($dem == 0) echo "<tr>";
                $dem++;
                if($dem == 5) $dem=0;
                echo "<td>";
                echo "<table align='center' width='auto' >";
                $imageDirectory = "../php_mysql/img/Hinh_sua/"; // Update the directory path
                $imageFilename = $row['Hinh'];
                $imagePath = $imageDirectory . $imageFilename;
                $href = "Bai2_7_ctsp.php?id=".$row['Ma_sua'];
                echo "<tr>";
                    echo "<td align='center' style='padding-left: 10px'>".
                        "<?php?>".
                            "<a href='".$href."'>"."<b>". $row['Ten_sua'] ."</b>"."</a>".
                        "<?php?>".
                        "<p>". $row['Trong_luong']. " gr - ". $row['Don_gia']. " VND". "</p>".
                        "<img alt='".$row['Hinh']."' src='".$imagePath."' width='100px' height='100px' style='padding: 5px 20px'>".
                    "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</td>";
                if($dem == 0) echo "</tr>";
            }
        }
    ?>
</table>
<p align="center">
    <?php?>
        <a href="Bai2_7.php?p=<?php echo 1;?>"><<</a>
        <a href="Bai2_7.php?p=<?php if($p>1) echo $p-1; else echo $p;?>"><</a>
    <?php?>
    <?php for ($i=1; $i <= $tst; $i++) {?>
        <a href="Bai2_7.php?p=<?php echo $i;?>"><?php echo $i;?></a>
    <?php }?>
    <?php?>
        <a href="Bai2_7.php?p=<?php if($p>=1 && $p<$tst) echo $p+1; else echo $tst;?>">></a>
        <a href="Bai2_7.php?p=<?php echo $tst;?>">>></a>
    <?php?>
</p>
</body>
</html>