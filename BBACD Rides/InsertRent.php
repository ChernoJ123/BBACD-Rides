<?php
    echo "<h2> Rent Values</h2>";
    echo "<hr>";
    
    $temptStyle = "<style> span {color:blue; text-decoration: underline;}</style>";
    echo $temptStyle;

    $sID = "V00123456";
    echo "<h5>Student ID: <span>$sID</span></h5>";

    $vID = $_POST["vehicle_id"];
    echo "<h5>Vehicle ID: <span>$vID</span></h5>";

    $date = $_POST["date"];
    echo "<h5>Date: <span>$date</span></h5>";

    $time = $_POST["time"];
    echo "<h5>Time: <span>$time</span></h5>";
    
    $amount_Due = $_POST["amount_Due"];
    echo "<h5>Amount Due: <span>$amount_Due</span></h5>";

    $status = $_POST["status"];
    echo "<h5>Status : <span>$status</span></h5>";


    $servername = "localhost";
    $username = "Rides";
    $password = "bbacdRides4";
    $dbname = "BBACD Rides";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } else {
    echo "<h4 style = \"color: blue;\">DB connection established.</h4>";}

    $sql = "INSERT INTO Rent(`student_ID`, `vehicle_ID`, `date`, `time`, `amount_Due`, `status`) 
            VALUES ('$sID', '$vID', '$date', '$time', '$amount_Due', '$status')";

    if($conn-> query($sql) == TRUE)
    {
        echo "New record suceessful!";
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
?>