 <?php
   include "lib/header.php";
   $post = new postfun();
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
<div class="col-md-9 py-3">
<!---Message for show box area-->
<h2 class="card-title p-1 bg-dark text-white mb-0 text-center">UnSeen message</h2>
 <table class="table table-striped text-center">
   
   <thead class="thead-dark">
     <tr>
       <th>Name</th>
       <th>Email</th>
       <th>Message</th>
       <th>Action</th>
     </tr>
   </thead>

   <tbody>
    <tr class="bg-light">
   
  <?php

  if(isset($_GET['action']) and $_GET['action'] == "seen"){
     $id = $_GET['seenid'];
     $status = 0;
     $sql = "UPDATE msg set status='0' where id=$id";
     $msgupdate = $post->statusupdatebymsg($sql);
          if($msgupdate){
            echo "<script>alert('Successfully message seen')</script>";
             }
  }
    ?>
    <?php

            $one ='1';
          $sql = "SELECT status from msg where status = :one ";
          $countstatus = $post->countstatusone($sql, $one);

           if($countstatus == 0){
             echo "<td colspan='4'><strong>Good job! You have no new message</strong></td>";
           }
    ?>
    
</tr>

    <?php


   $sql = "SELECT * from msg where status='1' order by id desc";
   $showmsg = $post->showall($sql);
          if($showmsg){
             foreach ($showmsg as $value) {
    ?>
     <tr>
       <td><?php echo $value['name']; ?></td>
       <td><?php echo $value['email']; ?></td>
       <td><?php echo $value['msg']; ?></td>
       <td>
         <a class="btn btn-outline-info" href="?action=seen&seenid=<?php echo $value['id']; ?>">Seen</a>
       </td>
     </tr>

   <?php } } ?>
   </tbody>

</table>

  <?php

  if(isset($_GET['action']) and $_GET['action'] == "delete"){
    $id = $_GET['deleteid'];
    $sql = "DELETE from msg where id=:id";
    $post->delbyid($sql, $id);
  }
    ?>

<h2 class="card-title p-1 bg-dark text-white mt-5 mb-0 text-center">Seen message</h2>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
       <th>Name</th>
       <th>Email</th>
       <th>Message</th>
       <th>Action</th>
    </tr> 
  </thead>

  <tbody>
    <?php
    //
    $limit = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $sql = "SELECT id from msg";
    $msgcount = $post->totalrow($sql);
    $totalmsg = ceil($msgcount/$limit);  
    $stat_page = ($page - 1) * $limit;
    //
    
       $sql = "SELECT * from msg where status = :status limit $stat_page, $limit";
   $showmsgwithstatus = $post->showwithstatus($sql);
          if($showmsgwithstatus){
             foreach ($showmsgwithstatus as $val) {
    ?>
    <tr>
       <td><?php echo $val['name']; ?></td>
       <td><?php echo $val['email']; ?></td>
       <td><?php echo $val['msg']; ?></td>
       <td>
        <a class="btn btn-outline-danger" href="?action=delete&deleteid=<?php echo $val['id']; ?>" onclick="return confirm('Are you sure to delete seen message?');">Delete</a>
       </td>
    </tr>
    <?php } } ?>
  </tbody>
</table>

<!---pagination start-->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <?php      
      for($i=1; $i <= $totalmsg; $i++){
     ?>
    <li class="page-item"><a class="page-link" href="msg.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php } ?>
  </ul>
</nav>
<!---pagination end-->
<!---Message for show box area end-->

<!---Message for seen box area end-->


<!---Message for seen box area end-->
        
</div>
    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>