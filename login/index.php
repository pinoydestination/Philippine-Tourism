<?php
session_start();
if(isset($_GET['logout']) && $_GET['logout']=="true"){
	unset($_SESSION);
	session_destroy();
}
session_start();
include("../wp-load.php");
if($_POST){
	$post = $_POST;
	$prefix = $wpdb->prefix;
	
	if($post['action'] == 'login'){
		
		$pass = $post['password'];
		$sql = "SELECT * FROM ".$prefix."users WHERE user_login='".$post['username']."' LIMIT 1";
		$res = $wpdb->get_row($sql);
		
		$password_hashed = $res->user_pass;
		$plain_password = $pass;
		
		if(wp_check_password($plain_password,$password_hashed,$res->ID)) {
		    $_SESSION['islogin'] = "true";
			$_SESSION['userdata'] = $res;
			header("Location: ".urldecode($post['redirect_to']) . "?redir=".sha1(date("Y-M-d H:i:s A")));
		} else {
		    echo "Wrong Password";
		}
		
		
		
	}else if($post['action'] == 'signup'){
		//check if exists
		$sql = "SELECT * FROM ".$prefix."users WHERE user_login='".$post['username']."' LIMIT 1";
		$res = $wpdb->get_row($sql);
		
		if(isset($res)){
			$errMessage = "Username already exist. Please try another username instead.";
		}else{
			$sqlData = array("user_login"=>$post['username'],
							 "user_pass"=>$post['password'],
							 "user_nicename"=>$post['username'],
							 "user_email"=>$post['email'],
							 "display_name"=>$post['username'],
							 "user_registered"=>date("Y-m-d"),
							 "role"=>"subscriber"
						    );
			//$userInfo = $wpdb->insert($prefix."users", $sqlData);
			$userInfo   = wp_insert_user($sqlData);
			$errMessage = "Signup successful. You can now login.";
		}
		
	}

}
get_header();
?>
<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/loginpage.css" />
<div class="mainbodycontent">
	<?php if(isset($errMessage)) { ?>
	<div class="messagecenter" id="message-center">
		<?php echo $errMessage; ?>
	</div>
	<?php } ?>
	<div>
	<div class="loginleft">
		<h1 class="shareexp">Log-In & Share Experiences.</h1>
		<p>We like to hear anything from you about your experiences weather it is good or bad. From that, we together with our co-travellers can have any idea about certain places.</p>
		<p>By loggin-in, you can post a review. But, you can also sign-up if you don't have an account yet.</p>
	</div>
	<div class="loginright">
		<h1 class="loginheader">Log-in</h1>
		<form method="post" action="<?php bloginfo('url'); ?>/wp-login.php">
			<div>
				<?php
				if(!isset($_GET['redirect_to'])){
					$redirect_to = ("http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/profile/");
				}else{
					$redirect_to = $_GET['redirect_to'];
				}
				?>
				<input type="hidden" name="action" value="login" />
				<input type="hidden" name="redirect_to" value="<?php echo $redirect_to; ?>" />
				<input type="text" name="log" value="" placeholder="Username" class="loginfield" />
				<input type="password" name="pwd" value="" placeholder="Password" class="loginfield" />
			</div>
			<div class="divbutton">
				<a href="">Forgot Password</a><input name="wp-submit" class="loginbutton" type="submit" value="Log-in" />
				
			</div>
		</form>
		<div class="signupcontainer">
			<h1 class="signupheader">Sign Up</h1>
			<p>If you do not have account on us, fill-up the form below.</p>
			<form method="post" action="/login/">
			<div>
				<input type="hidden" name="action" value="signup" />
				<input type="hidden" name="redirect_to" value="<?php echo $_GET['redirect_to']; ?>" />
				<input type="text" name="username" value="" placeholder="Username" class="loginfield" />
				<input type="text" name="email" value="" placeholder="E-Mail" class="loginfield" />
				<input type="password" name="password" value="" placeholder="Password" class="loginfield" />
				<input type="password" name="password2" value="" placeholder="Retype Password" class="loginfield" />
			</div>
			<div class="divbutton">
				<input type="submit" value="Submit" class="loginbutton" />
			</div>
		</form>
		</div>
	</div>
	
	
	<br clear="all" />
	</div>
</div>
<?php
get_footer();
?>