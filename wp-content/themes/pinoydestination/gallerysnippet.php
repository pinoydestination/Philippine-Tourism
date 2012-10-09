<?php
/**
 * Image List Section
 */
 

$table = $table_prefix."images";
$sql = 'SELECT count(id) as totalcount FROM '.$table. ' WHERE post_id="'.get_the_ID().'"';
$totalData = $wpdb->get_results($sql);
$totalData = ($totalData[0]->totalcount);

if(isset($_GET['gallery']) && $_GET["gallery"]=="show"){
	$limit = "";
	$loadc = isset($_GET['load']) ? $_GET['load'] : 16;
	$start = isset($_GET['offset']) ? $_GET['offset'] : 1;
	$start = $start<=1 ? 1 : $start;
	$offsetData = ceil($totalData/$loadc);
	$start2 = ($start-1)*$loadc;

	$limit = " LIMIT ".$start2.", ".$loadc;
	
	
	
}else{
	$limit = " LIMIT 8";
}


/*Reset WPDB Object*/
$wpdb->flush();

$sql = 'SELECT * FROM '.$table. ' WHERE post_id="'.get_the_ID().'" ' . $limit ;
$imageListing = $wpdb->get_results( $wpdb->prepare( $sql ));
?>

<div class="tabcontainer silver" style="padding-bottom:0px; border-radius:3px;" id="postthumbnails">
	<div>
		<?php
		$style="";
		$x=0;
		$iteration=1;
		$total = count($imageListing);
		$totalRow = $total/4;
		$hide = false;
		$y = 1;
		
		
		
		foreach($imageListing as $imgSource){
			if($hide){
				$otherstyle = " hidden";
			}else{
				$otherstyle = "";
			}
			if(($x==3)){
				$iteration++;
				$style = "norightmargin";
				$x=-1;
				$hide = true;
			}else{
				$style="";
			}
			if($totalRow == $iteration){
				$marginstyle = " nomarginbottom";
			}else{
				$marginstyle = "";
			}
		
			if(isset($_GET['gallery']) && $_GET['gallery'] == "show"){
				$otherstyle = "";
				$marginstyle = "";
			}	
		
		?>
			<div class="homepagetilecontainergreen <?php echo $style . $marginstyle . $otherstyle; ?>">
				<a data-fancybox-group="gallery<?php echo get_the_ID(); ?>" href="<?php bloginfo("url"); ?>/uploads/destinations/<?php echo $imgSource->original; ?>" class="fancybox">
					<img alt="Pinoy Destination | <?php echo get_the_ID(); ?>" border="0" src="<?php bloginfo('stylesheet_directory'); ?>/images/gray.jpg" data-original="<?php bloginfo("url"); ?>/uploads/thumbs/<?php echo $imgSource->thumb; ?>" alt="<?php bloginfo("url"); ?>/uploads/destinations/<?php echo $imgSource->thumb; ?>" border="0" />
				</a>
			</div>
		<?php 
		$x++;
		$y++;
		
		
		
		} 
		?>
		<br clear="all" />
	</div>
	
	
	<?php if(!isset($_GET['gallery'])){ ?>
	<div class="showgallery hidden">
		<a href="?gallery=show" class="loadmorephoto">LOAD MORE PHOTOS</a>
	</div>
	<?php } ?>
	
	<?php if(!isset($_GET['gallery'])){
		if(count($imageListing) > 4){ ?>
			<div class="showall">
				<a href="javascript:void(0);" id="showall">Show All</a>
			</div>
		<?php }else{
			echo "<br />";
		} 
	}else{
		if($offsetData >= 2){
		?>
			<div class="showall gallery">
				<?php if(($start-1) > 1){ ?>
					<a href="?gallery=show&load=<?php echo $loadc; ?>&offset=<?php echo ($start-1);?>" id="loadmoreimages">Preview</a>
				<?php } ?>
				<?php
					for($loop=1; $loop<=$offsetData;$loop++){
						if($loop == $start){
							$selected = " class=\"selected\"";
						}else{
							$selected = "";
						}
						?>
						<a <?php echo $selected; ?> href="?gallery=show&load=<?php echo $loadc; ?>&offset=<?php echo ($loop);?>" id="loadmoreimages"><?php echo $loop; ?></a>
						<?php
					}
				?>
				<?php if(($start+1) <= $offsetData){ ?>
					<a href="?gallery=show&load=<?php echo $loadc; ?>&offset=<?php echo ($start+1);?>" id="loadmoreimages">Next</a>
				<?php } ?>
			</div>
		<?php
		}else{
			echo "<br />";
		}
	}
	?>
</div>
<div class="homepageshadow">&nbsp;</div>

<center><small>No copyright infrigment intended. Please see <a href="/company/disclaimer/">diclaimer notice</a>.</small></center>

<?php
 
 /**
  * END OF IMAGES
  */

?>