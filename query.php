<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "locationDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO test (id, lat, lon) VALUES ('" . $_GET["id"] . "', '" . $_GET["lat"] . "', '" . $_GET["lon"] . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>