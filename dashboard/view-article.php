<?php
include("../wp-load.php");
if ( !is_user_logged_in() ) {
    header("Location: /dashboard/login.php"); exit();
}
include("dashboard.class.php");
$dashboard = new Dashboard($wpdb,$table_prefix,$current_user);
$userPosts = $dashboard->getUserPosts();
$postinfo = getPost($_GET['id']);
$otherInfo = getOtherInfo($_GET['id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>Article Editor</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<link rel="stylesheet" href="editor/docs/style.css" type="text/css">
		
		
		
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<link rel="stylesheet" href="ckeditor/sample.css" type="text/css" media="screen" title="main styleguide" charset="utf-8"/>
		<script type="text/javascript" src="ckeditor/sample.js"></script>
		
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js"></script>
		<script type="text/javascript" src="scripts/category.js"></script>
		
		<?php if(!$_POST) { ?>
		<script type="text/javascript">
			//<![CDATA[
			$(document).ready(function(){
			var editor;

			function changeEnter()
			{
				// If we already have an editor, let's destroy it first.
				if ( editor )
					editor.destroy( true );

				// Create the editor again, with the appropriate settings.
				editor = CKEDITOR.replace( 'postcontent',
					{
						enterMode		: Number( 1 ),
						shiftEnterMode	: Number( 2 ),
						extraPlugins : 'autogrow',
						autoGrow_maxHeight : 800,
						// Remove the Resize plugin as it does not make sense to use it in conjunction with the AutoGrow plugin.
						removePlugins : 'resize'
					});
			}

			window.onload = changeEnter;
			});
				//]]>
		</script>
		<?php }?>
		
</head>
	<body>
		<div class="logohead"><img src="logoTop.png" border="0" /></div>
		<div class="centerStage">
			<div class="sideBar">
				<?php include("sidebar.php"); ?>
			</div>
			<div class="mainStage">
				<form method="post" action="" name="postform" id="postform" enctype="multipart/form-data">
				<h1 class="h1Main">Edit <?php echo $postinfo->post_title; ?></h1>
				<p>
					Thanks for your review, please make sure that fields are properly filled-up.
				</p>
				<div class="inputcontainer">
					<input type="text" class="articleTitle required" placeholder="Location Name (eg. Hotel Name, Places, Restaurant)" name="post_title" value="<?php echo $postinfo->post_title; ?>" />
				</div>
				
				<div>
					<div class="inputcontainer half">
						<legend>Contact Information</legend>
						<p>
						<input value="<?php echo $otherInfo->location_address; ?>" type="text" class="simpleText required" placeholder="Full Address" name="post_address" />
						<input value="<?php echo $otherInfo->contact_number; ?>" type="text" class="simpleText" placeholder="Telephone Number" name="post_phonenumber" />
						<input value="<?php echo $otherInfo->email; ?>" type="text" class="simpleText" placeholder="E-Mail Address" name="post_email" />
						<input value="<?php echo $otherInfo->website; ?>" type="text" class="simpleText" placeholder="Website" name="post_website" />
						</p>
					</div>
					<div class="inputcontainer half">
						<legend>Other Information</legend>
						<p>
						<input value="<?php echo $otherInfo->contact_person; ?>" type="text" class="simpleText" placeholder="Contact Person" name="post_contactname" />
						</p>
						<legend>Photos: (Upload Destination Picture Here)</legend>
						<div id="filebrowsercontainer">
							<input class="filebrowser" type="file" name="file[]" />
							<input class="filebrowser"  type="file" name="file[]" />
						</div>
						<div>
							<a href="javascript:;" id="addnewfile">Add More Photos</a>
						</div>
					</div>
					<br clear="all" />
				</div>
				
				<div class="inputcontainer">
					<legend>You cannot change the category of this post anymore. Please contact the us at admin@pinoydestination.com regarding this, on what category it will be and we will changed that manually.</legend>
				</div>
				
				<div class="inputcontainer" id="articleeditor">
					
					<div>
						<textarea id="postcontent" name="postcontent" style="width:100%;height:350px;"><?php echo $postinfo->post_content;  ?></textarea>
					</div>
					<div class="inputcontainer">
						<input type="hidden" name="action" value="addnew" />
						<input type="submit" value="Submit" class="publish"   id="publish-button" />
					</div>
				</div>
				
				<?php /*
				<div style="margin-top:30px;" class="inputcontainer">
					<legend>Share your Photo:</legend>
				</div>
				<div class="inputcontainer">
					<input id="fileInput" class="fileUpload" type="file" placeholder="Select file here!" name="file[]"> 
				</div>
				
				 * 
				 */
				 ?>
				 
				 
			</form>
				
				
			</div>
			<br clear="all" />
		</div>
	</body>
</html>