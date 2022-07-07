 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
<?php

 if(isset($_POST['adduser'])){

      $status = $_POST['status'];
      $name = $_POST['name'];
      $data = $_POST['data'];

      if($status == "" or $name == "" or $data ==""){
        echo "<center><span class='error'>Filed must not be empty.</span></center>";
      }else{
        $sql = "INSERT into author(status, name, data) values (:status, :name, :data)";
        $catup = $post->authorinsert($sql, $status, $name, $data);
           if($catup){
            echo "<center><span class='success'>Successfully create new user.</span></center>";
   }
      }


 }
 ?>
<form action="" method="post">
  
<table class="table table-borderless">

<div class="form-group">

<tr>
  <td class="text-right">
    <label for="status"><h4>User Status</h4></label>
  </td>

  <td>
    
    <select name="status" class="form-control">
      <option>Select status</option>
      <option value="Admin">Admin</option>
      <option value="Moderator">Moderator</option>
      <option value="Editor">Editor</option>      
    </select>
  </td>

</tr>


<tr>
   <td class="text-right">
      <label for="name"><h4>User Name</h4></label>
   </td>

    <td>
      <input class="form-control" type="text" name="name" placeholder="User name here..." > 
    </td>
</tr>

<tr>
  <td class="text-right">
    <label for="data"><h4>User Data</h4></label>
  </td>

  <td>
   <textarea name="data" cols="100" rows="5">
      
    </textarea>
  </td>
</tr>

<tr>
  <td></td>

  <td>
  <input type="submit" name="adduser" value="Create Author" class="btn btn-outline-dark"> 
 </td>
</tr>


</div>


</table>

</form>
        
</div>
    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>