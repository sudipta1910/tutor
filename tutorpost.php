<?php
    session_start();
    if($_SESSION['user']=='Nouser')
    {
        header('location:login.php');
    }
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Notice</title>
</head>
<body>

  <section style="background-color: #eee;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card">
          <div class="card-body">
            
            
            <form method="post">
                <div class="mb-3 mt-3">
                  <label class="form-label" for="textAreaExample">Message</label>
                  <textarea class="form-control" id="textAreaExample" rows="4"style="background: #fff;" name="post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary"  value="submit" name="submit">Post</button>
            </form>
            <?php
                include 'connection.php';
                if(isset($_POST['submit']))
                {
                
                  $post=$_POST['post'];
                  $id = $_SESSION['id'];
                  echo $id;
                  
                  $query="INSERT INTO notice(message,tid) VALUES('$post',$id)";
                  if(mysqli_query($con,$query))
                  {
                    echo "<span style='color:white'>Posted </span>";
                  }
                  else{
                    echo "<span style='color:blue'>something is Wrong! </span>";
                  }
                }
            ?>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>