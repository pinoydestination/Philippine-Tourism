<?php
require( '../wp-load.php' );

if(isset($current_user) && $current_user->ID > 0){
	if(!isset($_REQUEST['comment_id']) || !isset($_REQUEST['comment_vote'])){
		echo "errorparam";
	}else{
		if($_REQUEST['action_type'] != 'changehelpful'){
			//Add new
			$comment_id = $_REQUEST['comment_id'];
			$comment_vote = $_REQUEST['comment_vote'];
			$data = helpfulVote($comment_id,$comment_vote);
			if($data > 0){
				$userdat = addUserVote($current_user->ID,$comment_id,$comment_vote);
				if($userdat > 0){
					echo $comment_vote."-success";
				}else{
					echo $comment_vote."-success-none";
				}
				
			}else{
				echo "error";
			}
		}else{
			//Alter Vote
			$comment_id = $_REQUEST['comment_id'];
			$comment_vote = $_REQUEST['comment_vote'];
			$data = helpfulVote($comment_id,$comment_vote,"change");
			$changeUserVote = alterUserVote($current_user->ID,$comment_id,$comment_vote);
			if($changeUserVote > 0){
				echo $comment_vote."-success";
			}else{
				echo $comment_vote."-success-none";
			}
		}
	}
}else{
	echo "notlogin";
}
?>