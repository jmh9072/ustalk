<li><a href='./'>Home</a></li>
<? if($_SESSION['user']){?>
<li><a href='./setup.php'>Setup</a></li>
<li><a href='./uStalk.php?uid=<?=$_SESSION['user']['id']?>'>Stalk</a></li>
<li><a href='./logout.php'>Logout</a></li>
<? } else { ?>
<li><a href='./register.php'>Register</a></li>
<? } ?>
<li><a href='./about.php'>About</a></li>