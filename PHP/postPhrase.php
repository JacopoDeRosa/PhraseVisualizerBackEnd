<?php

$headers = getallheaders();

if ((!$headers["AppKey"]) || $headers["AppKey"] != "d4m0cl3s") {
  exit("Invalid key in header");
}

$phrase = $_POST["phrase"];

$servername = "localhost";
$username = 'damocles';
$password = 'QJVI.7EPTbiXMEpL';
$dbname = 'phrases';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Make an sql statement that will insert the phrase into the database assuming the table is called valid_phrases and the column is called phrase and another colum called author stored the author of the phrase
$sql = "INSERT INTO `valid_phrases` (`phrase`, `author`) VALUES ('$phrase', 'Unknown')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>