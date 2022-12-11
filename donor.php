<?php
$err = 0;
try {
    $insert = 0;
    if (isset($_POST['fname'])) {
        $server = "localhost";
        $username = "root";
        $pass = "";
        $db = "dhamni";

        $con = mysqli_connect($server, $username, $pass, $db);

        if (!$con) {
            die("connection to this database failed due to" . mysqli_connect_error());
        }

        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $unique_id = $_POST['unique_id'];
        $bdate = $_POST['bdate'];
        $sex = $_POST['sex'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $pincode = $_POST['pincode'];
        $state = $_POST['state'];
        $blood_group = $_POST['blood_group'];
        $weight = $_POST['weight'];
        $iron_content = $_POST['iron_content'];
        $high_blood_pressure = $_POST['high_blood_pressure'];
        $low_blood_pressure = $_POST['low_blood_pressure'];
        $haemoglobin = $_POST['haemoglobin'];

        $sql = "INSERT INTO `dhamni`.`donor` (`Fname`, `Mname`, `Lname`, `Unique_id`, `Bdate`, `Sex`, `Contact_Number`, `Email`, `Address`, `Pincode`, `State`, `Blood_group`, `Weight`, `Iron_content`, `High_blood_pressure`, `Low_blood_pressure`, `Haemoglobin`) VALUES ('$fname', '$mname', '$lname', '$unique_id', '$bdate', '$sex', '$contact_number', '$email', '$address', '$pincode', '$state', '$blood_group', '$weight', '$iron_content', '$high_blood_pressure', '$low_blood_pressure', '$haemoglobin');";

        if ($con->query($sql) == true) {
            $insert = 1;
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
    <title>Donor Details Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <link rel="icon" type="image/x-icon" href="logo1.ico">
</head>

<body style="height: 1070px;">

    <a href="http://localhost/Dhamni_2.0/index.html">
        <img src="home.png" alt="home" style="width: 3.5%;" id="home">
    </a>
    <?php
    if ($err == 1) {
        echo "<p align='center' class='alertMsg'>Unexpected Error Occured</p>";
    }
    if ($insert == 1) {
        echo "<p align='center' class='cnfMsg'>Thanks for joining our Organisation</p>";
        echo "<p align='center' class='cnfMsg'>You Reference-Id is: "; echo $fname; echo $unique_id; echo"</p>";
    }
    ?>
    <div class="card">
        <form action="donor.php" class="box" method="post">
            <h1>Donor Registration</h1>
            <p class="text-muted"> Please enter your details here</p>
            <div>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="fname"
                    class="form-control" id="inputFname" placeholder="First Name" required>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="mname"
                    class="form-control" id="inputMname" placeholder="Middle Name">
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="lname"
                    class="form-control" id="inputLname" placeholder="Last Name">
            </div>
            <div>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="unique_id"
                    class="form-control" id="inputID" placeholder="Unique ID" required>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="bdate"
                    class="form-control" id="inputBdate" placeholder="Birth Date" onfocus="(this.type = 'date')" onblur="(this.type = 'text')" required>
                <select style="display: inline;margin-left: 3%;margin-right:3%;" id="inputSex" name="sex"
                    class="form-select" required>
                    <option selected>Select Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Others</option>
                </select>
            </div>
            <div>
                <input type="number" name="contact_number" class="form-control" id="inputContact"
                    placeholder="Contact Number" required>
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address" required>
            <div>
                <input type="number" name="pincode" class="form-control" id="inputPin" placeholder="Pin Code" required>
                <select id="inputState" name="state" class="form-select" required>
                    <option selected>Select State</option>
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
            <div>
                <select style="display: inline;margin-left: 3%;margin-right:3%;" id="inputBGroup" name="blood_group"
                    class="form-select">
                    <option selected>Blood Group</option>
                    <option value="A +">A +</option>
                    <option value="A -">A -</option>
                    <option value="B +">B +</option>
                    <option value="B -">B -</option>
                    <option value="O +">O -</option>
                    <option value="O -">O +</option>
                    <option value="AB +">AB +</option>
                    <option value="AB -">AB -</option>
                    <option value="NULL">Don't Know</option>
                </select>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="number" name="weight"
                    class="form-control" id="inputWeight" placeholder="Weight">
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="iron_content"
                    class="form-control" id="inputIContent" placeholder="Iron Content (mcg/dL)">
            </div>
            <div>
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="high_blood_pressure"
                    class="form-control" id="inputHBPressure" placeholder="High BP (mmhg)">
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="low_blood_pressure"
                    class="form-control" id="inputLBPressure" placeholder="Low BP (mmhg)">
                <input style="display: inline;margin-left: 3%;margin-right:3%;" type="text" name="haemoglobin"
                    class="form-control" id="inputHaemoglobin" placeholder="Hemoglobin (g/dL)">
            </div>
            <button type="submit" class="btn-submit">Register</button>
            <!-- <label class="form-label" style="color: antiquewhite">Already an user?
                <a href="http://localhost/Dhamni_2.0/path_lab_register.php">Log In as a Donor</a>
            </label> -->
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