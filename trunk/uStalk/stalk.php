<?
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
} else if ($_GET['client'] == 'json') {
  $page['template'] = 'json';
}


include "index.php";
$size = ob_get_length();
header ("Content-Length: ".$size);
session_write_close();

//ob_flush();
ob_end_flush();
ob_end_flush();	//TODO //HACK TEMPORARY TO MAKE r36 work in production.
flush();
ignore_user_abort(true);


//update all users being stalked
require_once('lib/bungie.php');
$uid = array_key_exists('uid', $_GET) ? intval($_GET['uid']) : 1;
//TODO: Should make the query return "The right thing" instead of reducing down later.
//Also note: Query should only suggest things that might possibly need updating (The query should include a timestamp check).
$stalkees = array_map(function($val) { return $val['bid']; }, user::listWatched($uid));

if(empty($stalkees))
	return;

//TODO: This should be refactored into lib/bungie.php, but that doesn't get the settings...
if($settings['beanstalk']) {
	require_once('Pheanstalk/pheanstalk_init.php');
	$pheanstalk = new Pheanstalk($settings['beanstalk']['host']);
	$tube = $pheanstalk->useTube($settings['beanstalk']['tube']);

	//Add to beanstalk queue, then exit.
	foreach($stalkees as $bid) {
		$tube->put(strval($bid));
	}
} else {
	bungie::updateUsers($stalkees);
}

?>
