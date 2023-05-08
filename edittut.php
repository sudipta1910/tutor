<?php
    include "connection.php";
    session_start();
    $id = $_SESSION['id'];
    $query= "SELECT * FROM tutor WHERE id = $id";
    $table=mysqli_query($con,$query);
    $user=mysqli_fetch_array($table);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>sign up form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="tutor.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="signup.php">Register</a>
  </li>
</ul>
</div>
  <h2>update</h2>
  <form action="edittut.php?id=<?php echo $id;?>" method="post">
    
   <div class="form-group">
      <label for="name">Name:</label>
      <input type="text"  class="form-control" id="name" placeholder="Enter name" name="name" value=" <?php echo $user['name'];?>">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $user['email'];?>">
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" name="phone" value="<?php echo $user['phone'];?>">
    </div>

    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-success">Update</button>
  </form>
  <?php 
    if(isset($_POST['submit']))
    {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $query="UPDATE tutor SET name='$name',email='$email',phone='$phone' WHERE id = $id";
      if(mysqli_query($con,$query))
      {
        echo "<span style='color:green'>Data Successfully Updated</span>";
      }
    }
  ?>
  
</div>

</body>
</html>