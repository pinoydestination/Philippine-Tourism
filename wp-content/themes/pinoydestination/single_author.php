<div class="authorcontainer">
	<?php
		$tag_list = get_the_tag_list();
		print_r($tag_list);
	?>
	<span>Published <?php the_date(); ?> under</span>
</div>