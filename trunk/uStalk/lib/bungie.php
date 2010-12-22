<?
class bungie
{
	static function getUser($bid)
	{
		$bid = mysql_escape_string($bid);
		$query = 'SELECT * FROM bungie WHERE id=\''.$bid.'\'';
		$result = mysql_query($query);
		return mysql_fetch_assoc($result);
	}
	static function addUser($bid)
	{
		$bid = mysql_escape_string($bid);
		$sql = 'INSERT INTO `bungie` (`id`, `on`, `update`) VALUES (\''.$bid.'\', NULL, \'2007-07-07 03:43:00\');';
		$result = mysql_query($sql);
		if(mysql_errno())
		{
			if(mysql_errno()  == 1062)
				return true;
			echo mysql_errno()." : ".mysql_error();
			echo "Please report this error to jmh9072";
			return false;
		}
	}
	static function updateUser($bid,$time,$userpost)
	{
		$bid = mysql_escape_string($bid);
		$time = mysql_escape_string(date( 'Y-m-d H:i:s',$time));
		$userpost = mysql_escape_string($userpost);
		$sql = 'UPDATE `bungie` SET `on` = \''.$time.'\', '
				.'`update` = \''.mysql_escape_string(date('Y-m-d H:i:s',time()))
				.'\', `userpost` = \''.$userpost
				.'\' WHERE `id` = \''.$bid.'\' LIMIT 1;';
		$result = mysql_query($sql);
		if(mysql_errno())
		{
			echo mysql_errno()." : ".mysql_error();
			echo "Please report this error to jmh9072";
		}
	}
	static function addName($bid, $name)
	{
		$bid = mysql_escape_string($bid);
		$name = mysql_escape_string($name);
		$sql = 'UPDATE `bungie` SET `name` = \''.$name.'\' WHERE `id` = \''.$bid.'\' LIMIT 1;';

		$result = mysql_query($sql);
		if(mysql_errno())
		{
			echo mysql_errno()." : ".mysql_error();
			echo "Please report this error to jmh9072";
		}
	}

	static function setLastUpdate($bid, $lastUpdateTime)
	{
		$bid = mysql_escape_string($bid);
		$length = mysql_escape_string($length);
		$sql = 'UPDATE `bungie` SET `update` = \''.mysql_escape_string(date('Y-m-d H:i:s', $lastUpdateTime)).'\' WHERE `id` = \''.$bid.'\' LIMIT 1;';

				$result = mysql_query($sql);
		if(mysql_errno())
		{
			echo mysql_errno()." : ".mysql_error();
			echo "Please report this error to jmh9072";
		}
	}

	static function getUserUpdate($bid) {
		$user = bungie::getUser(intval($bid));
		if($user) {
			$lastUpdate = strtotime($user['update']);
			if(time() - $lastUpdate < 60 * 30) {	//30 minute update max freq.
				return $user;
			}
		} else {
			bungie::addUser($bid);
			$user = bungie::getUser($bid);
		}

		bungie::setLastUpdate($bid, time()); //prevent this script's running more than once on the same user at the same time

		//curl to bungie server,
		require_once "lib/dataAccess.php";
		if (!$user['name'] || $user['userpost'] == 0) {
			$data = getRemoteHTMLBody("http://www.bungie.net/Account/profile.aspx?uid=".$user['id']);
			$expression = '/(Last Active: <span id="ctl00_mainContent_header_lblLastActive">)([^<]*)/';
			$expression2 = '/(<span id="ctl00_mainContent_header_lblUsername">)([^<]*)/';
			$num = preg_match($expression2, $data, $name);
			if(empty($name)) {
				bungie::setLastUpdate($bid, time() + 172800); //don't try to update again for two days
				return "User does not exist.";
			} else {
				$user['name'] = $name[2];
				bungie::addName($bid, $name[2]);
			}
		}
		sleep(2);
		if ($user['userpost'] == 0) {
			$data2 = getRemoteHTMLBody("http://www.bungie.net/Search/default.aspx?g=5&q=".urlencode($user['name']));
			$expression3 = '/(strong[^<]*<a href="\/Forums\/posts.aspx\D*)(\d*)/';
			$num3 = preg_match($expression3, $data2, $userpost);
			sleep(3);
		} else {
			$userpost[2] = $user['userpost'];
		}
		$data3 = getRemoteHTMLBody("http://www.bungie.net/Forums/posts.aspx?postID=".$userpost[2]);
		$data3 = urldecode($data3);
		$exp = '/"(.*)"/';
		sleep(2);

		$num4 = preg_match($exp, $data3, $userpostthread);
		$userpostthread[1] = "http://www.bungie.net".$userpostthread[1];
		$userpostthread[1] = ereg_replace("amp;", "", $userpostthread[1]);
		$data4 = getRemoteHTMLBody($userpostthread[1]);

		$exp2 = '/'.$user['name'].'<\/a>.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*last post: (.*) P/m';
		$num5 = preg_match($exp2, $data4, $activity);

		if(empty($activity)) {
			bungie::setLastUpdate($bid, time() + 86400); //don't try to update again for one day
			return "Error retrieving last activity";
		}
		$activity[1] = ereg_replace("\.", "/", $activity[1]);
		//$activity[2] = $activity[2] . " 12:00:00 AM";

		//if (strtotime($activity[1]) > strtotime($user['on']))
		bungie::updateUser($user['id'],strtotime($activity[1]), $userpost[2]);
		$user = bungie::getUser($user['id']);		//TODO: Figure out why on the first call this returns garbage info.
		return $user;
	}

	static function updateUsers($bids) {
		$result_array = array();
		foreach($bids as $bid) {
			array_push($result_array, bungie::getUserUpdate($bid));
		}
		return $result_array;
	}
}
?>
