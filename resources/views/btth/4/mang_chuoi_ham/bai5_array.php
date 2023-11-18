<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay Thế Mảng</title>
    <style>
        #form1{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
            background-color: beige;
        }
        #thead{
            background-color:turquoise;
        }
    </style>
</head>
<body>
<?php
if(isset($_POST["submit"])){
    $mang = $_POST["mang"];
    $canThay = $_POST["giatrican"];
    $thay = $_POST["giatrithay"];

    if (!is_string($mang)) {
        echo "Mảng phải là một chuỗi!";
    } else {
        $arr = explode(",", $mang);
        $tmp = $arr;

        if (!in_array($canThay, $tmp)) {
            echo "Giá trị cần thay không tồn tại trong mảng!";
        } else {
            for ($i = 0; $i < count($tmp); $i++) {
                if ($tmp[$i] == $canThay) $tmp[$i] = $thay;
            }

            $ketQua = implode(",", $tmp);
        }
    }
}
?>

    <form action="bai5_array.php" id="form1" method="post">
        <table>
            <th colspan="2" id="thead">
                <h1>Thay Thế Mảng</h1>
            </th>
            <tr>
                <td>
                    Mảng:
                </td> 
                <td>
                    <input type="text" id="mang" name="mang" value="<?php if(isset($mang)) echo $mang?>" size="50" required>
                </td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế</td>
                <td>
                    <input type="text" id="giatrican" name="giatrican"  required>
                </td>
            </tr>
            <tr>
                <td>Giá trị thay thế</td>
                <td>
                    <input type="text" id="giatrithay" name="giatrithay"  required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Thay thế">
                </td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td>
                    <input type="text" name="mangcu" value="<?php if(isset($mang)) echo $mang;?>" size="50" disabled>
                </td>
            </tr>
            <tr>
                <td>Mảng mới:</td>
                <td>
                    <input type="text" name="mangmoi" id="mangmoi" value="<?php if(isset($ketQua)) echo $ketQua; ?>" size="50" disabled>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
