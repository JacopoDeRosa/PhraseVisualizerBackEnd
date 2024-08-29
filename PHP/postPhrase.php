<?php

$headers = getallheaders();

if ((!$headers["AppKey"]) || $headers["AppKey"] != "d4m0cl3s") {
  exit("Invalid key in header");
}

$phrase = $_POST["phrase"];



?>