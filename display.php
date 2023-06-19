<?php
include 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <button class='btn btn-primary my-5'>
            <a class='text-light ' href="user.php">
                Add user
            </a>
        </button>
        <div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Gender</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($con, $sql);
    $srNo = 1;
    if($result) {

        while ($row = mysqli_fetch_assoc($result)) {
            $id= $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $password = $row['password'];
            $gender = $row['gender'];
            $profile = $row['profile'];

            echo '<tr>
            <th scope="row">'.$srNo.'</th>
            <td><img src="Uploads/'.$profile.'" width="30px" height="30px"/></td>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$mobile.'</td>
            <td>'.$gender.'</td>
            <td>'.$password.'</td>
            <td><button class="btn btn-primary"><a class="text-light" href="update.php?updateid='.$id.'">Update</a></button>
            <button class="btn btn-danger"><a class="text-light" href="delete.php?deleteid='.$id.'">Delete</a></button>
            </td>
          </tr>';

          $srNo = $srNo + 1;
        }
    }

    ?>
  </tbody>
</table>
        </div>
    </div>
    
</body>
</html>