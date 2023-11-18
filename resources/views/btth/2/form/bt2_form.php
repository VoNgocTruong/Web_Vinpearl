<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regiter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Để căn giữa theo chiều cao */
            margin: 0;
        }

        h2 {
            color: purple;
        }

        table {
            background-color: white;
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 400px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }

        table td {
            padding: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }

        input[type="submit"] {
            background: purple;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #9447b4;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
<?php 

    //Hàm kiểm tra định dạng email
    function is_valid_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    if(isset($_GET['register'])){
        $pass1 = $_GET['pass'];
        $pass2 = $_GET['repass'];
        $fullName = $_GET['fullName'];
        $userName = $_GET['userName'];
        $email = $_GET['email'];
        $telephone = $_GET['telephone'];
        $sex = $_GET['sex'];
        $msg = "";

        //thông báo trường nhập full name không được để trống
        if(empty($fullName)){
            $msg .= "Full name can not be blank!<br>";
        }

        //thông báo trường nhập user name không được để trống
        if(empty($userName)){
            $msg .= "User name can not be blank!<br>";
        }

        if(empty($telephone)){
            $msg .= "Telephone can not be blank!<br>";
        }

        //kiểm tra trường nhập email và định dạng của email 
        if(!empty($email)){
            if (!is_valid_email($email)) {
                $msg .= "Email is not in a valid format.<br>";
            }
        }else{
            $msg .= "Email can not be blank!<br>";
        }

        //kiểm tra mật khẩu và xác thực mật khẩu
        if (!empty($pass1) && !empty($pass2)) {
            if ($pass1 == $pass2) {
                // Kiểm tra mật khẩu mạnh
                $uppercase = preg_match('/[A-Z]/', $pass1);
                $lowercase = preg_match('/[a-z]/', $pass1);
                $number    = preg_match('/[0-9]/', $pass1);
                $specialChars = preg_match('/[!@#\$%^&*()\-_=+{};:,<.>]/', $pass1);

                if(strlen($pass1) < 8){
                    $msg .= "Password should be at least 8 characters in length!<br>";
                }

                if(!$uppercase){
                    $msg .= "Password should include at least one upper case letter!<br>";
                }

                if(!$lowercase){
                    $msg .= "Password should include at least one lowwer case letter!<br>";
                }

                if(!$number){
                    $msg .= "Password should include at least one number!<br>";
                }

                if(!$specialChars){
                    $msg .= "Password should include at least one special character!<br>";
                }
                
            } else {
                $msg = "Incorrect confirm password.";
            }
                    
        } else {
            $msg .= "Password can not be blank.";
        }
        
    }    
?>

    <form action="bt2_form.php" name="registration" method="get">
        <table align="center">
            <tr>
                <td colspan="2">
                    <h2>Registration</h2>
                </td>
            </tr>

            <tr>
                <td>Fullname</td>
                <td>Username</td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="fullName" value="<?php if(isset($_GET['fullName'])) echo $_GET['fullName']; ?>"
                    placeholder="Enter Fullname" size="25">
                </td>
                <td>
                    <input type="text" name="userName" value="<?php if(isset($_GET['userName'])) echo $_GET['userName']; ?>"
                    placeholder="Enter UserName" size="25">
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>Phone Number</td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>"
                    placeholder="Enter Email" size="25">
                </td>
                <td>
                    <input type="text" name="telephone" value="<?php if(isset($_GET['telephone'])) echo $_GET['telephone']; ?>"
                    placeholder="Enter Phone Number" size="25">
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>Confirm Password</td>
            </tr>

            <tr>
                <td>
                    <input type="password" name="pass" value="<?php if(isset($_GET['pass'])) echo $_GET['pass']; ?>"
                    placeholder="Enter Password" size="25">
                </td>
                <td>
                    <input type="password" name="repass" value="<?php if(isset($_GET['repass'])) echo $_GET['repass']; ?>"
                    placeholder="repass" size="25">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <h3>Gender</h3>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="radio" name="sex" value="Male"<?php if(isset($sex) && $sex == 'Male') echo "checked"?>>Male
                    <input type="radio" name="sex" value="Female"<?php if(isset($sex) && $sex == 'Female') echo "checked"?>>Female
                    <input type="radio" name="sex" value="none"<?php if(!isset($sex) || $sex == 'none') echo "checked"?>>None                </td>
            </tr>

            <tr>
                <th colspan="2" style="background: purple">
                    <input type="submit" name="register" value="Register" style="background: purple; color: white; border: none;">
                </th>
            </tr>

            <tr>
                <th colspan="2" style="color: red">
                    <?php 
                        if(isset($msg)) echo $msg; else echo '';
                        if(isset($msg) && empty($msg)) echo '<span style="color: green;">Thank you, ' . $fullName . '!<br>Please confirm your registration in your email: ' . $email ;                    
                    ?>    
                </th>
            </tr>
        </table>
    </form>

</body>
</html>