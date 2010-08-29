<?
if($HEAD)
{
	?><title><?=$_SESSION['user']['name']?>'s Setup Page : uStalk</title><?
	return;
}
$stalked = user::listWatched($_SESSION['user']['id']);
?><h2>Setup</h2>
<h5>Navigation: <a href="./setup.php?page=stalk">Stalk Users</a> <a href="./setup.php?page=background">Background</a> <a href="./setup.php?page=account">Account Management</a></h5>
<span class='error'><?=$error?></span><br />
<?
if ($_GET["page"] == "stalk" || !$_GET["page"])
{
?>
Current list of stalkees:<?
if(is_array($stalked))
{
	foreach($stalked as $victim){template("userEdit",$victim);}
}

include "add.php";
?>
<?
} else if ($_GET["page"] == "background")
{
?>
Upload a background:
<br />
<form enctype="multipart/form-data" action="./setup.php?page=background" method="POST">
<input name="background" type="file" /><br />
<input name="action" type="submit" value="Upload" />
</form>
(Supported image types: JPEG, GIF, PNG, BMP)
<?
} else if ($_GET["page"] == "account")
{
?>
<strong>Account Management:</strong>
<form action="./setup.php?page=account" method="POST">
Username: <input name="username" type="text" value="<? echo $_SESSION["user"]["name"]; ?>" readonly="true" />
<br />
Current Password: <input name="currentpass" type="password" />
<br />
New Password: <input name="newpass" type="password" />
<br />
Confirm Password: <input name="confirmpass" type="password" />
<br />
<input name="action" type="submit" value="Change Password" />
</form>
<?
}
else
{
?>
Page does not exist.
<?
}
?>