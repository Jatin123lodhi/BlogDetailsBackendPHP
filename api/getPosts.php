<?php
include("../db.php");
include("handleCors.php");
$query = "SELECT posts.*, categories.name AS category_name 
          FROM posts 
          LEFT JOIN categories ON posts.category_id = categories.id";

$result = mysqli_query($connection, $query);
if(!$result){
    die("Query failed: " . mysqli_error($connection));
} else {
    $posts = [];
    while($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($posts);
}
?>