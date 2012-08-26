<?php
function rearrangeCategory($arrcat, $arrArrangement){
	$tmpCat = Array();
	$tmpCatNotInList = Array();
	$finalNotInList = Array();
	
	foreach($arrArrangement as $arrItems){
		$x=0;
		foreach($arrcat as $wpCat){
			if(in_array($arrItems,get_object_vars($wpCat))){
				$tmpCat[] = $arrcat[$x];
			}else{
				if(!in_array($wpCat->name,$tmpCatNotInList)){
					$tmpCatNotInList[$wpCat->name] = $wpCat->name;
				}
			}
		$x++;
		}
	}
	
	unset($arrItems,$x);
	
	foreach($tmpCat as $tempCat){
		$listName = $tempCat->name;
		foreach($tmpCatNotInList as $notinlist){
			if($listName == $notinlist){
				unset($tmpCatNotInList[$notinlist]);
			}
		}
	}
	
	unset($tempCat,$key);
	
	foreach($tmpCatNotInList as $notinlist){
		$key=0;
		foreach($arrcat as $origArray){
			$origArrayName = $origArray->name;
			if($origArrayName == $notinlist){
				$finalNotInList[] = $arrcat[$key];
			}
			$key++;
		}
	}
	unset($key,$notinlist,$origArray,$tmpCatNotInList,$arrcat,$arrArrangement);
	
	$mergedArray = array_merge($tmpCat,$finalNotInList);
	return ($mergedArray);
	
}

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

function QueryParent($catID,$wpdb){
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

function getParentCat($catID,$wpdb){
	$catList = Array();
	$result = QueryParent($catID,$wpdb);
	if(count($result)>=1){
		$catList[] = $result;
		$initialParent = $result->parent;
		for($x=$initialParent;$x>=0;$x--){
				$result = QueryParent($initialParent,$wpdb);
				if(count($result)>=1){
					$catList[] = $result;
					$initialParent = $result->parent;
					$x=$initialParent;
				}else{
					break;
				}
		}
		return $catList;
	}else{
		return null;
	}	
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



function getSpecific($address,$type){
	global $table_prefix;
	global $wpdb;
	$sql = 'SELECT 
		posts.post_title,
		posts.post_name,
		posts.guid,
		info.post_id AS post_id,
		info.location_address,
		info.contact_number,
		info.email,
		info.website,
		info.google_map_coordinate,
		info.contact_person,
		info.transportation,
		terms.slug,
		terms.name
	FROM 

	'.$table_prefix.'other_info AS info

	LEFT JOIN '.$table_prefix.'term_relationships AS rel ON info.post_id = rel.object_id

	LEFT JOIN '.$table_prefix.'term_taxonomy AS tax ON rel.term_taxonomy_id = tax.term_taxonomy_id

	LEFT JOIN '.$table_prefix.'terms AS terms ON tax.term_id = terms.term_id
	
	LEFT JOIN '.$table_prefix.'posts AS posts ON info.post_id = posts.ID

	WHERE 
		location_address LIKE "%'.$address.'%" 
		  AND tax.taxonomy = "category" 
		  AND terms.name = "'.$type.'" LIMIT 5';
		  
	$result = $wpdb->get_results($sql);
	return ($result);
}

?>