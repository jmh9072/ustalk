<?
require_once "common.php";

global $error;
$error = false;
$page['name'] = 'login';
if(isset($_POST['tyui']))
{
	if(!user::login($_POST['tyui'],$_POST['ghjk'],$_SESSION['challenge']))
	{
		header ("Location: ./index.php?login_fail=true");
		exit;
	}
	if(!$error)
	{
		header("location: ./setup.php");
		return;
	}
}
if($_SESSION['user'])
{
		header("location: ./setup.php");
		return;
}
include "index.php";
?>