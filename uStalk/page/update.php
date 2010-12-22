<?

if($HEAD)
	return;
//get user ID

$bids = array_key_exists('bid', $_GET) ? explode(",",$_GET['bid']) : false;

if($bids === false) {
	echo "<message>No User Specified</message>";
	return false;
}

$intval = function($val) { return intval($val); };

$bids = array_map($intval, $bids);

require_once "lib/bungie.php";

$users = bungie::updateUsers($bids);
foreach($users as $user) {
	echo template("userXML",$user);
}

?>
