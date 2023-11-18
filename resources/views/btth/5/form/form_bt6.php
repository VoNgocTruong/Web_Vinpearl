<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #radiotl{
            color: red;
        }
        #radiotd{
            color:brown;
        }
        .tdTitle{
            float: right;
            color: blue;
        }
        #header{
            color:darkcyan;
        }
        .b{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php       
        if(isset($_GET["tinh"])){
            $ketqua = 0;
            $msg = "";
            $so1 = $_GET["soThuNhat"];
            $so2 = $_GET["soThuHai"];
            $phep = $_GET["phepTinh"];
            
            if($phep == "chia" and $so2 == 0){
                $msg = "Không thể chia cho 0";
            }
        }
    ?>
    <form action="action_bt6.php" method="get">
        <table>
            <tr>
                <td colspan="2" id="header"><center>PHÉP TÍNH TRÊN HAI SỐ</center></td>
            </tr>
            <tr>
                <td id="radiotd" class="b">Chọn phép tính:</td>
                <td id="radiotl">
                    <input checked type="radio" name="phepTinh" value="cong" id="">Cộng
                    <input type="radio" name="phepTinh" value="tru" id="">Trừ
                    <input type="radio" name="phepTinh" value="nhan" id="">Nhân
                    <input type="radio" name="phepTinh" value="chia" id="">Chia
                </td>
            </tr>
            <tr>
                <td class="tdTitle b">Số thứ nhất: </td>
                <td>
                    <input type="number" step="any" required name="soThuNhat" value="<?php if(isset($so1)) echo $so1; ?>">
                </td>
            </tr>
            <tr>
                <td class="tdTitle b">Số thứ hai: </td>
                <td>
                    <input type="number" step="any" required name="soThuHai" value="<?php if(isset($so2)) echo $so2; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="Tính" value="Tính" id="">
                </td>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($msg)) echo $msg;                
    ?>
</body>
</html>