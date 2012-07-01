<?php
/* ////////////////////////////////////////////////////////////////////////////////
**    Copyright 2010 Matthew Burton, http://matthewburton.org
**    Code by Burton and Joshua Knowles, http://auscillate.com 
**
**    This software is part of the Open Source ACH Project (ACH). You'll find 
**    all current information about project contributors, installation, updates, 
**    bugs and more at http://competinghypotheses.org.
**
**
**    ACH is free software: you can redistribute it and/or modify
**    it under the terms of the GNU General Public License as published by
**    the Free Software Foundation, either version 3 of the License, or
**    (at your option) any later version.
**
**    ACH is distributed in the hope that it will be useful,
**    but WITHOUT ANY WARRANTY; without even the implied warranty of
**    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
**    GNU General Public License for more details.
**
**    You should have received a copy of the GNU General Public License
**    along with Open Source ACH. If not, see <http://www.gnu.org/licenses/>.
//////////////////////////////////////////////////////////////////////////////// */

include("code/includes.php");

if(isset($_REQUEST['username'])){
	$username = $_REQUEST['username'];
	$display_user = new User();
	$display_user->populateFromAttribute($username, "username");
}

echo '<!DOCTYPE html><html><head><title>ACH: Sign Up</title>';

include("parts/includes.php");

echo '</head><body>';

#TODO: what is this for and is it worth it?
#<body onload="setTimeout('Effect.Fade(\'statusMessage\')',2500); setTimeout('Effect.Fade(\'statusMessage2\')',2500);">


include("parts/header.php");
include("parts/login_sidebar.php");

echo "
<div class='mainContainer'>
	<div class='ydsf left'>
		<div class='inner'>
			<div class='main'>";
				if( !$active_user->logged_in ) {
				#TODO: Need to revamp this, update database scheme
					echo "<h2>Sign Up</h2>
					<form class='signUp' method='post' class='edit' action='make_new_account.php'>		
						<table>
						<tr><td><b>Username:</b></td><td><input type='text' name='username' size='40' /></td></tr>
						<tr><td><b>Password:</b></td><td><input type='password' name='password' size='40'/></td></tr>
						<tr><td><b>Confirm Password:</b></td><td><input type='password' name='password2' size='40' /></td></tr>
						<tr><td><b>Real name:</b></td><td><input type='text' name='name' size='40' /></td></tr>
						<tr><td><b>E-mail address:</b></td><td><input type='text' name='email' size='40' /></td></tr>
						<tr><td><b>Phone:</b></td><td><input type='text' name='unclassified_phone' size='40' /></td></tr>
						<tr><td><b>Secure Phone:</b></td><td><input type='text' name='secure_phone' size='40' /></td></tr>
						<tr><td><b>Classification:</b></td><td>
							<input type='radio' name='classification' value='unclassified'>Unclassified</option><br />
							<input type='radio' name='classification' value='classified'>Classified</option><br />
							<input type='radio' name='classification' value='secret'>Secret</option><br />
							<input type='radio' name='classification' value='top_secret'>Top Secret</option><br />
							<input type='radio' name='classification' value='top_secret_sci'>TS-SCI</option><br />
							<input type='radio' name='classification' value='private'>Private</option></td></tr>
						<tr><td><b>Office:</b></td><td><input type='text' name='office' size='40' /></td></tr>
						<tr><td colspan='2'><b>Office Description:</b><br /><textarea rows='4' name='office_desc' cols='66'></textarea></td></tr>
						<tr><td colspan='2' style='text-align:center;'><input type='submit' value='Sign Up' /></td></tr>
						</table>
					</form>";
				}
echo		"</div>
		</div>
	</div>
</div>";

include("parts/footer.php");

echo "</body></html>";
