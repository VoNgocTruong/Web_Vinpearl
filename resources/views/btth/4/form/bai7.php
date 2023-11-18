<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH1-Bai6</title>
</head>
<body>
<?php
    if (isset($_POST['submit'])){

        if(isset($_POST['pheptinh']) && isset($_POST['sodau']) && isset($_POST['sohai'])){
            if(is_numeric($_POST['sodau']) && is_numeric($_POST['sohai'])){
                if($_POST['sodau']>=0 && $_POST['sohai']>=0){
                    if($_POST['pheptinh'] == "Chia" && $_POST['sohai'] == 0){
                        $thongbao="Vì số thứ hai bằng 0 không thể thực hiện phép chia";
                    }
                    else{
                        $pheptinh=$_POST['pheptinh'];
                        $sd=$_POST['sodau'];
                        $sh=$_POST['sohai'];
                        $url = "../BTTH1/kqBai7.php?pheptinh=".$pheptinh."&sodau=".$sd."&sohai=".$sh;
                        header("Location: " . $url);
                        exit();
                    }
                }
                else{
                    $thongbao="Hai số không được là số âm";
                }
            }
            else{
                $thongbao="Hai số chưa đúng định dạng";
            }
        }
        else{
            $thongbao="Vui lòng điền đầy đủ các trường";
        }
    }
?>
    <form action="Bai7.php" method="post">
        <table align="center" bgcolor="pink">
            <tr>
                <td align="center" bgcolor="orange" colspan="2"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></td>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <input type="radio" name="pheptinh" value="Cộng">
                    <label>Cộng</label>
                    <input type="radio" name="pheptinh" value="Trừ">
                    <label>Trừ</label>
                    <input type="radio" name="pheptinh" value="Nhân">
                    <label>Nhân</label>
                    <input type="radio" name="pheptinh" value="Chia">
                    <label>Chia</label>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type = "text" name = "sodau" value="<?php if (isset($sd)) echo $sd;?>"></td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td><input type = "text" name = "sohai" value="<?php if (isset($sh)) echo $sh;?>"></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <?php if (isset($thongbao)) echo $thongbao;?>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type = "submit" name = "submit" value = "Tính">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>