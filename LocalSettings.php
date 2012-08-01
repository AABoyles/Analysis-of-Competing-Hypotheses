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

# System Settings
$allowAnons = TRUE;
error_reporting(E_ALL);

# END USER CONFIGURATION OPTIONS.  DO NOT EDIT ANYTHING BEYOND THIS LINE.

$baseURL="http://$domain/$path";

$versionNumber="1.1beta";