<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
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
  <h2 class=" text-center text-primary mt-5 ">INFO of supervise TABLE</h2>
  <table class="table table-primary">
    <thead>
      <tr>
        <th>Candidate</th>
        <th>Tutor</th>
        <th>status</th>
        <th>Action</th>
</tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $query="SELECT * FROM supervise";
        $table=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($table)){
      ?>


      <tr>
          <td><?php echo $row['cid']; ?></td>        
          <td><?php echo $row['tid'];?></td>
          <td><?php echo $row['status'];?></td>
          <td><p>
            <a href="confirmtable.php" class="btn btn-info btn-lg">
              <span class="glyphicon glyphicon-log-out"></span> confirm
           </a>
      </p></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
