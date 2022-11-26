
<?php
$insert = 0;
if(isset($_POST['path_lab_id'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $pass = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $pass);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $path_lab_id = $_POST['path_lab_id'];
    $donor_id = $_POST['donor_id'];
    $doe = $_POST['doe'];
    $sql = "INSERT INTO `dhamni`.`examines` (`Path_lab_id`, `Donor_id`, `Date_of_examination`) VALUES ('$path_lab_id', '$donor_id', '$doe');";
    $insert = 0;
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = 1;
        // echo "Affected rows: " . mysqli_affected_rows($con);
        if(mysqli_affected_rows($con)==0){
            $insert = 2;
        }
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
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
</head>

<body style="overflow-x: hidden;">
    <header>
        <nav class="navbar" style="background-color: #f00000;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="color: white; margin: auto; font-size: 1.8em;">
                    <!-- <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
                    Update Blood Information
                </a>
            </div>
        </nav>
    </header>
    <?php
        if($insert == 1){
        echo "<p class='submitMsg'>Thanks for joining our organisation</p>";
        }
        else if($insert == 2){
        echo "<p class='submitMsg'>None of the rows are affected.</p>";
        }
    ?>
    <main>
        <form class="row g-3" style="padding: 5%;" action="examines.php" method="post">

            <div class="col-md-4">
                <label for="inputReg" class="form-label">Path Lab Id</label>
                <input type="text" name="path_lab_id" class="form-control" id="inputReg" required>
            </div>
            <div class="col-md-4">
                <label for="inputReg" class="form-label">Donor Id</label>
                <input type="text" name="donor_id" class="form-control" id="inputReg" required>
            </div>
            <div class="col-md-4">
                <label for="inputReg" class="form-label">Date of Examination</label>
                <input type="date" name="doe" class="form-control" id="inputReg" required>
            </div>

            <div class="col-12" style="text-align: center;" >
                <button type="submit" class="btn btn-primary">Update</button>
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
</body>

</html>