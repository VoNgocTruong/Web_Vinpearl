<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Trong Mảng</title>
    <style>
        #form1{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
            background-color: beige;
        }
        #thead{
            background-color:cadetblue;
        }
    </style>
</head>
<body>
<?php
function timKiem($mang, $giaTriCanTim) {
    $ketQua = array();
    foreach ($mang as $viTri => $phanTu) {
        if (preg_match("/$giaTriCanTim/", $phanTu)) {
            $ketQua[] = "Đã tìm thấy '$giaTriCanTim' tại vị trí thứ $viTri của mảng";
        }
    }

    if (!empty($ketQua)) {
        return implode("<br>", $ketQua);
    } else {
        return "Không tìm thấy '$giaTriCanTim' trong mảng";
    }
}

if (isset($_POST['timkiem'])) {
    $mangStr = $_POST['mang'];
    $giaTriCanTim = $_POST['giatri'];

    $mang = explode(',', $mangStr);

    $ketQua = timKiem($mang, $giaTriCanTim);

    function xuatMang($mang) {
        echo implode(", ", $mang);
    }
}
?>
    <form action="bai4_array.php" id="form1" method="post">
        <table>
            <th id="thead" colspan="2">
                <h1>Tìm Kiếm</h1>
            </th>
            <tr>
                <td>
                    Nhập mảng:
                </td> 
                <td>
                    <input type="text" id="mang" name="mang" size="50" value="<?php if(isset($mang)) echo xuatMang($mang)?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    Nhập số cần tìm:
                </td>
                <td>
                    <input type="text" id="giatri" name="giatri" size="50" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="timkiem" value="Tìm kiếm">
                </td>
            </tr>
            <tr>
                <td>
                    Mảng:
                </td>
                <td>
                    <input type="text" id="mang" value="<?php if(isset($mang)) xuatMang($mang);?>" name="mang" size="50" disabled>
                </td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm:</td>
                <td>
                    <input type="text" name="ketqua" value="<?php if(isset($ketQua)) echo $ketQua; ?>" size="50" disabled style="color: red;">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    (Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
