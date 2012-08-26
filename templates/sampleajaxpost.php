<?php for($y=0;$y<=2;$y++){ 
	if($y%2){
		$style=" whitebg";
	}else{
		$style="";
	}
?>
<div class="reviewContainer <?php echo $style; ?>">
	<span class="reviewTitle">Wonderful Place</span><span class="postdate">Posted on December 25, 2011</span>
	<p>&ldquo;Trip to Ariels Point was the highlight of my trip to Boracay. The price is 1,500p and it's all worth it. The island is very clean, BBQ lunch was delicious, plus unlimited drinks.&rdquo;</p>
	<p class="viewpost"><a href="#">View Post</a></p>
	<br clear="all" />
</div>
<?php } ?>