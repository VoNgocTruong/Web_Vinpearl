<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        h2 {
            text-align: center;
        }

        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}

        .center {
            text-align: center;
        }
        .tr1{
            background-color: wheat;
        }
        .tr2{
            background-color: white;
        }
    </style>
</head>
<body>
<?php
    include"connectdb.php";

    $rowsPerPage = 5;
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
    }

    $offset = ($_GET['page'] - 1) * $rowsPerPage;

    $query = 'SELECT sua.Don_gia, sua.Trong_luong, sua.Ten_sua, loai_sua.Ten_loai, hang_sua.Ten_hang_sua
    FROM sua
    JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua
    JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua LIMIT ' . $offset . ', ' . $rowsPerPage;
    $result = $conn->query($query);

    $stt = $offset + 1;
?>
<table id="tb" class="w3-table-all w3-hoverable">
    <h2>THÔNG TIN SỮA</h2>
        <tr class="w3-green">
            <th>STT</th>
            <th>Tên sữa</th>
            <th>Hãng sữa</th>
            <th>Loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
        </tr>
        <?php 
            function trColor($index){
                return ($index%2==0)?"\"tr1\"":"\"tr2\"";
            }

            $index = 0;

            if (!$result) {
                die("<br> QUERY FAILED");
            } else {
                foreach ($result as $record) {
                    echo "
                    <tr class=".trColor($index).">
                        <td>" . $stt++ . " </td>
                        <td>" . $record["Ten_sua"] . " </td>
                        <td>" . $record["Ten_hang_sua"] . " </td>
                        <td>" . $record["Ten_loai"] . " </td>
                        <td>" . $record["Trong_luong"] . " </td>
                        <td>" . $record["Don_gia"] . " </td>
                    <tr>";
                    $index++;
               }
            }
        ?>
</table>

<div style="text-align: center;">
    <div class="center pagination">
        <?php
            $queryTotal = "SELECT COUNT(*) as total FROM sua";
            $totalResult = $conn->query($queryTotal);
            $totalRows = $totalResult->fetch_assoc();
            $totalPages = ceil($totalRows['total'] / $rowsPerPage);

            if ($_GET['page'] > 1) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">Previous</a>";
            }
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($_GET['page'] == $i) ? 'active' : '';
                echo "<a class='$activeClass' href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> $i </a>";
            }
            if ($_GET['page'] < $totalPages) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";
            }
        ?>
    </div>
</div>

</body>
</html>
