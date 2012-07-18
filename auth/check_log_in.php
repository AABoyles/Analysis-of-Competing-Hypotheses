<?php

echo '<!DOCTYPE html><html><head><title>Checking Log In...</title>';

include (__DIR__."/../code/includes.php");

if(! (array_key_exists('cookie_user_username', $_POST) || 
	  array_key_exists('cookie_user_password', $_POST))){
	  	die(); }

$cookie_user_username = $_POST['cookie_user_username'];
$cookie_user_password = $_POST['cookie_user_password'];

$success = FALSE;
$result = mysql_do("SELECT password FROM users WHERE username='$cookie_user_username' LIMIT 1;");
$query_data = mysqli_fetch_array($result, MYSQLI_NUM);

if ($query_data !== NULL) {
	echo "Queried Password: ".$query_data[0] . "<br>";
	echo "POSTed Password:  ".md5($cookie_user_password);
	
	if (strcmp($query_data[0], md5($cookie_user_password)) == 0) {
		$success = TRUE;}
	else {
		$failedlogin = "That username/password combination is not correct"; }
}

#$goto = $_REQUEST['goto'] . $active_user -> users[0];

if ($success === TRUE) {
	$active_user = new User();
	$active_user -> populateFromUsername($_POST['cookie_user_username']);
	$active_user -> setCookies();
	User::successfulLogin();
	//print_r($active_user);
	} 
else {
	User::failedLogin();}

if (isset($_REQUEST['goto'])) {
	$goto = $_REQUEST['goto'] . $active_user -> users[0];}

echo "<meta http-equiv=Refresh content='0; url=../index.php'>";
include (__DIR__."/../parts/includes.php");
echo "<script language='JavaScript'>createCookie('cachchat', 'y', 7);</script>
	  </head><body></body></html>";
