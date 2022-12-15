<?php

$servername ="localhost";
$username = "root";
$password = "";
$database = "intellifer";

$conn = mysqli_connect($servername, $username, $password, $database);
if($conn){
  echo "" ;
}
else{
  die("Error" . mysqli_connect_error());
}

?>