<?php
include("../db.php");
include("handleCors.php");

if(isset($_GET['postId'])){
    $postId = $_GET['postId'];
    
    $query = "SELECT posts.*, categories.name AS category_name 
              FROM posts 
              LEFT JOIN categories ON posts.category_id = categories.id 
              WHERE posts.id = $postId";
    
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query failed: " . mysqli_error($connection));
    } else {
        $post = mysqli_fetch_assoc($result);
        header('Content-Type: application/json');
        echo json_encode($post);
    }
} 
?>