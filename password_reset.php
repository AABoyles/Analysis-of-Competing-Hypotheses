<?php
include("parts/includes.php");
include("code/includes.php");

$user_found = false;
if( isset($_POST['submit']) ) {
	$this_user = new User();
	$this_user->getAttr($_POST['email'], "email");
	if( $this_user->id > 0 ) {
		$user_found = true;
		$this_user->sendPasswordReset();
		//sendMail($this_user->email, "[CACH] Password reset request", "Please reset your password by visiting this URL:\r\n\r\n " . $base_URL . "password_reset/" . $this_user->username . "/" . md5($this_user->password) . "\r\n\r\nThanks!\r\n\r\n - The ACH Bot");
	}
}

echo '<!DOCTYPE html><html><head><title>ACH: Reset Your Password</title>';
include("parts/includes.php");
echo '</head><body>';
include("parts/header.php");
echo '<div class="mainContainer"><h2>Forgotten Password Recovery</h2>';

if( $user_found ) {
	echo '<p>Okay &mdash; we\'ve sent you an e-mail with instructions for reseting your password.</p>';
} else {
	if( isset($_POST['submit']) ) {
		echo '<p class="error">Oops. We can\'t find that e-mail address in our system.</p>';
	}
	echo '<p>Please enter your e-mail address and we\'ll send you instructions for resetting your password.</p>
<form method="post" action="password_reset_change.php">
<p><b>E-mail address:</b> <input type="text" size="30" name="email" / ></p>
<p><input type="submit" name="submit" value="Send instructions..." />
</form>';
}

echo '</div>';
include("parts/footer.php");
echo '</body></html>';
