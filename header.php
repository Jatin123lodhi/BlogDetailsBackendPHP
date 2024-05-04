<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>
<body>
<?php include("db.php") ?>
<div class="grid grid-cols-3 shadow-md border p-5">
    <div class=""></div>
    <div class=" text-center  text-2xl font-bold  text-gray-500  ">CMS for Blog Applicaiton</div>
    <div class=" flex justify-end gap-4 ">
        <button onClick="handlePostsClick()">Posts<button>
        <button onClick="handleCategoriesClick()">Categories<button>
        <button onClick="handleHomeClick()">Home</button>
    </div>
</div>

<script>
    function handlePostsClick(){
        window.location = "http://localhost/backend_blog_app/posts.php";
    }
    function handleCategoriesClick(){
         window.location = "http://localhost/backend_blog_app/categories.php";
    }
    function handleHomeClick(){
        window.location = "http://localhost/backend_blog_app/";
    }
</script>
 
    