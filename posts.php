<?php include('header.php') ?>


<h1 class="text-xl  text-center text-gray-600 font-semibold my-4">Posts</h1>
     
    <div class="p-4 px-6">
        <div class=" flex  gap-4 justify-end items-center ">
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="bg-sky-500 hover:bg-sky-700 text-white p-2 mb-5 rounded-lg px-4">Add New Post</button>
            <button data-modal-target="category-modal" data-modal-toggle="category-modal" class="bg-sky-500 hover:bg-sky-700 text-white p-2 mb-5 rounded-lg px-4">Add New Category</button>
        </div>
        <div id="message" class=" text-center font-bold text-gray-600 text-lg">
            <?php  
                if(isset($_GET['msg'])){
                    echo $_GET['msg'];
                }
            ?>
        </div>
        <div class="flex justify-center item-center">
        <table class=" border border-gray-300 min-w-[600px] lg:min-w-[900px] mt-5 p-2">
            <thead>
                <tr>
                    <th class="border border-gray-400 p-3">Id</th>
                    <th class="border border-gray-400 p-3">Category_Id</th>
                    <th class="border border-gray-400 p-3">Title</th>
                    <th class="border border-gray-400 p-3">Content</th>
                    <th class="border border-gray-400 p-3">Created_At</th>
                    <th class="border border-gray-400 p-3">Edit</th>
                    <th class="border border-gray-400 p-3">Delete</th>
                </tr>
                
            </thead>
            <tbody class="text-center ">
            <?php  
                    $query = "SELECT posts.*, categories.name AS category_name 
                    FROM posts 
                    LEFT JOIN categories ON posts.category_id = categories.id";
                    
                    $result = mysqli_query($connection,$query);
                    if(!$result){
                        die("query failed".mysqli_error());
                    }else{
                        while($row= mysqli_fetch_assoc($result)){
                            ?>
                            <tr data-post-id=<?php echo $row['id'] ?>  class="table-row border border-slate-600">
                                <td class="border border-gray-400 p-3"><?php echo $row['id'] ?></td>
                                <td class="border border-gray-400 p-3"><?php echo $row['category_name'] ?></td>
                                <td class="border border-gray-400 p-3"><?php  
                                    $title = $row['title'];
                                    $shortTitle = (strlen($title) > 100) ? substr($title, 0, 100) . "..." : $title;
                                    echo $shortTitle;
                                ?></td>
                                <td class="border border-gray-400 p-3"><?php 
                                    $content = $row['content'];
                                    $shortContent = (strlen($content) > 100) ? substr($content, 0, 100) . "..." : $content;
                                    echo $shortContent;
                                ?></td>
                                <td class="border border-gray-400 p-3"><?php echo $row['created_at'] ?></td>
                                <td class="border border-gray-400 p-3 "><a class=" bg-green-500 hover:bg-green-600 text-white rounded-lg p-2" href="edit_post_data.php?id=<?php echo $row['id']; ?>">Edit✏️</a></td>
                                <td class="border border-gray-400 p-3 "><a class=" bg-red-500 hover:bg-red-600 text-white rounded-lg p-2  text-nowrap" href="delete_post_data.php?id=<?php echo $row['id']; ?>">Delete🗑️</a></td>
                                
                            </tr>
                            <?php 
                            
                        }
                    }
                
                ?>
            </tbody>
        </table>
        </div>
    </div> 
     
    <!-- Main modal -->
    <?php include('add_post_modal.php')  ?>
    <?php include('add_category_modal.php') ?>
    
    <script>
       
         function hideMessage() {
            document.getElementById('message').style.display = 'none';
            var urlWithoutInsertMsg = window.location.href.split('?')[0];
            history.replaceState({}, document.title, urlWithoutInsertMsg);
        }

        // Execute the hideMessage function after 3 seconds (3000 milliseconds)
        setTimeout(hideMessage, 3000);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>