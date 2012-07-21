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

<h2>Hypotheses</h2> 
<p>Hypotheses are added via <a href="howto_hypotheses.php">a simple tool (called Enter Hypotheses)</a> that asks for a short, descriptive label and a more detailed explanation. <b>Note:</b> You may only add, remove, and edit hypotheses if you are the project owner, the person designated as the administrator.</p>
<p>Deciding what hypotheses to evaluate is the first step in ACH. Hypotheses must be carefully considered and worded, as they form the foundation  on which the analysis is built. Input from several different analysts with different perspectives is strongly encouraged.</p> 
<p>A hypothesis is a testable proposition about what is true, or about what has, is, or will happen. It should usually be worded as a positive  statement that can be disproved. Try to develop hypotheses that meet two tests: 
<ol><li>the hypotheses cover all reasonable possibilities, including  those that seem unlikely but not impossible, and </li> 
<li>the hypotheses are mutually exclusive. That is, if one hypothesis is true, then all other  hypotheses must be false.
</li></ol>
</p> <p>Sometimes it is useful to think of a hypothesis as a set of unique stories of how an event played out or will play out.  As evidence is collected and added to the matrix, you may find that hypotheses need to be reworded, refined, split into two hypotheses, combined,  added, or deleted.</p> 
<p>When deciding whether to include an unlikely hypothesis, consider whether the hypothesis is virtually impossible or simply unproven because  there is no evidence for it. For example, the possibility that an adversary is trying to deceive you should not be rejected just because you see  no evidence of deception. If deception is done well, you should not expect to find evidence of it readily at hand. The possibility should not be  rejected until it is disproved, or, at least, until after you have made a systematic search for evidence and found it lacking.</p>
<p>If you\'re ready to start adding hypotheses, we have a <a href="howto_hypotheses.php">set of instructions</a>. Then come back here and learn about <a href="evidence.php">evidence</a>.</p>
</div></div></div></div></div></div></div></div>';

include("parts/footer.php");

echo '</body></html>';
