<?php

include("code/includes.php");

$active_user = new User();

if (array_key_exists('username', $_REQUEST)){
	$username = $_REQUEST['username'];
	$active_user->populateFromUsername($username);
}

echo '
<!DOCTYPE html><html><head><title>ACH: Help</title>';

include("parts/includes.php");

echo "<script src='js/tools.js'></script></head>";

include("parts/header.php"); 

if( $active_user->logged_in ) {
	include("parts/menu_sidebar.php");} 
else {
	include("parts/login_sidebar.php");
	echo '</div>';}

echo '<div class="mainContainer"><div class="ydsf left"><div class="inner"><div class="help">
<div class="fontSize"><a href="javascript:changeFontSize(1)" style:font-size="14px">Enlarge font</a><br /><a href="javascript:changeFontSize(-1)" style:font-size="8px">Shrink font</a></p></div>

<h2>Entering and Editing Hypotheses</h2>
<p>Only the Project Owner has permission to add hypotheses. You may do so immediately after creating a project, or by clicking the Enter Hypotheses tab underneath the large Project heading.</p>
<p>On the Enter Hypotheses page, type a brief description of your first hypothesis into the Label field; what you type here will always be displayed at the top of your hypothesis columns. If you like, you can add more details to this hypothesis in the Description field. When viewing the matrix, you can reveal this detailed description by moving your mouse over the label.</p>
<p>When finished, click Save.</p>
<p>If you are adding a new hypothesis to an ongoing project, be sure to consult with the other group members before doing so. Adding a new hypothesis may alter their understanding, and thus their consistency scores, of the existing hypotheses.</p>

<h2>Editing Hypotheses</h2>
<p>Only the project owner may edit hypotheses. This is because different members of the project will be filling in their matrices at different times. It is important that evaluations of hypotheses not be affected by small changes in wording.</p>
<p>If you are the project owner, you can edit a hypothesis by clicking its label at the top of a matrix. On the following page, click the "Edit hypothesis information" link. This page will also let you delete the hypothesis using the red "Delete hypothesis" link.</p>
</div></div></div></div></div></div></div></div>';

include("parts/footer.php");

echo '</body></html>';
