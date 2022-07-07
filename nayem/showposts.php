 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">


	<?php

if(isset($_GET['action']) and $_GET['action'] == "postdelete"){
  
  $id = (int) $_GET['id'];
  $sql = "SELECT * from techtouch_post where id=:id order by id desc limit 10";
         $delimg = $post->unlinkimage($sql, $id);

    if($delimg){
	 	 foreach ($delimg as $img) {
                  $dbimg = $img['images'];
                  unlink($dbimg);
	 	 } 	 
	 	

	 }

	 	$sql = "DELETE from techtouch_post where id=:id";
	    $deletepost = $post->delpost($sql, $id);
	 //if($deletepost){
          //echo "<script>alert('Successfully delete post.');</script>";
 	      //echo "<script>window.location.href='showposts.php';</script>";
	 	 
	 	 //}
}//else{
	   //echo "<script>alert('Somethings is wrong.');</script>";
	 //echo "<script>window.location.href='showposts.php';</script>";
//}

//echo delete and images unlink code;
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">



     <table class="table table-borderd text-center display" id="example">
    <thead>
     <tr class="thead-dark">
        <th width="8%">Id</th>
        <th width="10%">Catagory</th>
        <th width="15%">Title</th>
        <th width="21%">Article</th>
        <th width="10%">Image</th>
        <th width="10%">Author</th>
        <th width="10%">Tags</th>
        <th width="16%">Action</th>
     </tr>
</thead>


 <?php




  $limit = 7;
  $page = isset($_GET['postpage']) ? $_GET['postpage'] : 1;
  $start = ($page - 1) * $limit;

  $sql = "SELECT id from techtouch_post";
  $rowcount = $post->totalrow($sql);
  $totalpages = ceil($rowcount / $limit);


?>



     <?php
        $sql  = "SELECT cat_table.cat_name, techtouch_post.* FROM cat_table
                inner join techtouch_post on cat_table.id = techtouch_post.cat_id order by techtouch_post.id desc limit $start, $limit";
        $show_post = $post->show_all_post($sql);
         
         if($show_post){
               $counter=0;
            foreach ($show_post as $value) {
                $counter++;
                
       
      ?>
      <tfoot>
        <tr>
            <td><?php echo $value['id'];  ?></td>
            <td><?php echo $value['cat_name'];  ?></td>
            <td><?php echo $value['title'];  ?></td>
            <td><?php echo $post->textshort($value['lead'], 46);  ?></td>
            <td><img src="<?php echo $value['images'];  ?>" width="80px" height="50px" alt="post imgage"></td>
            <td><?php echo $value['author'];  ?></td>
            <td><?php echo $value['tags'];  ?></td>
            <td>
            <a href="edit.php?action=update&updateid=<?php echo $value['id']; ?>" class="btn btn-success btn-sm">Edit</a> || 
            <a href="?action=postdelete&id=<?php echo $value['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete post?');">Delete</a>
            </td>
        </tr>
     </tfoot>
   <?php  
       }
         }
      ?>
     </table>
   
	 
</form>


<!--pagination-->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">

      <?php  for($i=1; $i<=$totalpages; $i++){ ?>

    <li class="page-item"><a class="page-link" href="showposts.php?postpage=<?php  echo $i; ?>"><?php  echo $i; ?></a></li>
     <?php  }   ?>
        
      
    
  </ul>
</nav>
  <!--pagination end-->      
</div>


    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>