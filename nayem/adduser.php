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

      $email = $post->ownvalidate($_POST['email']);
      $status = $_POST['status'];
      $name = $post->ownvalidate($_POST['name']);
      $pass = md5($_POST['pass']);


      if($email == "" or $status == "" or $name =="" or $pass ==""){
        echo "<center><span class='error'>Filed must not be empty.</span></center>";
      }else{
        $sql = "INSERT into log_panle(user_name, password, role, name) values (:user_name, :password, :role, :name)";
        $catup = $post->loginsert($sql, $email, $status, $name, $pass);
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
      <label for="email"><h4>Email</h4></label>
   </td>

    <td>
      <input class="form-control" type="text" name="email" placeholder="Email..." > 
    </td>
</tr>
</div>

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
</div>


<div class="form-group">
<tr>
  <td class="text-right">
    <label for="pass"><h4>Password</h4></label>
  </td>

  <td>
    <input class="form-control" type="Password" name="pass" placeholder="Password..." >
  </td>
</tr>
</div>


<div class="form-group">
<tr>
  <td class="text-right">
    <label for="name"><h4>Name</h4></label>
  </td>

  <td>
    <input class="form-control" type="text" name="name" placeholder="User name..." >
  </td>
</tr>
</div>

  <div class="form-group">
<tr>
  <td></td>

  <td>
  <input type="submit" name="adduser" value="Add User" class="btn btn-outline-dark"> 
 </td>
</tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
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