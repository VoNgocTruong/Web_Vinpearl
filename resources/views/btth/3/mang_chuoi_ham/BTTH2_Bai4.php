<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH2 - Bài 4</title>
</head>
<body>
<?php
    function tim_vi_tri($mang, $so_tim){
        $vi_tri = array();
        for($i=0; $i<count($mang); $i++){
            if($mang[$i] == $so_tim){
                $vi_tri[] = $i;
            }
        }
        return $vi_tri;
    }
?>

<?php
    if(isset($_POST['submit'])){
        $mang_nhap = $_POST['mang'];
        $so_tim = $_POST['sotim'];
        $mang = explode(',', $mang_nhap);
        $ket_qua = implode(",", $mang);
        $vi_tri = tim_vi_tri($mang, $so_tim);
    }
?>
    <form action="BTTH2_Bai4.php" method="post">
        <table align="center" bgcolor="#D1DED4" style="width: 30%">
            <tr>
                <td align="center" bgcolor="#2F9B99" style="color:#FFFFFF" colspan="2"><h1>TÌM KIẾM</h1></td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type="text" style="width: 90%" name="mang" value="<?php if (isset($mang_nhap)) echo $mang_nhap;?>">
                </td>
            </tr>
            <tr>
                <td>Nhập số cần tìm:</td>
                <td><input type="text" style="width: 50%" name="sotim" value="<?php if (isset($so_tim)) echo $so_tim;?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" style="background: #96CBF9" name="submit" value="Tìm kiếm">
                </td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td>
                    <textarea name="" id="mang" style="width: 90%" cols="25" rows="1" disabled><?php if(isset($ket_qua)) echo $ket_qua?></textarea>
                </td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm:</td>
                <td>
                    <textarea name="timkiem" style="background: #CEFBFC; width: 90%; color: red;" disabled>
                        <?php
                            if (isset($vi_tri)) {
                                if(count($vi_tri) > 0) {
                                    echo "Tìm thấy " . $so_tim . " tại các vị trí: ";
                                    foreach($vi_tri as $vitri) {
                                        echo ($vitri + 1) . ", ";
                                    }
                                    echo "của mảng";
                                } else {
                                    echo "Không tìm thấy " . $so_tim . " trong mảng";
                                }
                            }
                        ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#2F9B99" colspan="2">(Các phần tử trong mảng cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>