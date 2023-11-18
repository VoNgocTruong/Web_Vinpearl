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
        $ketqua = 0;
        $so1 = $_GET["soThuNhat"];
        $so2 = $_GET["soThuHai"];
        $phep = $_GET["phepTinh"];
        $phepTinh = "";
        if($phep == "cong"){
            $ketqua = $so1 + $so2;
            $phepTinh = "Cộng";
        }
        if($phep == "tru"){
            if($so2 < $so1){
                $ketqua = $so1 - $so2;
                $phepTinh = "Trừ";
            }
            else{
                $ketqua = "";
                $msg = "Số 1 phải > số 2";
            }
        }
        if($phep == "nhan"){
            $ketqua = $so1 * $so2;
            $phepTinh = "Nhân";
        }
        if($phep == "chia"){
            if($so2 != 0){
                $ketqua = round($so1 / $so2,2);
                $phepTinh = "Chia";
            }
        }
    ?>
    <form action="action_bt6.php" method="get">
        <table>
            <tr>
                <td colspan="2" id="header"><center>PHÉP TÍNH TRÊN HAI SỐ</center></td>
            </tr>
            <tr class="b">
                <td id="radiotl">Phép tính: </td>
                <td id="radiotd">
                    <?php 
                        if(isset($phepTinh)) echo $phepTinh;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="tdTitle b">Số 1: </td>
                <td>
                    <input type="number" readonly required name="soThuNhat" value="<?php if(isset($so1)) echo $so1; ?>">
                </td>
            </tr>
            <tr>
                <td class="tdTitle b">Số 2: </td>
                <td>
                    <input type="number" readonly required name="soThuHai" value="<?php if(isset($so2)) echo $so2; ?>">
                </td>
            </tr>
            <tr>
                <td class="tdTitle b">Kết quả</td>
                <td>
                    <input type="text" readonly value="<?php 
                        if(isset($ketqua)) 
                            echo $ketqua; 
                        if(isset($msg)) echo $msg;
                    ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href="javascript:window.history.back(-1);">Trở về trang trước</a>
                    <?php
                        if($phep=="chia" && $so2 == 0) echo "<script>javascript:window.history.back(-1);</script>";
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>