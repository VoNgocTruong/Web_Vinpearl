<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH2 - Bài 5</title>
</head>
<body>
<?php
    function thay_doi_mang($mang, $gt_cu, $gt_moi){
        for($i = 0; $i < count($mang); $i++){
            if($mang[$i] == $gt_cu) $mang[$i] = $gt_moi;
        }
        return $mang;
    }
?>
<?php
    if(isset($_POST['submit'])){
        $n = $_POST['so'];
        $gt_cu = $_POST['gtctt'];
        $gt_moi = $_POST['gttt'];
        $mang = explode(',', $n);
        $kq = implode("  ", $mang);
        $mang_sau = thay_doi_mang($mang, $gt_cu, $gt_moi);
        $kq_sau = implode("  ", $mang_sau);
    }
?>
    <form action="" method="post">
        <table style="width: 30%" align="center" bgcolor="#FFF6FC">
            <tr>
                <td align="center" bgcolor="#A70F74" style="color:#FFFFFF" colspan="2"><h1>THAY THẾ</h1></td>
            </tr>
            <tr bgcolor="#FEDAF6">
                <td>Nhập các phần tử:</td>
                <td><input type = "text" name = "so" style="width: 90%" value="<?php if (isset($n)) echo $n;?>">
                </td>
            </tr>
            <tr bgcolor="#FEDAF6">
                <td>Giá trị cần thay thế: </td>
                <td><input type = "text" name = "gtctt" value="<?php if (isset($gt_cu)) echo $gt_cu;?>">
                </td>
            </tr>
            <tr bgcolor="#FEDAF6">
                <td>Giá trị thay thế: </td>
                <td><input type = "text" name = "gttt" value="<?php if (isset($gt_moi)) echo $gt_moi;?>">
                </td>
            </tr>
            <tr bgcolor="#FEDAF6">
                <td></td>
                <td>
                    <input style="background: #FFFDB0" type = "submit" name = "submit" value = "Thay thế">
                </td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td>
                    <input style="background: #F1ACA7; width:90%" type="text" name="mangcu" value="<?php if(isset($kq)) echo $kq?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế:</td>
                <td>
                    <input style="background: #F1ACA7; width: 90%" type="text" name="mangmoi" value="<?php if(isset($kq_sau)) echo $kq_sau?>" disabled>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">(<span style="color:red;">Ghi chú: </span>Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>