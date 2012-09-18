<?php
include("../../wp-load.php");
include("rss.class.php");

$sql = "select * from ".$table_prefix."newstracker";
$result = $wpdb->get_results( $sql );

if(is_array($result) && count($result)>=1){
	foreach($result as $tracker){
		$rss = new RSSReader($tracker->url);
		while ($rss->hasNext()){

			$rssdata = $rss->next();
			
			$url     = $rssdata["link"];
			$title   = $rssdata["title"];
			$desc    = $rssdata["description"];
			$pub     = $rssdata["pubDate"];

			$hash    = sha1( $url.$title.$pub );

			$data = array("hash"=>$hash);
			
			$sql = "select * from ".$table_prefix."news_verify WHERE hash ='".$hash."'";
			
			$result = $wpdb->get_row( $sql );
			
			if(!is_array($result) && count($result) <= 0){	
				$res = $wpdb->insert($table_prefix."news_verify",$data);
				$returndata = addToDB( $rssdata );
				/*echo $returndata;*/
			}else{
				/*print_r("0");*/
			}

			unset( $hash );
		}
	}
}
?>