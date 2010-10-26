<?
if($HEAD)
{
	?><title>News : uStalk</title><?
	return;
}

//news
if ($_GET["login_fail"])
{
	echo "<br /><br /><font color='red'>Error: Username/Password Combination does not exist.</font>";
}
?>
</font>
<h1>uStalk is back!</h1>
<p>uStalk has been optimized in order to make sure that we do not lose access to bungie.net like we did before. Users' last post times are less frequently updated and we have reduced the number of page fetches we need to make per update.</p>
