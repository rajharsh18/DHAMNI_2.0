<?php
$insert = 0;
$flag = 0;
if (isset($_POST['user_id'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $pass = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $pass);

    // Check for connection success
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $sql = "SELECT user_id, password FROM `dhamni`.`blood_bank` WHERE user_id = '$user_id';";
    // echo $sql;

    // Execute the query
    if ($con->query($sql) == true) {
        // echo "Successfully inserted";
        // Flag for successful insertion
        $result = $con->query($sql);
        $row = mysqli_fetch_array($result);
        // $password = $row["password"];
        $insert = 1;
    } else {
        $insert = 2;
        // echo "ERROR: $sql <br> $con->error";
    }

    if ($result->num_rows == 0) {
        $flag = 1;
        // echo "User id Not Exist !!!";
    } else if ($insert == 1) {
        if ($password == $row["password"]) {
            header("Location: http://localhost/Dhamni_2.0/deep/homebb.html");
            exit();
        } else if ($insert == 1 && $password != $row["password"]) {
            $flag = 2;
            // echo "Wrong Password !!!"; 
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood-Bank Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="overflow-x: hidden;">
    <header>
        <nav class="navbar" style="background-color: #f00000;">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/Dhamni_2.0/blood_bank_login.php" style="color: white; margin: auto; font-size: 1.8em;">
                    <!-- <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
                    Blood-Bank Login
                </a>
            </div>
        </nav>
    </header>
    <main>
        <?php
    if ($flag == 1) {
        echo "User id Not Exist !!!";
    } else if ($flag == 2) {
        echo "Wrong Password !!!";
    }
    ?>
        <form class="row g-3" style="padding: 5%;" action="blood_bank_login.php" method="post">

            <div class="col-md-6">
                <label for="inputUserid" class="form-label">User ID</label>
                <input type="text" name="user_id" class="form-control" id="inputUserid" required>
            </div>
            <div class="col-6">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" required>
            </div>
            <div class="col-12" style="text-align: center;">
                <button type="submit" class="btn btn-primary" onclick="sendlogin()">Login</button>
            </div>
            <div style="text-align: center;">
                <label class="form-label">Not Registered?
                    <a href="http://localhost/Dhamni_2.0/blood_bank_register.php">Register as a Blood Bank</a>
                </label>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script>
        function sendlogin() {
            uid = document.getElementById("inputUserid");
            navigator.clipboard.writeText(uid.value).then(success => console.log("text copied"), err => console.log("error copying text"));
        }
    </script>
</body>

</html>