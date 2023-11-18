<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .table {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }

        .table th {
            text-align: center;
            padding: 10px 0;
        }

        .table tr {
            display: block;
            margin-bottom: 10px;
        }

        .table td {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .radio-group {
            display: flex;
        }

        .radio-group input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn-back {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php

    $maKH = $_GET['maKH'];
    $query = "SELECT * FROM khach_hang";
    $result1 = $conn -> query($query);

    include"connectdb.php";
    
    if(isset($_POST['submit'])){
        $maKH = $_POST['maKH'];
        $tenKH = $_POST['tenKH'];
        $gt = $_POST['gender'];
        $diaChi = $_POST['diaChi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];

        if($gt == 'Nam'){
            $gt = 0;
        }else $gt = 1; 

        
        $sql2 = "UPDATE `khach_hang` SET `Ma_khach_hang`='$maKH',`Ten_khach_hang`='$tenKH',`Phai`='$gt',`Dia_chi`='$diaChi',`Dien_thoai`='$sdt',`Email`='$email' where Ma_khach_hang = $maKH";
        $result2 = $conn->query($sql2);

    }

    ?>

    <form method="post" action="">
        <table class="table">
            <th colspan="2"><h2>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h2></th>
            <tr>
                <td>Mã khách hàng: </td>
                <td><input type="text" name="maKH" class="form-control" value="<?php echo $maKH;?>"/>
                </td>
            </tr>
            <tr>
                <td>Tên khách hàng:</td>
                <td><input type="text" name="tenKH" class="form-control" value="<?php echo $result1["Ten_khach_hang"];?>"/></td>
            </tr>
            <tr>
                <td>Phái: </td>
                <td>
                    <input type="radio" name="gender" value="Nam" checked><label>Nam</label>
                    <input type="radio" name="gender" value="Nữ"><label>Nữ</label>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diaChi" class="form-control" value="<?php if(isset($_POST['diaChi'])) echo $_POST['diaChi'];?>"/></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="text" name="sdt" class="form-control" value="<?php if(isset($_POST['sdt'])) echo $_POST['sdt'];?>"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" class="form-control" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"/></td>
            </tr>
            <tr>
                <td>
                    <a href="./bai2_12.php" class="btn-back">Back</a>
                    <input type="submit" name="submit" value="Save">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>