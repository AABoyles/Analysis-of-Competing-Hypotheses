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
include("parts/includes.php");


$project_id = $_REQUEST['project_id'];
$this_project = new Project();
$this_project->populateFromId($project_id);

$viewerEmail = $_REQUEST['viewerEmail'];

$found = FALSE;

$result = achquery("SELECT * FROM users WHERE email='$viewerEmail' LIMIT 1");
while($query_data = mysql_fetch_array($result)) {
	$user_id = $query_data['id'];
	$user_name = $query_data['name'];
	$user_email = $query_data['email'];
	achquery("INSERT INTO users_in_projects_view_only (user_id, project_id) VALUES ('$user_id', '$this_project->id')");
	$found = TRUE;
	sendMail($user_email, "[ACH] Project view invitation.", "Hello,\r\n\r\nYou have been invited to view project '" . $this_project->title . "':\r\n " . $base_URL . 'project/' . $this_project->id . "\r\n\r\n - The ACH Bot");

}

if( $found ) { ?>

<span class="inviteViewerResult">'<?php $user_name?>' added (reload page to see).</span>

<?php } else { ?>

<span class="inviteViewerResult">'<?php $viewerEmail?>' not found.</span>

<?php } ?>