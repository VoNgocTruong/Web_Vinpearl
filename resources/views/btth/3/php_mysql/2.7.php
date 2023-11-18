<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        align-items: center;
        text-align: center;
        align-self: center;
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
    
    $result = mysqli_query ($conn , "select * from sua" );
    $dem=0;
?>
<!-- <img/> -->
    <table>
        <tr>
            <th colspan="5"><h2>Thong tin san pham</h2></th>
        </tr>
        <?php
            echo "<tr>";
            if( mysqli_num_rows ( $result ) !=0){
                while ( $row = mysqli_fetch_row($result)){
                    $dem++;
                    echo "<td align-item: 'center'; >";

                    echo "<a href='./btth/sql/2.7.detail.php?id=".$row[0]."'>".$row[1]."</a><br>";
                    echo "<a>".$row[4]."g - ".$row[5]." VND</a><br>";
                    $r = rand(-100,100);
                    if( $r % 2 === 1)
                        echo "<img src='../../btth/sql/images/cho.jpg' height='80' width='80'>";
                    else echo "<img src='../../btth/sql/images/meo.jpg' height='80' width='80'>";

                    echo "</td>";
                    if ($dem%5 ===0 ) echo "</tr><tr>";
                }
            }

        ?>

    </table>
</body>
</html>