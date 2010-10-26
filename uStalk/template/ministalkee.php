<?
$on = false;
if(time() - strtotime($data['on']) < 60 * 15)
	$on = true;
?>
<TR<?=($on? ' style=\'background:url(http://i208.photobucket.com/albums/bb114/CavAvx/online.png) repeat;\'': '')?>>
<TD><A HREF="http://www.bungie.net/Account/Profile.aspx?uid=<?=$data['bid']?>"> <img src="<?=$data['avatar']?>" ALT="Offline... Possibly."></A></TD>
<TD><?=$data['name']?></TD>
<TD><?=date("n/j/Y",strtotime($data['on']))?></TD>
<TD><?=date("H:i",strtotime($data['on']))?></TD>
</TR>
