 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
<?php
 if(isset($_GET['action']) and $_GET['action'] == 'edituser'){
  $id = $_GET['id'];

   if(isset($_POST['update'])){

      //$id = $_POST['id'];
      
      $editid = $_POST['editid'];
      $status = $_POST['status'];
      $name = $_POST['name'];
      $data = $_POST['data'];   



     $sql = "UPDATE author SET status = :status, name=:name, data=:data where id=:id";
        $catup = $post->authorupdate($sql, $editid, $status, $name, $data);
           if($catup){
            echo "<center><span class='success'>Successfully update catagory.</span></center>";
   }
 }
 ?>
<form action="" method="post">
	
<table class="table table-borderless">

<div class="form-group">
    <?php  

        $sql = "SELECT * from author where id=:id";
        $showbyid = $post->showbyid($sql, $id);
           if($showbyid){
             foreach ($showbyid as $val) { 
  ?>

<tr>

  <input type="hidden" name="editid" value="<?php echo $val['id']; ?>">

  <td class="text-right">
    <label for="status"><h4>User Status</h4></label>
  </td>

  <td>
    
    <input class="form-control" type="text" name="status" value="<?php echo $val['status']; ?>" > 
  </td>

</tr>


<tr>
   <td class="text-right">
      <label for="name"><h4>User Name</h4></label>
   </td>

    <td>
      <input class="form-control" type="text" name="name" value="<?php echo $val['name']; ?>" > 
    </td>
</tr>

<tr>
  <td class="text-right">
    <label for="data"><h4>User Data</h4></label>
  </td>

  <td>
   <textarea name="data" cols="100" rows="5">
      <?php echo $val['data']; ?>
    </textarea>
  </td>
</tr>

<tr>
  <td></td>

  <td>
  <input type="submit" name="update" value="Update" class="btn btn-outline-dark"> 
 </td>
</tr>

  <?php
}} }
  ?>
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