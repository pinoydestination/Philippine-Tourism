<?php
/**
 * Comments Goes Here
 */
global $current_user; 
?>
<div>
<?php if($comments) : ?>
<?php foreach($comments as $comment) : 
	
	//Get Author Info	
	$RatingResult = getCommentRating( get_comment_ID() );
	
	if($RatingResult->total > 0){
		$starRate = $RatingResult->sumRate;
		$starCompute = $RatingResult->overAllRatings;
		$reviewTitle = $RatingResult->comment_title;
	}else{
		$starCompute = 0;
		$reviewTitle = null;
	}
	
	
	$current_user_id = $comment->user_id;
	
	//check if user is currently voted
	$voteStatus = checkCommentVoteStatus($current_user->ID, get_comment_ID());
	
	//refresh wpdb
	$wpdb->flush();
	
	$sql = "SELECT * FROM ". $wpdb->prefix . "ratings WHERE author_id='".$current_user_id."'";
	$RatingResult = $wpdb->get_results($sql);
	
	$userTotalComment = count($RatingResult);
	$userTotalLikes   = 0;
	/*Get Helpful Votes*/
	foreach($RatingResult as $rate1){
		$userTotalLikes = $userTotalLikes+$rate1->likes;
	}
	/*Get Down*/
	$userTotalDisLikes   = 0;
	foreach($RatingResult as $rate1){
		$userTotalDisLikes = $userTotalDisLikes+$rate1->dislikes;
	}
	
	$userSummary = getUserCommentSummary( $current_user_id );
	
	$totalReviewsPrint = ($userSummary->total_comments<=1) ? $userSummary->total_comments . " Review" : $userSummary->total_comments . " Reviews";
	$helpfulVotesPrint = ($userSummary->total_likes <= 1) ? $userSummary->total_likes . " Helpful Vote" : $userSummary->total_likes . " Helpful Votes";
?>  
	
	

	<div class="divreviewcontainer" name="comment-<?php comment_ID(); ?>" id="comment-<?php comment_ID(); ?>">
		<div class="divreviewinfo">
			<?php echo get_avatar(get_comment_author_email(), "75", null); ?>
			<span><a name="review-<?php comment_ID(); ?>" href="/profile/<?php comment_author(); ?>/"><?php comment_author_link(); ?></a></span>
			<?php /*<span>Singapore, Singapore</span>*/?>
			<span class="usertype">Reviewer<br />&sharp;<?php comment_ID(); ?></span>
			<div class="otherinfo">
				
				<span class="reviewsummary"><?php echo $totalReviewsPrint; ?></span>
				<span class="reviewsummary"><?php echo $helpfulVotesPrint; ?></span>
			</div>
		</div>
		<div class="divreviewmessage">
			<span class="messagetitle">&ldquo;<?php echo $reviewTitle; ?>&rdquo;</span>
			<div class="belowtitle">
				<div class="star" style="float:left;"><div class="star2" style="width:<?php echo $starCompute; ?>%">&nbsp;</div></div> <div class="postedon">Posted on <?php comment_date(); ?> at <?php comment_time(); ?></div>
				<br clear="all" />
			</div>
			<div class="mainmessage">
				<?php comment_text(); ?>
			</div>
			<div class="wasthishelpful" id="wasthishelpfulcontainer">
				<div id="buttonparenthelpfulcontent">
					<?php
					if($current_user->ID <=0){
						?>
							<span>Was this post helpful?</span> <span>Log-In to vote</span>
						<?php
					}else{
						if(count( $voteStatus ) <=0){
							?>
								<span>Was this post helpful?</span> <a href="javascript:void(0);" id="helpful-yes-<?php comment_ID(); ?>" class="wasthishelpfulbutton">Yes</a> or <a class="wasthishelpfulbutton" href="javascript:void(0);" id="helpful-no-<?php comment_ID(); ?>">No</a>
							<?php
						}else{
							if($voteStatus->current_vote == "yes"){
								?>
									<span>Was this post helpful?</span> <span class="selectedhelpful">Yes</span> or <a class="wasthishelpfulbutton" href="javascript:void(0);" id="changehelpful-no-<?php comment_ID(); ?>">No</a>
								<?php
							}else if($voteStatus->current_vote == "no"){
								?>
									<span>Was this post helpful?</span> <a href="javascript:void(0);" id="changehelpful-yes-<?php comment_ID(); ?>" class="wasthishelpfulbutton">Yes</a> or <span class="selectedhelpful">No</span>
								<?php
							}
						}
					}
					?>
				</div>
				<div id="helpfulcontentpreload">
					<img src="<?php bloginfo("stylesheet_directory"); ?>/images/kitloader.gif" id="ajaxkitloader" />
				</div>
				<br clear="all" />
			</div>
			<span class="disclaimer">This review is the subjective opinion of a Pinoy Destination member and not of Pinoy Destination owners and it's affiliates. </span>
		</div>
		<br clear="all" />
	</div>
<?php endforeach; ?>  
	<?php if (function_exists("pagination")) {
	    pagination($additional_loop->max_num_pages);
	} ?>
<?php else : ?>  
<p>Be the first to write a review!</p>  
<?php endif; ?>
</div>
