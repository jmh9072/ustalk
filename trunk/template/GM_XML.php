<user>
<online><?
if(time() - strtotime($data['on']) - 60 * 60 * 0 < 15 * 60)
  echo 1;
else
  echo 0;
?></online>
<uid><?=$data['bid']?></uid>
<avatar><?
$avatar = $data['avatar'];
echo ereg_replace("&", "&amp;", $avatar);
?></avatar>
<name><?=$data['name']?></name>
<date><?=date("n/j/Y",strtotime($data['on']))?></date>
<time><?=date("H:i",strtotime($data['on']))?></time>
</user>