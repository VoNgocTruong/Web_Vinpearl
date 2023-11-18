<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 2</title>
    <style>
        th{
            color: #A4361D
        }
    </style>
</head>
<body>
<?php
//Ket noi Database
    include('connection.php');
?>
<h2 align="center">THÔNG TIN KHÁCH HÀNG</h2>
<table align="center" width="auto" border = "1" >
    <tr>
        <th>Mã KH</th>
        <th>Tên khách hàng</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
    </tr>
    <?php
        $dem = 0;
        $conn = get_connection();
        $sql = "SELECT * FROM khach_hang";
        $result = mysqli_query ($conn , $sql );
        if( mysqli_num_rows ( $result ) !=0){
            while ( $row = mysqli_fetch_array($result)) {
                $n = mysqli_num_fields($result);
                if($dem % 2 == 0) echo "<tr bgcolor='#F9E1C5'>";
                else echo "<tr>";
                for($i=0; $i<$n-1; $i++){
                    if($i === 2) echo "<td align='center'>" . $row[$i] . "</td>";
                    else echo "<td>" . $row[$i] . "</td>";
                }
                echo "</tr>";
                $dem++;
            }
        }
    ?>
</table>
</body>
</html>