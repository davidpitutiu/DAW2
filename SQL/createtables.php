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
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(100),
        user_password VARCHAR(50),
        username VARCHAR(50),
        profile_pic_location BLOB,
        user_description VARCHAR(255)
    )");
    if($createtable1)
    {
        echo "Users table created";
    }else{
        echo "Failed to create users table";
    }
    $createtable2=mysqli_query("CREATE TABLE tags (
        tag_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        tag VARCHAR(255)
    )");
    if($createtable2)
    {
        echo "Tags table created";
    }else{
        echo "Failed to create tags table";
    }
    $createtable3=mysqli_query("CREATE TABLE locations (
        location_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        photo_location VARCHAR(255)
    )");
    if($createtable3)
    {
        echo "Locations table created";
    }else{
        echo "Failed to create locations table";
    }
    $createtable4=mysqli_query("CREATE TABLE posts (
        post_id INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
        user_id INT UNSIGNED,
        location_id INT UNSIGNED,
        tag_id INT UNSIGNED,
        FOREIGN KEY(user_id) REFERENCES users(user_id),
        FOREIGN KEY(tag_id) REFERENCES tags(tag_id),
        photo_date date,
        photo_description VARCHAR(255),
        FOREIGN KEY(location_id) REFERENCES locations(location_id)
    )");
    if($createtable4)
    {
        echo "Posts table created";
    }else{
        echo "Failed to create posts table";
    }
    $createtable5=mysqli_query("CREATE TABLE photos (
        photo_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        post_id INT UNSIGNED,
        FOREIGN KEY(post_id) REFERENCES posts(post_id),
        photo_location BLOB
    )");
    if($createtable5)
    {
        echo "Photos table created";
    }else{
        echo "Failed to create photos table";
    }
    $createtable6=mysqli_query("CREATE TABLE tags_posts(
        tag_id INT UNSIGNED,
        post_id INT UNSIGNED,
        FOREIGN KEY(tag_id) REFERENCES tags(tag_id),
        FOREIGN KEY(post_id) REFERENCES posts(post_id)
    )");
    if($createtable6)
    {
        echo "Tags_photos table created";
    }else{
        echo "Failed to create tags_photos table";
    }
    $createtable7=mysqli_query("CREATE TABLE comments (
        comment_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        photo_id INT UNSIGNED,
        user_id INT UNSIGNED,
        FOREIGN KEY(photo_id) REFERENCES photos(photo_id),
        FOREIGN KEY(user_id) REFERENCES users(user_id),
        comment VARCHAR(255),
        comment_date timestamp
    )");
    if($createtable7){
        echo "Comments table created";
    }else{
        echo "Failed to create comments table";
    }
?>