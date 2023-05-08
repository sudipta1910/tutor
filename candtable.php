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
<h2>INFO TABLE OF CANDIDATE</h2>
  <p>Type Name in the input field to search for first names, last names or emails:</p> 
  <form method= "post">
      <div class="input-group">
        <div class="form-outline">
          <input type="text" id="search" name="searchvalue" class="form-control" />
        </div>
        <button value="search" class="btn btn-primary" id="search" name="search">search</button>
      </div>
  </form> 
  <br>
  <?php
    include 'connection.php';
    $table = [];
    if(isset($_POST['search']))
    {
      $searchvalue = $_POST['searchvalue'];
      $query="SELECT * FROM candidate WHERE name LIKE '%".$searchvalue."%' OR email LIKE '%".$searchvalue."%'";
      $table = mysqli_query($con,$query);
    }
    else{
      $query="SELECT * FROM candidate";
      $table=mysqli_query($con,$query);

    }
  ?>
  <table class="table table-primary table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th class="text-primary">name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>action</th>
        
</tr>
    </thead>
    <tbody>
      <?php
        while($row = mysqli_fetch_array($table)){
      ?>


      <tr>
          <td><?php echo $row['id']; ?></td>        
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['email'];?></td>
          <td><?php echo $row['phone']; ?></td>
          <td>
              <a href="deletecand.php" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row['id'];?>">Delete</a>
                <!-- The Modal -->
  <div class="modal" id="myModal<?php echo $row['id'];?>">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">do you want to delete</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         Do you want to delete <?php echo $row['name'];?> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="deletecand.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Yes</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
          </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
