<?php
    session_start();
    $id = $_SESSION['id'];
    if($_SESSION['user']=='Nouser')
    {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <div>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="signup.php">Register</a>
  </li>
</ul>
</div>
      <h2>Choose Tutor</h2>
      <form method="post">
                <div class="form-group">
                <label for="tutor">choose tutor:</label>
                <select name="tutor" id="tutor" class="form-control">
                <?php
                    include 'connection.php';
                    $query = "SELECT * FROM tutor ";
                    $table=mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($table))
                    {
                ?>
                <option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?></option>      
            <?php
                }
            ?>
            </select>
            </div>

            <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-default">choose</button>
        </form>
        <?php
        if(isset($_POST['submit']))
        {
            $tutor=$_POST['tutor'];
            $query="INSERT INTO supervise (cid,tid,status) VALUES($id,$tutor,0)";
            if(mysqli_query($con,$query))
            {
                echo "<span style='color:red'> Your request is sent </span>";
            }
        }
        
        ?>
    </div>
</body>
</html>