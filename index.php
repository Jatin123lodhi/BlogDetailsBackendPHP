<?php include('header.php') ?>

     
   
    <div class="  flex justify-center item-center">
    
        <table class="  table-auto border border-gray-300 min-w-[500px] mt-5 p-2">
            <thead>
                <tr>
                <th class="p-2">Tables</th>
                </tr>
            </thead>
            <tbody class="text-center ">
                <tr data-table-name="posts" class=" table-row hover:bg-gray-100 cursor-pointer border border-slate-300">
                <td class="p-2">Posts</td>
                </tr>
                <tr data-table-name="categories" class=" table-row hover:bg-gray-100 cursor-pointer border border-slate-300">
                <td class="p-2" >Categories</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        // Add click event listener to each row
        document.querySelectorAll('.table-row').forEach(row => {
            row.addEventListener('click', () => {
            // Get the post ID from the data attribute
            const tableName = row.getAttribute('data-table-name');
            // Redirect to posts.php with the post ID as a parameter
            window.location.href = `http://localhost/backend_blog_app/${tableName}.php`;
            });
        });
    </script>
</body>
</html>