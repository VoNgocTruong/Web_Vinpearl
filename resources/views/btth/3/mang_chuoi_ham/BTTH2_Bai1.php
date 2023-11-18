<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH2 - Bài 1</title>
</head>
<body>
<?php

?>
    <form action="BTTH2_Bai1.php" method="post">
        <table>
            <tr>
                <td>Nhập n:</td>
                <td><input type="text" name="n" value="<?php if (isset($_POST['n'])) echo $_POST['n'];?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td>
                    <textarea name="textarea" id="mang" cols="25" rows="10" disabled>
                        <?php
                            $arr = array();

                            if (isset($_POST['n']) and !empty($_POST['n']) and is_numeric($_POST['n']) and $_POST['n'] > 0){
                                // Câu b
                                echo "Mảng: ";
                                for($i = 0; $i < $_POST['n']; $i++)
                                {
                                    $arr[$i] = rand(-1000, 1000);
                                    echo $arr[$i] . " " ;
                                }
                                // Câu c
                                $even_count = 0;
                                foreach ($arr as $value) {
                                    if($value%2 == 0)
                                        $even_count++;
                                }
                                echo "\nSố chẵn: " . $even_count;
                                // Câu d
                                $less_than_100_count = 0;
                                foreach ($arr as $value) {
                                    if($value < 100)
                                        $less_than_100_count++;
                                }
                                echo "\nSố < 100: " . $less_than_100_count;
                                // Câu e
                                echo "\nTổng số âm: ";
                                $negative_sum = 0;
                                foreach ($arr as $value) {
                                    if($value < 0)
                                        $negative_sum = $negative_sum + $value;
                                }
                                echo $negative_sum;
                                // Câu f
                                $zero_positions = array();
                                echo "\nVị trí 0: ";
                                for($i = 0; $i < $_POST['n']; $i++)
                                {
                                    if ($arr[$i] == 0) {
                                        $zero_positions[] = $i; // Thêm vị trí vào mảng zero_positions
                                    }
                                }

                                foreach ($zero_positions as $position) {
                                    echo $position . " ";
                                }
                                // Câu g
                                echo "\nMảng sắp xếp: ";
                                $temp = 0;
                                for($i = 0; $i < $_POST['n']-1; $i++){
                                    for($j = $i + 1; $j < $_POST['n']; $j++){
                                        if($arr[$i] > $arr[$j]){
                                            $temp = $arr[$i];
                                            $arr[$i] = $arr[$j];
                                            $arr[$j] = $temp;
                                        }
                                    }
                                }
                                for($i = 0; $i<$_POST['n']; $i++)
                                {
                                    echo $arr[$i] . " ";
                                }
                            }
                            else
                            {
                                if(!isset($_POST['n']) || empty($_POST['n'])) {
                                    echo "Vui lòng nhập n";
                                }
                                else {
                                    echo "n không phải số nguyên dương";
                                }
                            }
                        ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="submit" value="Thực hiện">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>