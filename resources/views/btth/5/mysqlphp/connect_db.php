<?php 
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "quanly_ban_sua";

    //hàm
    // $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    // mysqli_set_charset($conn, 'utf8');
    // if(!$conn){
    //     die("Connection failed: ". mysqli_connect_error());
    // }
    // else echo ">>>Thanh cong";

    //hướng đối tượng;
    $conn = new mysqli($serverName, $userName, $password, $dbName);
    mysqli_set_charset($conn, 'utf8');
    if($conn->connect_error){
        die("Connection failed: ".  $conn->connect_error);
    }
    else{
        echo "";
    }
?>