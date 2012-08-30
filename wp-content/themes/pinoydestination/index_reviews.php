<ul class="commentlistul">
<?php 
$comments = getRecentComments(6);
if(is_array($comments)){
	foreach($comments as $comment){
	?>
		<li>
			<p class="speech">
				&ldquo;<?php echo wp_trim_excerpt( $comment->comment_content ); ?>&rdquo;
			</p>
			<br clear="all" />
			<div style="float:right">
				<a href="/profile/<?php echo $comment->user_id; ?>/<?php echo $comment->comment_author; ?>"><?php echo $comment->comment_author; ?></a> on <a href="<?php echo $comment->guid; ?>"><strong><?php echo $comment->post_title; ?></strong></a>&nbsp;<a href="<?php echo $comment->guid; ?>#review-<?php echo $comment->comment_ID; ?>">&sharp;<?php echo $comment->comment_ID; ?></a>
			</div>
		</li>
	<?php
	}
}else{
	echo "No user reviews yet";
}
?>
</ul>
