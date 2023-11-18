<?php
if (isset($_POST['submit'])) {
    $n = $_POST['n'];

    if (filter_var($n, FILTER_VALIDATE_INT) && $n > 0) {
        $array = [];
        $evenCount = 0;
        $lessThan100Count = 0;
        $negativeSum = 0;
        $zeroPositions = [];
        
        for ($i = 0; $i < $n; $i++) {
            $randomNumber = rand(-100, 100); 
            $array[] = $randomNumber;
            
            if ($randomNumber % 2 == 0) {
                $evenCount++;
            }
            if ($randomNumber < 100) {
                $lessThan100Count++;
            }
            if ($randomNumber < 0) {
                $negativeSum += $randomNumber;
            }
            if ($randomNumber == 0) {
                $zeroPositions[] = $i;
            }
        }
        
        sort($array);
        
        echo "<h2>Kết quả</h2>";
        echo "<p>Mảng ngẫu nhiên: " . implode(", ", $array) . "</p>";
        echo "<p>Số phần tử chẵn: $evenCount</p>";
        echo "<p>Số phần tử nhỏ hơn 100: $lessThan100Count</p>";
        echo "<p>Tổng các số âm: $negativeSum</p>";
        echo "<p>Vị trí của các số 0: " . implode(", ", $zeroPositions) . "</p>";
    } else {
        echo "<p>N không phải là số nguyên dương.</p>";
    }
}
?>
