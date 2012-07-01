<?php

#This File is where all administrative settings should be configured.

global $domain, $base_URL, $email_enabled, $email_address, $versionNumber, $dbhost, $dbusername, $dbuserpassword, $dbname;

# Path Settings
$domain="localhost";
$path="ach";

# Database Settings:
$dbhost = 'localhost';
$dbusername = 'root';
$dbuserpassword = '';
$dbname = 'ach';

# Email Settings
$email_enabled=false;
$email_address="admin@$domain";


# END USER CONFIGURATION OPTIONS.  DO NOT EDIT ANYTHING BEYOND THIS LINE.

$base_URL="$domain/$path";

$versionNumber="1.0.3alpha";