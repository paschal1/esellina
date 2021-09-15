<?php

session_start();
if(isset($_SESSION['id'])){
    include('../config/dbconn.php');
    
    if(isset($_POST['send_message']))
    {
      $to_user_id=intval($_POST['to_user_id']);
      $from_user_id=intval($_SESSION['id']);
      $txt=$_POST['chat_message'];
      $status = '1';
      if($txt!="")
      {
      $query1 = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message, status) VALUES ($to_user_id, $from_user_id, '$txt', '$status')";
      $statement = $dbconn->prepare($query1);
      $statement ->execute();
      }
    }
    

    if(isset($_POST['search'])){

        $searchq = $_POST['search'];
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
    

    $que_post=$dbconn->query("SELECT * FROM user_status_product WHERE product_name LIKE  '%$searchq%' OR product_type LIKE  '%$searchq%' OR product_desc LIKE  '%$searchq%' limit 9 ");
    if($que_post->num_rows>0)
    
    {

            $i = 0;
            $record_id ='<table border="none" cellpadding="none">';
            //$record ouput="";
            $record_id = "";
          

          while($data=$que_post->fetch_array())
          {
              
      
        if($i % 3==0){
      $record_id.='<tr><td><div class="img-fluid"  >
       <img class="img-thumbnail image" src="uploads/'.$data[7].'"/>
       
       <p> <i class="fa fa-star  btn-danger"></i>'.$data[2].' </p><span>&#8358;'.$data[3].' </span>
       
       <hr> 
       <span> 
       <p> <i></i> '.$data[4].' </p>
       <p><i></i>'.$data[5].'</p>
        <p> <i class="far fa-map-marker-alt"></i>'.$data[6].'</p>
        <hr></span>	<form method="post">	
        <input type="hidden" name="to_user_id" display="none"  value="<?php echo $user_id;?>" > 
        
        <input type="hidden" name="from_user_id" display="none"  value="<?php echo $from_user_id;?>" > 
        <input type="hidden" name="chat_message" display="none"  value="Is this Avaliable" >  
        <button type= "submit" name="send_message" class="btn btn-default btn-round pull-middle" data-toggle="modal" data-target="#myModal">
                  <i class="now-ui-icons shopping_cart-simple"></i>Send Message</button>
        </form></div>
       ';
      }else{
          $record_id.='<td><div>
      
          <img class="img-thumbnail image"  src="uploads/'.$data[7].'"/>
         
          <p> <i></i>'.$data[2].' </p><span>&#8358; '.$data[3].' </span>
          
          <hr> 
          <span> 
          <p> <i class="fa-product-hunt></i> '.$data[4].' </p>
          <p><i class="fa-quantity"></i>'.$data[5].'</p>
           <p><i></i>'.$data[6].'</p>
           <hr></span>	<form method="post">	
           <input type="hidden" name="to_user_id" display="none"  value="<?php echo $user_id;?>" > 
           
           <input type="hidden" name="from_user_id" display="none"  value="<?php echo $from_user_id;?>" > 
           <input type="hidden" name="chat_message" display="none"  value="Is this Avaliable" >  
           <button type= "submit" name="send_message" class="btn btn-default btn-round pull-middle" data-toggle="modal" data-target="#myModal">
                     <i class="now-ui-icons shopping_cart-simple"></i>Send Message</button>
           </form>
           </div>
          </td>';
          
      }
      $i++;
       echo $record_id;
      
                
      }
      $record_id.='</tr></table>';
    exit($record_id);
      } 
        
    }

    }

//fetch status
   
    

    
	
  

?>
