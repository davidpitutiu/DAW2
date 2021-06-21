<?php
    include ('../login/config.php');
    session_start();
?>
<?php
  $username= $_SESSION['username'];
  $sel="SELECT user_id FROM users WHERE username='$username'";
  $query=mysqli_query($connect,$sel);
  $row = mysqli_fetch_array($query);
  $user_id = $row['user_id'];
  if (isset($_POST['upload'])) {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];   
        $folder = "images/" .$filename;

        $sql = "INSERT INTO photos (photo_name, user_id) VALUES ('$filename', '$user_id')";
 
        mysqli_query($connect, $sql);
         
        if (move_uploaded_file($tempname, $folder))  {
            echo "<script> alert('Image uploaded successfully')</script>";
        }else{
            echo "<script>alert('Failed to upload image')</script>";
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social|Upload</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="navbar  navbar-expand-sm">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="home.php" >Home</a></li>
            <li class="nav-item"><a class="nav-link" href="upload.php">Upload</a></li>
            <li class="nav-item"><a class="nav-link" href="../login/logout.php">Log Out</a></li>
        </ul>
    </div>
    <form class="upload" action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="uploadfile" id="customFileInput" aria-describedby="customFileInput">
                    <label class="custom-file-label" for="customFileInput">Select file</label>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="upload" value="Uploads" id="customFileInput">Upload</button>
                 </div>
            </div>
        </div>
    </form>  
</body>
</html>
