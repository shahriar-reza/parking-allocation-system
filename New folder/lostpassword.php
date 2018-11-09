<!DOCTYPE html>
<html>
<head>
	<title>PAS | Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="login">
		<h1><a href="https://wordpress.com/" title="PAS" tabindex="-1">PAS</a></h1>
	
<form name="loginform" id="loginform" action="" method="post">
	<p> 
		<label for="user_login">Username<br>
		<input name="log" id="user_login" class="input" value="" size="20" type="text"></label>
	</p>
	<p>
		<label for="user_pass">Password<br>
		<input name="pwd" id="user_pass" class="input" value="" size="20" type="password"></label>
	</p>
		<p class="forgetmenot"><label for="rememberme"><input name="rememberme" id="rememberme" value="forever" checked="checked" type="checkbox"> Stay signed in</label></p>
	<p class="submit">
		<input name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" type="submit">
		<input name="redirect_to" value="https://wordpress.com/" type="hidden">
		<input name="testcookie" value="1" type="hidden">
	</p>
</form>

<p id="nav">
<a class="click-register" href="https://wordpress.com/start?ref=wplogin">Register</a> | 	<a href="https://wordpress.com/wp-login.php?action=lostpassword">Lost your password?</a>
</p>
	<p id="backtoblog"><a href="http://wordpress.com/">← Back to Home</a></p>
	
	</div>

</body>
</html>