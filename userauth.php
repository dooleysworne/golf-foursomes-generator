<?
//-------------------------------------------------------------------------
// Some very basic variable assignments

	$realm = "Disc Golf Foursome/Threesome Randomizer";
        $username = "disc";
        $passwd = "golf";

//-------------------------------------------------------------------------
// Making things work with newer PHP versions

	$PHP_AUTH_USER = $_SERVER['PHP_AUTH_USER'];
	$PHP_AUTH_PW = $_SERVER['PHP_AUTH_PW'];


$err_msg = "
	<html>
	<head><title>Invalid Username/Password Entered</title>
	<link rel=\"stylesheet\" href=\"mystyle.css\" type=\"text/css\">
	</head>
	<body>
	<h2>Invalid Username/Password Entered</h2>
	<p>You must enter your username and password. If you do not have a valid
	username and password, you probably shouldn't be here.</p>
	</body>
	</html>
	";

#function to handle rejecting users
	
function auth_reject()
	{
		global $err_msg, $realm;
		Header("HTTP/1.0 401 Unauthorized");
		Header("WWW-Authenticate: Basic realm=\"$realm\"");
		print "<b>" . $err_msg . "</b>";
		exit();
	}
	
# check to see if username is set
	
	if (!isset($PHP_AUTH_USER))
		{
		auth_reject();
		}
	
# check to see if password is set
	
	if (!isset($PHP_AUTH_PW))
	{
		auth_reject();
	}
	
# check username
	
	if ($PHP_AUTH_USER != $username)
	{
		auth_reject();
	}
	
# check password
	
	if ($PHP_AUTH_PW != $passwd)
	{
		auth_reject();
	}

# If we make it this far, the user is good to go...
?>
