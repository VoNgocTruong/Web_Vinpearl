<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List dạng cột</title>
    <style>
        .tb{
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .container{
            display: flex;
            flex-wrap: wrap;
            width: 90%;
            gap: 2px;
        }
        .item{
            width: 19%;
            text-align: center;
            border: 1px solid black;
        }
        .title{
            font-weight: bold;
            text-align: center;
            width: 90%;
            font-family: Arial, Helvetica, sans-serif;
            color:coral;
            font-size: 50px;
        }
    </style>
</head>
<body>
    <?php
        include"connect_db.php";

        $sua = mysqli_query($conn, "SELECT Ten_sua, Trong_luong, Don_gia, Hinh FROM sua");
    ?>
    <form action="" method="get">
        <div class='tb'>
            <div class="title">THÔNG TIN CÁC SẢN PHẨM</div>
            <div class="container">  
                <?php 
                    while($row = mysqli_fetch_array($sua)){
                        echo "<div class='item'>";
                        echo "<a href='config_list_co_link.php'>".$row["Ten_sua"]."</a><br>";
                        echo $row["Trong_luong"]."gr - ".$row["Don_gia"]."VNĐ";
                        echo "<img widht='200' height='200' src='./Hinh_sua/".$row["Hinh"]."'>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </form>
</body>
</html>