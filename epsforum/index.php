<?php 
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Post.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(!$user->loggedIn()) {	
	header("Location: login.php");	
}
$post = new Post($db);
$loggedUser = $user->getUser();
include('inc/header.php');
?>
<title>esellina.com : forum</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/user.js"></script>
<?php include('inc/container.php');?>
<div class="container-fluid gedf-wrapper">
	<div class="row">
		<?php include('profile.php');?>
		<div class="col-md-6 gedf-main">
			
			<div class="card gedf-card" id="postSection">
				<div class="card-header">
					<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Message</a>
						</li>						
					</ul>
				</div>
				<div class="card-body">
					<form method="post" id="postForm">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
								<div class="form-group">
									<label class="sr-only" for="message">post</label>
									<textarea class="form-control" id="message" name="message" rows="3" placeholder="What are you thinking?"></textarea>
								</div>

							</div>						
						</div>
						<div class="btn-toolbar justify-content-between">
							<div class="btn-group">
								<input type="hidden" name="action" id="action" value="" />
								<button type="submit" id="postShareButton" class="btn btn-primary">share</button>
							</div>						
						</div>
					</form>
				</div>
			</div>
			

			<?php
			$userPostResults = $post->getFollowedUserPosts();
			while ($post = $userPostResults->fetch_assoc()) {
			$date=date_create($post['created']);			
			$isPostLiked = $user->getUserPostLike($post["post_id"]);
			?>			
			<div class="card gedf-card">
				<div class="card-header">
					<div class="d-flex justify-content-between align-items-center">
						<div class="d-flex justify-content-between align-items-center">
							<div class="mr-2">
								<img class="rounded-circle" width="45" src="../esellina/uploads/<?php echo $post['pic']; ?>" class="rounded-circle" alt="">
							</div>
							<div class="ml-2">
								<div class="h5 m-0">@<?php echo $post['username']; ?></div>
								<div class="h7 text-muted"><?php echo $post['firstname']; ?> <?php echo $post['lastname']; ?></div>
							</div>
						</div>							
					</div>
				</div>
				<div class="card-body">
					<div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> <?php echo date_format($date,"d/m/Y H:i:s"); ?></div>
					<p class="card-text">
						<?php echo $post['content']; ?>
					</p>
				</div>
				<div class="card-footer">
					<a class="card-link <?php IF ($isPostLiked) { echo "dislikePost"; } else { echo "likePost";}?>" id="like_<?php echo  $post['post_id']; ?>" data-post-id="<?php echo $post['post_id']; ?>">
					<i style=" color: blue;
  text-shadow: 1px 1px 1px #ccc;
  font-size: 1.5em;
" title="<?php IF ($isPostLiked) { echo "Liked"; } else { echo "Like";}?>" id="likeIcon_<?php echo  $post['post_id']; ?>"class="<?php IF ($isPostLiked) { echo "fa fa-thumbs-down"; } else { echo "fa fa-thumbs-up";}?>"></i></a>					
			<?php echo $isPostLiked; ?>	</div>
			</div>
			
			
			<?php }  ?>


			



		</div>
		<div class="col-md-3">
			<div class="card gedf-card">
				<div class="card-body" style="padding:5px;">
					<h5 class="card-title">You might like</h5>				
					<?php 
					$unfollowedUserResult = $user->getUnfollowedUsers();
					while ($unfollowedUser = $unfollowedUserResult->fetch_assoc()) { 	
					?>					
					<li class="list-group-item" style="padding:5px;">					
						<a href="#"> <img src="../esellina/uploads/<?php echo $unfollowedUser['pic']; ?>" alt="Profile Pix" class="rounded-circle" width="50"/>@<?php echo $unfollowedUser['username']; ?></a> 
						<button type="button" id="follow_<?php echo $unfollowedUser['user_id']; ?>" data-userid="<?php echo $unfollowedUser['user_id']; ?>" class="btn btn-primary pull-right follow" style="margin:5px 5px 0px 0px;">Follow</button>
					</li>					
					<?php } ?>				
				</div>
			</div>			
		</div>
	</div>
</div>
	
		
<?php include('inc/footer.php');?>
