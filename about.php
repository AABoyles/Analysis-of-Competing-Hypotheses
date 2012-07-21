<?php

include("code/includes.php");

echo '<!DOCTYPE html><html><head><title>ACH: Help</title>';

include("parts/includes.php");

echo '</head>';

include("parts/header.php");

echo "<div class='mainContainer'><div class='ydsf left'><div class='inner'>
<h2>About this instance</h2>
<p>You are running Open Source ACH version $versionNumber. Updates might be available at <a href='http://aaboyles.github.com/Analysis-of-Competing-Hypotheses/'>the project's homepage.</a></p> 
<p>This software and all modifications to it are licensed under the <a href='http://www.gnu.org/copyleft/gpl.html'>GNU General Public License, version 3.</a></p>
</div></div></div></div></div></div></div>";

include("/parts/footer.php");

echo '</body></html>';
