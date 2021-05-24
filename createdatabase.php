<?php
    $servername="localhost";
    $username="root";
    $password="";
    $connect=mysqli_connect($servername,$username,$password);
    if(!$connect){
        echo "Failed";
    }else{
        echo "Succes";
    }
    $createdatabase = mysqli_query("CREATE DATABASE socialapp");
    if($createdatabase){
        echo "Database created";
    }else{
        echo "Failed to create database";
    }
?>