<?php include('header.php') ?>
<h1 class="text-xl  text-center text-gray-600 font-semibold my-4">Categories</h1>
 
        
<div class="  flex justify-center item-center">  
<table class=" border border-gray-400 min-w-[500px] mt-5 p-2">
    <thead>
        <tr>
            <th class="border border-gray-400 p-3">Id</th>
            <th class="border border-gray-400 p-3">Category</th>
        </tr>
        
    </thead>
    <tbody class="text-center ">
    <?php  
            $query = "SELECT * FROM categories";
            
            $result = mysqli_query($connection,$query);
            if(!$result){
                die("query failed".mysqli_error());
            }else{
                while($row= mysqli_fetch_assoc($result)){
                    ?>
                    <tr data-post-id=<?php echo $row['id'] ?>  class="table-row border border-slate-600">
                        <td class="border border-gray-400 p-3"><?php echo $row['id'] ?></td>
                        <td class="border border-gray-400 p-3"><?php echo $row['name'] ?></td>
                    </tr>
                    <?php 
                    
                }
            }
        
        ?>
    </tbody>
</table>
</div> 