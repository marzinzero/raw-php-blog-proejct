 <?php include "lib/header.php"; 
   //$post = new postfun();

 ?>
<!----navbar--->

<!----post--->

  <div class="container">
  	<div class="row py-5">
  		<div class="col-lg-8 pb-4">

        <?php

           
           $sql = "SELECT id from techtouch_post";
          $rowcounts = $modal->totalrowscount($sql);
           $limit = 4;

           $page = isset($_GET['page']) ? $_GET['page']: 1;

           $page_start = ($page - 1) * $limit;

           $totalpages = ceil($rowcounts / $limit);

           $Previous = $page - 1;

           $next = $page + 1;

         ?>

        <?php
          $sql = "SELECT * from techtouch_post order by id DESC limit $page_start, $limit";
          $result = $modal->allselect($sql);

           if($result){
             foreach ($result as $value) {
               
          
        ?>

  			<div class="post" style="overflow: hidden;">

  				<a href="readpost.php?id=<?php echo $value['id']; ?>"><img src="nayem/<?php echo $value['images']; ?>" class="img-fluid img-thumbnail"></a>

  				<a href="readpost.php?id=<?php echo $value['id']; ?>" style="text-decoration: none;color:rgba(0, 0, 0, 0.7);"><h2><?php echo $value['title']; ?></h2></a>


  				<p><?php echo $modal->mygettime($value['date']); ?>
          <span>
            <a href="author.php?writter=<?php echo $value['author']; ?>"><?php echo $value['author']; ?></a>
          </span>
           </p>

  				<p><?php echo $value['lead']; ?></p>
  		  	<a href="readpost.php?id=<?php echo $value['id']; ?>" class="btn btn-outline-dark">Read More</a>
               <hr>
  			</div>
      <?php  } } ?>


      <!--pagination-->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    
    <?php 
      
      for($i=1; $i <= $totalpages; $i++){
       
      
     ?>
  
    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>


  <?php } ?>

        
  </ul>
</nav>
      <!--pagination end-->



  		</div>

  		<!----sidebar--->


  			<!--searach box end-->
             
             <!--Catagory box-->
                <?php include"lib/sidebar.php";   ?>
             <!----sidebar end div--->
             


           </div>

           <!----row end--->

  		</div>
          <!----container end--->
  	

<!----footer--->
 <?php include"lib/footer.php";   ?>
 <!----footer end--->