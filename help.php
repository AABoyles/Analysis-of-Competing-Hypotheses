<?php

include("code/includes.php");

$display_user = new User();

if(array_key_exists('username', $_REQUEST)){
	$username = $_REQUEST['username'];
	$display_user->populateFromAttribute($username, "username");
}

echo '<!DOCTYPE HTML><html><head><title>ACH: Help</title>';

include("parts/includes.php");
echo '<script src="js/tools.js"></script></head>';
include("parts/header.php"); 
	
if( $active_user->logged_in ) {
	include("parts/menu_sidebar.php");} 
else {
	include("parts/login_sidebar.php");
	echo '</div>';}

echo '
<div class="mainContainer">

<div class="ydsf left"><div class="inner">

<h2>ACH Help Documents</h2>

	<h3>The ACH Methodology</h3>
		
	<p><a href="ach.php">What is ACH?</a>: An introduction to the concept.</p>
	<p><a href="ach_2.php">ACH: A 9-Step Process</a>: step-by-step instructions, along with a sample product.</p>
	<p><a href="collaboration_steps.php">ACH as a Collaborative Process</a></p>
	<p><a href="hypotheses.php">Choosing Hypotheses</a></p>
	<p><a href="evidence.php">Choosing Evidence</a></p>
	<p><a href="rate_consistency.php">Rating the Consistency of Your Evidence</a></p>
	
	<h3>The ACH Software</h3>
	<p><a href="howto_collaborate.php">ACH\'s Collaboration Tools</a></p>
	<p><a href="howto_hypotheses.php">Entering and Editing Hypotheses</a></p>
	<p><a href="howto_evidence.php">Entering and Editing Evidence and Arguments</a></p>	
	<p><a href="howto_matrices.php">Working With Matrices</a></p>
	<p><a href="howto_project_management.php">Project Management</a></p>

</div></div></div></div></div></div></div>';

include("parts/footer.php");

echo '</body></html>';
