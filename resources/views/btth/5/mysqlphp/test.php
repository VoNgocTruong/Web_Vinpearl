<?php 
    include"connect_db.php";
    if(isset($_GET['submit'])){
        $hinh = $_GET["file"];
        echo $hinh;

        function autoID($string, $index){
            $num = 6 - strlen($string) - strlen($index);
            for($i=0;$i<$num;$i++){
                $string .= '0';
            }
            return $string.=$index+1;
        }
        $hangSua = "VNM";

        

        echo autoID($hangSua, mysqli_num_rows($suaCungHang));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="file" name="file" id="">
        <input type="submit" value="gui" name="submit">
    </form>
</body>
</html>