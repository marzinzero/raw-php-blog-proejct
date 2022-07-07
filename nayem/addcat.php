 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
  <?php
      
      if(isset($_POST['add_cat'])){
          
          $catagory = $_POST['cat'];
           if($catagory == ""){
             echo "<center><span class='error'>Field must not be empty.</span></center>";
           }else{
          $sql = "INSERT into cat_table (cat_name) values(:cat_name)";
          $insertcat = $post->insert_cat($sql, $catagory);

          if($insertcat){
            echo "<center><span class='success'>Successfully add catatory.</span></center>";
           }
          }
      }
  ?>

<form action="" method="post">
	
<table class="table table-borderless">

<div class="form-group">
<tr>
  <td class="text-right"><label for="Catagroy"><h4>Add Catagroy</h4></label></td>
  <td>
<input class="form-control" type="text" id="tag" name="cat" placeholder="Add Catagroy here...">  
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
    </tr>
</div>
<!---tag-->

<div class="form-group">
<tr>

  <td></td>
  <td>
<input type="submit" name="add_cat" value="Add Catagory" class="btn btn-outline-dark"> 
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