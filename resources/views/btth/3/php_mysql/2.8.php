<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tour Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
    <script type = "text/javascript" 
        src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- <script type = "text/javascript" language = "javascript">
            $(document).ready(function() {
                $("a").click(function(event){
                event.preventDefault();
                // alert( "Default behavior is disabled!" );
                });
            });
    </script> -->
</head>
<?php 
//-- you can modified it like you want

    function rating($n){
        $a= (float) $n;
        $t="";
        for ($i=0; $i< (int)$a;$i++) echo "<i class='bi bi-star-fill'></i>";
        $start=0;
        if (($a - (int)$a) >= 0.3  )
        {
            echo "<i class='bi bi-star-half'></i>";
            $start = (int)$a + 1;
        }else {
            $start = (int)$a;
        }
        for ($i=$start; $i<5;$i++) echo"<i class='bi bi-star'></i>";
    }

// echo $width = "<script>var w = window.innerWidth;
// var h = window.innerHeight;</script><br>";
    // $height = "<script>document.write(window.innerHeight);</script>";
// echo $height."<br>";
// echo $width = "<script>document.write(window.innerWidth);</script>";

?>


<!-- ---------------------------------------------------- -->
<script >
        // window.onload=function () {
            
        //     // var objDiv = document.getElementById("div1");
        //     // objDiv.scrollTop = objDiv.scrollHeight;
        //     <?php
        //     if(isset($_GET['trang'])){
        //     ?>
        //     document.querySelector('#div1').scrollIntoView()
        //     // alert( "Default behavior is disabled!" + objDiv.scrollHeight );
        //     <?php
        //     }
        //     ?>
        // }
        // var objDiv = document.getElementById("list_service");
        // objDiv.scrollTop = objDiv.scrollHeight;
        // $("#div1").animate({ scrollTop: $('#div1').prop("scrollHeight")}, 1000);
        // window.setInterval(function() {
        //     var elem = document.getElementById('list_service');
        //     elem.scrollTop = elem.scrollHeight;
        // }, 5000);
    </script> 
<!-- ---------------------------------------------------------- -->

<body style='overflow:auto'>
    <!-- Topbar Start -->
    <div class=" container-fluid padding">
        <div class="row padding">
            
            <div class="col-xs-0 col-sm-0 col-md-3 py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Địa chỉ</h6>
                        <span>02 Nguyễn Đình Chiểu, Vĩnh Phước, Nha Trang</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-3 border-start border-end py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email</h6>
                        <span>GroupPHP@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-3 py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Phone</h6>
                        <span>+012 345 6789</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 text-center col-md-3 py-2">
                <div class="d-inline-flex align-items-center">
                    <div class="text-start">
                        <?php
                            include '../../user/connect.php';
                            $name = "";
                            if( isset($_COOKIE["type"])){
                                if ($_COOKIE["type"] === 'customer'){
                                    $id = $_COOKIE["login"];
                                    $result = mysqli_fetch_array(mysqli_query($conn, "SELECT * from khachhang where id = '$id'"));
                                    $name = $result['name'];
                                }
                            }

                            if( isset($_COOKIE["type"])){
                                if ($_COOKIE["type"] === 'admin'){
                                    $id = $_COOKIE["login"];
                                    $result = mysqli_fetch_array(mysqli_query($conn, "SELECT * from nhanvien where idnv = '$id'"));
                                    $name = $result['ten'];
                                }
                            }

                            if ($name === ""){
                                echo '<br><span style="font-weight: bold;text-decoration:underline;">';
                                    echo '<a href="login.php" style="color: grey;"> Đăng nhập</a>';
                                echo '</span>';
                            }else {
                                echo '<br><span style="font-weight: bold;">';
                                    echo '<h6 class="text-uppercase mb-1"><a href="profile.php">'.$name.'</a></h6>';
                                    echo '<a href="logout.php" style="color: grey;"> Đăng xuất</a>';
                                echo '</span>';
                            }
                        // <h6 class="text-uppercase mb-1"><a href="login.php">Nguyen Duc Huy</a></h6>
                        // <span style="font-weight: bold;text-decoration:underline;">
                        //     <a href="" style="color: grey;"> Đăng xuất</a>
                        // </span>
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->

<!-- </body> -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.php" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark">
                <img src="../../images/logo_vinpearl.jpg" width="60" height="60"/>
                Vinpearl
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="../../index.php" class="nav-item nav-link ">Trang chủ</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Loại Dịch Vụ</a>
                    <div class="dropdown-menu m-0">
                        <a href="../../nghiduong.php" class="dropdown-item">Nghỉ Dưỡng</a>
                        <a href="../../khampha.php" class="dropdown-item">Khám phá & Hoạt động</a>
                        <a href="../../golf.php" class="dropdown-item">Golf</a>
                        <a href="../../amthuc.php" class="dropdown-item">Ẩm thực</a>
                    </div>
                </div>
                <a href="../../baitap.php" class="nav-item nav-link active">Bài tập</a>
                <a href="../../thongtin.php" class="nav-item nav-link">Thông tin</a>
                <!-- -------------------------ADMIN -------------------------- -->
                <?php
                    if( isset($_COOKIE["type"]))
                    {
                        if ($_COOKIE["type"] === 'admin'){       
                ?>
                    <a href="../../admin/master.php" class="nav-item nav-link">Admin</a>
                <?php
                        }
                    }
                ?>
                <a href="../../giohang.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5"><i class="bi bi-cart4"style="font-size:18px;"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div>
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'quanly_ban_sua';

    $conn = mysqli_connect($servername,$username,$password,$database);

    //check connect 
    if (!$conn)
    {
        die('Connect failed: '. mysqli_connect_error());
    }else echo 'Ket noi thanh cong <br><br>';

    $mysql= "select * from sua ";
    // echo $mysql;

    $result = mysqli_query($conn , $mysql );
?>
    <?php
        $rowsPerPage=2;
        if ( ! isset($_GET['page']))
            $_GET['page'] = 1;
    
        $offset =($_GET['page']-1)*$rowsPerPage;
        
        //$query="Select * from sua LIMIT $offset, $rowsPerPage";
        $query="select * from sua LIMIT $offset, $rowsPerPage;";
        $result = mysqli_query($conn,$query);
        if (!$result ) die ('<br> <b>Query failed</b>');
        $numRows= mysqli_num_rows($result);
        $maxPage = ceil($numRows / $rowsPerPage);

        if($numRows<>0){
            echo"<div class='center'> <table>";

            $temp=$_GET['page']*$rowsPerPage;// danh so thu tu

            if($temp<=$rowsPerPage) $num=0;
            else $num=$temp-$rowsPerPage;

            if( mysqli_num_rows ( $result ) !=0){
                while ( $row = mysqli_fetch_row($result)){
                    echo "<tr>";
                        echo "<td colspan='2' style='background-color: pink;' >";
                            echo "<h1 style='font-weight: bold; display: flex;justify-content: center;'>";
                                echo $row[1];
                            echo"</h1>";
                        echo "</td>";
                    echo "</tr>";
    
                    echo "<tr>";
                        echo "<td>";
                            $r = rand(-100,100);
                            if( $r % 2 === 1)
                            echo "<img src='../../btth/sql/images/cho.jpg' height='200' width='200'>";
                            else echo "<img src='../../btth/sql/images/meo.jpg' height='200' width='200'>";
                        echo "</td>";
    
                        echo "<td>";
                            echo "<h2> Thanh phan dinh duong:</h2>";
                            echo $row[6]."<br>";
                            echo "<h2> Loi ich:</h2>";
                            echo $row[7]."<br>";
                            echo "<div style='font-weight: bold; display: flex;justify-content: flex-end;'>";
                                echo "<a style='font-weight: bold; '> Trong luong: </a>";
                                echo "<a >".$row[4]."g -  </a><br>";
                                echo "<a style='font-weight: bold;'> Don gia: </a>"; 
                                echo "<a > ".$row[5]." VND</a><br>";       
                            echo "</div>";
                        echo "</td>";
                    echo "</tr>";
                }
            }
            echo"</table> </div>";

            $re = mysqli_query($conn, 'select * from sua');
            $numRows = mysqli_num_rows($re);
            $maxPage = floor($numRows/$rowsPerPage) + 1;
            echo "<div >";
            if ($_GET['page'] > 1){
                echo "<a  href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Back</a> "; //gắn thêm nút Back
            }
            for ($i=1 ; $i<=$maxPage ; $i++)
            {
                if ($i == $_GET['page'])
                {
                    echo '<b class="center">Trang'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
                }
                else {
                    echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Trang " . $i . "</a> ";
                }
            }
            if ($_GET['page'] < $maxPage) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";  //gắn thêm nút Next
            }
            echo"</div>";
        }

        
    ?>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor</p>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>info@example.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                        <a class="text-body" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Popular Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                        <a class="text-body" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Newsletter</h5>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Your Email">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-linkedin"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-12 text-center text-body">
                    <a class="text-body" href="">Terms & Conditions</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Privacy Policy</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Customer Support</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Payments</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Help</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">FAQs</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">Your Site Name</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white" href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

    <style>
        table {
            border: 5px solid orangered;
            width: 50%;

        }
        th, td {
            border: 1px solid black;
        }
        
        .center {
            margin: 0px auto;
            align-self: center;
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>

</html>



