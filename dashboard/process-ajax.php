<?php
include("../wp-load.php");
if ( !is_user_logged_in() ) {
    header("Location: /"); exit();
}
$table = $table_prefix."amenities";

switch($_REQUEST['action']){
	case "add_amenity":
		/*check if existing*/
		$sql = "SELECT * FROM ".$table." WHERE amenity_name='".mysql_real_escape_string($_REQUEST['amenity_name'])."'";
		
		$mylink = $wpdb->get_row($sql);
		
		if($mylink){
			echo "error::existing";
		}else{
			$data = array("amenity_name"=>mysql_real_escape_string($_REQUEST['amenity_name']));
			$format = array("%s");
			$insertresult = $wpdb->insert( $table, $data, $format );
			print_r($insertresult);
		}
		
	break;
	
	case "get_all_amenity":
		$sql = "SELECT * FROM ".$table;
		$mylink = $wpdb->get_results($sql);
		$arrData = '';
		foreach($mylink as $data){
			$arrData .= "<li>".$data->amenity_name . '</li>';
		}
		echo $arrData;
	break;
	
	case "add_new_post":
			
	break;
	
	default:
		/*no default*/
	break;
}
?>