<?php

include("code/includes.php");
echo '<!DOCTYPE html><html><head><title>Change Your Password</title>';
include("parts/includes.php");
echo '</head><body>';
include("parts/header.php");
echo '<div class="mainContainer"><h2>Password Reset</h2>';

if( isset($_REQUEST['username']) ) {
	$this_user = new User();
	$this_user->getAttr($_REQUEST['username'], "username");
	if( strcmp( $this_user->password, $_REQUEST['password_hash'] ) == 0) {
		echo '
<p>Please enter and confirm your password below:</p>
<form method="post" action="/password_reset.php">
<input type="hidden" value="'.$_REQUEST['username'].'" name="username" / >
<input type="hidden" value="'.$_REQUEST['password_hash'].'" name="password_hash" / >
<p><b>Password:</b> <input type="password" size="15" name="password" / ></p>
<p><b>Confirm Password:</b> <input type="password" size="15" name="password_2" / ></p>
<p><input type="submit" name="submit" value="Change Password" />
</form>';} #TODO: Validate Password equality with Javascript on the spot.
else {
	echo '<p>Account not found.</p>';}
}
echo '</div>';
include("parts/footer.php");
echo '</body></html>';
