<?
$on = false;
if(time() - strtotime($data['on']) < 60 * 15)
	$on = true;
?>
<tr<?=($on? ' style=\'background:url(http://i208.photobucket.com/albums/bb114/CavAvx/online.png) repeat;\'': '')?>>
<td><a href="http://www.bungie.net/Account/Profile.aspx?uid=<?=$data['bid']?>"> <img src="<?=$data['avatar']?>" alt="Offline... Possibly."></a></td>
<td><?=$data['name']?></td>
<td><?=date("n/j/Y",strtotime($data['on']))?></td>
<td><?=date("H:i",strtotime($data['on']))?></td>
</tr>
