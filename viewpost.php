<?php
    session_start();
    if($_SESSION['user']=='Nouser')
    {
        header('location:login.php');
    }
    $pid = $_REQUEST['id'];
    echo $pid;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcd
    n.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>view post</title>
</head>
<body>
<div>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="signup.php">Register</a>
    </li>
  </ul>
</div>
  
    
    
    
</body>
</html>