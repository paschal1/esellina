<?php 
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(!$user->loggedIn()) {	
	header("Location: login.php");	
}

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
			<div class="card gedf-card">
				<div class="card-header">
					<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Followers</a>
						</li>						
					</ul>
				</div>
				<div class="card-body">
					<?php 
					$unfollowedUserResult = $user->getFollower();
					while ($unfollowedUser = $unfollowedUserResult->fetch_assoc()) { 	
					?>					
					<li class="list-group-item" style="padding:5px;">					
						<a href="#"><img src="../esellina/uploads/<?php echo $unfollowedUser['pic']; ?>" class="rounded-circle" width="50"/>@<?php echo $unfollowedUser['username']; ?></a> 
						<button type="button" id="follow_<?php echo $unfollowedUser['user_id']; ?>" data-userid="<?php echo $unfollowedUser['user_id']; ?>" class="btn btn-primary pull-right follow" style="margin:5px 5px 0px 0px;">Follow</button>
					</li>					
					<?php } ?>					
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card gedf-card">
				<div class="card-body" style="padding:5px;">
					<h5 class="card-title">What's happening</h5>								
				</div>
			</div>			
		</div>
	</div>
</div>
	
		
<?php include('inc/footer.php');?>
