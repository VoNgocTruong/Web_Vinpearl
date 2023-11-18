<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tb1, #tr1, #td1{
            width: fit-content;
            font-size:large;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border: 1px solid black;
            border-radius: 1%;
            background-color: beige;
            text-align: center;
        }
        #tb2{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #tb2:nth-child(even) {
            background-color: #dddddd;
        }
        h2{
            color: blue;
        }
    </style>
</head>
<body>
<?php
    include"connectdb.php";

    $query1 = 'SELECT * FROM hang_sua';
    $result1 = $conn -> query($query1);

    $query2 = 'SELECT * FROM khach_hang';
    $result2 = $conn -> query($query2);
?>
<table id="tb1" class="w3-table-all w3-hoverable">
    <h2>THÔNG TIN HÃNG SỮA</h2>
    <tr id="tr1" class="w3-green">
        <th>Mã hãng sữa</th>
        <th>Tên hãng sữa</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
    </tr>
    <?php 
        if(!$result1) die("<br> QUERRY FAILED");
        else {  
            foreach($result1 as $record1){
                echo "
                <tr id='tr1'>
                    <td id='td1'>" .$record1["Ma_hang_sua"]. " </td>
                    <td id='td1'>" .$record1["Ten_hang_sua"]. " </td>
                    <td id='td1'>" .$record1["Dia_chi"]. " </td>
                    <td id='td1'>" .$record1["Dien_thoai"]. " </td>
                    <td id='td1'>" .$record1["Email"]. " </td>
                <tr>";
            }
        }
    ?>
</table>

<table id="tb2" class="w3-table-all w3-hoverable">
    <h2>KHÁCH HÀNG</h2>
        <tr  class="w3-green">
            <th>Mã</th>
            <th>Tên</th>
            <th>Phái</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
        <?php 
            if(!$result2) die("<br> QUERRY FAILED");
            else {  
                foreach($result2 as $record2){
                    if($record2["Phai"] == 0){
                        $record2["Phai"] = "Nam";
                    }else $record2["Phai"] = "Nữ";
                    echo "
                    <tr>
                        <td >" .$record2["Ma_khach_hang"]. " </td>
                        <td>" .$record2["Ten_khach_hang"]. " </td>
                        <td>" .$record2["Phai"]. " </td>
                        <td>" .$record2["Dia_chi"]. " </td>
                        <td>" .$record2["Dien_thoai"]. " </td>
                        <td>" .$record2["Email"]. " </td>
                    <tr>";
               }
            }
        ?>
</table>

</body>
</html>