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
    

if(isset($_POST['getData'])){

    $start = $dbconn->real_escape_string($_POST['start']);
    $limit = $dbconn->real_escape_string($_POST['limit']);

    $que_post=$dbconn->query("SELECT * FROM user_status_product WHERE user_id='".$_SESSION['id']."' ORDER BY product_id desc limit $start,$limit");
    if($que_post->num_rows>0)
    
    {

            $i = 0;
            $record_id ='<table border="none" cellpadding="none">';
            //$record ouput="";
            $record_id = "";
          

          while($data=$que_post->fetch_array())
          {
              
        $userid =$data['user_id'];

        
        
       $query3 = $dbconn->query("SELECT image FROM user_profile_pic  WHERE user_id=$userid ORDER BY timeCreated desc");
      
        while($dat=$query3->fetch_array())
          {
            $user_id=$data['user_id'];
              $query=$dbconn->query("SELECT * FROM users   WHERE user_id = '$user_id' ");
            while($da=$query->fetch_array())
          {
          
        if($i % 3==0){
      $record_id.='<tr><td><div class="img-fluid"  >
      <span style="padding:1px;" margin:0px; padding-right:0px; border-spacing: 15px;><span class="circle" ><img src="../uploads/profile/'.$dat['image'].'" height="50px" width="30px" class="img-circle" 
      </span> '.$da[3].' '.$da[4].'
       <img class="img-thumbnail image" src="uploads/'.$data[7].'"/>
        
       <p> <i class="fa fa-star  btn-danger"></i>'.$data[2].' </p><span>&#8358;'.$data[3].' </span>
       
       <hr> 
       <span> 
       <p> <i></i> '.$data[4].' </p>
       <p><i></i>'.$data[5].'</p>
        <p> <i class="far fa-map-marker-alt"></i>'.$data[6].'</p>
        <hr></span>	
</div>
';
}else{
$record_id.='<td>
    <div>
<span style="padding:1px;" margin:0px; padding-right:0px; border-spacing: 15px;><span class="circle" ><img src="../uploads/profile/'.$dat['image'].'" height="50px" width="30px" class="img-circle" </span>
   '.$da[3].'  '.$da[4].' 
<img class="img-thumbnail image" src="uploads/'.$data[7].'" />

        <p> <i></i>'.$data[2].' </p><span>&#8358; '.$data[3].' </span>

        <hr>
        <span>
            <p> <i class="fa-product-hunt></i> '.$data[4].' </p>
          <p><i class=" fa-quantity"></i>'.$data[5].'</p>
            <p><i></i>'.$data[6].'</p>
            <hr>
        </span>

    </div>
</td>';

}
$i++;
// echo $record_id;
}
          }
}
$record_id.='</tr>
</table>';
exit($record_id);
} else{
exit('reachedMax');
}



}
}
//fetch status







?>