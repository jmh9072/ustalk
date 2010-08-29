<?
ob_end_clean();
//header("Connection: close");
//ignore_user_abort(true);
ob_start();
require_once "common.php";

global $error;
$error = false;
$page['noLogin'] = true;
$page['name'] = 'stalk';
$page['template'] = 'stalkTemplate';

if ($_GET["client"] == "Greasemonkey" || $_GET["client"] == "XML" || $_GET["client"] == "xml")
{
  $page['template'] = 'xml';
}
else if ($_GET["client"] == "mini")
{
  $page['template'] = 'ministalk';
}

include "index.php";
$size = ob_get_length();
header ("Content-Length: $size");
session_write_close();


//ob_flush();
ob_end_flush();
flush();
usleep(50000);
ignore_user_abort(true);

//update all users being stalked
ob_start();
$uid = ($_GET['uid']);
if(!$uid)
	$uid = 1;
$stalkees = user::getStalkees($uid);
global $bid;
if(empty($stalkees))
	return;
foreach($stalkees as $prey)
{
	$_GET['bid'] = $prey['bid'];
	include "update.php";
}
ob_clean();
?>