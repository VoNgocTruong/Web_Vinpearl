<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
        border-collapse: collapse;
        /* border-width: 5;
        border-color: black; */
        border: 1px solid black;
        /* width: 100%; */
        }

        /* th{
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even){background-color: pink}
*/      
        td{
            border: 1px solid black;
        }
        th {
        background-color: #04AA6D;
        border: 1px solid black;
        color: white;
        text-align: center;
        }
    
    </style>
</head>
<body>
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

    $sql = " SELECT * FROM  khach_hang";
    $result = mysqli_query ($conn , $sql );
    echo "<table>";
    echo "<tr align='center'><td  colspan='5'><p align='center'>THONG TIN KHACHHANG</p></td></tr>";
    echo "<tr>";
        echo "<th>MH</th>";
        echo "<th>Ten hang</th>";
        echo "<th>Gioi tinh</th>";
        echo "<th>Dia chi</th>";
        echo "<th>Sdt</th>";
        // echo "<th>email</th>";
    $dem =0;
    echo "</tr>";
    if( mysqli_num_rows ( $result ) !=0){
        while ( $row = mysqli_fetch_row($result)) {
            $n = mysqli_num_fields($result);
            if ($dem %2 === 0)
            echo"<tr bgcolor='pink'>";
            else echo"<tr>";
            for( $i = 0 ; $i < $n-1 ; $i++)
            {
                $gt = "";
                if ($row[$i] === '0') $gt="Nam"; else $gt="NU";

                if ($i === 2) echo "<td align='center';>".$gt."</td>";
                else echo "<td>".$row[$i]."</td>";
            }
            echo"</tr>";

            $dem++;
            // echo "<br><br>";
        }
    }

    echo "</table>";
    mysqli_free_result($result);
    mysqli_close($conn);

?>
</body>
</html>