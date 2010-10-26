<?
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
date_default_timezone_set("America/Los_Angeles");

session_start();
//Setup global vars
//Connect to DB
global $db;
require_once "nonsense.php";
require_once "lib/user.php";
require_once "lib/functions.php";
global $page;
ob_start();
include "page/nav.php";
$page['nav'] = ob_get_clean();
?>