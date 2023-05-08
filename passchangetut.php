<?php
 include 'connection.php';
  session_start();
//Authentication
    if($_SESSION['user']=='Nouser'){
        header ('Location: login.php');
    }

//Authorization
    else if($_SESSION['user']!='tut'){
        header ('Location:unauthorised.php');
    }    
    $id = $_SESSION['id'];
    $query = "SELECT * FROM tutor WHERE id = $id";
    $table = mysqli_query($con,$query);
    $cand = mysqli_fetch_array($table);
    $pass = $cand['password'];
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
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
        <h2>Update Password</h2>

        <form method="post">

        <div class="form-group">
        <label for="name">Old Passowrd: </label>
        <input type="password" class="form-control" id="name" placeholder="Enter old password" name="pass1" >
        </div>

        <div class="form-group">
        <label for="name">New Passowrd: </label>
        <input type="password" class="form-control" id="name" placeholder="Enter new password" name="pass2" >
        </div>

        <div class="form-group">
        <label for="email">Retype New Password: </label>
        <input type="password" class="form-control" id="email" placeholder="Retpye new password" name="pass3">
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>

    </form>
    <?php 

        if( isset($_POST['submit']) )
        {
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            $pass3 = $_POST['pass3'];

            if($pass!=$pass1){
                echo "<span style='color: red'> Old password doesn't match!! </span>";
            }
            else if($pass2!=$pass3){
                echo "<span style='color: red'> new passwords doesn't match!! </span>";
            }
            else if($pass==$pass1 && $pass2==$pass3){
                $query = "UPDATE tutor SET  password='$pass2' WHERE id = $id";
                if(mysqli_query($con,$query)){
                    echo "<span style='color: green'> password successfully updated </span>";
                }
            }

            
        }

    ?>
</div>
</body>
</html>