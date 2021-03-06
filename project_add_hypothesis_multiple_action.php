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

for( $i = 1; $i <= 4; $i++ ) {

	if ($_REQUEST['label'.$i]!=""){ //WITHOUT THIS, IT WILL ADD BLANK FIELDS AS NEW ROWS

	$active_hypothesis = new Hypothesis();
	$active_hypothesis->project_id = $_REQUEST['project_id'];
	$active_hypothesis->label = $_REQUEST['label'.$i];
	$active_hypothesis->description = $_REQUEST['description'.$i];
	$active_hypothesis->user_id = $active_user->id;
	$active_hypothesis->insertNew();
	}
}

setStatusMessage("Added!");

?>

<html>
<head>
	<title>Updating...</title>
<?php if( $_REQUEST['add_more'] == "on" ) { ?>
	<meta http-equiv=Refresh content="1; url=<?php $base_URL?>project/<?php $active_hypothesis->project_id?>/hypothesis/new/multiple">
<?php } else { ?>
	<meta http-equiv=Refresh content="0; url=<?php $base_URL?>project/<?php $active_hypothesis->project_id?>">
<?php } ?>
</head>



<body>

<?php if( $_REQUEST['add_more'] == "on" ) { ?>
<p>Added.</p>
<?php } ?>

</body>
</html>