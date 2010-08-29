<?
function template($page,$data=Array())
{
	if(!file_exists("template/".$page.".php"))
		return false;
	include "template/".$page.".php";
}
function linkCSS($name)
{
	echo "<link type='text/css' rel='stylesheet' href='./css/$name.css' />";
}
function linkJS($name)
{
	echo "<script type='text/javascript' src='js/$name.js' ></script>";
}
function getTimeMS()
{
	$timeofday = gettimeofday();
	return 1000*($timeofday['sec'] + ($timeofday['usec'] / 1000000));
}

function randomMessage()
{
	//return a random message
	$message = rand(0,20);
	
	switch($message)
	{
	case 1:
		return "Stalking your mom since 1999";
	case 2:
		return "No, we have no original jokes";
	case 3:
		return "Who doesn't like to stalk?";
	case 4:
		return "Looking into other people's business";
	case 5:
		return "Doing your dirty work for you";
	case 6:
		return "3.1415926535897932384626";
	case 7:
		return "7 is darker";
	case 8:
		return "Downtime? What downtime? :)";
	default:
		return "Bungie Rocks!";
	}
}
?>