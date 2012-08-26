<?php
function restrict_admin_with_redirect() {
	if (!current_user_can('manage_options') && $_SERVER['PHP_SELF'] != '/wp-admin/admin-ajax.php') {
	wp_redirect("/dashboard/" ); exit;
  }
}

function wplogin_filter( $url, $path, $orig_scheme )
{
 $old  = array( "/(wp-login\.php)/");
 $new  = array( "dashboard-login");
 return preg_replace( $old, $new, $url, 1);
}



add_action('admin_init', 'restrict_admin_with_redirect');
add_filter('site_url',  'wplogin_filter', 10, 3);


function getImages($post_id,$wpdb){
	
}

function getParentCat($catID,$wpdb){
	$tablePrefix = $wpdb->prefix;
	
	$sql = "SELECT 
				* 
			FROM
				".$tablePrefix."term_taxonomy AS taxonomy
			
			INNER JOIN 
				".$tablePrefix."terms AS terms ON taxonomy.parent = terms.term_id
			WHERE
			
				taxonomy.term_id = '".$catID."' LIMIT 1";
	
	$result = $wpdb->get_row($sql);
	return $result;
	
}

function pagination($pages = '', $range = 4)
{ 
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>"; 
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

?>