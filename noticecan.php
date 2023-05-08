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
  <form>
  <section style="background-color: #eee;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-start align-items-center">
            <?php
                    $id = $_SESSION['id'];
                    include "connection.php";
                    $query="SELECT *FROM candidate WHERE id=$id";
                    $table=mysqli_query($con,$query);
                    $row=mysqli_fetch_array($table);
                    $img = "uploaded_image/".$row['image'];
                    $date=date("D:M:Y");
                ?>
              <img class="rounded-circle shadow-1-strong me-3"
                src="<?php echo $img ?>" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold text-primary mb-1"><?php echo $row['name']; ?></h6>
                <p class="text-muted small mb-0">
                <?php echo $date; ?>
                </p>
              </div>
            </div>
              <?php
                      $id = $_SESSION['id'];
                      $email=$_SESSION['email'];
                      include "connection.php";
                      $query="SELECT *FROM notice WHERE id=$id AND email=$email";
                      $table=mysqli_query($con,$query);
                      $row=mysqli_fetch_array($table);
                      $txt=$row['message'];
               ?>
            <p class="mt-3 mb-4 pb-2">
            <?php echo $txt; ?>
            </p>

            <div class="small d-flex justify-content-start">
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-thumbs-up me-2"></i>
                <p class="mb-0">Like</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-comment-dots me-2"></i>
                <p class="mb-0">Comment</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="fas fa-share me-2"></i>
                <p class="mb-0">Share</p>
              </a>
            </div>
          </div>
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <img class="rounded-circle shadow-1-strong me-3"
                src="<?php echo $img ?>" alt="avatar" width="40"
                height="40" />
              <div class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
              </div>
            </div>
            <div class="float-end mt-2 pt-1">
              <button value="cmnt" name="cmnt" type="button" class="btn btn-primary btn-sm">Post comment</button>
              <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include 'connection.php';
if(isset($_POST['cmnt']))
{
  $id=$_POST['id'];
  $email=$_POST['email'];
  $txt=$_POST['msg'];
  
  $query="INSERT INTO notice('id','email','message') VALUES('$id','$email','$txt')";
  if(mysqli_query($con,$query))
  {
    echo "<span style='color:white'>Posted </span>";
  }
  else{
    echo "<span style='color:blue'>something is Wrong! </span>";
  }
}
?>
</body>
</html>