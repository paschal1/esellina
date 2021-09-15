<?php
session_start();


# check if the user is logged in
if (isset($_SESSION['username'])) {
    # check if the key is submitted
    if(isset($_POST['key'])){
       # database connection file
	   include '../ajax/connect.php';
       

	   # creating simple search algorithm :) 
	   $key = "%{$_POST['key']}%";
     
	   $sql = "SELECT * FROM users
	           WHERE firstname
	           LIKE ? OR lastname LIKE ?";
       $stmt = $dbconn->prepare($sql);
       $stmt->execute([$key, $key]);

       if($stmt->rowCount() > 0){ 
         $users = $stmt->fetchAll();

         foreach ($users as $user) {

            $user_id = $user['user_id'];
            $query = " SELECT * FROM user_post WHERE user_id=?";
            $query = $dbconn->prepare($query);
            $query->execute([$user_id]);

            $rows = $query->fetchAll();

            foreach ($rows as $row) {

         	if ($user['user_id'] == $_SESSION['id']) continue;
       ?>
       <li class="list-group-item">
		<a href="index_twice.php?user=<?=$user['username'];?>">
		    <div class="col d-flex justify-content-center">
                        <div class="card border-none mb-3 center" style="max-width: 30rem;">
                            <div class="card-body text-success">
                                <?php if ($user['pic'] != "") : ?> <span>
                                    <img src="../../uploads/profile/<?= $user['pic']; ?> "
                                        class="img-profile rounded-circle" height="40px" width="40px"
                                        class="img-circle"/>
                                </span>
                                <?php else : ?>
                                <img src="img/user.jpeg" height="40px" width="100%" class="img-profile rounded-circle"
                                    id="profileDisplay" onclick="triggerClick()" />
                                <?php endif; ?>
                                 <span><button type="button" class="view_user" id="' <?= $user['user_id'];?> '" style="border:none; background-color:white;"> <?= $user['firstname'] . '  ' . $user['lastname'];?></button></span>
                                
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <?php if ($row['post_pic'] != "") : ?>
                                            <img src="../../uploads/<?php echo $row['post_pic']; ?>" class="img-thumbnail"
                                                width="100%" height="100%" />

                                            <?php else : ?>
                                            <img src="../../uploads/default.jpg" width="100%" height="200px"
                                                class="img-thumbnail" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">

                                                <p class="card-title">


                                                </p>
                                                <p class="card-text"><?php echo $row[2]; ?></p>
                                                <p class="card-text"><small
                                                        class="text-muted"><?php echo $row[4] . ' Item in Stock'; ?></small>
                                                    <span>$<?php echo $row[3];?>
		 </a>
	   </li>
       <?php  } } }else { ?>
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