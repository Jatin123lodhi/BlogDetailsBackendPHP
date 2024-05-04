<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add post
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 ">
                    <form action="insert_post_data.php" method="post" class="px-[2%]">
                        
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
                                            ?>
                                            <option value=<?php echo $row['id']; ?>><?php echo $row['name']; ?></option>
                                            <?php 
                                        }
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="flex flex-col ">
                            <label class="text-lg">Title</label>
                            <input required type="text" name="title" class="border border-gray-400 p-2 " />
                        </div>
                        <div class="flex flex-col ">
                            <label class="text-lg">Description</label>
                            <textarea required rows="8" name="content" type="text" class="border border-gray-400 p-2"></textarea>
                        </div>
                        <input type="submit" class="cursor-pointer bg-green-400 p-2 px-4 rounded-lg text-white mt-4" name="add_post" value="Add" />
                         
                    
                    </form>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>