<?php
session_start();
  if(isset($_SESSION['user'])){
    if($_SESSION['user']=='tut')
    {
      header('location:tutor.php');
    }
    else if($_SESSION['user']=='cand')
    {
      header('location:candidate.php');
    }
  }
  else
  {
    $_SESSION['user']='Nouser';
  }
  include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>Document</title>
</head>
<body>
    <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="User Name" name="name" id="name" required />
      <input type="email" placeholder="Email" name="email" id="email" required />
      <input type="password" placeholder="Password" name="pass" id="pass" autocomplete="pass" required />
      <input type="text" placeholder="Phone" name="phone" id="phone" required />
      <div style="margin:10px;">
        <label for="date">Date of Birth  :</label>
        <input type="date" name="dob" id="dob" required />
      </div>
      <select name="type" id="type">
         <option value="">choose type</option>
         <option value="tutor">Tutor</option>
         <option value="candidate">candidate</option>
       </select>
      <select name="location" id="type">
         <option value="">Location</option>
         <?php
         $query="SELECT * FROM location";
         $table=mysqli_query($con,$query);
       
         while($row = mysqli_fetch_array($table))
         {
          ?>
             <option value="<?php echo $row['id'];?>"><?php echo $row['loc_name'];?></option>
         <?php
         }
         ?>
       </select>
        <div class="image"><label>Select your avatar: </label>
         <input type="file" name="image" id="image" accept="image/*" required />
        </div>
        <div style="padding-bottom=200px;">
        <input type="submit" value="register" name="register" class="btn btn-block btn-primary" />
        </div>
    </form>
    <?php
      include 'connection.php';
      if (isset($_POST['register'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $phone=$_POST['phone'];
        $dob=$_POST['dob'];
        $type=$_POST['type'];
        $loc=$_POST['location'];

        $image=explode(".",$_FILES['image']['name']);
        $len=count($image);
        $ext=$image[$len-1];
        $date=date("D:M:Y");
        $time=date("h:i:s");
        $image_name=md5($date.$time);
        $image_name=$image_name.".".$ext;

        if($type=='candidate')
        {
            $query="INSERT INTO candidate(name,email,password,phone,birthday,locationM,image) VALUES('$name','$email','$pass','$phone','$dob','$loc','$image_name')" ;
            if(mysqli_query($con,$query))
            {
              echo "<span style='color:white'>Data inserted Successfully on candidate </span>";
              if ($image_name !=null) {
                move_uploaded_file($_FILES['image']['tmp_name'], "uploaded_image/$image_name");
                header('Location: login.php');
              }
            }
        }
        else if($type=='tutor')
        {
          $query="INSERT INTO tutor(name,email,password,phone,birthday,locationM,image) VALUES('$name','$email','$pass','$phone','$dob','$loc','$image_name')" ;
          if(mysqli_query($con,$query))
          {
            echo "<span style='color:white'>Data inserted Successfully on tutor </span>";
            if ($image_name  !=null) 
            {
              move_uploaded_file($_FILES['image']['tmp_name'], "uploaded_image/$image_name");
              header('Location: login.php');
            }
          }
        }
        else if($type=='candidate')
        {
          $query="INSERT INTO candidate(name,email,password,phone,birthday,image) VALUES('$name','$email','$pass','$phone','$dob','$image_name')";
          if(mysqli_query($con,$query))
          {
            echo "<span style='color:white'>Data inserted Successfully on candidate </span>";
            if($image_name !=null)
            {
              move_uploaded_file($_FILES['image']['tmp_name'], "uploaded_image/$image_name");
              header('Location: login.php');
            }
          }
        }
        else{
          echo "<span style='color:blue'>wrong! </span>";
        }
        
      }
    ?>
  </div>
</div>
</body>
</html>