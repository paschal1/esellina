<div class="col-md-3">
	<div class="card">
		<div class="card-body">
			<div class="h5">
				<?php if($loggedUser["picture"]) { ?>
				<img src="../esellina/uploads/<?php echo $loggedUser["picture"]; ?>" class="rounded-circle" width="200"/>
				<?php } ?>
			</div>
			<div class="h5"><a href="index.php">@<?php echo  $loggedUser["username"]; ?></a></div>
			<div class="h7"><?php echo  $loggedUser["bios"]; ?></div>
			<div class="h7 text-muted"><?php echo  $loggedUser["name"]; ?> <?php echo  $loggedUser["bio"]; ?></div>
			
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<div class="h6 text-muted">Followers</div>
				<div class="h5">
				<a href="follower.php" id="followers">
				<?php 
				echo $user->getFollowers();
				?>
				</a>
				</div>
			</li>
			<li class="list-group-item">
				<div class="h6 text-muted">Following</div>
				<div class="h5">
				<a href="following.php" id="following">
				<?php 
				echo $user->getFollwing();
				?>
				</a>
				</div>
			</li>	
			<li class="list-group-item"><a href="../esellina/pschat/transaction_notify.php">Transaction History</a></li>				
			<li class="list-group-item"><a href="../esellina/pschat/index_twice.php">Home</a></li>
		</ul>
	</div>
</div>