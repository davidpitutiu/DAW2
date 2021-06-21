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
    $id=$_GET['id'];
    if (isset($_POST['text'])) {

        $text=$_POST['text'];
        $sql="INSERT INTO comments (photo_id,user_id,comment) VALUES ('$id', '$user_id', '$text')";
        $qury=mysqli_query($connect,$sql);
        
    }
    $comment_query = mysqli_query($connect,"SELECT comment FROM comments WHERE photo_id='$id'");
    while($rows = mysqli_fetch_array($comment_query))
    {
        
?>
            <div class="container">
                <?php echo $rows['comment'] ; ?>
                <hr>
                
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
    <title>Social|Comments</title>
    <style>
        .form-comments{
            position: absolute;
            margin-bottom: 200px;;
            
        }
        .container{
            background-color: #003366;
            color: white;
            min-width: 200px;
            height: 100px;
            overflow: auto;
            margin-bottom: 100px;
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <div class="container" id="con">
         <form class="form-comments" action="" method="POST">
            <textarea name="text" autocomplete="off" 
            autocorrect="off" 
            class="textBox" maxlength="140"></textarea>
            <input type="submit" value="Post" name="submit"> 
        </form>
    </div>
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