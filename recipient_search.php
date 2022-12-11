<?php
$err = 0;
try {
    $insert = 0;
    $result = 0;
    $result2 = 0;
    if (isset($_POST['quantity_required'])) {
        $server = "localhost";
        $username = "root";
        $pass = "";
        $db = "dhamni";

        $con = mysqli_connect($server, $username, $pass, $db);

        if (!$con) {
            die("connection to this database failed due to" . mysqli_connect_error());
        }

        $quantity_required = $_POST['quantity_required'];
        $req_blood_group = $_POST['req_blood_group'];
        $area_pincode = $_POST['area_pincode'];
        $insert = 0;

        $sql = "SELECT Fname, Mname, Lname, Sex, Contact_Number, Email FROM `Donor` WHERE Blood_group LIKE '%$req_blood_group%' AND Pincode = '$area_pincode';";
        $sql2 = "SELECT Name,contact_number,email from `blood_bank` as bb, `dhamni`.`blood` as b where bb.Pincode = '$area_pincode' AND b.blood_bank_id = bb.reg_no AND b.blood_group LIKE '%$req_blood_group%' AND b.quantity > 0;";

        if ($con->query($sql) == true) {
            $insert = 1;
            $result = $con->query($sql);
            $result2 = $con->query($sql2);
        } else {
            $insert = 2;
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
    <title>Recipient Search Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="logo1.ico">
</head>

<body style="overflow-x: hidden;">
    <a href="http://localhost/Dhamni_2.0/homer.php">
        <img src="home.png" alt="home" style="width: 3.5%;" id="home">
    </a>
    <?php
    if ($err == 1) {
        echo "<p align='center' class='alertMsg'>Unexpected Error Occured</p>";
    }
    ?>
    <div class="card">
        <form action="recipient_search.php" class="box" method="post">
            <h1>Recipient Search</h1>
            <p class="text-muted"> Please Enter Blood Details</p>
            <select
                style="border: 0;background: none;display: block;margin: 20px auto;text-align: center;border: 2px solid #3498db;padding: 10px 10px;width: 250px;outline: none;color: rgb(148, 163, 165);border-radius: 24px;transition: 0.25s"
                id="inputReq_BG" name="req_blood_group" class="form-select" required>
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
                type="number" name="quantity_required" class="form-control" id="inputQuantity"
                Placeholder="Quantity Required" required>
            <input
                style="border: 0;background: none;display: block;margin: 20px auto;text-align: center;border: 2px solid #3498db;padding: 10px 10px;width: 250px;outline: none;color: rgb(148, 163, 165);border-radius: 24px;transition: 0.25s"
                type="number" name="area_pincode" class="form-control" id="inputPin" placeholder="Area Pin Code"
                required>

            <button type="submit" class="btn-submit">Search</button>
        </form>
    </div>

    <?php
    if ($insert == 1) {
        // output data of each row
        echo "<main style='width: 90%; margin: auto; text-align: center; position: relative; top: 580px;'>";
        echo "<div style='text-align: center;'><p style='background-image: linear-gradient(to bottom, rgb(40, 8, 8),rgb(132, 4, 4));color:white;border-radius:15px; display: inline-block; padding:3px 10px;font-size:1.5em;' disabled>Donors</p></div>";
        echo "<table class='table table-striped' style='margin-bottom:10%;'>
                <thead style='color:antiquewhite;font-size:1.2em; font-family:Arial, Helvetica, sans-serif;border-radius: 5px; background-image: linear-gradient(to right, rgba(34, 57, 12,1), rgba(85, 10, 10,1));'>
                  <tr>
                  <th scope='col' style='width: 8%;margin: auto;text-align: center;'>S. No.</th>
                  <th scope='col' style='width: 25%%;margin: auto;text-align: center;'>Name</th>
                  <th scope='col' style='width: 7%;margin: auto;text-align: center;'>Sex</th>
                  <th scope='col' style='width: 30%;margin: auto;text-align: center;'>Contact Number</th>
                  <th scope='col' style='width: 30%;margin: auto;text-align: center;'>Email</th>
                  </tr>
                  </thead>
                  <tbody style='color:rgb(27, 25, 22); font-family: Arial, Helvetica, sans-serif;background-image: linear-gradient(to right, rgba(163, 228, 150, 0.836), rgba(198, 172, 116, 0.795));'>";
        $code1 = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td style='width: 8%;margin: auto;text-align: center; font-weight: bold;'>$code1</td>";
            echo "<td style='width: 25%;margin: auto;text-align: center; font-weight: bold;'>" . $row["Fname"] . " " . $row["Mname"] . " " . $row["Lname"] . "</td>";
            echo "<td style='width: 7%;margin: auto;text-align: center; font-weight: bold;'>" . $row['Sex'] . "</td>";
            echo "<td style='width: 30%;margin: auto;text-align: center; font-weight: bold;'>" . $row['Contact_Number'] . "</td>";
            echo "<td style='width: 30%;margin: auto;text-align: center; font-weight: bold;'>" . $row['Email'] . "</td>";
            echo "</tr>";
            $code1 = $code1 + 1;
        }
        echo "</tbody></table>";
        echo "<div style='text-align: center;'><p style='background-image: linear-gradient(to bottom, rgb(40, 8, 8),rgb(132, 4, 4));color:white;border-radius:15px; display: inline-block; padding:3px 10px;font-size:1.5em;' disabled>Blood Banks</p></div>";
        echo "<table class='table table-striped' style='margin-bottom:10%;'>
                  <thead style='color:antiquewhite;font-size:1.2em; font-family:Arial, Helvetica, sans-serif; background-image: linear-gradient(to right, rgba(34, 57, 12,1), rgba(85, 10, 10,1));'>
                <tr>
                <th scope='col' style='width: 10%;margin: auto;text-align: center;'>S. No.</th>
                <th scope='col' style='width: 30%;margin: auto;text-align: center;'>Name</th>
                <th scope='col' style='width: 30%;margin: auto;text-align: center;'>Contact Number</th>
                <th scope='col' style='width: 30%;margin: auto;text-align: center;'>Email</th>
                </tr>
                </thead>
                <tbody style='color:rgb(27, 25, 22); font-family: Arial, Helvetica, sans-serif;border-radius: 5px; background-image: linear-gradient(to right, rgba(163, 228, 150, 0.836), rgba(198, 172, 116, 0.795));'>";
        $code2 = 1;
        while ($row = mysqli_fetch_array($result2)) {
            echo "<tr>";
            echo "<td style='width: 10%;margin: auto;text-align: center; font-weight: bold;'>$code2</td>";
            echo "<td style='width: 30%;margin: auto;text-align: center; font-weight: bold;'>" . $row['Name'] . "</td>";
            echo "<td style='width: 30%;margin: auto;text-align: center; font-weight: bold;'>" . $row['contact_number'] . "</td>";
            echo "<td style='width: 30%;margin: auto;text-align: center; font-weight: bold;'>" . $row['email'] . "</td>";
            echo "</tr>";
            $code2 = $code2 + 1;
        }
        echo "</tbody></table><br>";
    }
    ?>
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