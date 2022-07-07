<?php

include_once "db.php";


class modal
{
	
  public function allselect($sql){   
   $stmt=db::connect()->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll();

    if($result){
    	return $result;
    }else{
    	return false;
    }
  }

  public function countcat($sql, $cat_id){
   $stmt=db::connect()->prepare($sql);
   $stmt->bindvalue(":id", $cat_id);
   $stmt->execute();
   $result = $stmt->rowCount();

    if($result){
    	return $result;
    }else{
    	return false;
    }
  }

   public function matchwithid($sql, $id){
   $stmt=db::connect()->prepare($sql);
   $stmt->bindvalue(":id", $id);
   $stmt->execute();
   $result = $stmt->fetchAll();

    if($result){
    	return $result;
    }else{
    	return false;
    }
  }


  public function mygettime($date){
    $mygetdate = date("F j Y g:i A", strtotime($date));
    return $mygetdate;
  }


  public function relatedpost($sql){
   $stmt=db::connect()->prepare($sql);
   //$stmt->bindvalue(":id", $id);
   $stmt->execute();
   $result = $stmt->fetchAll();

    if($result){
    	return $result;
    }else{
    	return false;
    }
  }


  public function mysearch($sql){
     $stmt=db::connect()->prepare($sql);
     $stmt->execute();
     $result = $stmt->fetchAll();
     if($result){
      return $result;
     }else{
      return false;
     }
  }

  /*validate function*/
  public function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 /*author called*/
  public static function author($sql, $author){
     $stmt=db::connect()->prepare($sql);
     $stmt->bindparam(":writter", $author);
     $stmt->execute();
     $result = $stmt->fetchAll();
     if($result){
     return $result;
     }else{
      return false;
     }
  } 
  
 /*author end*/

 //total row count

    public function totalrowscount($sql){
      $stmt=db::connect()->prepare($sql);
      $stmt->execute();
      return $count = $stmt->rowCount();
    }

 // send user data

   public function userdata($sql, $name, $email, $age, $msg){
   $status = "1";
   $stmt=db::connect()->prepare($sql);
   $stmt->bindvalue(":name", $name);
   $stmt->bindvalue(":email", $email);
   $stmt->bindvalue(":age", $age);
   $stmt->bindvalue(":msg", $msg);
   $stmt->bindvalue(":status", $status);

   $result = $stmt->execute();
    if($result){
      return $result;
    }else{
      return false;
    }
    }


}


?>