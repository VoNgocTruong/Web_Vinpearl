<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> -->
    <style>
    table, th, td {
        border: 1px solid;
    }
    </style>
<!-- </head>
<body> -->
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'quanly_ban_sua';

    $conn = mysqli_connect($servername,$username,$password,$database);

    //check connect 
    if (!$conn)
    {
        die('Connect failed: '. mysqli_connect_error());
    }else echo 'Ket noi thanh cong <br><br>';

    $sql = " SELECT * FROM  hang_sua";
    $result = mysqli_query ($conn , $sql );
    echo"<br><p align='center'>THONG TIN HANG SUA</p>";
    echo "<table  >";
    echo "<tr>";
        echo "<th>MH</th>";
        echo "<th>Ten hang</th>";
        echo "<th>Dia chi</th>";
        echo "<th>Sdt</th>";
        echo "<th>email</th>";
    echo "</tr>";
    if( mysqli_num_rows ( $result ) !=0){
        while ( $row = mysqli_fetch_row($result)) {
            $n = mysqli_num_fields($result);
            echo"<tr>";
            for( $i = 0; $i<$n;$i++)
            {
                echo "<td>".$row[$i]."</td>";
            }
            echo"</tr>";
            // echo "<br><br>";
        }
    }

    echo "</table>";
    mysqli_free_result($result);
    mysqli_close($conn);

?>
<!-- </body>
</html> -->