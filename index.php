<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $username = $_POST["username"];
  $phoneno = $_POST["phoneno"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  

    $sql="INSERT INTO `register`(`username`, `phoneno`, `email`, `password`) VALUES ('$username','$phoneno', '$email', '$password')";
    $result=mysqli_query($conn, $sql);
    if($result){
      $statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if( !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
// echo $statusMsg;
    }
    // if($result){
    //   echo "Registered Successfully";
    // }
    // if($conn->query(sql)===true){
    //   echo "Added";
    // }else{
    //   echo "Error";
    // }
  
  // }
  // else{
  //   echo "Already Exists";
  // }
  }
  
?>
<!doctype html>
<html lang="en">
  <head>
  </form><script language="JavaScript">
  function configure(){
  Webcam.set({
   width: 320,
   height: 240,
   image_format: 'jpeg',
   jpeg_quality: 90
  });
  Webcam.attach( '#my_camera' );
 }
 function take_snapshot() {
  // play sound effect
  shutter.play();
  // take snapshot and get image data
  Webcam.snap( function(data_uri) {
  // display results in page
  document.getElementById('results').innerHTML = 
   '<img id="imageprev" src="'+data_uri+'"/>';
  } );
  Webcam.reset();
 }
 var myInput = document.getElementById('myFileInput');
    function sendPic() {
    var file = myInput.files[0];
    // Send file here either by adding it to a `FormData` object 
    // and sending that via XHR, or by simply passing the file into 
    // the `send` method of an XHR instance.
    }
    // myInput.addEventListener('change', sendPic, false);
 </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js" integrity="sha256-JTH6WxFs/GvXkgGMSYlAXBawtdhTdyYA3+7hhkBG6/o=" crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Register Page</title>

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
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="index.php" method="POST" enctype='multipart/form-data'>
    <h1 class="h3 mb-3 fw-normal">Register</h1>

    
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Enter Username" name = "username">
      <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="Enter Phone Number" name="phoneno" >
        <label for="floatingInput">Phone Number</label>
      </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="Enter Email Address" name ="email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
    <div id="my_camera"></div>
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name = "password">
      <label for="floatingPassword">Password</label>
    </div>

    <!-- <div id="my_camera"></div>
    <input type=button value="Configure" onClick="configure()">
    <input type=button value="Take Snapshot" onClick="take_snapshot()">
    <div id="results" ></div>
    <input type=button value="Save Snapshot" onClick="saveSnap()"> -->

    <!-- <div class="form-floating">
    <button style="margin-bottom: 10px;" type="submit" onClick="take_snapshot()">Take Photo</button>
    <p>(or)</p>
    <input style="margin-bottom: 10px;" type="file" name="imagefile" id="fileToUpload" accept="image/*" >
    <button style="margin-bottom: 10px;" type="submit">Upload Photo</button> 
    </div>   -->
    <!-- <input id="myFileInput" type="file" accept="image/*;capture=camera"> -->
    <!-- <input id="myFileInput" type="file" accept="image/*"> -->
    <input type='file' name='file' multiple />
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
  </form>
</main>


  </body>
</html>
