<!DOCTYPE html>
<html>
<head>
    <title>Bai1</title>
    <style>

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_POST["n"])) $n = $_POST["n"];
    ?>
    <form method="post" action="Bai1">
        <label for="n">Nhập n:</label>
        <input type="text" name="n" id="n" value="<?php if(isset($n)) echo $n ?>">
        <br>
        <input type="submit" value="Thực hiện">
    </form>

    <div class="result" style="text-align: center; width: 50%; margin:auto;">
    <?php
    if (isset($_POST["n"])) {
        $n = $_POST["n"];
        if (is_numeric($n) && $n > 0) {
            $n = floatval($n);
            if(!($n && intval($n) != $n)) {
                $arr = array();
                for ($i = 0; $i < $n; $i++) {
                    $arr[] = rand(-5,5);
                }
                echo "Mảng phát sinh ngẫu nhiên có $n phần tử: <br>";
                foreach ($arr as $element) {
                    echo "$element ";
                }

                $countEven = 0;
                $countLessThan100 = 0;
                $sumNegative = 0;

                for ($i = 0; $i < $n; $i++) {
                    if ($arr[$i] % 2 == 0) {
                        $countEven++;
                    }
                    if ($arr[$i] < 100) {
                        $countLessThan100++;
                    }
                    if ($arr[$i] < 0) {
                        $sumNegative += $arr[$i];
                    }
                    if ($arr[$i] == 0) {
                        echo "<br>Vị trí của phần tử có giá trị bằng 0: $i";
                    }
                }

                sort($arr); // Sắp xếp mảng tăng dần
                echo "<br>Mảng sau khi sắp xếp: <br>";
                foreach ($arr as $element) {
                    echo "$element ";
                }

                echo "<br>Số phần tử chẵn: $countEven";
                echo "<br>Số phần tử nhỏ hơn 100: $countLessThan100";
                echo "<br>Tổng các phần tử âm: $sumNegative";
            } else {
                echo "Vui lòng nhập một số nguyên dương hợp lệ.";
            }
        } else {
            echo "Vui lòng nhập một số nguyên dương hợp lệ.";
        }
    }
    ?>
    </div>
</body>
</html>
