<?
$uid = $_GET["uid"];
if (!$uid)
$uid = 1;
?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<?=$data['head']?>
</head>
<body class='stalk' background="/images/backgrounds/background.php?uid=<? echo $uid; ?>">
<?=$data['body']?>
</body>
</html>