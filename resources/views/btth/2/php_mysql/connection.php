<?php
    function get_connection(){
        $servename = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'quanly_ban_sua';
        $conn = mysqli_connect($servename, $username, $password, $dbname);
    
        $conn->set_charset('utf8');
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error); 
        }

        return $conn;
    }
?>