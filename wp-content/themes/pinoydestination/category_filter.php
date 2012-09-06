<?php
/*print_r($parentCat);*/
$currentCategoryID = $idObj->cat_ID;
$currentParentID = $idObj->parent;
$categoriesUnder = getAllCategoriesUnder($currentParentID);
krsort($categoriesUnder);
?>
<div class="categoryfilter">
	<span class="directions">Switch your location by clicking your desired destination below:</span>
	<div class="overflowcontainer">
		<div class="overflowcontent">
			<?php
				foreach($categoriesUnder as $cats){
					?>
					<div class="floatbox">
						<ul>
						<?php
						if(is_array($cats)){
							foreach($cats as $cdata){
								$style="";
								if($currentCategoryID == $cdata->term_id){
									$style= " class='selected'";
									$currentTermID = $cdata->term_id;
								}
							?>
							<li><a <?php echo $style; ?> href="<?php echo $category_base . '/'. $cdata->slug; ?>"><?php echo $cdata->name; ?></a></li>
							<?php
							}
						}else{
						}
						?>
						</ul>
					</div>	
					<?php
				}
				
				$child = getChildCategory($currentTermID);
				if(isset($child) && is_array($child) && count($child) > 0 ){
					?>
					<div class="floatbox">
						<ul>
							<?php
							foreach($child as $cat){
								?>
								<li><a href="<?php echo $category_base . '/'. $cat->slug; ?>"><?php echo $cat->name; ?></a></li>
								<?php
							}
							?>
						</ul>
					</div>	
					<?php
				}
			?>
			<br clear="all" />
		</div>
	</div>
</div>