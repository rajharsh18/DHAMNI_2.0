
<?php
$insert= 0;
$result = 0;
$result2 = 0;
if(isset($_POST['quantity_required'])){
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
    $quantity_required = $_POST['quantity_required'];
    $req_blood_group = $_POST['req_blood_group'];
    $area_pincode= $_POST['area_pincode'];
    $insert = 0;

    $sql = "SELECT Fname, Mname, Lname, Sex, Contact_Number, Email FROM `dhamni`.`Donor` WHERE Blood_group LIKE '%$req_blood_group%' AND Pincode = '$area_pincode';";
    $sql2 = "SELECT Name,contact_number,email from `dhamni`.`blood_bank` as bb, `dhamni`.`blood` as b where bb.Pincode = '$area_pincode' AND b.blood_bank_id = bb.reg_no AND b.blood_group LIKE '%$req_blood_group%' AND b.quantity > 0;";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        // Flag for successful insertion
        $insert = 1;
        $result = $con->query($sql);
        $result2 = $con->query($sql2);
    }
    else{
        $insert=2;
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
    <title>Recipient Search Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="overflow-x: hidden;">
    <header>
        <nav class="navbar" style="background-color: #f00000;">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/Dhamni_2.0/recipient_search.php" style="color: white; margin: auto; font-size: 1.8em;">
                    <!-- <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
                    Recipient Search Form
                </a>
            </div>
        </nav>
    </header>

    <main>
        <form class="row g-3" style="padding: 5%;" action="recipient_search.php" method="post">

            <div class="col-md-4">
                <label for="inputReq_BG" class="form-label">Required Search Group</label>
                <select id="inputReq_BG" name="req_blood_group" class="form-select" required>
                    <option selected>Required Blood Group</option>
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
            </div>
            <div class="col-md-4">
                <label for="inputHAddress" class="form-label">Quantity</label>
                <input type="number" name="quantity_required" class="form-control" id="inputAddress" required>
            </div>

            <div class="col-md-4">
                <label for="inputAPin" class="form-label">Area Pin Code</label>
                <input type="number" name="area_pincode" class="form-control" id="inputPin" required>
            </div>
            
            <div class="col-12" style="text-align: center;" >
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <?php
        if ($insert == 1) {
            // output data of each row
            echo "Donors";
            echo "<table border='1'>
                  <tr>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Contact_Number</th>
                  <th>Email</th>
                  </tr>";
                  while($row = mysqli_fetch_array($result)){
                      echo "<tr>";
                      echo "<td>" . $row["Fname"]. " " . $row["Mname"]. " " . $row["Lname"]. "</td>";
                      echo "<td>" . $row['Sex'] . "</td>";
                      echo "<td>" . $row['Contact_Number'] . "</td>";
                      echo "<td>" . $row['Email'] . "</td>";
                      echo "</tr>";
                  }
                  echo "</table>";
            echo "Blood Banks";
            echo "<table border='1'>
                <tr>
                <th>Name</th>
                <th>Contact_Number</th>
                <th>Email</th>
                </tr>";
                while($row = mysqli_fetch_array($result2)){
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['contact_number'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";      
            }
            // else {
            //     echo "$insert";
            // }
                
    ?>
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