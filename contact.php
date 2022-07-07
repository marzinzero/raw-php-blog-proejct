 <?php include"lib/header.php";   ?>
<!----navbar--->

<!----post--->

  <div class="container">
    <div class="row py-5">
      <div class="col-lg-8 pb-4">
         <div class="contact">
            
             <div class="contact-box">
                <h2 class="card-title p-2 bg-dark text-white">Contact us</h2>

               <?php
$errmsg = $erremail = "";
                                   
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $modal->validate($_POST['name']);
    $email = $modal->validate($_POST['email']);
    $age = $modal->validate($_POST['age']);
    $msg = $modal->validate($_POST['msg']);

    if($name == "" || $email == "" || $age == "" || $msg == ""){
      $errmsg = "Field must be required";
      }
      elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
       $erremail = "Invalid email format";
     }else{
                        
                        //insert data for database table
        $sql = "INSERT into msg(name, email, age, msg, status)values(:name, :email, :age, :msg, :status)";

          $sendmsg = $modal->userdata($sql, $name, $email, $age, $msg);

          if($sendmsg){

           echo "<script>alert('Successfully send data');</script>";                       
             //echo "<span class='success'>Successfully send data</span>";
          }else{
             echo "<span class='error'>Somethings went to wrong</span>";
          }
          }
                   }


                ?>


              <form action="" method="post" >

                  <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Name..."><span class="error"><?php echo $errmsg; ?></span>                    
                  </div>

                  <div class="form-group">
                    <label>Email address:</label>
                     <input type="email" class="form-control" name="email" placeholder="name@example.com..."><span class="error"><?php 
                     echo $errmsg;
                     echo $erremail;

                      ?></span>  
                 </div>

                  <div class="form-group">
                    <label>Age:</label>
                    <input type="number" class="form-control" name="age" placeholder="Age..."><span class="error"><?php echo $errmsg; ?></span>  
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Your Text:</label>
                    <textarea class="form-control" name="msg" rows="3" placeholder="Your text..."></textarea><span class="error"><?php echo $errmsg; ?></span>  
                  </div>

                   <input type="submit" value="Send" class="btn btn-lg btn-outline-dark" name="data">
                </form>

             </div>
         </div>

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


 <table class="table table-borderless" style="height:250px; width:100%;">
                <tr>
                  

                   </table>

                    </tr>

