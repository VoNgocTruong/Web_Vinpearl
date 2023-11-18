<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1</title>
</head>
<body>
<?php
    
?>
    <form action="bt1.php" method="post">
        <table align="center">
            <tr>
                <td>Nhập n:</td>
                <td><input type = "text" name = "n" value="<?php if (isset($_POST['n'])) echo $_POST['n'];?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td>
                    <textarea align="left" name="textarea" id="mang" cols="25" rows="10" disabled>
                        <?php
                            $arr = array();

                            if (isset($_POST['n']) and is_numeric($_POST['n']) and $_POST['n'] > 0){
                                //Câu b
                                echo "Mảng: ";
                                for($i = 0; $i < $_POST['n']; $i++)
                                {
                                    $arr[$i] = rand(-1000, 1000);
                                    echo $arr[$i] . " " ;
                                }

                                //Câu c
                                $count_even_number = 0;
                                foreach ($arr as $value) {
                                    if($value%2 == 0)
                                        $count_even_number++;
                                }
                                echo "\nSố phần tử chẵn: " . $count_even_number;

                                //Câu d
                                $count_greater_than_100 = 0;
                                foreach ($arr as $value) {
                                    if($value < 100)
                                        $count_greater_than_100++;   
                                }
                                echo "\nSố phần tử nhỏ hơn 100: " . $count_greater_than_100;
                                
                                //Câu e
                                echo "\nTổng phần tử số âm: ";
                                $result = 0;
                                foreach ($arr as $value) {
                                    if($value < 0)
                                        $result = $result + $value;
                                }
                                echo $result;

                                //Câu f
                                $zero_positions = array();
                                echo "\nVị trí phần tử bằng 0: ";
                                for($i = 0; $i < $_POST['n']; $i++)
                                {
                                    if ($arr[$i] == 0) {
                                        $zero_positions[] = $i; // Thêm vị trí vào mảng zero_positions
                                    }
                                }

                                foreach ($zero_positions as $position) {
                                    echo $position . " ";
                                }

                                //Câu g
                                echo "\nMảng đã sắp xếp: ";
                                $tam = 0;
                                for($i = 0; $i < $_POST['n']-1; $i++){
                                    for($j = $i + 1; $j < $_POST['n']; $j++){
                                        if($arr[$i] > $arr[$j]){
                                            $tam = $arr[$i];
                                            $arr[$i] = $arr[$j];
                                            $arr[$j] = $tam;        
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
                                if(!isset($_POST['n'])) {
                                    echo "";
                                }
                                else echo "n không phải là số nguyên dương";
                            }
                        ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type = "submit" name = "submit" value = "Thực hiện">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>