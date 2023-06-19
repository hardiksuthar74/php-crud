<?php

include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM users WHERE id=$id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];
$gender = $row['gender'];


if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];

    $sql = "UPDATE users set id=$id, name= '$name', email='$email', gender='$gender' ,password='$password', mobile='$mobile' WHERE id=$id";
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
    <form method="post">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value=<?php echo $name; ?> >
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" value=<?php echo $email; ?> name="email" >
  </div>
  <div class="mb-3">
    <label class="form-label">Gender</label>
    <input class="ms-1 form-check-input" type="radio" value='Male'  name="gender">
    <label class="form-check-label">
        Male
    </label>
    <input class="ms-1 form-check-input" type="radio" value='Female' name="gender">
    <label class="form-check-label">
        Female
    </label>
  </div>
  <div class="mb-3">
    <label class="form-label">Enter your mobile number</label>
    <input type="text" class="form-control" value=<?php echo $mobile; ?> name="mobile" >
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" value=<?php echo $password; ?> name="password" >
  </div>  
  <button type="submit" name='submit' class="btn btn-primary">Update</button>
</form>
    </div>
  </body>
</html>