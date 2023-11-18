<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>List Định dạng</title>
    <style>
        .img{
            width: 200px;
        }
        .row{
            width: 1000px;
        }
    </style>
</head>
<body>
    <?php 
        include"connect_db.php";
        $querry = "SELECT Ten_sua, Trong_luong, Hinh, Don_gia FROM sua";

        $sua = mysqli_query($conn,$querry);
    ?>
    <div class="row">
        <div class="bg-warning">THÔNG TIN CÁC SẢN PHẨM</div>
        <?php 
            foreach($sua as $record){
                echo "<div class='col-auto card'>";
                echo "<div class='container text-center'>";
                echo "<p class='fw-bold'>".$record["Ten_sua"]."</p>";
                echo "<p>".$record["Trong_luong"]."gr - ".$record["Don_gia"]."VNĐ</p>";
                echo "</div>";
                echo "<img class='w-100' src='./Hinh_sua/". $record["Hinh"] ."'>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>