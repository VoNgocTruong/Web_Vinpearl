<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền điện</title>
    <style>
        table{
            background-color:blanchedalmond;
            width: 370px;
        }
        table #header{
            background-color: orange;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST["submit"])){
            $tenChuHo = $_POST["tenChuHo"];
            $chiSoCu = $_POST["chiSoCu"];
            $chiSoMoi = $_POST["chiSoMoi"];
            $donGia = $_POST["donGia"];
            $msg = "";
            if($chiSoCu <= 0 || $chiSoMoi <= 0){
                $msg = "Các chỉ số phải > 0!";
            }
            elseif((($chiSoMoi - $chiSoCu) * $donGia) <= 0){
                $msg = "Có gì đó sai ở đây!";
            }
            else $thanhToan = ($chiSoMoi - $chiSoCu) * $donGia;
        }
    ?>
    <form method="post">
        <table>
            <tr id="header">
                <td colspan="3">
                    <center>THANH TOÁN TIỀN ĐIỆN</center>
                </td>
            </tr>
            <tr>
                <td>Tên chủ hộ: </td>
                <td>
                    <input type="text" step="any" name="tenChuHo" value="<?php if(isset($tenChuHo)) echo $tenChuHo; ?>">
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Chỉ số cũ: </td>
                <td>
                    <input type="number" required step="any" name="chiSoCu" value="<?php if(isset($chiSoCu)) echo $chiSoCu; ?>">
                </td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Chỉ số mới: </td>
                <td>
                    <input type="number" required step="any" name="chiSoMoi" value="<?php if(isset($chiSoMoi)) echo $chiSoMoi; ?>">
                </td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td>
                    <input type="number" step="any" name="donGia" value="20000">
                </td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán: </td>
                <td>
                    <input readonly type="text" name="thanhToan" value="<?php if(isset($thanhToan)) echo $thanhToan; ?>">
                </td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" name="submit" value="Tính">
                </td>
            </tr>
        </table>
    </form>
    <?php echo $msg; ?>
</body>
</html>