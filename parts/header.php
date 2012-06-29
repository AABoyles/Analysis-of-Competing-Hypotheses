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

echo '<div class="container">';

if (!$print_mode) {

	echo '<div class="header">
	      <p class="menu">';

	if ($active_user -> logged_in_full_account) {
		echo '<span class="tab">Hello, <a href=\'profile/'.$active_user->username.'>'.$active_user->name.'</a>
</span> <span class="tab"><a href="auth/log_out.php">Logout</a></span>';
	}

	echo '</p></div>
	<script type="text/javascript">
		function forgotPassword() {
			window.open("/auth/forgot.php","forgotBox","width=450","height=220","resizeable=no","status=yes");
		}
	</script>';

} else {
	echo "<div class='printHeader'>
		  <p>Page printed by <b>$active_user->name</b> on <b>" . date("F j, Y, g:ia") . "(EST)</b>.</p></div>";
	switch($active_project -> classification){
		case 'S':
			$classificationBannerStyle = "secretPrintBanner";
			break;
		case 'TS':
			$classificationBannerStyle = "topSecretPrintBanner";
			break;
		default:
			$classificationBannerStyle = "unclassifiedPrintBanner";
			break;
	}

	echo "<div class=\"" . $classificationBannerStyle . " projectClassificationPrintBanner\">";
	echo "<p>Overall Project Classification: <b>" . Project::classificationText($active_project -> classification) . "</b></p>";
	echo "</div>";
}
