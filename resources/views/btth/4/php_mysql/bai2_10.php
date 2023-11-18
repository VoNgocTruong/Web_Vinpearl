<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÌM KIẾM SỮA</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    table {
        width: 100%;
    }

    label {
        display: block;
        font-weight: bold;
    }

    select, input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    h3 {
        margin-top: 20px;
    }

    p {
        text-align: center;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        margin-bottom: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
        padding: 10px;
    }
</style>

</head>
<body>
    <?php 
    include "connectdb.php";

    $tenSua = "";
    $hangSua = "AB"; // Giá trị mặc định cho hãng sữa
    $loaiSua = "SB"; // Giá trị mặc định cho loại sữa

    if (isset($_GET["search"])) {
        $tenSua = $_GET["input"];
        $hangSua = $_GET["hangSua"];
        $loaiSua = $_GET["loaiSua"];
    }
    ?>

    <form action="" method="get">
        <h2>TÌM KIẾM THÔNG TIN SỮA</h2>
        <table>
            <tr>
                <td>
                    <label for="hangSua">Hãng sữa:</label>
                    <select name="hangSua" id="hangSua">
                        <option value="AB" <?php if ($hangSua === "AB") echo "selected"; ?>>Abbott</option>
                        <option value="DL" <?php if ($hangSua === "DL") echo "selected"; ?>>Dutch Lady</option>
                        <option value="DS" <?php if ($hangSua === "DS") echo "selected"; ?>>Daisy</option>
                        <option value="MJ" <?php if ($hangSua === "MJ") echo "selected"; ?>>Mead Johnson</option>
                        <option value="NTF" <?php if ($hangSua === "NTF") echo "selected"; ?>>Nutifood</option>
                        <option value="VNM" <?php if ($hangSua === "VNM") echo "selected"; ?>>Vinamilk</option>
                    </select>

                    <label for="loaiSua">Loại sữa:</label>
                    <select name="loaiSua" id="loaiSua">
                        <option value="SB" <?php if ($loaiSua === "SB") echo "selected"; ?>>Sữa bột</option>
                        <option value="SC" <?php if ($loaiSua === "SC") echo "selected"; ?>>Sữa chua</option>
                        <option value="SD" <?php if ($loaiSua === "SD") echo "selected"; ?>>Sữa đặc</option>
                        <option value="ST" <?php if ($loaiSua === "ST") echo "selected"; ?>>Sữa tươi</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="input" value="<?php echo $tenSua; ?>">
                    <input type="submit" name="search" value="Tìm kiếm">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_GET["search"])) {
        $sua = mysqli_query($conn, "SELECT * FROM sua WHERE Ma_loai_sua = '$loaiSua' AND Ma_hang_sua = '$hangSua' AND Ten_sua LIKE '%$tenSua%'");
        $count = mysqli_num_rows($sua);

        echo "<h3>Kết quả tìm kiếm:</h3>";

        if ($count > 0) {
            echo "<p>Có $count sản phẩm được tìm thấy:</p>";
            echo "<ul>";

            foreach ($sua as $record) {
                echo "<li>";
                echo "<h3>{$record['Ten_sua']}</h3>";
                echo "<p><img width='150px' src='./Hinh_sua/{$record['Hinh']}' alt=''></p>";
                echo "<p><b>Thành phần dinh dưỡng</b>: {$record['TP_Dinh_Duong']}</p>";
                echo "<p><b>Lợi ích</b>: {$record['Loi_ich']}</p>";
                echo "<p><b>Trọng lượng:</b> {$record['Trong_luong']} gr - <b>Đơn giá:</b> {$record['Don_gia']} VNĐ</p>";
                echo "</li>";
            }

            echo "</ul>";
        } else {
            echo "<p>Không tìm thấy sản phẩm nào.</p>";
        }
    }
    ?>

</body>
</html>
