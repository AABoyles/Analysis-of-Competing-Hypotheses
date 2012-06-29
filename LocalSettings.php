<?php

#This File is where all administrative settings should be configured.

global $domain, $base_URL, $email_enabled, $email_address, $versionNumber, $dbhost, $dbusername, $dbuserpassword, $dbname;

$domain="localhost";
$base_URL="$domain/ach";

$email_enabled=false;
$email_address="admin@$domain";

# You are configuring Analysis of Competing Hypotheses
$versionNumber="1.0.3alpha";

# Database Settings:
$dbhost = 'localhost';
$dbusername = 'root';
$dbuserpassword = 'foo';
$dbname = 'ach';