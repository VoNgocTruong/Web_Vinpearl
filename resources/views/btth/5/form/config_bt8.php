<?php
    echo "Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:";
    echo "<br>Fullname: " .$_GET["name"];
    echo "<br>Address: " .$_GET["add"];
    echo "<br>Phone: " .$_GET["phone"];
    if($_GET["gender"] == 'nu') $gender = "Nữ";
    else $gender = "Nam";
    echo "<br>Gender: " .$gender;
    $country = "";
    switch($_GET["country"]){
        case "vn":
            $country = "Việt Nam";
            break;
        case "us":
            $country = "Hoa Kỳ";
            break;
        case "cn":
            $country = "Trung Quốc";
            break;
        case "jp":
            $country = "Nhật Bản";
            break;
        case "kr": 
            $country = "Hàn Quốc";
            break;
        case "rus": 
            $country = "Liên Bang Nga";
            break;
        case "lao": 
            $country = "Lào";
            break;
        case "uk":
            $country = "Anh Quốc";
            break;
    }

    echo "<br>Country: ". $country;
    echo "<br>Note: " .$_GET["note"];



    // <option selected value="vn">Việt Nam</option>
    // <option value="us">Hoa Kỳ</option>
    // <option value="cn">Trung Quốc</option>
    // <option value="jp">Nhật Bản</option>
    // <option value="kr">Hàn Quốc</option>
    // <option value="rus">Liên Bang Nga</option>
    // <option value="lao">Lào</option>
    // <option value="uk">Anh Quốc</option>
?>