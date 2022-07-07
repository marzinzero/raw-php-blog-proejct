 <?php
   include "lib/header.php";
     
 ?>
<!---sidebar-->
 <?php include "lib/sidebar.php";  ?>
<!---sidebar-->
    <div class="col-md-9">
         <?php

   $msg = session::get('logmsg');
    if($msg)
    {
    echo $msg;
      $msg = session::set('logmsg', null);
     } 
 ?>
   </div>
    </div>
   </div>
 </section>

 <?php
   include "lib/footer.php";
 ?>