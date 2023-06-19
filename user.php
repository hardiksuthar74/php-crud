<?php
include 'connect.php';

if(isset($_POST['submit'])) {

    $targetDir = "Uploads/";
    $fileName = $_FILES['fileToUpload']['name'];

    $extension = pathinfo($fileName, PATHINFO_EXTENSION);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $profile = $name.".".$extension;

    $targetFile = $targetDir . basename($name.".".$extension);

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO users (name, email, password, mobile, gender,profile) VALUES ('$name', '$email', '$password', '$mobile','$gender','$profile')";

    $result = mysqli_query($con, $sql);

    
    if($result) {
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }

}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-5">
    <form method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" >
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" >
  </div>
  <div class="mb-3">
    <label class="form-label">Enter your mobile number</label>
    <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" >
  </div>
  <div class="mb-3">
    <label class="form-label">Gender</label>
    <input class="ms-1 form-check-input" type="radio" value='Male' name="gender">
    <label class="form-check-label">
        Male
    </label>
    <input class="ms-1 form-check-input" type="radio" value='Female' name="gender">
    <label class="form-check-label">
        Female
    </label>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="password" name="password" >
  </div> 
  <div class="mb-3">
    <label for="formFile" class="form-label">Upload profile picture</label>
    <input class="form-control" name="fileToUpload"  type="file" id="fileToUpload">
    </div> 
  <button type="submit" name='submit' class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>
</html>