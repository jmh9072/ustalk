<li><a href='./'>Home</a></li>
<? if($_SESSION['user']){?>
<li><a href='./setup.php'>Setup</a></li>
<li><a href='./stalk.php?uid=<?=$_SESSION['user']['id']?>'>Stalk</a></li>
<?//<li><a href='./newStalk.php?uid=<?=$_SESSION['user']['id']?><?//'>newStalk</a></li>?>
<li><a href='./logout.php'>Logout</a></li>
<? } else { ?>
<li><a href='./register.php'>Register</a></li>
<? } ?>
<li><a href='./stalk.php?uid=1'>Mod Stalk</a></li>
<li><a href='./about.php'>About</a></li>
</ul>