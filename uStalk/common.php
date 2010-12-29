<?
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
date_default_timezone_set("America/Los_Angeles");

session_start();
//Setup global vars
//Connect to DB
global $db;

//Load settings
$settings = include "settings.php";

//connect to db
if(array_key_exists('mysql', $settings)) {
	$db = @mysql_connect($settings['mysql']['host'], $settings['mysql']['username'], $settings['mysql']['password']);

	if(mysql_errno()) {
		print(mysql_errno());
		die("Error connecting to database, contact ".$settings['contact_name']." immediately");
	}

	mysql_select_db($settings['mysql']['db']);
} else {
	die('You must provide a local settings file telling ustalk what mysql server to connect to. At the moment no other databases are supported.');
}

require_once "lib/user.php";
require_once "lib/functions.php";
global $page;
ob_start();
include "page/nav.php";
$page['nav'] = ob_get_clean();
?>
