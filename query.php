<?php
require("creds.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Select all the rows in the `test` table
$sql = "SELECT * FROM test WHERE 1";
$result = mysqli_query($conn,$sql);
if (!$result) {
  die('Invalid query: ' . mysqli_error($conn));
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lon'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

$conn->close();
?>