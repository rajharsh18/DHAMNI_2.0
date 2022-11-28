<?php
$err = 0;
try{
$insert = 0;
if (isset($_POST['reg_no'])) {
    $server = "localhost";
    $username = "root";
    $pass = "";

    $con = mysqli_connect($server, $username, $pass);

    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $reg_no = $_POST['reg_no'];
    $blood_group = $_POST['blood_group'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE `dhamni`.`blood` SET `Quantity` = '$quantity' WHERE `Blood_bank_id` LIKE '$reg_no' AND `Blood_group` LIKE '$blood_group';";
    $insert = 0;

    if ($con->query($sql) == true) {
        $insert = 1;
        if (mysqli_affected_rows($con) == 0) {
            $insert = 2;
        }
    } else {
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
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
    <title>Update Blood Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>

<body style="height: 700px;">
    
    <a href="http://localhost/Dhamni_2.0/deep/homebb.php">
        <img src="home.png" alt="home" style="width: 3.5%;" id="home">
    </a>
    <?php
    if ($err == 1){
        echo "<p align='center' class='alertmsg'>Unexpected Error Occured</p>";
    }
    if ($insert == 1) {
        echo "<p align='center' class='cnfMsg'>Data Updated</p>";
    } else if ($insert == 2) {
        echo "<p align='center' class='alertMsg'>None of the rows are affected.</p>";
    }
    ?>
    <div class="card">
        <form action="blood.php" class="box" method="post">
            <h1>Update Blood Information</h1>
            <p class="text-muted"> Please Enter Blood Details</p>
            <input type="text" name="reg_no" class="form-control" id="inputReg" placeholder="Registration Number"
                required>
            <select
                style="border: 0;background: none;display: block;margin: 20px auto;text-align: center;border: 2px solid #3498db;padding: 10px 10px;width: 250px;outline: none;color: rgb(148, 163, 165);border-radius: 24px;transition: 0.25s"
                id="inputReq_BG" name="blood_group" class="form-select" required>
                <option selected>Required Blood Group</option>
                <option style="color: black;" value="A +">A +</option>
                <option style="color: black;" value="A -">A -</option>
                <option style="color: black;" value="B +">B +</option>
                <option style="color: black;" value="B -">B -</option>
                <option style="color: black;" value="O +">O -</option>
                <option style="color: black;" value="O -">O +</option>
                <option style="color: black;" value="AB +">AB +</option>
                <option style="color: black;" value="AB -">AB -</option>
                <option style="color: black;" value="NULL">Don't Know</option>
            </select>
            <input
                style="border: 0;background: none;display: block;margin: 20px auto;text-align: center;border: 2px solid #3498db;padding: 10px 10px;width: 250px;outline: none;color: rgb(148, 163, 165);border-radius: 24px;transition: 0.25s"
                type="number" name="quantity" class="form-control" id="inputQuantity" Placeholder="Quantity of Blood"
                required>
            <button type="submit" class="btn-submit">Update</button>
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