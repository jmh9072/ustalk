<?
require_once "common.php";
user::requireLogin();
global $error;
$error = false;
$page['name'] = 'setup';
if ($_POST['action'] == "Delete")
{
	//delete user from list of stalkees
	if (user::delete($_SESSION['user']['id'],
			$_POST['bid']))
		$error='User successfully deleted.';
	else
		$error='User could not be deleted.';
}
if ($_POST['action'] == "Update")
{
	//update user with new info
	if (user::update($_SESSION['user']['id'],
			$_POST['bid'],
			$_POST['name'],
			$_POST['avatar']))
		$error='User successfully updated.';
	else
		$error='User could not be updated.';
}
if($_POST['action'] == "Stalk!")
{
	//add user to list of stalkees
	if(user::stalk($_SESSION['user']['id'],
			$_POST['uid'],
			$_POST['alias'],
			$_POST['avatar']))
		$error='User Successfully Added';
	else 
		$error='Unable to Stalk User';
}
if ($_POST['action'] == "Upload")
{
	$target = "./images/backgrounds/" . $_SESSION['user']['id'] . ".img";
	$allowed = true;

	if (!($_FILES["background"]["type"] = "image/jpeg" || $_FILES["background"]["type"] = "image/gif" || $_FILES["background"]["type"] = "image/png" || $_FILES["background"]["type"] = "image/bmp"))
	{
		$error = "The file type you have attempted to upload is unsupported.";
		$allowed = false;
	}

	if ($allowed == true)
	{
		if(move_uploaded_file($_FILES['background']['tmp_name'], $target))
		{
			$error = "Image uploaded successfully.";
		}
		else
		{
			$error = "Sorry, there was a problem uploading your file.";
		}
	} 
}
if ($_POST['action'] == "Change Password")
{
	$currentpass = md5($_POST['currentpass']);
	$newpass = md5($_POST['newpass']);
	$confirmpass = md5($_POST['confirmpass']);
	if ($newpass == $confirmpass)
	{
		if(user::changepass($_SESSION['user']['id'], $currentpass, $newpass))
			$error = "Password changed successfully.";
		else
			$error = "Incorrect current password. Please try again.";
	}
	else
	{
		$error = "Sorry, but your passwords did not match.";
	}
}
include "index.php";
?>