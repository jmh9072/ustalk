<?
if($HEAD)
{
	?><title>User's Stalk Page : uStalk</title><?
	return;
}

//login form
$uid = intval($_GET['uid']);
if(!$uid)
{
	$uid = 1;
}
$stalkees = user::getStalkees($uid);
global $bid;
$client = strtolower($_GET['client']);
if(empty($stalkees))
{
	if ($client == 'json') {
          return;
        }
	echo "Selected user has no stalkees";
	return;
}

if($client == 'json') {
  $display = intval($_GET['display']);

  $first = true;
  if($display) {
    for($prey = 1; $prey <= $display && $prey < count($stalkees); $prey++) {
      echo $first ? '' : ',';
      $first = false;
      template("stalk_json", $prey);
    }
  } else {
    foreach ($stalkees as $prey) {
      echo $first ? '' : ',';
      $first = false;
      template("stalk_json", $prey);
    }
  }

} else if ($client == "greasemonkey" || $client == "xml") {
  $display = intval($_GET['display']);
  if ($display)
  {
    for ($prey = 1; $prey <= $display && $prey < count($stalkees); $prey++)
    {
      template("GM_XML", $stalkees[$prey - 1]);
    }
  }
  else
  {
    foreach ($stalkees as $prey)
    {
      template("GM_XML", $prey);
    }
  }
} else if ($client == "mini")
{
?>
<script language="javascript">
function addGlobalStyle(css) {
    var head, style;
    head = document.getElementsByTagName('head')[0];
    if (!head) { return; }
    style = document.createElement('style');
    style.type = 'text/css';
    style.innerHTML = css;
    head.appendChild(style);
}
addGlobalStyle(
'#a34 img  {background:url(http://i208.photobucket.com/albums/bb114/CavAvx/msexpand.png) top no-repeat;}' +
'#a34 img:hover {background:url(http://i208.photobucket.com/albums/bb114/CavAvx/msexpand_h.jpg) top no-repeat;}' +
'#a35 img {background:url(http://i208.photobucket.com/albums/bb114/CavAvx/mscollapse.png) top no-repeat;}' +
'#a35 img:hover {background:url(http://i208.photobucket.com/albums/bb114/CavAvx/mscollapse_h.jpg) top no-repeat;}'+
'#wrench img  {background:url(http://i208.photobucket.com/albums/bb114/CavAvx/settings.jpg) top no-repeat;}' +
'#wrench img:hover {background:url(http://i208.photobucket.com/albums/bb114/CavAvx/settings_h.jpg) top no-repeat;}'+
'#scriptOptions {' +
' margin-bottom:15px;' +
'}' +
'#modStalker, #uStalker {' +
'  width:276px; background:url(http://i208.photobucket.com/albums/bb114/CavAvx/modfinderbg.jpg) repeat-y #000000 ! important; border:1px solid; border-color:#63605D; padding:0; margin:0; margin-left:5px; margin-bottom:5px;' +
'}' +
'#modStalker img, #uStalker img {' +
'  border:0px; width:36px; height:36px;' +
'}' +
'#modStalker th, #uStalker th {' +
'  padding:5px; font-size:9px; color:#bbbbbb;' +
'}'+
'#modStalker td, #uStalker td {' +
'  padding:5px; font-weight:normal;' +
'}'+
'#modStalker, #uStalker, #modStalker a, #uStalker a {' +
'  font-family: arial, sans-serif !important; font-size:11px; color:#ffffff;' +
'}');
</script>
<div id='uStalker'><div style='background:url(http://www.bungie.net/images/base_struct_images/contentBg/blueheader.jpg); width:271px; padding-top:2px; padding-left:5px; height:34px;'><span style='font-size:15px; font-weight:normal;'><a href='./stalk.php?uid=1' style='float:right; margin-right:5px;' target='_blank'>[+]</a>uStalk</span></div><table cellpadding='5px' style='margin-top:-22px;'><tr><th width='36'>Avatar</th><th width='110'>Name</th><th width='52'>Date</th><th>Time</th></tr>
<?
  foreach ($stalkees as $prey)
  {
    template("ministalkee", $prey);
  }
?>
</div>
</table>
<?
} else {

?>
<table BORDER="1" BGCOLOR="WHITE">
<tr>
<th>Avatar</th>
<th>Name</th>
<th>Date</th>
<th>Time</th>
</tr>
<?
foreach($stalkees as $prey)
{
	template("stalkee",$prey);
}
?>
</table>
<?
}
?>
