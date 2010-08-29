<?
if($_SESSION['user'] || $page['noLogin'] === true)
	return;
if($HEAD)
	return;

//login form
	linkJS("sha1");
	linkJS("md5");
?>
<div class='login'>
<form action="./login.php" method="POST" onSubmit='return process();'>
<span class='error'><?=$error?>&nbsp;</span><br />
	User Name: <input name='tyui'id='tyui'  type='text' maxlength='30' /><br />
	Password: <input name='ghjk' id='ghjk' type='password'/><br />
<script type='text/javascript' language="JavaScript"><!--
		var challenge = '<?
		if(!$_SESSION['challenge'])
		{
		        $challenge;
			for ($i = 0; $i < 10; $i++) {
	    			$challenge .= dechex(rand(0, 15));
			}
		    	$_SESSION['challenge'] = $challenge;
		}
		echo $_SESSION['challenge'];
		?>';
	function process()
	{
		var pass = document.getElementById('ghjk');
		pass.value = hex_hmac_sha1(challenge,hex_md5(pass.value));
		return true;
	}
//--></script>
	<input value='Login!' type='submit' >
</form>
</div>