<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 9</title>
    <style>
        b{
            margin-bottom:10px;
        }
        span{
            color:red;
        }
    </style>
</head>
<body>
<?php
//Ket noi Database
    include('connection.php');
    $conn = get_connection();
?>

<table align="center" width="700px" border = "1" >
    <tr>
        <td align="center" bgcolor="yellow" colspan="2"><h1>TÌM KIẾM THÔNG TIN SỮA</h1></td>
    </tr>
</table>
    <div align="center">
        <form action="" method="post">
            Tên sữa: <input type="text" name="txtsearch">
            <input type="submit" name="search" value="Tìm kiếm">
        </form>
    </div>
<?php
    if(isset($_POST['search'])){
        $txt = $_POST['txtsearch'];

        if($txt != ""){
            $sqlSearch = "SELECT * FROM sua
            inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
            inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua
            WHERE Ten_sua LIKE '%$txt%'";
            $qr = mysqli_query ($conn , $sqlSearch);
            $count = mysqli_num_rows($qr);
            
            if($count <= 0){
                echo "<p align='center'>"."Không tìm thấy kết quả nào"."</p>";
            }else{
                echo "<p align='center'>"."Có ".$count." sản phẩm được tìm thấy"."</p>";
                echo '<table align="center" width="700px" border = "1">';
                    while ( $row = mysqli_fetch_array($qr)) {

                        $imageDirectory = "../hinhBTTH/2/img/Hinh_sua/"; // Update the directory path
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
                echo '</table>';
            }
        }
        else{
            echo "<p align='center'>"."Vui lòng điền thông tin cần tìm kiếm"."</p>";
            require('TableBai2_9');
        }
    }
    else{
        require('TableBai2_9');
    }
?>
</body>
</html>