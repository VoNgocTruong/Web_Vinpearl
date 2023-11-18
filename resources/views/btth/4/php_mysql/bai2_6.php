<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .column {
            font-size: 14px;
            border: 1px solid black;
            float:left;
            width: 20%; 
            text-align: center;
            box-sizing: border-box;
            overflow: hidden; /* Ẩn nội dung dài hơn */
            text-overflow: ellipsis; /* Hiển thị dấu "..." cho nội dung dài hơn */
        }

        .column h2 {
            text-align: center;
            font-size: 16px; /* Tăng kích thước cho tiêu đề */
            white-space: nowrap; /* Ngăn tiêu đề xuống dòng */
            overflow: hidden; /* Ẩn tiêu đề dài hơn */
            text-overflow: ellipsis; /* Hiển thị dấu "..." cho tiêu đề dài hơn */
        }
        table {
            width: 100%;
        }

        tr {
            display: flex;
            justify-content: center;
        }
        
        td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
    include"connectdb.php";

    $sql ='SELECT Hinh, Ten_sua, Trong_luong, Don_gia
        FROM sua
        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua';
    $result = $conn -> query($sql);

    echo "<table><th><center>THÔNG TIN CÁC SẢN PHẨM</center></th>"; 

    if(mysqli_num_rows($result) <> 0){
        while($rows = mysqli_fetch_row($result)){
            echo '<tr class="column">';
            echo '<td><h2>' . $rows[1] . '</h2>';
            echo '<p>' . $rows[2] . "gr -". $rows[3]. "VNĐ" . '</p>';
            echo "<p id='img'><img src='./Hinh_sua/$rows[0]' width='120' height='120'></p></td>";
            echo '</tr>';
        }
    }
    echo "</table>";
    ?>
</body>
</html>
