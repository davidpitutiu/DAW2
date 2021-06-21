
<?php
    include '../login/config.php';
    error_reporting(0);
    session_start();
?>

    <div style="text-align:center;">
        <?php echo ' <h1> <font color="darkblue">' ."Welcome " .$_SESSION['username'] ."</font> </h1>";?>
    </div>
<?php
  $username= $_SESSION['username'];
  $sel="SELECT user_id FROM users WHERE username='$username'";
  $query=mysqli_query($connect,$sel);
  $row = mysqli_fetch_array($query);
  $user_id = $row['user_id'];
  $image_query = mysqli_query($connect,"SELECT photo_name FROM photos WHERE user_id='$user_id'");
    while($rows = mysqli_fetch_array($image_query))
    {
        $img_name = $rows['photo_name'];
        $img_src = "images/" .$img_name;
        
?>

<div class="img-block">
        <img src="<?php echo $img_src; ?>" alt="" title="<?php echo $img_name; ?>"  width="300" height="200" class="rounded float-left">
        
    
    </div>

<?php
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
    <title>Social|Profile</title>
    <style>
        .img-block img{
            margin-top: 80px;
            margin-left: 40px;
            margin-right: 40px;
            margin-bottom: 80px;
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
</body>
</html>