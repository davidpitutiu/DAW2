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
    $image_query = mysqli_query($connect,"SELECT photo_id, photo_name FROM photos ORDER BY photo_id DESC");
    while($rows = mysqli_fetch_array($image_query))
    {
        
        $img_name = $rows['photo_name'];
        $img_src = "images/".$img_name;
?>
    <div class="img-block">
        <?php $id=$rows['photo_id']; 
            echo "<a href='comments.php?id=$id'><img src=".$img_src." alt='' title=".$img_name." width='300' height='200' class='rounded mx-auto d-block' /></a>"
        ?>
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
    <title>Social|Home</title>
    <style>
        img{
            width:20cm;
            height: 15cm;
            margin-top: 80px;
            margin-bottom: 100px;
            display: block;
            align-items: center;
            overflow: scroll;
            border: 10px;
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