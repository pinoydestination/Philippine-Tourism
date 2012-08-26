<?php
include("../wp-load.php");
if ( !is_user_logged_in() ) {
    header("Location: /dashboard/login.php"); exit();
}
include("dashboard.class.php");
$dashboard = new Dashboard($wpdb,$table_prefix,$current_user);
$userPosts = $dashboard->getUserPosts();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>My Articles</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="editor/docs/style.css" type="text/css">
		
</head>
	<body>
		<div class="logohead"><img src="logoTop.png" border="0" /></div>
		<div class="centerStage">
			<div class="sideBar">
				<?php include("sidebar.php"); ?>
			</div>
			<div class="mainStage">
				<h1 class="h1Main">My Articles</h1>
				<div class="articleMenu">
					 
					<a href="add-new.php"><span class="iconAddPost">&nbsp;</span>Add New Article</a>
					<br clear="all" />
				</div>
				<div>
					<table class="featureTable">
						<thead>
							<tr>
								<td>Title</td>
								<td>Date Added</td>
								<td>Actions</td>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($userPosts as $postData){
								$pageicondraft = "";
								if($postData->post_status == "draft"){
									$pageicondraft = "pageicondraft";
								}
								if($postData->post_status == "publish"){
									$pageicondraft = "pageiconpublish";
								}
							?>
							<tr>
								<td><span title="<?php echo ucwords($postData->post_status); ?>" class="pageicon <?php echo $pageicondraft; ?>">&nbsp;</span></span><a target="_blank" href="<?php echo $postData->guid; ?>"><?php echo $postData->post_title; ?></a></td>
								<td><?php echo date("F d, Y", strtotime($postData->post_date)); ?><small style="display:block; color:gray;"><?php echo date("H:i A", strtotime($postData->post_date)); ?></small></td>
								<td><a href="view-article.php?action=view&id=<?php echo ($postData->ID); ?>&status=<?php echo ($postData->post_status); ?>" class="viewbutton" id="viewArticle"><span title="<?php echo ucwords($postData->post_status); ?>" class="pageicon pageiconedit">&nbsp;</span>Edit</a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<br clear="all" />
		</div>
	</body>
</html>