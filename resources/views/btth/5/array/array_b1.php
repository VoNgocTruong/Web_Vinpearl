<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        function fsort($arr){
            for($i=0;$i<count($arr)-1;$i++){
                for($j=$i+1;$j<count($arr);$j++){
                    if($arr[$i] > $arr[$j]){
                        $tmp = $arr[$i];
                        $arr[$i] = $arr[$j];
                        $arr[$j] = $tmp;
                    }
                }
            }
            return $arr;
        }
        $msg = "";
        if(isset($_GET["thucHien"])){
            $n = $_GET["number"];
            
            if(filter_var($n, FILTER_VALIDATE_INT) and $n > 0){
                $msg .= "<br><b>b. </b> Mảng ngẫu nhiên[]: ";
                $arr = array();
                for($i=0;$i<$n;$i++){
                    $arr[$i] = rand(-100, 100);
                }
                foreach($arr as $i){
                    if($i%2==0){
                        $msg .="<b>" .$i ."</b> ";
                    }
                    else $msg .= $i ." ";
                }

                #đếm số phần tử chẵn trong mảng
                $dem = 0;
                foreach($arr as $i){
                    if($i%2==0) $dem++;
                }

                $msg .= "<br><b>c. </b> Số phần tử chẵn trong mảng: " . $dem;
                #đếm số phần tử > 100
                $dem = 0;
                foreach($arr as $i){
                    if($i>100) $dem++;
                }
                $msg .= "<br><b>d. </b> Số phần tử > 100: " . $dem;
                #tổng phần tử âm
                $tong = 0;
                foreach($arr as $i){
                    if($i<0) $tong+=$i;
                }
                $msg .= "<br><b>e. </b> Tổng phần tử âm: " . $tong;
                #vị trí các phần tử = 0 trong mảng
                for($i=0;$i<$n;$i++){
                    if($arr[$i] == 0) $msg .= $i ." ";
                }
                #sắp xếp tăng dần
                $after_sort = fsort($arr);
                $msg .= "<br><b>f. </b>Mảng sau khi sắp xếp tăng dần: ";
                foreach($after_sort as $i) $msg .= $i. " ";
                
            }
            else $msg = "$n không là số nguyên dương";
        }
    ?>
    <form action="" method="get">
        <table>
            <tr>
                <td>Nhập số nguyên dương: </td>
                <td><input type="number" required name="number" value="<?php if(isset($n)) echo $n; ?>"></td>
                <td><input type="submit" name="thucHien" value="Thực hiện"></td>
            </tr>
        </table>
    </form>
    <?php 
        echo $msg;
    ?>
</body>
</html>