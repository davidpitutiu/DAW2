<?php
    $servername="localhost";
    $username="root";
    $password="";
    $databasename="socialapp";
    $connect=mysqli_connect($servername,$username,$password,$databasename);
    if(!$connect){
        echo "Failed";
    }else{
        echo "Succes";
    }
    $createtable1 = mysqli_query("CREATE TABLE users (
        user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100),
        user_password VARCHAR(50),
        username VARCHAR(50)
    )");
    if($createtable1)
    {
        echo "Users table created";
    }else{
        echo "Failed to create users table";
    }
    $createtable5=mysqli_query("CREATE TABLE photos (
        photo_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT UNSIGNED,
        FOREIGN KEY(user_id) REFERENCES users(user_id),
        photo_name BLOB
    )");
    if($createtable5)
    {
        echo "Photos table created";
    }else{
        echo "Failed to create photos table";
    }
    $createtable7=mysqli_query("CREATE TABLE comments (
        comment_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        photo_id INT UNSIGNED,
        user_id INT UNSIGNED,
        FOREIGN KEY(photo_id) REFERENCES photos(photo_id),
        FOREIGN KEY(user_id) REFERENCES users(user_id),
        comment VARCHAR(255)
    )");
    if($createtable5)
    {
        echo "Comments table created";
    }else{
        echo "Failed to create comments table";
    }
?>