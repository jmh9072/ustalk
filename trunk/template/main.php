<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<?=$data['head'];linkCSS('default');?>
</head>
<body>
<div class='header'><div class='logo'></div><div class='msg'><?=randomMessage()?></msg></div>
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