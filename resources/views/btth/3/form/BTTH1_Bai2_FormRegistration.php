<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<?php

    // Function to validate email format
    function is_valid_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    if(isset($_GET['register'])){
        $password1 = $_GET['pass'];
        $password2 = $_GET['repass'];
        $fullName = $_GET['fullName'];
        $username = $_GET['userName'];
        $email = $_GET['email'];
        $telephone = $_GET['telephone'];
        $gender = $_GET['sex'];
        $errorMessage = "";

        if(empty($fullName)){
            $errorMessage .= "Họ tên không được để trống!<br>";
        }

        if(empty($username)){
            $errorMessage .= "Tên đăng nhập không được để trống!<br>";
        }

        if(empty($telephone)){
            $errorMessage .= "Số điện thoại không được để trống!<br>";
        }

        if(!empty($email)){
            if (!is_valid_email($email)) {
                $errorMessage .= "Email không đúng định dạng.<br>";
            }
        }else{
            $errorMessage .= "Email không được để trống!<br>";
        }

        if (!empty($password1) && !empty($password2)) {
            if ($password1 == $password2) {
                $upperCase = preg_match('/[A-Z]/', $password1);
                $lowerCase = preg_match('/[a-z]/', $password1);
                $number = preg_match('/[0-9]/', $password1);
                $specialChar = preg_match('/[!@#\$%^&*()\-_=+{};:,<.>]/', $password1);

                if(strlen($password1) < 8){
                    $errorMessage .= "Mật khẩu phải có ít nhất 8 ký tự!<br>";
                }

                if(!$upperCase){
                    $errorMessage .= "Mật khẩu phải chứa ít nhất một ký tự viết hoa!<br>";
                }

                if(!$lowerCase){
                    $errorMessage .= "Mật khẩu phải chứa ít nhất một ký tự viết thường!<br>";
                }

                if(!$number){
                    $errorMessage .= "Mật khẩu phải chứa ít nhất một chữ số!<br>";
                }

                if(!$specialChar){
                    $errorMessage .= "Mật khẩu phải chứa ít nhất một ký tự đặc biệt!<br>";
                }
            } else {
                $errorMessage = "Mật khẩu xác thực không đúng.";
            }
        } else {
            $errorMessage .= "Mật khẩu không được để trống.";
        }
    }
?>

    <form action="BTTH1_Bai2_FormRegistration.php" name="registration" method="get">
        <table align="center">
            <tr>
                <td colspan="2">
                    <h2>Registration</h2>
                </td>
            </tr>

            <tr>
                <td>Full Name</td>
                <td>Username</td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="fullName" value="<?php
                        if(isset($_GET['fullName'])) echo $_GET['fullName']; ?>"
                    placeholder="Enter full name" size="25">
                </td>
                <td>
                    <input type="text" name="userName" value="<?php
                        if(isset($_GET['userName'])) echo $_GET['userName']; ?>"
                    placeholder="Enter username" size="25">
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>Telephone</td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="email" value="<?php
                        if(isset($_GET['email'])) echo $_GET['email']; ?>"
                    placeholder="Enter email" size="25">
                </td>
                <td>
                    <input type="text" name="telephone" value="<?php
                        if(isset($_GET['telephone'])) echo $_GET['telephone']; ?>"
                    placeholder="Enter telephone" size="25">
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>Confirm Password</td>
            </tr>

            <tr>
                <td>
                    <input type="password" name="pass" placeholder="Enter password" size="25">
                </td>
                <td>
                    <input type="password" name="repass" placeholder="Confirm password" size="25">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="radio" name="sex" value="Male"<?php
                        if(isset($sex) && $sex == 'Male') echo "checked"?>>Male
                    <input type="radio" name="sex" value="Female"<?php
                        if(isset($sex) && $sex == 'Female') echo "checked"?>>Female
                    <input type="radio" name="sex" value="none"<?php
                        if(!isset($sex) || $sex == 'none') echo "checked"?>>None                </td>
            </tr>

            <tr>
                <th colspan="2" style="background: purple">
                    <input type="submit" name="register" value="Register" style="background: purple; color: white; border: none;">
                </th>
            </tr>

            <tr>
                <th colspan="2" style="color: red">
                    <?php
                        if(isset($errorMessage)) echo $errorMessage; else echo '';
                        if(isset($errorMessage) && empty($errorMessage))
                            echo '<span style="color: green;">Thank you, ' . $fullName .
                        '!<br>Please confirm your registration in your email: ' . $email ;
                    ?>
                </th>
            </tr>
        </table>
    </form>
</body>
</html>