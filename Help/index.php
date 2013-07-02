<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<title>ACH: Help</title>
	</head>

	<?php

	include "../code/includes.php";

	$display_user = new User();

	if (array_key_exists('username', $_REQUEST)) {
		$username = $_REQUEST['username'];
		$display_user -> populateFromAttribute($username, "username");
	}

	include ("../parts/header.php");

	if ($active_user -> logged_in) {
		include ("../parts/menu_sidebar.php");
	} else {
		include ("../parts/login_sidebar.php");
	}

	echo '<div class="mainContainer">';

	if (array_key_exists('page', $_REQUEST)) {
		include $_REQUEST['page'] . '.html';
	} else {
		include 'menu.html';
	}

	echo '</div>';

	include ('../parts/footer.php');
?>

	</body>
</html>
