<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    th {
      background-color:coral;
    }
  </style>
</head>

<body>
  <?php
    include"connectdb.php";
    $sql ='SELECT Hinh,Ten_sua,Ten_hang_sua,Ten_loai,Trong_luong,Don_gia
        FROM sua
        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua';
    $result = $conn -> query($sql);

    echo "<table align='center' width='30%' border='1' style='border-collapse:collapse' >";
    echo "<tr><th colspan='2' align='center'><font size='5'  ><b>THÔNG TIN HÃNG SỮA</b></font></th></tr>"; 

    if (mysqli_num_rows($result) <> 0) {
        while ($rows = mysqli_fetch_row($result)) {
        echo "<tr>";
        echo "<td width='20%' height='200px' align='center'><img width='150px' src='./Hinh_sua/$rows[0]' alt=''></td>";
        echo "<td>
        <b>$rows[1]</b><br>
        Nhà sản xuất: $rows[2]<br>
        $rows[3] - $rows[4] gr - $rows[5] VNĐ</td>";
        echo "</tr>";
        }
    }
    echo "</table>";
?>

</body>

</html>