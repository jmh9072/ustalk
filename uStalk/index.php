<?
require_once "common.php";

//display interface
global $HEAD,$BODY;
$HEAD = true;
if(!isset($page['name']) || !file_exists("page/".$page['name'].'.php'))
{
	$page['name'] = "news";
}
if(!isset($page['template']))
{
	$page['template'] = 'main';
}
while(1)
{
	ob_start();
		include "page/".$page['name'].".php";


	if($HEAD)
	{
		$HEAD = false;
		$BODY = true;
		$page['head'] = ob_get_clean();
		continue;
	} else {
		$page['body'] = ob_get_clean();
		break;
	}
}
echo template($page['template'],$page);
?>
