<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2.4</title>
</head>

<body>
    <?php
    require 'db_connect.php';
    $rowsPerPage = 5;

    if (isset($_GET['page'])) {
        $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
    }

    $offset = ($currentPage - 1) * $rowsPerPage;
    $countSql = "SELECT COUNT(*) as total FROM `sua`";
    $countResult = $conn->query($countSql);
    $totalRows = $countResult->fetch_assoc()['total'];

    $sql = "SELECT *, Ten_hang_sua, Ten_loai FROM `sua` 
    JOIN `hang_sua` ON `sua`.`Ma_hang_sua` = `hang_sua`.`Ma_hang_sua`
    JOIN `loai_sua` ON `sua`.`Ma_loai_sua` = `loai_sua`.`Ma_loai_sua`
    LIMIT $rowsPerPage OFFSET $offset";
    $result = $conn->query($sql);
    ?>

    <h1 align="center">THÔNG TIN SỮA</h1>
    <table border="1" style="width: 100%;">
        <tr align="center" style="font-weight: bold; color:#B42C21">
            <th>Số TT</th>
            <th>Tên Sữa</th>
            <th>Hãng Sữa</th>
            <th>Loại Sữa</th>
            <th>Trọng Lượng</th>
            <th>Đơn Giá</th>
        </tr>
        <?php $count = 0;
        $stt = 1;
        if($currentPage > 1) {
            $stt =$currentPage * $rowsPerPage - $rowsPerPage + 1;
        }
        $num = ($currentPage - 1) * $rowsPerPage + 1;
        foreach ($result as $each): 
        ?>
            <tr style="<?php echo ($count % 2 == 0) ? 'background-color:#FEE0C1' : 'background-color:white'; ?>; color:#725350">
                <td>
                    <?php echo $stt ?>
                </td>
                <td>
                    <?php echo $each['Ten_sua'] ?>
                </td>
                <td align="center">
                    <?php echo $each['Ten_hang_sua'] ?>
                </td>
                <td>
                    <?php echo $each['Ten_loai'] ?>
                </td>
                <td>
                    <?php echo $each['Trong_luong'] ?> gram
                </td>
                <td>
                    <?php echo $each['Don_gia'] ?> VNĐ
                </td>
            </tr>
            <?php $count++; $stt++ ?>
        <?php endforeach ?>
        </table>
        <?php
        $totalPages = ceil($totalRows / $rowsPerPage);
        if ($totalPages > 1) {
            echo '<div style="text-align: center; margin-top: 10px;">';
            if ($currentPage > 1) {
                echo '<a href="?page=1" style="text-decoration: none; padding: 5px;"><<</a>';
            }
            if ($currentPage > 1) {
                $prevPage = $currentPage - 1;
                echo '<a href="?page=' . $prevPage . '" style="text-decoration: none; padding: 5px;"><</a>';
            }

            // số
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $currentPage) {
                    echo "<span style='font-weight: bold; padding: 5px;'>$i</span>";
                } else {
                    echo "<a href='?page=$i' style='text-decoration: none; padding: 5px;'>$i</a>";
                }
            }

            // 
            if ($currentPage < $totalPages) {
                $nextPage = $currentPage + 1;
                echo '<a href="?page=' . $nextPage . '" style="text-decoration: none; padding: 5px;">></a>';
            }
            if ($currentPage < $totalPages) {
                echo '<a href="?page=' . $totalPages . '" style="text-decoration: none; padding: 5px;">>></a>';
            }
            echo '</div>';
        }
        ?>
</body>
</html>