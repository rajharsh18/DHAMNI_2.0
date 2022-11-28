
<?php
$insert= 0;
$result = 0;
if(isset($_POST['area_pincode'])){
    $server = "localhost";
    $username = "root";
    $pass = "";

    $con = mysqli_connect($server, $username, $pass);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $area_pincode= $_POST['area_pincode'];
    $insert = 0;

    $sql = "SELECT Name,contact_number,email from `dhamni`.`blood_bank` WHERE Pincode = '$area_pincode';";

    if($con->query($sql) == true){
        $insert = 1;
        $result = $con->query($sql);
    }
    else{
        $insert=2;
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
</head>

<body style="overflow-x: hidden;">
    <header>
        <nav class="navbar" style="background-color: #f00000;">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/Dhamni_2.0/recipient_search_bb.php" style="color: white; margin: auto; font-size: 1.8em;">
                    Blood Bank Search Form
                </a>
            </div>
        </nav>
    </header>

    <main>
        <form class="row g-3" style="padding: 5%;" action="recipient_search_bb.php" method="post">

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
            
            echo "<main style='width: 90%; margin: auto;'>";
            echo "Blood Banks";
            echo "<table class='table table-striped' style='border: 1px solid black;' >
            <thead>
                <tr>
                <th>S. No.</th>
                <th>Name</th>
                <th>Contact_Number</th>
                <th>Email</th>
                </tr>
            </thead>
            <tbody>";
            $code = 1;
                while($row = mysqli_fetch_array($result)){

                    echo "<tr>";
                    echo "<td>$code</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['contact_number'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                    $code = $code + 1;
                }

                echo "
                </tbody>
                </table>
                </main>";      
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