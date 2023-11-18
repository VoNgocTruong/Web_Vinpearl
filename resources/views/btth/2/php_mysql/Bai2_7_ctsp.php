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
    $conn = get_connection();
    if(isset($_GET['id'])) $id=$_GET['id'];
    $sql = "SELECT * FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
        inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
    $result = mysqli_query ($conn , $sql );
?>
<table align="center" width="500px" border = "1" >
    <?php
        if( mysqli_num_rows ( $result ) !=0){
            while ( $row = mysqli_fetch_array($result)) {
                if($row['Ma_sua'] == $id){
                    echo "<tr>".
                        "<td align='center' bgcolor='pink' colspan='2'>".
                            "<h1>".$row['Ten_sua']."</h1>".
                        "</td>".
                    "</tr>";
                    echo "<tr>";
                    $imageDirectory = "../php_mysql/img/Hinh_sua/"; // Update the directory path
                    $imageFilename = $row['Hinh'];
                    $imagePath = $imageDirectory . $imageFilename;                        
                    echo "<td align='center'><img alt='".$row['Hinh']."' src='".$imagePath."' width='100px' height='100px' style='padding: 5px 20px'></td>";
                    echo "<td style='padding-left: 10px'>".
                        "<b>". "Thành phần dinh dưỡng:" ."</b>".
                        "<br/>".
                        $row['TP_Dinh_Duong'].
                        "<br/>".
                        "<b>". "Lợi ích:" ."</b>".
                        "<br/>".
                        $row['Loi_ich'].
                    "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' colspan='2'>".
                        "<a href='Bai2_7.php'>Quay về</a>".
                    "</td>";
                    echo "</tr>";
                }
            }
        }
    ?>
</table>
</body>
</html>