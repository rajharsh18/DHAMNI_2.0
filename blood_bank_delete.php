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

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // header("location: login.php");
}
$check = $_SESSION['name'];
$sql = "SELECT name, reg_no FROM `dhamni`.`blood_bank` WHERE `name` = '$check'";
if ($con->query($sql) == true) {
    $result = $con->query($sql);
} else {
    echo "ERROR: $sql <br> $con->error";
}
$row = mysqli_fetch_array($result);
$name2 = $row['name'];
$reg_no2 = $row['reg_no'];


if (isset($_POST['reg_no'])) {
    $reg_no = $_POST['reg_no'];
    $name = $_POST['name'];
    $sql2 = "DELETE FROM `dhamni`.`blood` WHERE '$reg_no' = `Blood_bank_id`";
    $sql1 = "DELETE FROM `dhamni`.`blood_bank` WHERE '$reg_no' = `Reg_no` and '$name' = `name`";

    if($reg_no2 == $reg_no){
        if ($name2 == $name){
            $con->query($sql2);
            $con->query($sql1);
            $insert = 1;
        } else {
            $insert = 2;
        }
    }
    else if ($reg_no2 != $reg_no){
        $insert = 3;
    }
    $con->close();
}

if ($insert == 1) {
    // session_start();
    $_SESSION = array();
    session_destroy();
    header("location: http://localhost/Dhamni_2.0/deep/home.html");
    exit();
}

} catch (Throwable $e) {
    $err = 1;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete Blood-Bank Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>

<body style="overflow-x: hidden;">

    <a href="http://localhost/Dhamni_2.0/deep/homebb.php">
        <img src="home.png" alt="home" style="width: 3.5%;" id="home">
    </a>
    <?php
    if ($err == 1){
        echo "<p align='center' class='alertMsg'>Unexpected Error Occured</p>";
    }
    if ($insert == 2) {
        echo "<p align='center' class='alertMsg'>Wrong Name !!!</p>";
    } else if ($insert == 3) {
        echo "<p align='center' class='alertMsg'>Wrong Registration Number !!!</p>";        
    }
    ?>
    <div class="card">
        <form action="blood_bank_delete.php" class="box" method="post">
            <h1>Blood Bank Delete</h1>
            <p class="text-muted"> Please enter your Registration Number and Name</p>
            <input type="text" name="reg_no" class="form-control" id="inputReg" placeholder="Registration Number" required>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name of Blood Bank" required>
            <button type="submit" class="btn-submit">Delete</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>

</html>