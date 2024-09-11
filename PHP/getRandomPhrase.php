<?php

$headers = getallheaders();

if ((!$headers["AppKey"]) || $headers["AppKey"] != "d4m0cl3s") {
  exit("Invalid key in header");
}

$servername = "localhost";
$username = 'damocles';
$password = 'QJVI.7EPTbiXMEpL';
$dbname = 'phrases';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}  

// Select a random phrase from the database from the table valid_phrases, only selected phrases where the 'insertion' date is less than 1 day old
$sql = "SELECT phrase FROM `valid_phrases` WHERE `insertion` > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY RAND() LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row["phrase"];
} else {
  echo "0 results";
}

?>