 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
<?php

 $id = session::get("id");
 

 if(isset($_POST['changepass'])){

      $oldpass = $_POST['oldpass'];
      $newpassone = $_POST['newpassone'];
      $newpasstwo = $_POST['newpasstwo'];

      if($oldpass == "" or $newpassone == "" or $newpasstwo ==""){
        echo "<center><span class='error'>Filed must not be empty.</span></center>";

      }   
      else{
         $sql = "SELECT password from log_panle where id=:id";
         $checkpasswordold = $post->checkpasswod($sql, $id);
         if($checkpasswordold){
           foreach ($checkpasswordold as $key) {
               
               $oldpwd = $key['password'];
               if($oldpwd != $oldpass){
                 echo "<center><span class='error'>Your oldpassword dose not mathch.<center><span>";
               }else{

                 if($newpassone != $newpasstwo){
                  echo "<center><span class='error'>Your newpassword dose not mathch.<center><span>";
                 }else{
          $sql = "UPDATE log_panle SET password=:password where id=:id";
          $updatepassword = $post->updatepassword($sql, $id, $newpasstwo);

           if($updatepassword){
            echo "<center><span class='success'>Your password successfully changed.<center><span>";
           }
          }
               }

               //end first else
         }

         //end foreach 
      }
         //conditon end 


 }
}
 ?>

<form action="" method="post">
  
<table class="table table-borderless">

<div class="form-group">

<tr>
  <td class="text-right">
    <label for="status"><h4>Old password</h4></label>
  </td>
 
  <td>
   <input class="form-control" type="password" name="oldpass" placeholder="Old password here..." > 
  </td>

  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
</div>

<div class="form-group">
<tr>
  <td class="text-right">
    <label for="status"><h4>New password</h4></label>
  </td>
 
  <td>
   <input class="form-control" type="password" name="newpassone" placeholder="New password here..." > 
  </td>
</tr>
</div>

<div class="form-group">
<tr>
  <td class="text-right">
    <label for="status"><h4>Confirm new password</h4></label>
  </td>
 
  <td>
   <input class="form-control" type="password" name="newpasstwo" placeholder="Again new password here..." > 
  </td>
</tr>
</div>

<tr>
  <td></td>

  <td>
  <input type="submit" name="changepass" value="Change Password" class="btn btn-outline-dark"> 
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