<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tsi{
            width: 140px;
        }
        #tei{
            width: 140px;
        }
        #thanhToan{
            width: 137px;
        }
        #form1{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
        }
    </style>
</head>
<body>
    <?php 
        function roundInt($int){
            $dau = substr($int, 0, strlen($int)-3);
            $cuoi = substr($int, -3);
            if($cuoi > 500){
                $dau++;
            }
            $lamTron = $dau. "000";
            return number_format($lamTron);
        }
        function hToM($hour, $minute){
            return $hour*60 + $minute;
        }

        define("truoc17", 333);
        define("sau17", 750);
        $tienThanhToan = "";
        $msg = "";
        if(isset($_GET["tinh"])){
            $gioBD = explode(":", $_GET["tStart"]);
            $gioKT = explode(":", $_GET["tEnd"]);

            $tmpBD = date("H:i", mktime($gioBD[0], $gioBD[1]));
            $tmpKT = date("H:i", mktime($gioKT[0], $gioKT[1]));
        
            $gioBatDau = explode(":", $tmpBD);
            $gioKetThuc = explode(":", $tmpKT);

            $ts = hToM($gioBatDau[0], $gioBatDau[1]);
            $te = hToM($gioKetThuc[0], $gioKetThuc[1]);


            //10h = 600
            //17h = 1020

            if($ts >= $te) $msg = "Giờ bắt đầu phải < giờ kết thúc";
            elseif($ts < 600 or $te < 600) $msg = "Hãy trở lại khi quán mở cửa!";
            else{
                $tienThanhToan = 0;
                if($te-$ts == 1){
                    $tienThanhToan = 1000;
                } 
                elseif ($ts < 1020) {
                    if ($te <= 1020) {
                        $tienThanhToan = ($te - $ts) * truoc17;
                    } else {
                        $tienThanhToan = (1020 - $ts) * truoc17 + ($te - 1020) * sau17;
                    }
                } else {
                    $tienThanhToan = ($te - $ts) * sau17;
                }
            }
        }
        if(isset($_GET["huy"])){
            $_GET["tStart"] = "";
            $_GET["tEnd"] = "";
        }

    ?>
    <form action="" id="form1" method="get">
        <table style="background-color:yellowgreen;">
            <tr>
                <td colspan="3" id="title" style="background-color:tomato;">TÍNH TIỀN KARAOKE</td>
            </tr>
            <tr>
                <td>Giờ bắt đầu</td>
                <td><input type="time" name="tStart" id="tsi" value="<?php if(isset($_GET["tStart"])) echo $_GET["tStart"]; ?>"></td>
                <td>(hh:mm)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc</td>
                <td><input type="time" name="tEnd" id="tei" value="<?php if(isset($_GET["tEnd"])) echo $_GET["tEnd"]; ?>"></td>
                <td>(hh:mm)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán</td>
                <td><input type="text" name="thanhToan" id="thanhToan" value="<?php if($tienThanhToan) echo roundInt($tienThanhToan); ?>"></td>
                <td>(VND)</td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="tinh" value="Tính tiền">
                    <input type="submit" name="huy" value="Nhập lại">
                </td>
            </tr>
            <tr>
                <td colspan="3"><?php if(!empty($msg)) echo $msg; ?></td>
            </tr>
        </table>
    </form>
</body>
</html>