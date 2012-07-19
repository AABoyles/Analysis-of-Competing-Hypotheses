<?php

include(__DIR__."/../code/includes.php");

$active_user = new User();
$active_user->eraseCookies();

$redirectURL = "$baseURL/index.php";
require("$baseURL/redirect.php");
