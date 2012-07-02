<?php

echo '<!DOCTYPE html><html><head><title>Checking Log In...</title>';

include ("../code/includes.php");

$cookie_user_username = $_REQUEST['cookie_user_username'];
$cookie_user_password = $_REQUEST['cookie_user_password'];

$success = FALSE;
$result = mysql_do("SELECT password FROM users WHERE username='$cookie_user_username' LIMIT 1;");
while ($query_data = mysqli_fetch_array($result) !== NULL) {
	if ($query_data['password'] == md5($cookie_user_password)) {
		$success = TRUE;
	} else {
		$failedlogin = "That username/password combination is not correct";
	}
}

#$goto = $_REQUEST['goto'] . $active_user -> users[0];

if ($success) {
	$active_user = new User();
	$active_user -> populateFromAttribute($_POST['cookie_user_username'], "username");
	$active_user -> setCookies();
	User::successfulLogin();
	//print_r($active_user);
} else {
	User::failedLogin();
}

if (isset($_REQUEST['goto'])) {
	$goto = $_REQUEST['goto'] . $active_user -> users[0];
}

echo "<meta http-equiv=Refresh content='0; url=../index.php'>";
include ("../parts/includes.php");
echo "<script language='JavaScript'>createCookie('cachchat', 'y', 7);</script>
	  </head><body></body></html>";
