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

header("Content-type: application/xml");

echo('<?xml version="1.0" encoding="ISO-8859-1"?>');

include("code/includes.php");

$active_evidence = new Evidence();
$active_evidence->populateFromId($_REQUEST['evidence_id']);

$this_user = new User();
$this_user->populateFromId($active_evidence->user_id);

$active_project = new Project();
$active_project->populateFromId($active_evidence->project_id);
$active_project->getEandH();
$active_project->getUsers();

$this_group_diag = Evidence::getDiagGroup($active_evidence, $active_project);

?>

<evidence>
	<id><?php $active_evidence->id?></id>
	<name><![CDATA[<?php $active_evidence->name?>]]></name>
	<details><![CDATA[<?php $active_evidence->details?>]]></details>
	<classification><?php showClassification($active_evidence->classification)?></classification>
	<caveat><?php showCaveat($active_evidence->caveat)?></caveat>
	<type><?php $active_evidence->type?></type>
	<serial_number><?php $active_evidence->serial_number?></serial_number>
	<date_of_source><?php substr($active_evidence->date_of_source, 0, 10)?></date_of_source>
	<group_diagnosticity><?php $this_group_diag?></group_diagnosticity>
	<code><?php $active_evidence->code?></code>
	<flag><?php $active_evidence->flag?></flag>
	<creator><?php $this_user->name?></creator>
	<creator_id><?php $this_user->id?></creator_id>
	<date_created><?php $active_evidence->created?></date_created>
</evidence>