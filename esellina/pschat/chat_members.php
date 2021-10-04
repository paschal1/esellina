<?php
session_start();
if (isset($_SESSION['username'])) {
     

include '../app/http/connect.php';

include '../app/helpers/user.php';
include '../app/helpers/members.php';
include '../app/helpers/timeAgo.php';
include '../app/helpers/last_chat.php';

$user = getUser($_SESSION['username'], $dbconn);
//$conversations = getMembers($user['user_id'], $dbconn);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sellina - Home</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- boot strap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="icon" href="img/EPS logo B&W copyPNG.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-600 p-2 shadow rounded">
        <div class="d-flex mb-3 p-3 bg-light justify-content-center align-items-center">
            <div class="d-flex align-items-center">
                <div title="online" >
                        <div class="online" >

                        </div>
                    </div>
                <img src="../uploads/<?= $user['pic'] ?>" alt="profile-image" class="w-15 rounded-circle">
                <p style="font-size:20px;" class="fs-xs m-2"><?= $user['firstname'] . ' ' . $user['lastname']; ?></p>


            </div>
            <a href="pschat/index_twice.php" class="btn btn-dark">Back</a>



        </div>
        <div class="input-group mb-3"><input type="text" id="searchText" placeholder="Search..." class="form-control">
            <button class="btn btn-dark" id="searchBtn"><i class="fa fa-search"></i></button>
        </div>
      <ul id="chatList"
    		    class="list-group mvh-50 overflow-auto">
    			<?php
                
                
               // if (!empty($conversations)) { ?>
    			    <?php 
                    $id = $_SESSION['id'];
    $query = " SELECT * FROM users WHERE user_id != '$id'";
    $query = $dbconn->prepare($query);
        $query->execute();
            $users = $query->fetchAll();
            foreach($users as $conversations){
    			    //foreach ($conversations as $conversation){ ?>
                    
              
	    			<li class="list-group-item">
	    				<a href="../chat.php?user=<?=$conversations['username']?>"
	    				   class="d-flex
	    				          justify-content-between
	    				          align-items-center p-2">
	    					<div class="d-flex
	    					            align-items-center">
	    					    <img src="../uploads/<?=$conversations['pic']?>"
	    					         class="w-10 rounded-circle">
	    					    <h3 class="fs-xs m-2">
	    					    	<span><?=$conversations['firstname']?></span><?php echo ' '?><?=$conversations['lastname']?><br>
                      <small>
                        <?php 
                         // echo lastChat($_SESSION['id'], $conversations['user_id'], $dbconn);
                        ?>
                      </small>
	    					    </h3>            	
	    					</div>
	    					<?php if (last_seen($conversations['last_seen']) == "Active") { ?>
		    					<div title="online">
		    						<div class="online"></div>
		    					</div>
	    					<?php } }?>
	    				</a>
	    			</li>
    			    <?php } ?>
    			<?php //}else{ ?>
    				<!-- <div class="alert alert-info 
    				            text-center">
					   <i class="fa fa-comments d-block fs-big"></i>
                       No messages yet, Start the conversation
					</div> -->
    			
    		</ul>
    	</div>
    </div>
	  
           
    </div>

    	
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            // Search
       $("#searchText").on("input", function(){
       	 var searchText = $(this).val();
           
         if(searchText == "") return;
         $.post('app/ajax/search.php',
         
         	     {
                      
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

       // Search using the button
       $("#searchBtn").on("click", function(){
       	 var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('app/ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });


            //auto update last seen
            let lastSeenUpdate = function(){
                $.get("app/ajax/update_last_seen.php");
                
            }
            lastSeenUpdate();

            setInterval(lastSeenUpdate, 10000);
        });
    </script>

</body>

</html>
<?php
  // }
//else{
//        header('location:index.php');
//         exit();
//     }
?>