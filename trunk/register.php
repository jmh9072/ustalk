<?
require_once "common.php";

global $error;
$error = false;
$page['name'] = 'register';
if(isset($_POST['asdf']) && !empty($_POST['asdf']))
{
	if(!user::add($_POST['asdf'],$_POST['qwerty']))
		$error = 'Unable to Register username, username already taken.';
	if(!$error)
		$error = 'Registration successful, please login';
}

include "index.php";
?>