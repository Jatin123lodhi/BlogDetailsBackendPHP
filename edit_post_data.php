
<?php
    include 'header.php'; 
    if(isset($_POST['edit_post'])){
        if(isset($_GET['id_new'])){
            $id_new = $_GET['id_new'];
        
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];

        $query = "update `posts` set `title` = '$title', `content`='$content', `category_id`='$category_id' where `id`='$id_new'";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die("query failed".mysqli_error());
        }else{
            header('location:posts.php?msg=You have successfully updated!');
        }
    }
    } 

?>

<?php




 if(isset($_GET['id'])){
    $id = $_GET['id'];
 
    $query = "SELECT * FROM `posts` where `id`='$id'";

    $result = mysqli_query($connection,$query);
    if(!$result){
        die("query failed".mysqli_error());
    }else{
        $row_post = mysqli_fetch_assoc($result);
    
?>



<h1 class="text-xl  text-center text-gray-600 font-semibold my-4">Edit Post</h1>
<?php  echo '<div class="px-6"><button class="bg-sky-500 hover:bg-sky-700 text-white p-2 mb-5 rounded-lg px-6"><a href="javascript:history.go(-1)" title="Return to previous page">Back</a></button></div>' ?>
<form class="border p-4 px-6 shadow-md mx-4 rounded-lg flex flex-col gap-4"  action="edit_post_data.php?id_new=<?php echo $row_post['id']?>" method="post" >                        
    <div class="flex flex-col ">
        <label class="text-lg">Category</label>
        <select name="category_id" id="categories" class="p-2">
            <?php  
                $query = "SELECT * FROM categories";

                $result = mysqli_query($connection,$query);
                if(!$result){
                    die("query failed".mysqli_error());
                }else{
                    while($row= mysqli_fetch_assoc($result)){
                        $selected = ($row['id'] == $row_post['category_id']) ? 'selected' : '';
                        ?>
                        <option <?php echo $selected; ?> value=<?php echo $row['id']; ?>><?php echo $row['name']; ?></option>
                        <?php 
                    }
                }
            
            ?>
        </select>
    </div>
    <div class="flex flex-col ">
    
        <label class="text-lg">Title</label>
        <input required type="text" name="title" class="border border-gray-400 p-2 " value="<?php echo $row_post['title']; ?>" />
    </div>
    <div class="flex flex-col ">
        <label class="text-lg">Description</label>
        <textarea required rows="8" name="content" type="text" class="border border-gray-400 p-2" ><?php echo $row_post['content']; ?></textarea>
    </div>
    <div>
        <input type="submit" class="cursor-pointer bg-sky-500 hover:bg-sky-700 text-white p-2 mb-5 rounded-lg px-6" name="edit_post" value="Edit" />
    </div>
</form>
<?php
    }
}
?>
