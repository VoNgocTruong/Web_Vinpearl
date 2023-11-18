<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luới thô hãng sữa</title>
    <style>
        #form{
            background-color: lightblue;
            border-collapse: collapse;
            width: 900px;
            font-size: 20px;
        }
        .thead{
            background-color:#0000ff57;
        }
        .center{
            text-align: center;
        }
        h1{
            font-family:'Courier New', Courier, monospace;
        }
    </style>
</head>
<body>
    <?php 
        include"connect_db.php";
        
        $querry = "SELECT * FROM hang_sua";
        $hang_sua = mysqli_query($conn, $querry);
    ?>
    <h1>THÔNG TIN HÃNG SỮA</h1>
    <form action="" method="get">
        <table id="form" border="1">
            <tr class="thead">
                <th>Mã HS</th>
                <th>Tên hãng sữa</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>
            <?php 
                #Ma_hang_sua, Ten_hang_sua, Dia_chi, Dien_thoai, Email
                foreach($hang_sua as $i){
                    echo "<tr>";
                    echo "<td class='center'>".$i["Ma_hang_sua"]."</td>";
                    echo "<td>".$i["Ten_hang_sua"]."</td>";
                    echo "<td>".$i["Dia_chi"]."</td>";
                    echo "<td>0".$i["Dien_thoai"]."</td>";
                    echo "<td>".$i["Email"]."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </form>
</body>
</html>