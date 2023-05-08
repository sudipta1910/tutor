<?php
  $pid = $_REQUEST['id'];
  echo $pid;
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
                    include "connection.php";
                    $query="SELECT * FROM notice WHERE id = $pid";
                    $table=mysqli_query($con,$query);
                    $row=mysqli_fetch_array($table);

                    $query2 = "SELECT * FROM tutor WHERE id = ".$row['tid'];
                    $table2=mysqli_query($con,$query2);
                    $row2=mysqli_fetch_array($table2);

                    $img = "uploaded_image/".$row2['image'];
                    $date=date("D:M:Y");
                ?>
              <img class="rounded-circle shadow-1-strong me-3"
                src="<?php echo $img ?>" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold text-primary mb-1"><?php echo $row2['name']; ?></h6>
                <p class="text-muted small mb-0">
                <?php echo $date; ?>
                </p>
              </div>
            </div>
              <?php
                      $id = $_SESSION['id'];
                      $email=$row2['email'];
                      include "connection.php";
                      $query3 = "SELECT * FROM candidate WHERE id = $id";
                      $table3=mysqli_query($con,$query3);
                      $row3=mysqli_fetch_array($table3);
                      $img2 = "uploaded_image/".$row3['image'];
                     
                      $txt=$row['message'];

               ?>
            <p class="mt-3 mb-4 pb-2">
            <?php echo $txt; ?>
            </p>

  
            </div>
          </div>
          
          
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <img class="rounded-circle shadow-1-strong me-3"
                src="<?php echo $img2 ?>" alt="avatar" width="40"
                height="40" />
              <form method="post">
              <div class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;" name="cmnt"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
              </div>
            </div>
            <div class="float-end mt-2 pt-1">
              <button value="submit" name="submit" type="button" class="btn btn-primary btn-sm">Post comment</button>
              <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
            </div>
            </form>
            <?php
              include 'connection.php';
              if(isset($_POST['submit']))
              {
                $cmnt=$_POST['cmnt'];
                
                
                $query="INSERT INTO comment(sid,email,comment) VALUES($id,$pid,'$cmnt')";
                if(mysqli_query($con,$query))
                {
                 
                  header('Location: noticetut.php?id='.$pid);
                }
                else{
                  echo "<span style='color:blue'>something is Wrong! </span>";
                }
              }
            ?>
            <?php
              $query4 = "SELECT * FROM comments WHERE pid = $pid ";
              $table4 = mysqli_query($con,$query4);
              while($row4 = mysqli_fetch_array($table4)){
                $query5 = "SELECT * FROM candidate WHERE id = ".$row4['sid'];
                $table5=mysqli_query($con,$query5);
                $row5=mysqli_fetch_array($table5);
                $img3 = "uploaded_image/".$row5['image'];
                ?>
              <div class="row"> 
                
                <div class="col-md-4">
                  <img class="rounded-circle shadow-1-strong me-3"
                    src="<?php echo $img3 ?>" alt="avatar" width="40"
                    height="40" />
                    <?php echo $row5['name']; ?>
                </div>
                <div class="col-md-8">
                  <?php echo $row4['comment']; ?>
                </div>
              </div>

              </div>

              <?php
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