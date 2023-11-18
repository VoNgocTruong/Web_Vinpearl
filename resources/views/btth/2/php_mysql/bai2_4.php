<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Bài tập 2.4</title>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: solid 0.5px;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {background-color: #F9E1C5;}
        tr:nth-child(odd) {
            color: #A52D22;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        .pagination {
            margin-top: 10px;
            text-align: center;
        }
        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #F9E1C5;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 5px;
        }
        .pagination a:hover {
            background-color: #A52D22;
        }
    </style>
</head>
<body>
<?php
    require('connection.php');
    $conn = get_connection();
    mysqli_set_charset($conn, 'utf8');
    //phan trang
    $rowsPerPage = 5;
    if (!isset($_GET['page']))
        $_GET['page'] = 1;
    $offset = ($_GET['page'] - 1) * $rowsPerPage;
    $query = "SELECT `sua`.`Ten_sua`, `sua`.`Trong_luong`, `sua`.`Don_gia`, `hang_sua`.`Ten_hang_sua`, `loai_sua`.`Ten_loai` 
    FROM sua CROSS JOIN hang_sua CROSS JOIN loai_sua WHERE `sua`.`Ma_hang_sua` = `hang_sua`.`Ma_hang_sua` and `sua`.`Ma_loai_sua` = `loai_sua`.`Ma_loai_sua` LIMIT $offset, $rowsPerPage;";
    $result = mysqli_query($conn, $query);
    if (!$result) die('<br> <b>Query failed</b>');
    $numRows = mysqli_num_rows($result);
    $maxPage = ceil($numRows / $rowsPerPage);
    if ($numRows <> 0) {
        echo "<div style='overflow-x: auto;'>
            <table>
                <h2 style='color: #9C2D16' class='center'>THÔNG TIN SỮA</h2>
                <tr>
                    <th class='center'>STT</th>
                    <th>Tên Sữa</th>
                    <th>Hãng Sữa</th>
                    <th>Loại Sữa</th>
                    <th>Trọng Lượng</th>
                    <th>Đơn giá</th>
                </tr>";
        $temp = $_GET['page'] * $rowsPerPage;
        if ($temp <= $rowsPerPage) $num = 0;
        else $num = $temp - $rowsPerPage;
        while ($rows = mysqli_fetch_array($result)) {
            $num++;
            echo "<tr>";
            echo "<td class='center'>" . $num . "</td>";
            echo "<td>{$rows['Ten_sua']}</td>";
            echo "<td>{$rows['Ten_hang_sua']}</td>";
            echo "<td>{$rows['Ten_loai']}</td>";
            echo "<td>{$rows['Trong_luong']} gram</td>";
            echo "<td>{$rows['Don_gia']} VNĐ</td>";
            echo "</tr>";
        }
        echo "</table> </div>";
        $re = mysqli_query($conn, 'select * from sua');
        $numRows = mysqli_num_rows($re);
        $maxPage = floor($numRows / $rowsPerPage) + 1;
        echo "<div class='center pagination'>";
        if ($_GET['page'] > 1) {
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">Previous</a> ";
        }
        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $_GET['page']) {
                echo '<b>' . $i . '</b> ';
            } else {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> " . $i . "</a> ";
            }
        }
        if ($_GET['page'] < $maxPage) {
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a> ";
        }
        echo "</div>";
    }
    mysqli_close($conn);
?>
</body>
</html>
