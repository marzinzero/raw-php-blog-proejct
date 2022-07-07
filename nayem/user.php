 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">

  <table>
   <tbody>   
     <tr>
       <td>
         <a href="addauthor.php" class="btn btn-info my-3">Add Author</a>
       </td>
     </tr>
   </tbody>
  </table>
    <?php
   if(isset($_GET['action']) and $_GET['action'] == 'deleteuser'){
        $id = $_GET['id'];
        $sql = "DELETE from author where id =:id";
        $del = $post->delbyid($sql, $id);

    } ?>
  
 <table class="table table-borderless table-striped text-center">
   
   <thead class="thead-dark">
     <tr>
       <th>User Name</th> 
       <th>Profile Status</th>
       <th>About Author</th>
       <?php
       $id = session::get("id");
       $name = session::get("name");
           
           if($name == "Nayem Islam"){
       ?>
       <th>Action</th>

     <?php } ?>
      </tr>
   </thead>

   <tbody>
    <?php

    
   
      if($name == "Nayem Islam"){
                 $sql = "SELECT * from author";
                 $adminpower = $post->showall($sql);

                  if($adminpower){
                    foreach($adminpower as $adminpowerval){
             
             ?>
                  <tr>
                   <td><?php echo $adminpowerval['name'];  ?></td>
                   <td><?php echo $adminpowerval['status'];  ?></td>
                   <td><?php echo $adminpowerval['data'];  ?></td>

                   <td>
                     <a href="edituser.php?action=edituser&id=<?php  echo $adminpowerval['id'];?>" class="btn btn-success btn-sm">Edit</a> ||

                     <a href="?action=deleteuser&id=<?php  echo $adminpowerval['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?');">Delete</a>

                   </td>

                  </tr> <?php } } } else{  ?>

             <?php


         $sql = "SELECT * from author where name=:name";
        $admin = $post->showallbyname($sql, $name);

         if($admin){
          foreach($admin as $adminval){

           
 
    ?>
    <tr>
       <td><?php echo $adminval['name'];  ?></td>
       <td><?php echo $adminval['status'];  ?></td>
       <td><?php echo $adminval['data'];  ?></td>
    </tr>
    <?php
   }
    }
     }
      //all data for only admin
    ?>
  
   </tbody>



 </table>

</div>

    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>