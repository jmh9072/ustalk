<?

if($HEAD)
	return;
//get user ID
if(!intval($_GET['bid']))
{
	echo "<message>No User Specified</message>";
	return false;
}

//echo $bid;
$bids = explode(",",$_GET['bid']);
//print_r($bids);
require_once "lib/bungie.php";

foreach($bids as $bid)
{
	$user = bungie::getUser(intval($bid));
	if($user)
	{
		$lastUpdate = strtotime($user['update']);
		if(time() - $lastUpdate < 60 * 30)	//30 minute update max freq.
		{
			echo template("userXML",$user);
			continue;
		}
	} else {
		bungie::addUser($bid);
		$user = bungie::getUser($bid);
	}

	bungie::setLastUpdate($bid, time()); //prevent this script's running more than once on the same user at the same time

	//curl to bungie server, 
	require_once "lib/dataAccess.php";
	if (!$user['name'] || $user['userpost'] == 0)
	{
	  $data = getRemoteHTMLBody("http://www.bungie.net/Account/profile.aspx?uid=".$user['id']);
	  $expression = '/(Last Active: <span id="ctl00_mainContent_header_lblLastActive">)([^<]*)/';
	  $expression2 = '/(<span id="ctl00_mainContent_header_lblUsername">)([^<]*)/';
	  $num = preg_match($expression2, $data, $name);
	  if(empty($name))
	  {
	  	echo "<message>User does not exist</message>";
	  	bungie::setLastUpdate($bid, time() + 172800); //don't try to update again for two days
	  	continue;
	  }
	  else
	  {
	  	$user['name'] = $name[2];
	  	bungie::addName($bid, $name[2]);
	  }
	}
sleep(2);
if ($user['userpost'] == 0)
{
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

	if(empty($activity))
	{	
		echo "<message>Error retrieving last activity.</message>";
		bungie::setLastUpdate($bid, time() + 86400); //don't try to update again for one day
		continue;
	}
	$activity[1] = ereg_replace("\.", "/", $activity[1]);
	//$activity[2] = $activity[2] . " 12:00:00 AM";

	//if (strtotime($activity[1]) > strtotime($user['on']))
		bungie::updateUser($user['id'],strtotime($activity[1]), $userpost[2]);
	$user = bungie::getUser($user['id']);
	echo template("userXML",$user);
}
?>
