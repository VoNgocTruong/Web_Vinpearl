<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$ketqua = ""; 

if(isset($_POST['submit'])){
    $str = trim($_POST['inp']);
    $mangSo = explode(",", $str);

    function tinhTong($mangSo){
        $tong = 0;
        foreach ($mangSo as $so) {
            if (!is_numeric($so)) {
                return false;
            } else {
                $tong += $so;
            }
        }
        return $tong;
    }

    $ketqua = tinhTong($mangSo);

    if ($ketqua === false) {
        $ketqua = "Dãy số không hợp lệ!";
    }
}
?>
    <form action="tinhTong_form.php" method="post">
        <table style="background-color: burlywood;">
            <tr colspan="2">
                <th>
                    <h1 style="background-color: lightblue;">Nhập và tính tổng dãy số</h1>
                </th>
            </tr>
            <tr> 
                <td>
                    Nhập dãy số:
                    <input type="text" name="inp" value="" placeholder="1, 2, 3, 4, 5, 6,..." size="30"> (*)
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <input type="submit" name="submit" value="Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td >
                    Tổng dãy số: 
                    <input type="text" name="outp" style="background-color: greenyellow;" value="<?php echo $ketqua; ?>" size="30" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <b>(*) Các số đc nhập cách nhau bằng dấu phẩy <b>","</b></b>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
