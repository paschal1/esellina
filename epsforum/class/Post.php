<?php
class Post {	
   
    private $postTable = 'social_post';	
	private $likeTable = 'social_like';	
	private $userTable = 'users';	
		private $followTable = 'social_follow';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function insert(){		
		if($this->message && $_SESSION["id"]) {

			$stmt = $this->conn->prepare("
				INSERT INTO ".$this->postTable."(`user_id`, `content`)
				VALUES(?, ?)");
		
			$this->message = htmlspecialchars(strip_tags($this->message));
						
			$stmt->bind_param("is", $_SESSION["id"], $this->message);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	
	public function getFollowedUserPosts(){	
		if(!empty($_SESSION["id"])) {
					
			$sqlFollowedQuery = "SELECT follow.followed_user_id FROM ".$this->followTable." AS follow WHERE follow.follower_id = '".$_SESSION["id"]."'";
			$followedStmt = $this->conn->prepare($sqlFollowedQuery);
			$followedStmt->execute();			
			$followedResult = $followedStmt->get_result();	
			$userIds = '';
			while ($user = $followedResult->fetch_assoc()) { 			
			 $userIds .= $user['followed_user_id'].",";
			}
			$userIds = chop($userIds,",");
			if($userIds) {
				$userIds.= ",";
			}
			$userIds.= $_SESSION["id"];			
			$sqlQuery = "
				SELECT user.user_id, user.username, user.firstname, user.lastname, user.pic, post.content, post.post_id, post.created
				FROM ".$this->userTable." AS user
				LEFT JOIN ".$this->postTable." AS post ON user.user_id = post.user_id			
				WHERE user.user_id IN ($userIds) ORDER BY post.created DESC";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();			
			$result = $stmt->get_result();		
			return $result;	
		}
	}
	
	public function likePost(){		
		if($this->postId && $_SESSION["id"]) {

			$stmt = $this->conn->prepare("
				INSERT INTO ".$this->likeTable."(`user_id`, `post_id`)
				VALUES(?, ?)");
		
			$this->postId = htmlspecialchars(strip_tags($this->postId));
						
			$stmt->bind_param("is", $_SESSION["id"], $this->postId);
			
			if($stmt->execute()){
				$output = array(			
					"success"	=> 	1
				);
				echo json_encode($output);
			}		
		}
	}
	
	public function dislikePost(){		
		if($this->postId && $_SESSION["id"]) {

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->likeTable." 
				WHERE user_id = ? AND post_id = ?");
		
			$this->postId = htmlspecialchars(strip_tags($this->postId));
						
			$stmt->bind_param("is", $_SESSION["id"], $this->postId);
			
			if($stmt->execute()){
				$output = array(			
					"success"	=> 	1
				);
				echo json_encode($output);
			}		
		}
	}
}
?>