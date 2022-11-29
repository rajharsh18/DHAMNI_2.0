<?php
$insert = 0;
$result = 0;
if (isset($_POST['area_pincode'])) {
    $server = "localhost";
    $username = "root";
    $pass = "";

    $con = mysqli_connect($server, $username, $pass);

    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $area_pincode = $_POST['area_pincode'];
    $insert = 0;

    $sql = "SELECT Name,contact_number,email from `dhamni`.`blood_bank` WHERE Pincode = '$area_pincode';";

    if ($con->query($sql) == true) {
        $insert = 1;
        $result = $con->query($sql);
    } else {
        $insert = 2;
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Bank Search Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>

<body>


    <a href="http://localhost/Dhamni_2.0/deep/home.html">
        <img src="home.png" alt="home" style="width: 3.5%;" id="home">
    </a>
    <div class="card">
        <form action="recipient_search_bb.php" class="box" method="post">
            <h1>Recipient Search</h1>
            <p class="text-muted"> Please Enter Blood Details</p>
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
        
            echo "<main style='width: 90%; margin: auto; text-align: center; position: relative; top: 500px; margin-bottom: 50px;'>";
            echo "<div style='text-align: center;'><p style='background-image: linear-gradient(to bottom, rgb(40, 8, 8),rgb(132, 4, 4)); border-radius:15px;color:white; display: inline-block; padding:3px 10px;font-size:1.5em;' disabled>Blood Banks</p></div>";
            echo "<table class='table table-striped' style='margin-bottom:50px;'>
            <thead style='color:antiquewhite;font-size:1.2em; font-family:Arial, Helvetica, sans-serif;border-radius: 5px; background-image: linear-gradient(to right, rgba(34, 57, 12,1), rgba(85, 10, 10,1));'>
                <tr>
                <th scope='col' style='width: 10%;margin: auto;text-align: center;'>S. No.</th>
                <th scope='col' style='width: 30%;margin: auto;text-align: center;'>Name</th>
                <th scope='col' style='width: 30%;margin: auto;text-align: center;'>Contact Number</th>
                <th scope='col' style='width: 30%;margin: auto;text-align: center;'>Email</th>
                </tr>
            </thead>
            <tbody style='color:rgb(27, 25, 22); font-family: Arial, Helvetica, sans-serif;border-radius: 5px; background-image: linear-gradient(to right, rgba(163, 228, 150, 0.836), rgba(198, 172, 116, 0.795));''>";
            $code = 1;
            while ($row = mysqli_fetch_array($result)) {

                echo "<tr>";
                echo "<td style='width: 10%;margin: auto;text-align: center; font-weight: bold;'>$code</td>";
                echo "<td style='width: 30%;margin: auto;text-align: center; font-weight: bold;'>" . $row['Name'] . "</td>";
                echo "<td style='width: 30%;margin: auto;text-align: center; font-weight: bold;'>" . $row['contact_number'] . "</td>";
                echo "<td style='width: 30%;margin: auto;text-align: center; font-weight: bold;'>" . $row['email'] . "</td>";
                echo "</tr>";
                $code = $code + 1;
            }

            echo "
                </tbody>
                </table>";
        }
        // else {
        //     echo "$insert";
        // }
    
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