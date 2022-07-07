<?php

include "db.php";
/**
 * 
 */
class postfun
{
  
  public function show_all_post($sql)
  {
        
     $stmt= db::con()->prepare($sql);
     $stmt->execute();
     $result = $stmt->fetchAll();
     
     if($result){
      return $result;
     }else{
      return false;
     }
  }

  //show catagory id


  public function show_all_cat()
  {
     $sql = "SELECT * from cat_table";     
     $stmt= db::con()->prepare($sql);
     $stmt->execute();
     $result = $stmt->fetchAll();
     
     if($result){
      return $result;
     }else{
      return false;
     }
  }

  //texts short
    
    public function textshort($value, $data){
       $text = substr($value,0, $data);
       $texts = substr($value, 0, strrpos($text, " "));
       return $texts;
    }

    //own validate

    public function ownvalidate($data){
      
      $owndata = stripslashes($data);
      $owndata = htmlspecialchars($owndata);
      $owndata = trim($owndata);
      return $owndata;
    }

    //insert post

    public function post_insert($title, $cat, $unique_image_name, $lead, $body, $author ,$tag){

       $sql = "INSERT into techtouch_post(cat_id, title, author, images, body, lead, tags) values(:cat_id, :title, :author, :images, :body, :lead, :tags)";
     
     $stmt= db::con()->prepare($sql);
     $stmt->bindvalue(":cat_id", $cat);
     $stmt->bindvalue(":title", $title);
     $stmt->bindvalue(":author", $author);
     $stmt->bindvalue(":images", $unique_image_name);
     $stmt->bindvalue(":body", $body);
     $stmt->bindvalue(":lead", $lead);
     $stmt->bindvalue(":tags", $tag);
     $result = $stmt->execute();     
     
     if($result){
      return $result;
     }else{
      return false;
     }
    }

    //post delete

     public function delpost($sql, $id){
      $stmt= db::con()->prepare($sql);
      $stmt->bindparam(":id", $id);      
      $del = $stmt->execute();
      
      if($del){
        return $del;      
      }else{
        return false;
      }
     }

     public function unlinkimage($sql, $id){
      $stmt= db::con()->prepare($sql);
      $stmt->bindparam(":id", $id);      
      $stmt->execute();
      $img = $stmt->fetchAll();
      if($img){
        return $img;      
      }else{
        return false;
      }
     }

     //post edit function are herer

     public function showpostbyid($sql, $id){
      $stmt = db::con()->prepare($sql);
      $stmt->bindparam(":id", $id);
      $stmt->execute();
      $result = $stmt->fetchAll();

     if($result){
        return $result;      
      }else{
        return false;
      }

     }


     public function showcat($sql){
      $stmt = db::con()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
     }
     //update post

    public function post_update($title, $cat, $image_path, $lead, $body, $author ,$tag , $post_id){
      $sql = "UPDATE techtouch_post set cat_id=:cat, title=:title, author=:author, images=:images, body=:body, lead=:lead, tags=:tags where id=:id";
      $stmt = db::con()->prepare($sql);
       $stmt->bindparam(":cat", $cat);
      $stmt->bindparam(":title", $title);
      $stmt->bindparam(":author", $author);
      $stmt->bindparam(":images", $image_path);
      $stmt->bindparam(":body", $body);
      $stmt->bindparam(":lead", $lead);
      $stmt->bindparam(":tags", $tag);
       $stmt->bindparam(":id", $post_id);
       $result = $stmt->execute();

     if($result){
        return $result;      
      }else{
        return false;
      }
    }

    public function post_update_withoutimg($title, $cat, $lead, $body, $author ,$tag , $post_id){
       $sql = "UPDATE techtouch_post set cat_id=:cat, title=:title, author=:author, body=:body, lead=:lead, tags=:tags where id=:id";
      $stmt = db::con()->prepare($sql);
      $stmt->bindparam(":cat", $cat);
      $stmt->bindparam(":title", $title);
      $stmt->bindparam(":author", $author);
      //$stmt->bindparam(":images", $image_path);
      $stmt->bindparam(":body", $body);
      $stmt->bindparam(":lead", $lead);
      $stmt->bindparam(":tags", $tag);
      $stmt->bindparam(":id", $post_id);
      $result = $stmt->execute();

     if($result){
        return $result;      
      }else{
        return false;
      }
    }

    //add catagory
    public function insert_cat($sql, $catagory){
      $stmt = db::con()->prepare($sql);
      $stmt->bindparam(":cat_name", $catagory);
      $result = $stmt->execute();     
      return $result;
    }

    public function catupdate($sql, $id, $cat){
      $stmt = db::con()->prepare($sql);
      $stmt->bindparam(":cat_name", $cat);
      $stmt->bindparam(":id", $id);
      $result = $stmt->execute();     
      return $result;
    }



   //show all method
 public function showall($sql){
      $stmt = db::con()->prepare($sql);
      $stmt->execute(); 
      $result = $stmt->fetchAll();
      return $result;
     }


        //show all method by id
 public function showallbyid($sql, $id){
      $stmt = db::con()->prepare($sql);
      $stmt->bindparam(":id", $id);
      $stmt->execute(); 
      $result = $stmt->fetchAll();
      return $result;
     }


        //delte by id method
 public function delbyid($sql, $id){
      $stmt = db::con()->prepare($sql);      
      $stmt->bindparam(":id", $id);
      $result = $stmt->execute();
      if($result){
        return $result;
      }else{
        return false;
      }
      
     }

          //shwo by id method
 public function showbyid($sql, $id){
      $stmt = db::con()->prepare($sql);      
      $stmt->bindparam(":id", $id);
      $stmt->execute();
      $result = $stmt->fetchAll();
      if($result){
        return $result;
      }else{
        return false;
      }
      
     }

     //user proflie


    public function showallbyname($sql, $name){
        $stmt = db::con()->prepare($sql);      
        $stmt->bindparam(":name", $name);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
      }

    public function authorupdate($sql, $editid, $status, $name, $data){
      $stmt = db::con()->prepare($sql);
      $stmt->bindparam(":status", $status);
      $stmt->bindparam(":name", $name);
      $stmt->bindparam(":data", $data);
      $stmt->bindparam(":id", $editid);
      $result = $stmt->execute();
     if($result){
        return $result;      
      }else{
        return false;
      }
    }

    //user create new

    public function authorinsert($sql, $status, $name, $data){
     $stmt= db::con()->prepare($sql);
     $stmt->bindvalue(":status", $status);
     $stmt->bindvalue(":name", $name);
     $stmt->bindvalue(":data", $data);
     $result = $stmt->execute();     
     
     if($result){
      return $result;
     }else{
      return false;
     }

    }

    //check old password

    public function checkpasswod($sql, $id){
     $stmt= db::con()->prepare($sql);
     $stmt-> bindvalue(":id", $id);     
     $stmt-> execute();     
     $result= $stmt->fetchAll();
     
     if($stmt->rowCount() > 0){
      return $result;
     }else{
      return false;
     }
    }

    //update password for user

    public function updatepassword($sql, $id, $newpasstwo){
      $stmt= db::con()->prepare($sql);
      $stmt-> bindvalue(":id", $id);
      $stmt-> bindvalue(":password", $newpasstwo);     
      return $result = $stmt-> execute();  

    }

    //create new user 

    public function loginsert($sql, $email, $status, $name, $pass){
      $stmt=db::con()->prepare($sql);
      $stmt->bindvalue(":user_name", $email);
      $stmt->bindvalue(":password", $pass);
      $stmt->bindvalue(":role", $status);
      $stmt->bindvalue(":name", $name);            
      return $result = $stmt->execute(); 
    }

    //row count

    public function totalrow($sql){
      $stmt=db::con()->prepare($sql);
      $stmt->execute();
      return $count = $stmt->rowCount();
    }


    //show with status

    public function showwithstatus($sql){
      $status=0;
      $stmt=db::con()->prepare($sql);
      $stmt->bindparam(':status', $status);
      $stmt->execute();
      $show = $stmt->fetchAll();

    if($show){
      return $show;
     }else{
      return false;
     }
    }

    //update status by msg table

    public function statusupdatebymsg($sql){
      $stmt=db::con()->prepare($sql);
      //$stmt->bindparam(':status', $status);
      //$stmt->bindparam(':id', $id);
      $update = $stmt->execute();

      if($update){
      return $update;
     }else{
      return false;
     }
    }

    //

    public function countstatusone($sql, $one){
      $stmt = db::con()->prepare($sql);
      $stmt->bindparam(':one', $one);
      $stmt->execute();
      $countstatus = $stmt->rowCount();

      if($countstatus){
      return $countstatus;
     }else{ 
      return false;
     }
    }
 

    

  //end class
}
//$status = '1';
//$ssql = "SELECT status from msg where status = :status ";
//$p = new postfun();
//$count =  $p->countstatusbymsg($ssql, $status);

//if($count == 0){
 // echo "You have no new message";
//}else{
 // echo "you have $count message";
//}



?>