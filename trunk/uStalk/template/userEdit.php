<form action='./setup.php' method='post'>
<div class='userEdit'>
<input name='currentbid' type='hidden' value='<?=$data['bid']?>' />
<input name='bid' type='text' value='<?=$data['bid']?>' />
<input name='name' type='text' value='<?=$data['name']?>' />
<input name='avatar' type='text' value='<?=$data['avatar']?>' />
<input name='action' type='submit' value='Update'>
<input name='action' type='submit' value='Delete' />
</div>
</form>