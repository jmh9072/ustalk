<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' >
<head>
<?
echo $data['head'];
linkCSS('default');
if (stristr($_SERVER['HTTP_USER_AGENT'], "AppleWebKit"))
	linkCSS('webkit');

if (file_exists('local_tracking.php')) {
  include 'local_tracking.php';
}
?>
</head>
<body>
<div class='header'><div class='logo'></div></div><div class='msg'><?=randomMessage()?></div>
<div class='nav'>
<ul>
<?=$data['nav']?>
</ul>
</div>
<div class='body'>
<?=$data['body']?>
</div>
<?
include "page/login.php";
?>
<div class="version">
uStalk v1.2
</div>
</body>
</html>
