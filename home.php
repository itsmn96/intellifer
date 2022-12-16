<?php
include 'db.php';

  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Home Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">


    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

  

    <link href="signin.css" rel="stylesheet">
  </head>
  <body style=" justify-content: center">
      <form>
  <table  class="table table-striped">
   <tr>
      <th>Image</th>
      <th>Username</th>
      <th>Phone Number</th>
      <th>Email</th>
      <th>Action</th>
    </tr>


  <?php

  $query = "SELECT * FROM `register`;";
  $result = $conn->query($query);
  
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
          $imageurl = 'uploads/'.$row["file"];
            ?>
      <?php 
      print "<tr> <td>";
      print"<img src='$imageurl' alt='' width='200px' height = '200px' />";
      print"</td> <td>";

      echo $row["username"]; 
      print "</td> <td>";
      echo $row["phoneno"]; 
      print "</td> <td>";
      echo $row["email"]; 
      print "</td> <td>"; 

      
      print "<a href='delete-process.php?del={$row['username']}'><input type='button' class='submit btn btn-danger' value='Delete'/></a>";
      print "</td> <tr>";

      }
    }
    else {
        echo "0 results";
    }
  
?>
    </body>
</html>

