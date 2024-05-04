<?php 
include 'db.php';

if(isset($_GET['id']))
    $id = $_GET['id'];

    $query = "DELETE FROM `posts` where `id`='$id'";

    $result = mysqli_query($connection,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }else{
        header('location:posts.php?msg=You have deleted the record successfully!');
    }

?>