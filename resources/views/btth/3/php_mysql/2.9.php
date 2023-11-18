<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 5px solid pink;
            width: 70%;

        }
        
        .center {
            margin: 0px auto;
            align-self: center;
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>
</head>
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'quanly_ban_sua';
    
    $conn = mysqli_connect($servername,$username,$password,$database);


    $find="";
    if (isset($_POST['submit'])){
        $find = $_POST['find'];
    }
?>
<body>
    <form method = "post">
        <table class='center'>
            <tr>
                <td colspan="2">
                    <h3>TIM KIEM THONG TIN SUA</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Ten sua:</h3>
                </td>
                <td>
                    <input type= "text" name= "find" size="50"
                        value="<?php
                            if(isset($_POST['submit'])) echo $_POST['find']
                        ?>" require>
                </td>
                <td>
                    <input type="submit" name="submit" value="Tim" >
                </td>
            </tr>
        </table>
    </form>

<?php

        $mysql= "SELECT * from sua where Ten_sua LIKE '%".$find."%'";
        $result = mysqli_query($conn,$mysql);

        echo"<div class='center'> <table>";

        if (mysqli_num_rows($result)===0)
        echo "<tr><td align='center'><h1>Khong tim thay ket qua</h1><td><tr>";
        else {
            

            if( mysqli_num_rows ( $result ) !=0){
                while ( $row = mysqli_fetch_row($result)){
                    echo "<tr>";
                        echo "<td colspan='2' style='background-color: pink;' >";
                            echo "<h1 style='font-weight: bold; display: flex;justify-content: center;'>";
                                echo $row[1];
                            echo"</h1>";
                        echo "</td>";
                    echo "</tr>";
    
                    echo "<tr>";
                        echo "<td>";
                            $r = rand(-100,100);
                            if( $r % 2 === 1)
                            echo "<img src='../../btth/sql/images/cho.jpg' height='200' width='200'>";
                            else echo "<img src='../../btth/sql/images/meo.jpg' height='200' width='200'>";
                        echo "</td>";
    
                        echo "<td>";
                            echo "<h2> Thanh phan dinh duong:</h2>";
                            echo $row[6]."<br>";
                            echo "<h2> Loi ich:</h2>";
                            echo $row[7]."<br>";
                            echo "<div style='font-weight: bold; display: flex;justify-content: flex-end;'>";
                                echo "<a style='font-weight: bold; '> Trong luong: </a>";
                                echo "<a >".$row[4]."g -  </a><br>";
                                echo "<a style='font-weight: bold;'> Don gia: </a>"; 
                                echo "<a > ".$row[5]." VND</a><br>";       
                            echo "</div>";
                        echo "</td>";
                    echo "</tr>";
                }
            }       
        }
        echo"</table> </div>";   
?>
</body>
</html>