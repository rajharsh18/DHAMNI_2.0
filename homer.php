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
    // $sql = "SELECT fname, mname, lname FROM `dhamni`.`recipient` WHERE `name` = '$name'";
    // $result = $con->query($sql);
    // $row = mysqli_fetch_array($result);
    // $name = $row['fname']." ".$row['mname']." ".$row['lname'];
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
    <title>Home</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" href="style.css">
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
    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/slider/slide-02.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class=" bounceInDown">Donate Blood & Save a Life</h5>
                        <p class=" bounceInLeft">To give blood you need neither extra strength nor extra food, and you will save a life.</p>

                        <div class=" vbh">

                            <div class="btn btn-success  bounceInUp"> Register Now </div>
                            <div class="btn btn-success  bounceInUp"> Contact US </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/slider/slide-03.jpg" alt="Third slide">
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class=" bounceInDown">Donate Blood & Save a Life</h5>
                        <p class=" bounceInLeft">Donating blood is the kindest act we all can do. If you have donated blood then you are a rock star. You will not lose anything by donating blood but someone somewhere will get blessed.</p>

                        <div class=" vbh">

                            <div class="btn btn-danger  bounceInUp"> Look For a Donor </div>
                            <div class="btn btn-danger  bounceInUp"> Contact US </div>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
    <footer id="contact" class="container-fluid">
        <div class="container">
            
            <div class="row content-ro">
                <div class="col-lg-4 col-md-12 footer-contact">
                    <h2>Contact Informatins</h2>
                    <div class="address-row">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="detail">
                            <p>46-29 Indra Street, Southernbank, Tigaione, Toranto, 3006 Canada</p>
                        </div>
                    </div>
                    <div class="address-row">
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="detail">
                            <p>sales@smarteyeapps.com <br> support@smarteyeapps.com</p>
                        </div>
                    </div>
                    <div class="address-row">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="detail">
                            <p>+91 9751791203 <br> +91 9159669599</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 footer-links">
                   <div class="row no-margin mt-2">
                    <h2>Quick Links</h2>
                    <ul>
                        <li>Home</li>
                        <li>About Us</li>
                        <li>Contacts</li>
                        <li>Pricing</li>
                        <li>Gallery</li>
                        <li>eatures</li>

                    </ul>
                    </div>
                   <div class="row no-margin mt-1">
                       <h2 class="m-t-2">More Products</h2>
                     <ul>
                        <li>Forum PHP Script</li>
                        <li>Edu Smart</li>
                        <li>Smart Event</li>
                        <li>Smart School</li>


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
                        <p>Copyright © <a href="https://www.smarteyeapps.com">Smarteyeapps.com</a> | All right reserved.</p>
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