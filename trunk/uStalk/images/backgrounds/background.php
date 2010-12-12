<?PHP

$uid = intval($_GET["uid"]) . ".img";

//header ("content-type: image/jpeg");
if (!file_exists($uid))
$uid = "blank.jpg";

$imagetype = exif_imagetype($uid);

if ($imagetype == IMAGETYPE_GIF)
{
  header ("content-type: image/gif");
}
else if ($imagetype == IMAGETYPE_JPEG)
{
  header ("content-type: image/jpeg");
}
else if ($imagetype == IMAGETYPE_PNG)
{
  header ("content-type: image/png");
}
else if ($imagetype == IMAGETYPE_BMP)
{
  header ("content-type: image/bmp");
}
else
{
  header ("content-type: image/undefined");
  //log_error("Undefined image at UID $uid");
}
$handle = fopen($uid, "r");

while(!feof($handle))
{
$buffer = fread($handle, 8092);
echo $buffer;
}

?>
