<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2.5</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .product {
            display: flex;
            border: 1px solid #ccc;
            margin: 10px;
            max-width: 500px;
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .product-info {
            flex: 1;
            padding: 10px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    require 'db_connect.php';
    $sql = "SELECT *, Ten_hang_sua, Ten_loai FROM `sua`
    JOIN `hang_sua` ON `sua`.`Ma_hang_sua` = `hang_sua`.`Ma_hang_sua`
    JOIN `loai_sua` ON `sua`.`Ma_loai_sua` = `loai_sua`.`Ma_loai_sua`";
    $result = $conn->query($sql);
    ?>
    <h1>THÔNG TIN CÁC SẢN PHẨM</h1>
    <div>
        <ul style="list-style: none;">
            <?php foreach ($result as $each): ?>
                <li>
                    <div class="product">
                        <img src="/hinhBTTH/1/img/sua/<?php echo $each['Hinh'] ?>" alt="">
                        <div class="product-info">
                            <p style="font-weight: bold;">
                                <?php echo $each['Ten_sua'] ?>
                            </p>
                            <p>Nhà sản xuất:
                                <?php echo $each['Ten_hang_sua'] ?>
                            </p>
                            <p>
                                <?php echo $each['Ten_loai'] . " - " . $each['Trong_luong'] . " gram - " . $each['Don_gia'] . " VNĐ" ?>
                            </p>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</body>

</html>
