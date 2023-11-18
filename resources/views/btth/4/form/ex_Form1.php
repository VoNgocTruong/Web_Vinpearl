<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form đăng ký</title>
    <style>
        #form1{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
            background-color: lightblue;
        }
        p{
            width: fit-content;
            border: 1px solid black;
            border-radius: 1%;
            background-color: #22c0e0;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['register'])){
            $password = $_POST['password'];
            $email = $_POST['email'];
            $confirmPassword = $_POST['confirmPassword'];

        }
        function isPasswordValid($password){
            if(strlen($password) < 8){
                return false;
            }
            
            if (!preg_match("/[A-Z]/", $password)) {
                return false;
            }

            if (!preg_match("/[a-z]/", $password)) {
                return false;
            }

            if (!preg_match("/[0-9]/", $password)) {
                return false;
            }

            if (!preg_match("/[!@#$%^&*.,<>?:;()|\{}[]=_-]/", $password)) {
                return false;
            }
            return true;
        }
    ?>
    <form method="post" action="ex_Form1.php" name="ex_Form1.php" id="form1">
        <table id="tb1">
            <tr style="background-color: pink;">
                <td colspan="2"><h2>Registration</h2></td>
            </tr>
            <tr>
                <td>Full Name<br>
                <input type="text" name="Fname" value="<?php if(isset($_POST['Fname'])) echo $_POST['Fname']?>" placeholder="John Doe" required></td>
                <td>User Name<br>
                <input type="text" name="Uname" value="<?php if(isset($_POST['Uname'])) echo $_POST['Uname']?>" placeholder="Your Nick Name" required></td>
            </tr>
            <tr>
                <td>Email<br>
                <input type="text" name="email" value="<?php if(isset($email)) echo $email?>" placeholder="example@gmail.com" required></td>
                <td>Phone Number<br>
                <input type="text" name="phone" value="" placeholder="Your Phone Number" required></td>
            </tr>
            <tr>
                <td>Password<br>
                <input type="password" name="password" value="" placeholder="Enter Password" required></td>
                <td>Confirm Password<br>
                <input type="password" name="confirmPassword" value="" placeholder="Confirm Your Password" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="radio" name="sex" value="Male">Male
                    <input type="radio" name="sex" value="Female">Female
                    <input type="radio" name="sex" value="non" checked>Prefer not to say
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Register" name="register" style="background-color: beige;"><br></td>
            </tr>
        </table>
    </form>
    <p><?php if (isset($_POST['register'])) {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    echo "Incorrect Email! Please retry<br>";
                }
                elseif (isPasswordValid($password) == true) {
                    echo "Password must be at least 8 characters and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.<br>";
                }
                elseif ($password != $confirmPassword) {
                    echo "Incorrect confirm password! Please retry<br>";
                }
                else{
                    echo "<b>Xin chào " . $_POST['Uname'] . " Please confirm registration in your email: " . $_POST['email']."</b>";
                }
             } ?></p>
</body>
</html>
