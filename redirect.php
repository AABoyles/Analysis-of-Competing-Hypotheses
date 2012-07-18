<?php

if ( ! isset( $redirectURL ) ) {
	$redirectURL = 'index.php';
}

echo "<!DOCTYPE html><html><head><title>Updating...</title><meta http-equiv=Refresh content='0; url=$redirectURL'></head></html>";
