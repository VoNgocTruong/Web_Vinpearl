<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm nâng cao</title>
    <style>
        #ketQuaTimKiem{
            width: 100%;
        }
        .tenSua{
            font-family: 'Courier New', Courier, monospace;
            color:darkgoldenrod;
        }
        .title{
            font-weight: bold;
            font-size: 30px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        .center{
            text-align: center;
        }
        .center{
            text-align: center;
        }
        #thongTinSua{
            border: 1px solid black;
        }
        #form{
            border: 2px solid orangered;
        }
        .bl{
            border-left: 1px solid black;
        }
        .bt{
            border-top: 1px solid black;
        }
        .bbt{
            border-bottom: 1px solid black;
        }
        .br{
            border-right: 1px solid black;
        }
        .bg-search{
            background-color:lightpink;
        }
        .result{
            font-weight: bold;
            font-size: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php 
        include"connect_db.php";
        $msg = "";
        $hangSua = "";
        $loaiSua = "";
        if(isset($_GET["search"])){
            $tenSua = $_GET["input"];
            $hangSua = $_GET["hangSua"];
            $loaiSua = $_GET["loaiSua"];

            $sua = mysqli_query($conn, "SELECT * FROM sua WHERE Ma_loai_sua = '$loaiSua' and Ma_hang_sua = '$hangSua' and Ten_sua LIKE '$tenSua%'");
            $count = mysqli_num_rows($sua);
            if($count>0) $msg = "Có $count sản phẩm được tìm thấy";
            else $msg = "Không tìm thấy sản phẩm nào";
        }
    ?>
    <form action="" method="get">
        <table id="ketQuaTimKiem">
            <tr class="bg-search">
                <td  class="center title">TÌM KIẾM THÔNG TIN SỮA</td>
            </tr>
            <tr class="bg-search center">
                <td>
                    <label for="hangSua"></label>
                    <select name="hangSua" id="">
                        <option value="AB" selected>Abbott</option>
                        <option value="DL"<?php if($hangSua=='DL') echo "selected"; ?>>Dutch Lady</option>
                        <option value="DS"<?php if($hangSua=='DS') echo "selected"; ?>>Daisy</option>
                        <option value="MJ"<?php if($hangSua=='MJ') echo "selected"; ?>>Mead Jonhson</option>
                        <option value="NTF"<?php if($hangSua=='NTF') echo "selected"; ?>>Nutifood</option>
                        <option value="VNM" <?php if($hangSua=='VNM') echo "selected"; ?>>Vinamilk</option>
                    </select> 
                    <label for="loaiSua"></label>
                    <select name="loaiSua" id="">
                        <option value="SB" selected>Sữa bột</option>
                        <option value="SC" <?php if($loaiSua=='SC') echo "selected"; ?>>Sữa chua</option>
                        <option value="SD" <?php if($loaiSua=='SD') echo "selected"; ?>>Sữa đặc</option>
                        <option value="ST" <?php if($loaiSua=='ST') echo "selected"; ?>>Sữa tươi</option>
                    </select> 
                </td>
            </tr>
            <tr class="bg-search">
                <td class="center">
                    <input type="text" name="input" value="<?php if(isset($tenSua)) echo $tenSua; ?>">
                    <input type="submit" name="search" value="Tìm kiếm">
                </td>
            </tr>
            <tr>
                <td class="center result"><?php 
                    if(isset($msg)) echo $msg;
                ?></td>
            </tr>
            <?php 
                if(isset($_GET["search"])){
                    if($count>0){
                        echo "<tr><td><table id='form'>";
                        while($row = mysqli_fetch_array($sua)){
                            echo "<tr id='thongTinSua'>";
                            echo "<td colspan='2' class='tenSua bt bbt br bl center'>".$row['Ten_sua']." - ".$row['Ma_hang_sua']."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td class='bl'><img src='./Hinh_sua/".$row['Hinh']."' width='200' height='200' alt=''></td>";
                            echo "<td class='bl'>";
                            echo "<p><b>Thành phần dinh dưỡng:</b><br>
                                    ".$row['TP_Dinh_Duong']."<br>
                                    <b>Lợi ích:</b><br>
                                    ".$row['Loi_ich']."<br>
                                    <b>Trọng lượng:</b> ".$row['Trong_luong']."gr - <b>Đơn giá:</b> ".$row['Don_gia']."VND
                                </p>";
                            echo "</td></tr></tr>";
                        }
                        echo "</td></td></table>";
                    }
                    
                }
            ?>
        </table>
    </form>
</body>
</html>