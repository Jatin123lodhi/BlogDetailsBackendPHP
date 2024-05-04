<?php
include 'db.php';
if(isset($_POST['add_post'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
  
    if($title!="" && $content!="" && $category_id!=""){
        $query = "insert into `posts` (`title`,`content`,`category_id`) values ('$title','$content','$category_id')";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die("Query failed".mysqli_error());
            echo $title;
            echo $content;
            echo $category_id;
        }else{
            header('location:posts.php?msg=Your data has beed added successfully');
            
        }
    }else{
        echo $title;
        echo $content;
        echo $category_id;
    }
}

?>