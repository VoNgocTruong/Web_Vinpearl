<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #td1{
            background-color:crimson;
            color:yellow;
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

        .highlight {
            font-weight: bold;
            color:darkmagenta; 
        }
    </style>
</head>
<body>
    <?php
    include"connectdb.php";

    $rowsPerPage = 2;
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
    }
    $offset = ($_GET['page'] - 1) * $rowsPerPage;

    $sql = 'SELECT Hinh, Ten_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
    FROM sua LIMIT ' . $offset . ', ' . $rowsPerPage;

    $result = $conn -> query($sql);

    $stt = $offset + 1;

    echo "<h2 colspan='2' align='center'><font size='5'  ><b>THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</b></font></h2>"; 
    echo "<table align='center' width='80%' border='1' style='border-collapse:collapse' >";

    if (mysqli_num_rows($result) <> 0) {
        while ($rows = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td colspan='2' align='center' id='td1'> <b>$rows[1]</b><br> </td>";
            echo"</tr>";
            echo "<tr>";
            echo "<td width='20%' height='200px' align='center'><img width='150px' src='./Hinh_sua/$rows[0]' alt=''></td>";
            echo "<td>
            <b>Thành phần dinh dưỡng</b>: $rows[4]<br>
            <b>Lợi ích</b>: $rows[5]<br>
            <b>Trọng lượng: </b><span class='highlight'>$rows[2] gr</span> - <b>Đơn giá: </b><span class='highlight'>$rows[3] VNĐ</span>";
            echo "</tr>";
        }
    }
    echo "</table>";
    ?>
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