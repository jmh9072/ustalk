<?
$on = false;
if(time() - strtotime($data['on']) < 60 * 15)
	$on = true;
?>
<TR<?=($on? ' BGCOLOR="GOLD"': '')?>>
<TD><A HREF="http://www.bungie.net/Account/Profile.aspx?uid=<?=$data['bid']?>"> <img src="<?=$data['avatar']?>" ALT="Offline... Possibly."></A></TD>
<TD><?
echo $data['name'];
echo "<BR /><FONT SIZE=2>";
echo "<A HREF=\"http://www.bungie.net/Account/Profile.aspx?uid=".$data['bid']."\">Profile</A></FONT>";
?></TD>
<TD><?=date("n/j/Y",strtotime($data['on']))?></TD>
<TD><?=date("g:i A",strtotime($data['on']))?></TD>
</TR>
