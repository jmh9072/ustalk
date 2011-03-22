<form method="POST" action='./setup.php' onSubmit='return validate();'>
Add a user:
<br />
UID: <input id='uid' name='uid' type='text' /><span id='uidError' class='error'>&nbsp;</span><br />
Alias: <input id='alias' name='alias' type='text' /><span id='aliasError' class='error'>&nbsp;</span><br />
Avatar: <input id='avatar' name='avatar' type='text' /><span id='avatarError' class='error'>&nbsp;</span><br />
<script type="text/JavaScript" language="JavaScript"><!--
function validate()
{
	var alias = document.getElementById('alias');
	var uid = document.getElementById('uid');
	var uidError = document.getElementById('uidError');
	var avatar = document.getElementById('avatar');
	var avatarError = document.getElementById('avatarError');
	var result = true;
	var temp;
	/*
	if(!((avatar.value.search(/(http|https):\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/i))[0]))
	{
		avatarError.innerHTML = 'You Must Enter a Valid URL';
		result = false;
	}
  */ 
  //if(!((uid.value.search(/[0-9]*/i))))
  /* {
		if(uid.value=='undefined')
		{
			uid.value='';
		}
		uidError.innerHTML = 'You Must Enter a Valid UID';
		result = false;
	}
	*/
	return result;
}
//--></script>
<input name='action' value='Stalk!' type='submit'>
</form>