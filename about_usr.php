<?php
$err = 0;
try{
$insert = 0;
$server = "localhost";
$username = "root";
$pass = "";

$con = mysqli_connect($server, $username, $pass);
if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}
session_start();
$name = 'a';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $name = $_SESSION['name'];
    // $sql = "SELECT name FROM `dhamni`.`blood_bank` WHERE `user_id` = '$user_id'";
    // $result = $con->query($sql);
    // $row = mysqli_fetch_array($result);
    // $name = $row['name'];
}
} catch (Throwable $e) {
    $err = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>
<body>
<header class="continer-fluid ">
        <div id="menu-jk" class="header-bottom">
            <div class="container">
                <div class="row nav-row">
                    <div class="col-md-3 logo">
                        <img src="assets/images/logo.jpg" alt="">
                    </div>
                    <div class="col-md-9 nav-col">
                        <nav class="navbar navbar-expand-lg bg-light">
                            <div class="container-fluid">
                                <!-- <a class="navbar-brand" href="#">Dhamni</a> -->
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="http://localhost/Dhamni_2.0/homer.php">Recipient</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="http://localhost/Dhamni_2.0/about_usr.php">About Us</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false" id="anchor-id"> <?php echo "Welcome ".$_SESSION['name']?>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="http://localhost/Dhamni_2.0/recipient_search.php">Search by Blood Group</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="http://localhost/Dhamni_2.0/recipient_search_bb.php">Search Blood Bank</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-danger" href="http://localhost/Dhamni_2.0/logout.php"
                                                role="button">Log Out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
    if ($err == 1){
        echo "<p align='center' class='alertMsg'>Unexpected Error Occured</p>";
    }
    ?>
    <section id="about" class="contianer-fluid about-us">
        <div class="container">
            <!-- <div class="row session-title">
                <h2>About Us</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</p>
            </div> -->
             <div class="row">
                 <div class="col-md-6 text">
                     <h2>About Dhamni</h2>
                     <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                     <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some formhumour, or randomised words which don't look even slightly believable. If you are going to use a passage. industry's standard dummy has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                     <p>Industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p> -->
                     <p>Dhamni in English means Arteries, a critical part of your cardiovascular system. They are blood vessels that distribute oxygen-rich blood to your entire body. </p>
                     <p>In India, many people die due to the lack of blood banks or shortage of blood in the blood banks. This problem become more severe during covid-19 pandemic. Many patients who required blood lost their lives dur to this enormous problem.</p>
                     <p>We figured out that there is a big gap between blood donors and blood banks in India. Most of the people are even not aware about the importance of blood donation. So, we decided to fill that gap by giving a platform to the people where they will be aware about the importance of blood donation. A place where they can easily reach out to blood banks and a needy patient can also contact the blood banks for help.</p>
                 </div>
                 <div class="col-md-6 image">
                     <img src="assets/images/about.jpg" alt="">
                 </div>
             </div>
        </div>
    </section>
    <footer id="contact" class="container-fluid">
        <div class="container">
            
            <div class="row content-ro">
                <div class="col-lg-4 col-md-12 footer-contact">
                    <h2>Contact Informations</h2>
                    <div class="address-row">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="detail">
                            <p>Cluster Innovation Centre, University of Delhi</p>
                        </div>
                    </div>
                    <div class="address-row">
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="detail">
                            <p>dhamni.cic@gmail.com </p>
                        </div>
                    </div>
                    <div class="address-row">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="detail">
                            <p>+91 9971107412 <br> +91 8765649461</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 footer-links">
                   <div class="row no-margin mt-2">
                    <h2>Quick Links</h2>
                    <ul>
                        <li>Home</li>
                        <li>About Us</li>
                        <li class="dropdown" style="padding: 0; text-align: left;">
                            <a class="dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style=" color:white; padding: 0%;">
                                Register As
                            </a>
                            <ul class="dropdown-menu" >
                                <li ><a class="dropdown-item" href="http://localhost/Dhamni_2.0/donor.php" style="display: block; padding: 0;">Donor</a></li><br>
                                <li><a class="dropdown-item" href="http://localhost/Dhamni_2.0/blood_bank_register.php" style="display: block; padding: 0;">Blood Bank</a></li><br>
                                <li><a class="dropdown-item" href="http://localhost/Dhamni_2.0/path_lab_register.php"style="display: block; padding: 0;">Path Lab</a></li><br>
                                <li><a class="dropdown-item" href="http://localhost/Dhamni_2.0/recipient_register.php" style="display: block; padding: 0;">Recepient</a></li><br>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" style="padding: 0%; text-align: left;">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style=" color:white; padding: 0%;">
                                Login As
                            </a>
                            <ul class="dropdown-menu">
                                <li style="display: block;"><a class="dropdown-item" href="http://localhost/Dhamni_2.0/blood_bank_login.php" style="display: block; padding: 0;">Blood Bank</a></li><br>
                                <li style="display: block;"><a class="dropdown-item" href="http://localhost/Dhamni_2.0/path_lab_login.php" style="display: block; padding: 0;">Path Lab</a></li><br>
                                <li style="display: block;"><a class="dropdown-item" href="http://localhost/Dhamni_2.0/recipient_login.php" style="display: block; padding: 0;">Recepient</a></li>
                            </ul>
                        </li>

                    </ul>
                    </div>
                   
                </div>
                <div class="col-lg-4 col-md-12 footer-form">
                    <div class="form-card">
                        <div class="form-title">
                            <h4>Quick Message</h4>
                        </div>
                        <div class="form-body">
                            <input type="text" placeholder="Enter Name" class="form-control">
                            <input type="text" placeholder="Enter Mobile no" class="form-control">
                            <input type="text" placeholder="Enter Email Address" class="form-control">
                            <input type="text" placeholder="Your Message" class="form-control">
                            <button class="btn btn-sm btn-primary w-100">Send Request</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copy">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <p>Copyright © <a></a> | All right reserved.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 socila-link">
                        <ul>
                            <li><a><i class="fab fa-github"></i></a></li>
                            <li><a><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a><i class="fab fa-twitter"></i></a></li>
                            <li><a><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>