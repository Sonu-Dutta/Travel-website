<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $place = $_POST['place'];
    $days = $_POST['days'];
    $members = $_POST['members'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $sql = "INSERT INTO tour.booking(name, email, phone, place,days, members, arrivals,leaving, dt) VALUES ('$name', '$email', '$phone', '$place','$days', '$members','$arrivals','$leaving', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
