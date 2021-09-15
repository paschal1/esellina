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

    $que_post=$dbconn->query("SELECT * FROM user_status_product WHERE user_id ORDER BY product_id desc limit $start,$limit");
    if($que_post->num_rows>0)
    
    {

            $i = 0;
            $record_id ='<table border="none" cellpadding="none">';
            //$record ouput="";
            $record_id = "";
          

          while($data=$que_post->fetch_array())
          {
              
        $userid =$data['user_id'];

         $post_id=$data['user_id'];
        
      //  $query3 = $dbconn->query("SELECT image FROM user_profile_pic  WHERE user_id=$userid ORDER BY timeCreated desc");
      
      //   while($dat=$query3->fetch_array())
      //     {
      //       $user_id=$data['user_id'];
              $query=$dbconn->query("SELECT * FROM users   WHERE user_id = '$userid' ");
            while($da=$query->fetch_array())
          {
         
        if($i % 3==0){
      $record_id.='<tr><td>


<div class="col-md-4" style="padding:1px;">
            <div style="display:inline-block; border:solid 1px #808080; padding:15px">
                <div>
                    <img class="img-responsive" alt="Bootstrap template"
                        src="uploads/'.$data[7].'"/>
                    <br/>
                    <h2 class="pull-right">$'.$data[3].'</h2></br></br>
                    <h2><a href="#">'.$data[2].'</a></h2>
                    <br/>
                    <p class="text-justify">'.$data[6].'</p>
                </div>
                <br/>
                <div class="ratings text-center">
                    <p>
                    <div id="rating3"></div>
                    (20 reviews)
                    </p>
                </div>
                <br/>
                <div class="btn-ground text-center" style="padding-bottom: 30px">
                    <button type="button" class="btn btn-info"><i class="fa fa-shopping-cart"></i> Add</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#productmodal3"><i
                            class="fa fa-info"></i> Info</button>
                </div>
            </div>
        </div>
    </div>
</div>



';
}else{
$record_id.='<td>
 
<div class="col-md-4" style="padding:1px;">
            <div style="display:inline-block; border:solid 1px #808080; padding:15px">
                <div>
                    <img class="img-responsive" alt="Bootstrap template"
                        src="uploads/'.$data[7].'"/>
                    <br/>
                    <h2 class="pull-right">$'.$data[3].'</h2></br></br>
                    <h2><a href="#">'.$data[2].'</a></h2>
                    <br/>
                    <p class="text-justify">'.$data[6].'</p>
                </div>
                <br/>
                <div class="ratings text-center">
                    <p>
                    <div id="rating2"></div>
                    (15 reviews)
                    </p>
                </div>
                <br />
                <div class="btn-ground text-center" style="padding-bottom: 30px">
                    <button type="button" class="btn-info"><i class="fa fa-shopping-cart"></i> Add</button>
                    <button type="button" class="btn-warning" data-toggle="modal" data-target="#productmodal2"><i
                            class="fa fa-info"></i> Info</button>
                </div>
            </div>
        </div>


</td>

';

}
$i++;
// echo $record_id;
}
//}
}
$record_id.='</tr>
';
exit($record_id);
} else{
exit('reachedMax');
}



}
}
//fetch status







?>