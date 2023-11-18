<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tbForm{
            width: 450px;
            background-color: lightblue;
            height: 200px;
        }
        .text{
            width: 270px;
        }
        .center{
            text-align: center;
        }
        .title{
            font-size: 20px;
            font-weight: bold;
            
        }
        .footer{
            background-color: cornflowerblue;
        }
        .color-red{
            color:red;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST["timKiem"])){
            $input = $_POST["inputMang"];
            $soCanTim = $_POST["soCanTim"];
            $ketQua = "";
            $arr = explode(",", $input);
            foreach($arr as $i) echo "[$i] ";
            $dem = 0;
            $viTri = array();
            $vt = 0;
            

            $index = 0;
            for($i=0;$i<count($arr);$i++){
                if($arr[$i] == $soCanTim){
                    $pos = $i+1;
                    $viTri[$vt] = $pos;
                    $vt++;
                    $dem++;
                }
            }
            
            $stringViTri = implode(", ", $viTri);
            if($dem <= 0){
                $ketQua = "Không tìm thấy $soCanTim trong mảng";
            }
            elseif($dem == 1){
                $ketQua = "Tìm thấy $soCanTim tại vị trí thứ $viTri[0] của mảng";
            }
            else{
                $ketQua = "Tìm thấy $soCanTim tại các vị trí ". $stringViTri . " của mảng";
            }
        }
        if(isset($_POST["xoa"])){
            $_POST["mang"] = "";
            $_POST["inputMang"] = "";
            $_POST["soCanTim"] = "";
            $_POST["ketQua"] = "";
        }
    ?>
    <form action="array_bt4.php" method="post" name="ten">
        <table id="tbForm">
            <tr>
                <td colspan="2" class="center title footer">
                    TÌM KIẾM
                </td>
            </tr>
            <tr>
                <td>Nhập mảng: </td>
                <td>
                    <input type="text" name="inputMang" required value="<?php if(isset($input)) echo $input; ?>" class="text">
                    <input type="text" name="soPT" readonly value="<?php if(isset($input)) echo $input; ?>" class="small">
                </td>

            </tr>
            <tr>
                <td>Nhập số cần tìm: </td>
                <td><input type="number" name="soCanTim" required id="soCanTim" pattern="[0-9]+" value="<?php if(isset($soCanTim)) echo $soCanTim; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="timKiem" value="Tìm kiếm" >
                    <input type="submit" name="xoa" value="Xóa" >
                </td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td><input type="text" name="mang" readonly value="<?php if(isset($input)) echo $input; ?>" class="text"></td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm: </td>
                <td><input type="text" name="ketQua" readonly value="<?php if(isset($ketQua)) echo $ketQua; ?>" class="text color-red"></td>
            </tr>
            <tr>
                <td colspan="2" class="footer center">(Các phần tử trong mảng sễ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>