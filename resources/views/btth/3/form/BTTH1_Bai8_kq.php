<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH1 - Bài 8</title>
</head>
<body>
<?php
    $fullname=$_GET['fullname'];
    $address=$_GET['address'];
    $phone=$_GET['phone'];
    $gender=$_GET['gender'];
    $country=$_GET['country'];
    $studys=explode("%20", $_GET['study']);
    $note=$_GET['note'];

?>
    <form action="" method="post">
        <table>
            <tr>
                <td colspan="2"><h2>Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:</h2></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><?php echo $fullname?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><?php echo $address;?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><?php echo $phone;?></td>
            </tr>
            <tr>
                <td>Gener:</td>
                <td><?php echo $gender;?></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><?php echo $country;?></td>
            </tr>
            <tr>
                <td>Study:</td>
                <td><?php
                foreach($studys as $study){
                    echo $study;
                }
                ?></td>
            </tr>
            <tr>
                <td>Note:</td>
                <td><?php echo $note;?></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <a href='javascript:window.history.back(-1)' style="text-decoration: none; color: purple">Quay lại trang trước</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>