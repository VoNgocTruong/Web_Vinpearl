<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .tr1{
            background-color: wheat;
        }
        .tr2{
            background-color: white;
        }
    </style>
</head>
<body>
<?php
    include"connectdb.php";

    $query2 = 'SELECT * FROM khach_hang';
    $result2 = $conn -> query($query2);
?>
<table>
    <h2>KHÁCH HÀNG</h2>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Phái</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
        <?php 
            function trColor($index){
                return ($index%2==0)?"\"tr1\"":"\"tr2\"";
            }
            
            $index = 0;

            if(!$result2) die("<br> QUERRY FAILED");
            else {  
                foreach($result2 as $record2){
                    echo "
                    <tr class=" . trColor($index) .">
                        <td>" .$record2["Ma_khach_hang"]. " </td>
                        <td>" .$record2["Ten_khach_hang"]. " </td>
                        <td>" .$record2["Phai"]. " </td>
                        <td>" .$record2["Dia_chi"]. " </td>
                        <td>" .$record2["Dien_thoai"]. " </td>
                        <td>" .$record2["Email"]. " </td>
                    <tr>";
                    $index++;
               }
            }
        ?>
</table>
</body>
</html>
