<?php

$insert = 0;
$flag = 0;
$result2 = 0;

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

$check = $_SESSION['user_id'];
$sql2 = "SELECT name, address, pincode, state, contact_number, email FROM `dhamni`.`path_lab` WHERE `user_id` = '$check';";

if ($con->query($sql2) == true) {
    $result2 = $con->query($sql2);
    // $row2 = mysqli_fetch_array($result2);
} else {
    echo "ERROR: $sql <br> $con->error";
}
$row2 = mysqli_fetch_array($result2);
$name2 = $row2['name'];
$address2 = $row2['address'];
$pincode2 = $row2['pincode'];
$state2 = $row2['state'];
$contact_number2 = $row2['contact_number'];
$email2 = $row2['email'];


if (isset($_POST['reg_no'])) {
    // $server = "localhost";
    // $username = "root";
    // $pass = "";

    // $con = mysqli_connect($server, $username, $pass);

    // if (!$con) {
    //     die("connection to this database failed due to" . mysqli_connect_error());
    // }

    $reg_no = $_POST['reg_no'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $sql1 = "UPDATE `dhamni`.`path_lab` SET `Name` = '$name', `Address` = '$address', `Pincode` = '$pincode', `Contact_Number` = '$contact_number', `Email` = '$email', `state`='$state' WHERE `Reg_no` = '$reg_no' AND `user_id` = '$user_id' AND `password`='$password';";
    $sql = "SELECT password, reg_no FROM `dhamni`.`path_lab` WHERE `user_id` = '$user_id';";

    if ($con->query($sql) == true) {
        $result = $con->query($sql);
        $row = mysqli_fetch_array($result);
        $insert = 1;
        if (mysqli_affected_rows($con) == 0) {
            $insert = 2;
        }
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    if ($result->num_rows == 0) {
        $flag = 1;
    } else if ($insert == 1) {
        if ($password == $row["password"]) {
            if ($reg_no != $row["reg_no"]) {
                $flag = 2;
            } else if ($reg_no == $row["reg_no"]) {
                $flag = 3;
                $con->query($sql1);
            }
        } else if ($insert == 1 && $password != $row["password"]) {
            $flag = 4;
        }
    }
    $con->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Path-lab Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
</head>

<body style="height: 840px;">

    <a href="http://localhost/Dhamni_2.0/deep/homepl.php">
        <img src="home.png" alt="home" style="width: 3.5%;" id="home">
    </a>
    <?php
    if ($flag == 1) {
        echo "<p class='alertMsg'>User id Not Exist !!!</p>";
    } else if ($flag == 2) {
        
        echo "<p class='alertMsg'>Wrong Registration Number !!!</p>";
    } else if ($flag == 3) {
        if ($insert == 1) {
            echo "<p class='alertMsg'>Thanks for joining our organisation</p>";
        } else if ($insert == 2) {
            echo "<p class='alertMsg'>None of the rows are affected.</p>";
        }
    } else if ($flag == 4) {
        echo "<p class='alertMsg'>Wrong Password !!!</p>";
    }
    ?>
    <div class="card">
        <form action="path_lab_update.php" class="box" method="post">
            <h1>Update Path Lab Details</h1>
            <p class="text-muted"> Please enter your details here</p>
            <div>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="user_id"
                    class="form-control" id="inputUserId" placeholder="User ID" required>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="password" name="password"
                    class="form-control" id="inputPassword" placeholder="Password" required>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="reg_no"
                    class="form-control" id="inputReg" placeholder="Registration Number" required>
            </div>
            <div>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="name"
                    class="form-control" id="inputName" placeholder="Name of Path Lab" value="<?php echo "$name2"?>" required>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="number" name="contact_number"
                    class="form-control" id="inputContact1" placeholder="Contact Number" value="<?php echo "$contact_number2"?>" required>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="email" name="email"
                    class="form-control" id="inputEmail1" placeholder="Email" value="<?php echo "$email2"?>" >
            </div>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address" value="<?php echo "$address2"?>" required>
            <div>
                <input type="number" name="pincode" class="form-control" id="inputPin" placeholder="Pin Code" value="<?php echo "$pincode2"?>" required>
                <select id="inputState" name="state" class="form-select" required>
                    <option selected><?php echo "$state2"?> </option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                    <option value="Daman and Diu">Daman and Diu</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Puducherry">Puducherry</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                </select>
            </div>
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