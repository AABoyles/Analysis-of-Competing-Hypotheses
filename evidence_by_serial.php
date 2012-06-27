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

$serial_number = $_REQUEST['serial_number'];

$display_evidence = new Evidence();
$display_evidence->populateFromAttribute($serial_number, "serial_number");

echo '<!DOCTYPE html><html><head><title>ACH</title>';

include("parts/includes.php");

$script = "setTimeout('Effect.Fade(\'statusMessage\')',2500); setTimeout('Effect.Fade(\'statusMessage2\')',2500); bridge.replaceHeader('BridgeHeader', '1');";

echo "</head><body onload=$script>";

include("parts/header.php");
	
if( $active_user->logged_in ) {
	 
	include("parts/menu_sidebar.php");

echo '<div class="mainContainer">
	<div class="ydsf left">
		<div class="inner">
			<div class="main">';

echo "<h2>Projects using evidence with serial number '$display_evidence->serial_number':</h2>";

$result = mysql_do("SELECT * FROM evidence WHERE serial_number='$display_evidence->serial_number';");
while($query_data = mysql_fetch_array($result)) { 

	$this_evidence = new Evidence();
	$this_evidence->populateFromId($query_data['id']);
	
	$this_project = new Project();
	$this_project->populateFromId($this_evidence->project_id);
	
	if( $this_evidence->name != "" && $this_project->title != "" ) {

echo "<p>Project <a href=".$base_URL."project/".$this_project->id . $this_project->title.
	 "</a> describes evidence as: <a href=".$base_URL."project/".$this_project->id.
	 "/evidence/".$this_evidence->id.$this_evidence->name."</a></p>";

 	}

	}



echo "<br /><br /><br /><br />";

} else {
		
	include("parts/login_sidebar.php");

echo '<div class="mainContainer">
	<div class="ydsf left">
		<div class="inner">
			<div class="main">
<h2>Access Denied</h2>
<p>You are not authorized to view this page.</p>';

}

echo '</div></div></div></div>';

include("parts/footer.php");

echo '</body></html>';
