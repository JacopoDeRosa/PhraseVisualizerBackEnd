<?php

$headers = getallheaders();

if ((!$headers["AppKey"]) || $headers["AppKey"] != "d4m0cl3s") {
  exit("Invalid key in header");
}

$phrase = $_POST["phrase"];

$servername = "localhost";
$username = 'root';
$password = 'root';
$dbname = 'phrases';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO phrases (phrase) VALUES ('$phrase')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>