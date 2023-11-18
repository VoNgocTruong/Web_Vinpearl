<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1</title>
</head>
<body>
<?php
//Ket noi Database
    include('connection.php');
?>
<h2 align="center">THÔNG TIN HÃNG SỮA</h2>
<table align="center" width="auto" border = "1" >
    <tr>
        <th>Mã HS</th>
        <th>Tên hãng sữa</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
    </tr>
    <?php
        $conn = get_connection();
        $sql = "SELECT * FROM hang_sua";
        $result = mysqli_query ($conn , $sql );
        if( mysqli_num_rows ( $result ) !=0){
            while ( $row = mysqli_fetch_array($result)) {
                $n = mysqli_num_fields($result);
                echo "<tr>";
                for($i=0; $i<$n; $i++){
                    echo "<td>" . $row[$i] . "</td>";
                }
                echo "</tr>";
            }
        }
    ?>
</table>
</body>
</html>