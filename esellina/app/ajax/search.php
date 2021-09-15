<?php

session_start();

# check if the user is logged in
if (isset($_SESSION['username'])) {
    # check if the key is submitted
    if(isset($_POST['key'])){
       # database connection file
	   include 'connect.php';

	   # creating simple search algorithm :) 
	   $key = "%{$_POST['key']}%";
     
	   $sql = "SELECT * FROM users
	           WHERE username
	           LIKE ? OR firstname LIKE ?";
       $stmt = $dbconn->prepare($sql);
       $stmt->execute([$key, $key]);

       if($stmt->rowCount() > 0){ 
         $users = $stmt->fetchAll();

         foreach ($users as $user) {
         	if ($user['user_id'] == $_SESSION['id']) continue;
       ?>
       <li class="list-group-item">
		<a href="chat.php?user=<?=$user['username'];?>"
		   class="d-flex
		          justify-content-between
		          align-items-center p-2">
			<div class="d-flex
			            align-items-center">

			    <img src="uploads/<?=$user['pic']?>"
			         class="w-15 rounded-circle">

			    <span style="font-size:16px;" class="fs-xs m-2">
			    	<?=$user['firstname'] . ' ' . $user['lastname'];?>
		 </span>            	
			</div>
		 </a>
	   </li>
       <?php } }else { ?>
         <div class="alert alert-info 
    				 text-center">
		   <i class="fa fa-user-times d-block fs-big"></i>
           The user "<?=htmlspecialchars($_POST['key'])?>"
           is  not found.
		</div>
    <?php }
    }

}else {
	header("Location: ../../index.php");
	exit;
}