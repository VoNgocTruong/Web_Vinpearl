<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php example</title>
</head>
<body>
<?php
const PI = 3.14;
if(isset($_POST['tinh'])){
    $bankinh = $_POST['bankinh'];
    if($bankinh >= 0){
        function tinhDienTich($bankinh){
            return ($bankinh * $bankinh) * PI;
        }
        function tinhChuvi($bankinh){
            return $bankinh * 2 * PI;
        }
        
        $dientich = tinhDienTich($bankinh);
        $chuvi = tinhChuvi($bankinh);
        
    }
    
}
?>
    <h1>DIỆN TÍCH HÌNH CHỮ NHẬT</h1>
    <form action="ex3.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="bankinh">Bán kính:</label>
                    <input type="number" name="bankinh" value="<?php if(isset($bankinh)) echo $bankinh?>" required><br>  
                </td>
            </tr>
            <tr>
                <td>
                    <label>Diện tích:</label>
                    <input type="text" name="dientich" value="" disabled><br>
                    <span name="dientich"></span><br></td>
            </tr>
            <tr>
                <td>
                    <label>Chu vi:</label>
                    <input type="text" name="chuvi" disabled><br>
                    <span name="chuvi"></span><br></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Tính" name="tinh">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
