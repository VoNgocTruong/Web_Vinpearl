<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3</title>
</head>
<body>
<?php
    define('dg',20000);
    $msg = "";

    if (isset($_POST['submit'])){
        $name = $_POST['name'];      //tên chủ hộ
        $old_value = $_POST['old_value'];         //chỉ số cũ
        $new_value = $_POST['new_value'];         //chỉ số mới
        
        if(empty($name)){
           $msg .= "Name can not be blank!<br>"; 
        }

        if (isset($old_value) and $old_value>0 and isset($new_value) and $new_value>0){
            if($old_value <= $new_value){
                $tt = ($new_value - $old_value) * dg;
            }else{
                $msg .= "New value must be greater than the old value!";
            }
        }else{
            $msg .= "Old value and new value > 0";
        }
    }
    if (isset($_POST['reset'])){
        $name="";
        $old_value="";
        $new_value="";
        $tt="";
    }
?>
    <form action="bt3.php" method="post">
        <table align="center" bgcolor="#FDF4D7">
            <tr>
                <td align="center" bgcolor="#F8D484" colspan="2"><h1>THANH TOÁN TIỀN ĐIỆN</h1></td>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td><input type = "text" name = "name" value="<?php if (isset($name)) echo $name;?>" placeholder="Tên chủ hộ" require>
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td><input type = "number" step="any" name = "old_value" value="<?php if (isset($old_value)) echo $old_value;?>" placeholder="Chỉ số cũ">(Kw)</td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td><input type = "number" step="any" name = "new_value" value="<?php if (isset($new_value)) echo $new_value;?>"placeholder="Chỉ số mới">(Kw)</td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><input type = "text" name = "dongia" value="20000" disabled>(VNĐ)</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td><input style="background: #F8D6DA" type = "text" value="<?php if (isset($tt)) echo $tt; else echo ""?>" disabled>(VNĐ)</td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="color: red">
                    <?php if(isset($msg)) echo $msg; else echo '';?>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type = "submit" name = "submit" value = "Tính">
                    <input type = "submit" name = "reset" value = "Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>