<?php
include 'db.php';
if(isset($_POST['add_category'])){
    $name = $_POST['name'];
    
  
    if($name!=""){
        $query = "insert into `categories` (`name`) value ('$name')";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die("Query failed".mysqli_error());
        }else{
            header('location:posts.php?msg=Your data has beed added successfully');
        }
    }else{
        echo $name;
       
    }
}

?>