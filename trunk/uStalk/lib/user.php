<?
require_once "bungie.php";

class user {
	static function login($un,$pass,$key)
	{
		$un = mysql_escape_string($un);
		$pass = mysql_escape_string($pass);
		$key = mysql_escape_string($key);
		$query = 'SELECT * FROM user WHERE name=\''.$un.'\'';
		$result = mysql_query($query);
		if(mysql_errno())
		{
			echo mysql_errno()." : ".mysql_error();
			echo "Please report this error to jmh9072";
		}
		$result = mysql_fetch_assoc($result);
		if(hash_hmac('sha1',$result['pass'],$key) ==  $pass)
		{
			//login successful
			session_regenerate_id();
			$_SESSION['user'] = $result;
			return true;
		} else {
			$_SESSION['user'] = false;
			return false;
		}
	}

	static function add($un,$pass)
	{
		$un = mysql_escape_string($un);
		$pass = mysql_escape_string($pass);
		$query = 'INSERT INTO `user` (`id`, `name`, `pass`) VALUES (NULL, \''.$un.'\', \''.$pass.'\');';
		$result = mysql_query($query);
		if(mysql_errno())
		{
			if(mysql_errno() == 1062)
				return false;
			echo mysql_errno()." : ".mysql_error();
			echo "Please report this error to jmh9072";
			return false;
		}
		return true;
	}
	static function logout()
	{
		$_SESSION['user'] = false;
	}

	static function requireLogin()
	{
		if($_SESSION['user'])
			return;
		header("location: ./");
		die();
	}

	static function stalk($stalker,$bid,$alias,$avatar)
	{
		$stalker = mysql_escape_string(strip_tags($stalker));
		$bid = mysql_escape_string(strip_tags($bid));
		$alias = mysql_escape_string(strip_tags($alias));
		$avatar = mysql_escape_string(strip_tags($avatar));
		$query = 'INSERT INTO `uwatch` (`id`, `bid`, `name`, `avatar` ) VALUES (\''
				.$stalker.'\', \''.$bid.'\', \''.$alias.'\',\''.$avatar.'\');';
		$result = mysql_query($query);
		if(mysql_errno())
		{
			if(mysql_errno() == 1062)
			{
				$error = 'Duplicate Entry';
				return false;
			}
			$error =  mysql_errno()." : ".mysql_error()
				."Please report this error to jmh9072";
			return false;
		}
		bungie::addUser($bid);
		return true;
	}

	static function getStalkees($uid)
	{
		$uid = mysql_escape_string($uid);
		$query='SELECT * FROM bungie,uwatch WHERE uwatch.bid=bungie.id AND uwatch.id=\''.$uid.'\''
			.'ORDER BY `on` DESC';
		$result = mysql_query($query);
		if(mysql_errno())
		{
			$error =  mysql_errno()." : ".mysql_error()
				."Please report this error to jmh9072";
			return false;
		}
		$stalkees;
		while($row =mysql_fetch_assoc($result)) $stalkees[] = $row;
		return $stalkees;

	}
	static function listWatched($uid)
	{
		$uid = mysql_escape_string($uid);
		$query = 'SELECT * FROM uwatch WHERE uwatch.id = \''.$uid.'\'';
		$result = mysql_query($query);
		if(mysql_errno())
		{
			echo $error =  mysql_errno()." : ".mysql_error()
				."Please report this error to jmh9072";
			return false;
		}
		$stalkees = array();
		while($row =mysql_fetch_assoc($result)) $stalkees[] = $row;
		return $stalkees;
	}

	static function delete($id, $bid)
	{
		$id = mysql_escape_string(strip_tags($id));
		$bid = mysql_escape_string(strip_tags($bid));
		$query="DELETE FROM `uwatch` WHERE `uwatch`.`id` = ".$id." AND `uwatch`.`bid` = ".$bid." LIMIT 1";
		$result = mysql_query($query);
		if(mysql_errno())
		{
			$error =  mysql_errno()." : ".mysql_error()
				."Please report this error to jmh9072";
			return false;
		}
		return true;
	}

	static function update($id, $bid, $alias, $avatar, $currentbid)
	{
		$id = mysql_escape_string(strip_tags($id));
		$bid = mysql_escape_string(strip_tags($bid));
		$alias = mysql_escape_string(strip_tags($alias));
		$avatar = mysql_escape_string(strip_tags($avatar));
		$query = "UPDATE `uwatch` SET `bid` = '".$bid."', `name` = '".$alias."', `avatar` = '".$avatar."' WHERE `uwatch`.`id` = ".$id." AND `uwatch`.`bid` = ".$currentbid." LIMIT 1;";
		$result = mysql_query($query);
		if(mysql_errno())
		{
			$error =  mysql_errno()." : ".mysql_error()
				."Please report this error to jmh9072";
			return false;
		}
		if ($currentbid != $bid)
			bungie::addUser($bid);
		return true;
	}
	static function changepass($id, $currentpass, $newpass)
	{
		$query = "UPDATE `user` SET `pass` = '".$newpass."' WHERE `id` = ".$id." AND `pass` = '".$currentpass."' LIMIT 1;";
		$result = mysql_query($query);
		if(mysql_errno())
		{
			$error =  mysql_errno()." : ".mysql_error()
				."Please report this error to jmh9072";
			return false;
		}

		$query2 = "SELECT `pass` FROM `user` WHERE `id` = ".$id." LIMIT 1";
		$result2 = mysql_result(mysql_query($query2), 0);
		if(mysql_errno())
		{
			$error =  mysql_errno()." : ".mysql_error()
				."Please report this error to jmh9072";
			return false;
		}

		if ($result2 == $newpass)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>
