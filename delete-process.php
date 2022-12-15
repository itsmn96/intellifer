<?php

include "db.php"; 

$username = $_GET['del'];

$del = mysqli_query($conn,"delete from register where username = '$username'");

if($del)
{
    mysqli_close($db); 
    header("location:home.php"); 
    exit;	
}
else
{
    echo "Error deleting record";
}
?>

