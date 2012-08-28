<?php
include("../wp-load.php");
include("dashboard.class.php");
require( '../resizer.php' );
$dashboard = new Dashboard($wpdb,$table_prefix,$current_user);
$amenities = $dashboard->getAmenity();
if($_POST){
	$hashtag = sha1(date("m-d-y H:i:s").$current_user->ID.$current_user->data->user_email);
	/**
	 * Prepare data
	 */
	$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 
	$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . 'destinations/'; 
	$uploadsDirectory = str_replace("dashboard","uploads",$uploadsDirectory);
	$uploadsDirectoryThumb = $_SERVER['DOCUMENT_ROOT'] . $directory_self . 'thumbs/';
	$uploadsDirectoryThumb = str_replace("dashboard","uploads",$uploadsDirectoryThumb);
	
	
	if(is_array($_FILES["file"]["error"])){
		foreach ($_FILES["file"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["file"]["tmp_name"][$key];
				$name = $_FILES["file"]["name"][$key];
				move_uploaded_file($tmp_name, $uploadsDirectory.$hashtag.'-'.$name);
				
				$uploadedFiles[] = $hashtag.'-'.$name;
				
			}
		}
	}
	
	$image = new SimpleImage();
	foreach($uploadedFiles as $upFiles){
		//resizeImage
		$image->load($uploadsDirectory.$upFiles);
		$image->resizeToWidth(133);
		$image->resizeToHeight(110);
		$image->save($uploadsDirectoryThumb.$upFiles);
	}
	
	$category = explode(",", $_POST['inputCategory']);
	foreach($category as $key=>$val){
		if($val == ""){
			unset($category[$key]);
		}else{
			$cats = explode("-",$val);
			$category[$key] = $cats[1];
		}
	}
	
	$amenity = explode(",", $_POST['inputTags']);
	foreach($amenity as $key=>$val){
		if($val == ""){
			unset($amenity[$key]);
		}else{
			$am = explode("-",$val);
			$amenity[$key] = $am[1];
		}
	}
	
	$_POST['inputCategory'] = $category;
	$_POST['inputTags'] = $amenity;
	$_POST['uploadedfiles'] = $uploadedFiles;
		
	$post = $dashboard->managePost($_POST['action'],$_POST);
	if($post == 'success'){
		header("Location: articles.php?return=success"); exit();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
<head>
    	<meta charset="utf-8">
		<title>Dashboard</title>
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

				//]]>
		</script>
		<?php }?>
</head>
	<body>
		<div class="overlaybg"></div>
		<div id="overlay" class="overlay" style="height:115px;">
			<h1>Add New Category</h1>
			<form id="addnewcategoryform" name="addnewcategoryform" method="post" action="addnewcat.php">
				<div class="formbody">
					<input type="hidden" name="newparentcat" id="newparentcat" />
					<input type="text" name="eventTitle" placeholder="New Location" />
				</div>
				<div class="menulocation">
					<input type="submit" class="save" value="Save" /><a class="save" id="cancel" href="javascript:void(0);">Cancel</a><span id="processmessage"></span>
				</div>
			</form>
		</div>
		
		<div id="loaders" class="loaders">
			<img src="images/270.gif" alt="loading" border="0" />
		</div>
		
		<div class="logohead"><img src="logoTop.png" border="0" /></div>
		<div class="centerStage">
			<?php if($_POST) {

				if($post == "success"){
					?>
					<p align="center">
						<h1>Success!</h1>
						<br clear="all" />
					</p>
					<?php
				}
				
			}else{ 
				
			?>
			<div class="sideBar">
				<?php include("sidebar.php"); ?>
			</div>
			<div class="mainStage">
				<form method="post" action="add-new.php" name="postform" id="postform" enctype="multipart/form-data">
				<h1 class="h1Main">Add New Destination</h1>
				<p>
					Thanks for your review, please make sure that fields are properly filled-up.
				</p>
				<div class="inputcontainer">
					<input type="text" class="articleTitle required" placeholder="Location Name (eg. Hotel Name, Places, Restaurant)" name="post_title" />
				</div>
				
				<div>
					<div class="inputcontainer half">
						<legend>Contact Information</legend>
						<p>
						<input type="text" class="simpleText required" placeholder="Full Address" name="post_address" />
						<input type="text" class="simpleText" placeholder="Telephone Number" name="post_phonenumber" />
						<input type="text" class="simpleText" placeholder="E-Mail Address" name="post_email" />
						<input type="text" class="simpleText" placeholder="Website" name="post_website" />
						</p>
					</div>
					<div class="inputcontainer half">
						<legend>Other Information</legend>
						<p>
						<input type="text" class="simpleText" placeholder="Contact Person" name="post_contactname" />
						</p>
						<legend>Photos: (Upload Destination Picture Here)</legend>
						<p>
							<input type="file" name="file[]" /><br />
							<input type="file" name="file[]" /><br />
						</p>
					</div>
					<br clear="all" />
				</div>
				
				<div class="inputcontainer">
					<legend>Select The Location Below:</legend>
					<p>
						This is important! Please select the specific category for this post. This will affect the post on where will it be located.
					</p>
				</div>
				<div class="inputcontainer">
					<ul id="parentCat" class="catListStyle"></ul>
					<ul id="subCategory" class="catListStyle"></ul>
					<ul id="subSubCategory" class="catListStyle"></ul>
					<ul id="addSubCategory" class="catListStyle">
						<li><a title="Click here if the intended location is not found." href="javascript:void(0);" id="addnewcat">[+] Add New Location</a></li>
					</ul>
					<input type="hidden" name="inputCategory" id="inputCategory" value="" />
					<br clear="all" />
				</div>
				
				<div id="amenity-listing">
					<div class="inputcontainer">
						<legend>Select Amenities: (Only applicable on Hotels)</legend>
						<p>
							If this is a hotel or a resort, please select the amenities that are available.
						</p>
					</div>
					<div class="inputcontainer">
						<?php
							foreach($amenities as $data){
								?>
								<a href="javascript:void(0);" class="amenitylist" id="amenity-<?php echo $data->id; ?>-<?php echo $data->amenity_name; ?>"><?php echo $data->amenity_name; ?></a>
								<?php
							}
						?>
						<input type="hidden" name="inputTags" id="inputTag" value="" />
						<br clear="all" />
					</div>
				</div>
				
				<div style="margin-top:30px;" class="inputcontainer">
					<legend>Tag Your Post:</legend>
					<p>
						Insert your tag here. This will help search engine to search you. (eg. hotel). Separate it with comma ","
					</p>
				</div>
				<div class="inputcontainer">
					<input type="text" class="simpleText" style="width:674px !important;" placeholder="Your tags (eg. Hotel, tourist destination, etc.)" name="tags" />
				</div>
				
				
				<div class="inputcontainer" id="articleeditor">
					<p><legend>You can now start to write your review!</legend></p>
					<div>
						<textarea id="postcontent" name="postcontent" style="width:100%;height:350px;"></textarea>
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
			<?php } ?>
		</div>
		<p align="center" class="footer">Pinoy Destination Dashboard &copy; 2012</p>
	</body>
</html>