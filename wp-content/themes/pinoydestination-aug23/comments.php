<?php
/**
 * Comments Goes Here
 */							 
?>
<div>
<?php if($comments) : ?>
<?php foreach($comments as $comment) : 
	
	//Get Author Info
	$sql = "SELECT * FROM ". $wpdb->prefix . "ratings WHERE comment_id='".get_comment_ID()."' LIMIT 1";
	$RatingResult = $wpdb->get_row($sql);
	if(count($RatingResult) > 0){
		$starRate = $RatingResult->ratings;
		$starCompute = (($starRate/100)*50)+50;
		$reviewTitle = $RatingResult->comment_title;
	}else{
		$starCompute = 0;
		$reviewTitle = null;
	}
	
	
	$current_user_id = $comment->user_id;
	
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
	
	$totalReviewsPrint = ($userTotalComment<=1) ? $userTotalComment . " Review" : $userTotalComment . " Reviews";
	$helpfulVotesPrint = ($userTotalLikes <= 1) ? $userTotalLikes . " Helpful Vote" : $userTotalLikes . " Helpful Votes";
?>  
	
	

	<div class="divreviewcontainer">
		<div class="divreviewinfo">
			<img class="avatar" src="<?php echo get_avatar(get_comment_author_email(), "75", null); ?>" alt="avatar of <?php comment_author(); ?>" />
			<span><a href="/profile/<?php comment_author(); ?>/"><?php comment_author_link(); ?></a></span>
			<span>Singapore, Singapore</span>
			<span class="usertype">Reviewer</span>
			<div class="otherinfo">
				
				<span class="reviewsummary"><?php echo $totalReviewsPrint; ?></span>
				<span class="reviewsummary"><?php echo $helpfulVotesPrint; ?></span>
			</div>
		</div>
		<div class="divreviewmessage">
			<span class="messagetitle"><a href="">&ldquo;<?php echo $reviewTitle; ?>&rdquo;</a></span>
			<div class="belowtitle">
				<div class="star" style="float:left;"><div class="star2" style="width:<?php echo $starCompute; ?>%">&nbsp;</div></div> <div class="postedon">Posted on <?php comment_date(); ?> at <?php comment_time(); ?></div>
				<br clear="all" />
			</div>
			<div class="mainmessage">
				<?php comment_text(); ?>
			</div>
			<div class="wasthishelpful">
				<span>Was this post helpful?</span> <a href="javascript:void(0);" id="helpful-yes-<?php comment_ID(); ?>" class="wasthishelpfulbutton">Yes</a> or <a class="wasthishelpfulbutton" href="javascript:void(0);" id="helpful-no-<?php comment_ID(); ?>">No</a>
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
