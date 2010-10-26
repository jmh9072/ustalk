<?
if($HEAD)
{
	?><title>Login: uStalk</title><?
	linkJS("md5");
	return;
}

//registration form
?>
<h1>Register</h1>
<script type='text/javascript' language="JavaScript"><!--
	function processRegister()
	{
		var pass = document.getElementById('qwerty');
		pass.value = hex_md5(pass.value);
		return true;
	}
//--></script>
<form action="./register.php" method="POST" onSubmit='return processRegister();'>
<span class='error'><?=$error?></span><br />
	User Name: <input name='asdf'id='asdf'  type='text' maxlength='30' /><br />
	Password: <input name='qwerty' id='qwerty' type='password'/><br />

	<input value='Register!' type='submit'>
</form>