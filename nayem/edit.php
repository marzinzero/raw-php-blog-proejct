 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
  <div class="row">
 
 
</div>

<?php
   if(isset($_POST['post_update'])){


     $post_id = $_POST['update_id'];
     //$update_image = $_POST['update_id'];

     $title = $post->ownvalidate($_POST['title']); 
     $lead = $post->ownvalidate($_POST['lead']);
     $body = $_POST['body'];
     $author = $post->ownvalidate($_POST['author']);
     $tag = $post->ownvalidate($_POST['tag']);
     $cat = $_POST['cat'];

      $image = $_FILES['image']['name'];
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_type = $_FILES['image']['type'];

       $image_exploade = explode(".", $image);
       $image_divide = end($image_exploade);
       $extension_lower =strtolower($image_divide);
       $type_check = array("jpg", "jpeg", "png");

        $random_image_name = substr(md5(time()), 0, 11);
        $unique_image_name =$random_image_name.".".$extension_lower;
        $image_path = "images/".$unique_image_name;


      
    if(empty($title) or empty($lead) or empty($body) or empty($author) or empty($tag) or empty($cat)){

    echo "<span class='error mx-auto'>Field should not empty.</span>";
      }else{
//update if image is set
      if(!empty($image)){

    if($image > 1048576){
          echo "<span class='error mx-auto'>Images size must be less 1MB.</span>"; 
      }

      elseif(in_array($extension_lower, $type_check) === false){
         echo "<span class='error mx-auto'>Images extension must jpeg, jpg, png.</span>"; 
      }


      else{
      
      
      $post_update = $post->post_update($title, $cat, $image_path, $lead, $body, $author ,$tag , $post_id);
      if($post_update){
           move_uploaded_file($image_tmp_name, $image_path);
           echo "<span class='success mx-auto'>Post updated successfully.</span>";
      }else{
         echo "<span class='success mx-auto'>Post is not updated successfully.</span>";
      }
      }

}
//update if image is set

//update if image is not set
else{
        $post_update_withoutimg = $post->post_update_withoutimg($title, $cat, $lead, $body, $author ,$tag , $post_id);
      if($post_update_withoutimg){
           //move_uploaded_file($image_tmp_name, $image_path);
           echo "<span class='success mx-auto'>Post updated successfully.</span>";

}

//update if image is not set
   }

}
   }


?>

<form action="" enctype="multipart/form-data" method="post">
  
<table class="table table-borderless">
   
   <?php

   
   if(!isset($_GET['action']) || $_GET['action'] == "update" ||  $_GET['updateid'] == null){

     $updateid = $_GET['updateid'];

      $sql = "SELECT * from techtouch_post where id=:id";
      $showpost = $post->showpostbyid($sql, $updateid);
       if($showpost){
        foreach ($showpost as $value) {


 ?>
  <!---title-->
<div class="form-group">

  <input type="hidden" name="update_id" value="<?php echo $value['id']; ?>">
  <tr>
    <td class="text-right" style="width:20%;"><label for="title"><h4>Title</h4></label></td>
    <td style="width:80%;">
<input class="form-control" type="text" name="title" value="<?php echo $value['title']; ?>">  
    </td>
  </tr>
</div>
<!---title-->



<!---catagory-->
  <div class="form-group">
  <tr>
    <td class="text-right"><label for="cat"><h4>Catagory</h4></label></td>
    <td>
         <select class="form-control" name="cat" value="<?php if($showpost == $showcat){
          echo "selected=selected";
         } ?>">

          <?php
                   
                   $sql = "SELECT * from cat_table";
                   $showcat = $post->showcat($sql);
            if($showcat){ foreach ($showcat as $cat) { ?>

          <option
                 
                 <?php
                   if($value['cat_id'] == $cat['id']){
                    ?>
                      selected="selected"
                    <?php
                   }
                 ?>

          value="<?php  echo $cat['id']; ?>">
              <?php  echo $cat['cat_name']; ?>
                
            
          </option>

          <?php   }
            } ?>
          
         </select>
    </td>
  </tr>
</div>
<!---catagory-->


<!---imgage-->
<div class="form-group">
       <tr>
    <td class="text-right"><label for="image"><h4>Image</h4></label></td>
    <td>
<input class="form-control-file" type="file" id="image" name="image" >
<img src="<?php echo $value['images']; ?>" class="my-2" height="60px" width="100px" alt="post image"> 
    </td>
    <td>
      
    </td>
       </tr>
</div>
     <!---imgage-->

     <!---lead-->
<div class="form-group mt-0">
    <tr>
  <td class="text-right"><label for="lead"><h4>Lead</h4></label></td>
    <td>
  <textarea name="lead" class="form-control" rows="2" id="lead">
    <?php echo $value['lead']; ?>
  </textarea>
    </td>
  </tr>
    </div>
      <!---lead-->

      <!---Article-->

  <div class="form-group">
    <tr>
  <td class="text-right"><label for="body"><h4>Article</h4></label></td>
    <td>
  <textarea name="body" class="form-control" rows="5" id="body">
    <?php echo $value['body']; ?>
  </textarea>
    </td>
  </tr>
    </div>
  <!---Article-->

  <!---Author-->
<div class="form-group">
<tr>
  <td class="text-right"><label for="author"><h4>Author</h4></label></td>
  <td>
<input class="form-control" type="text" id="author" name="author" value="<?php echo $value['author']; ?>">  
  </td>
    </tr>
</div>
<!---Author-->

<!---tag-->

<div class="form-group">
<tr>
  <td class="text-right"><label for="tag"><h4>Tag & Keywords</h4></label></td>
  <td>
<input class="form-control" type="text" id="tag" name="tag" value="<?php echo $value['tags']; ?>">  
  </td>
    </tr>
</div>
<!---tag-->

<div class="form-group">
<tr>
  <td></td>
  <td>
<input type="submit" name="post_update"  value="Update" class="btn btn-outline-dark"> 
  </td>
    </tr>
</div>

    </table>
  <?php 
                
        }
       }

     }
   ?>

</form>
        
</div>
    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>