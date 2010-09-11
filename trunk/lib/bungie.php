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
}
?>