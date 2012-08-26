<?php
include("../wp-load.php");
$table_prefix = $table_prefix;
$wpdb = $wpdb;
function getCategory($id=0, $tablepref="", $wpdb = ""){
	$table = $tablepref."term_taxonomy";
	/*$sql = 'SELECT * FROM '.$table.' WHERE taxonomy="category" AND parent="'.$id.'" AND term_id <> 1';*/
	$sql = 'SELECT 
		    tax.term_id AS term_id, tax.parent AS parent_id, terms.name AS NAME
			FROM '.$tablepref.'term_taxonomy AS tax 
			
			INNER JOIN '.$tablepref.'terms AS terms ON terms.term_id = tax.term_id
			
			WHERE tax.taxonomy="category" AND tax.parent="'.$id.'" AND tax.term_id <> 1';
	$mylink = $wpdb->get_results($sql); 
	return ($mylink);
}


switch($_REQUEST['action']){
	case "getCategory":
		$res = getCategory($_REQUEST['id'],$table_prefix,$wpdb);
		echo (count($res) . ":::::");
		
		if(count($res) > 0){
			foreach($res as $data){
				echo "<li><a class='selectingcat' href='javascript:void(0);' id='".$_REQUEST['type']."-".$data->term_id."'>".$data->NAME."<img class='loading' src='loading.gif' /></a></li>";
			}
		}else{
			echo "no-result";
		}
	break;
	
	
	case "postnew":
		print_r($_REQUEST);
	break;
	
}

?>