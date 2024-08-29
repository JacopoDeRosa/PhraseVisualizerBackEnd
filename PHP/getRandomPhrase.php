<?php

$headers = getallheaders();

if ((!$headers["AppKey"]) || $headers["AppKey"] != "d4m0cl3s") {
  exit("Invalid key in header");
}

$servername = "localhost";
$username = 'root';
$password = 'root';

$conn = new mysqli($servername, $username, $password, "phrases");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}  

$sql = "SELECT phrase FROM phrases ORDER BY RAND() LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row["phrase"];
} else {
  echo "0 results";
}

?>