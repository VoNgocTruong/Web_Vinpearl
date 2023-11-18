<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #form1{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
            background-color: beige;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['tinh'])){
            
            $chisocu = $_POST['oldnumber'];
            $chisomoi = $_POST['newnumber'];
            $dongia = $_POST['dongia'];

            if($chisocu <=0 and $chisocu != 0 || $chisomoi <=0 and $chisomoi != 0){
                function tinhTienDien($chisomoi, $chisocu, $dongia){
                    return ($chisomoi - $chisocu) * $dongia;
                }
    
                $tong = tinhTienDien($chisomoi, $chisocu , $dongia);
            }
        }
    ?>
    <form method="post" action="tinhTienDien_form.php" id="form1">
        <table id="tb1">
            <tr style="background-color: orangered;">
                <td colspan="2"><h2>TINH TIEN DIEN</h2></td>
                
            </tr>
            <tr>
                <td>Ten chu ho<br>
                <input type="text" name="Ename" value="" placeholder="John Doe" ></td>
            </tr>
            <tr>
                <td>Chi so cu<br>
                <input type="text" name="oldnumber" value="<?php if(isset($chisocu)) echo $chisocu; ?>" placeholder="" required>(KW)</td>
            </tr>
            <tr>
                <td>Chi so moi<br>
                <input type="text" name="newnumber" value="<?php if(isset($chisomoi)) echo $chisomoi; ?>"  required>(KW)</td>
            </tr>
            <tr>
                <td>Don gia<br>
                <input type="number" name="dongia" value="20000" required>(VND)</td>
            </tr>
            <tr>
                <td>So tien thanh toan<br>
                <input type="number" name="tongtien" value="" placeholder="<?php if(isset($tong)) echo $tong;?>" disabled>(VND)</td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="tinh" value="tinh">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>