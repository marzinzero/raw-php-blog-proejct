 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
  <?php
   if(isset($_GET['action']) and $_GET['action'] == 'deletecatagory'){
        $id = $_GET['deleteid'];
        $sql = "DELETE from cat_table where id =:id";
        $del = $post->delbyid($sql, $id);
 

    }
  ?>
 
<form action="" method="post">
	
<table class="table table-borderless table-striped">


<thead class="thead-light">
  <tr>  
    <th>Catagory List</th>
    <th>Catagory Name</th>
    <th>Action</th>
  </th>
</tr>
</thead>

<tbody>
<?php

$sql = "SELECT * from cat_table";
$showcat = $post->showall($sql);
          if($showcat){
             foreach ($showcat as $value) {
       
  ?>
<tr>
  <td><?php echo $value['id']; ?></td>
  <td><?php echo $value['cat_name']; ?></td>
<td>
 <a href="editcat.php?action=updatecatagory&updateid=<?php echo $value['id']; ?>" class="btn btn-success btn-sm">Edit</a> || 
  <a href="?action=deletecatagory&deleteid=<?php echo $value['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete post?');">Delete</a>
 </td>
</tr>

<?php
      }
  }

?>
</tbody>

</table>

</form>
        
</div>
    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>