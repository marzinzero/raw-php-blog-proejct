 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
<?php
 if(isset($_GET['action']) and $_GET['action'] == 'updatecatagory'){
  $id = $_GET['updateid'];

   if(isset($_POST['up_cat'])){

      //$id = $_POST['id'];
      $cat = $_POST['cat'];   


     $sql = "UPDATE cat_table SET cat_name = :cat_name where id=:id";
        $catup = $post->catupdate($sql, $id, $cat);
           if($catup){
            echo "<center><span class='success'>Successfully update catagory.</span></center>";
   }
 }
 ?>
<form action="" method="post">
	
<table class="table table-borderless">

<div class="form-group">
    <?php
  

        $sql = "SELECT * from cat_table where id =:id";
        $showbyid = $post->showbyid($sql, $id);
           if($showbyid){
             foreach ($showbyid as $val) { 
  ?>


<tr>
 <td class="text-right"><label for="Catagroy"><h4>Add Catagroy</h4></label></td>
  <td>
<input class="form-control" type="text" name="cat" value="<?php echo $val['cat_name']; ?>">  
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
    </tr>

  <?php
}} }
  ?>
</div>
<!---tag-->

<div class="form-group">
<tr>

  <td></td>
  <td>
<input type="submit" name="up_cat" value="Update" class="btn btn-outline-dark"> 
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