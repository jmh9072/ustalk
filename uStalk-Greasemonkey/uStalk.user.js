// Mod/User Stalker
// Version 1.1.1
// 12/31/2010
// Script created by CAVX, modified by jmh9072
// ModStalker and uStalker created by jmh9072 and Firebird347
//
// Released under the GPL license
// http://www.gnu.org/copyleft/gpl.html
//
// --------------------------------------------------------------------
//
// This is a Greasemonkey user script.  To install it, you need
// Greasemonkey 0.3 or later: http://greasemonkey.mozdev.org/
// Then restart Firefox and revisit this script.
// Under Tools, there will be a new menu item to "Install User Script".
// Accept the default configuration and install.
//
// To uninstall, go to Tools/Manage User Scripts,
// select "Mod/User Stalker", and click Uninstall.
//
// --------------------------------------------------------------------
//
// ==UserScript==
// @name          Mod/User Stalker
// @namespace     http://www.bungie.net/Forums/posts.aspx?postID=11687345
// @description   Shows the Mod Stalker and the uStalker on Bungie.net forum pages.
// @include       http://*bungie.net/Forums/topics.aspx?forumID=*
// @include       http://*bungie.net/Forums/createpost.aspx*
// ==/UserScript==

function addGlobalStyle(css) {
    var head, style;
    head = document.getElementsByTagName('head')[0];
    if (!head) { return; }
    style = document.createElement('style');
    style.type = 'text/css';
    style.innerHTML = css;
    head.appendChild(style);
}
function addGlobalScript(css) {
    var head, style;
    head = document.getElementsByTagName('head')[0];
    if (!head) { return; }
    style = document.createElement('script');
    style.innerHTML = css;
    head.appendChild(style);
}
var docURL = location.href;
var msChecked = "";
var usChecked = "";
var minChecked = "";
var usID = "";
if (GM_getValue('modStalker') == "yes")
	msChecked = "checked='checked'";
if (GM_getValue('minimize') == "yes")
	minChecked = "checked='checked'"
if (GM_getValue('uStalker', 'no') != "no"){
	usChecked = "checked='checked'";
	usID = GM_getValue('uStalker');}
var divArray0 = document.getElementsByTagName("div");
document.getElementById("ctl00_forumSidebarPanel").innerHTML += "<div id='settingDiv' style='position:absolute;top:145px;left:50%;margin-left:-458px;background:#000000; width:882px; padding:10px; border:1px solid #aaaaaa; display:none;'><div style='background:#000066; margin-left:-10px; margin-right:-10px;margin-top:-10px;padding:5px;'><a href='#' onclick='closeConfig();' style='float:right;'>[X]</a>Mod Stalker Settings</div><center>Use Moderator Finder?<input type='checkbox' id='mS' name='mS'"+msChecked+"><br>Use uStalk?<input type='checkbox' name='uS' id='uS'"+usChecked+"> (uStalk UID <input name='uStalkID' id='uStalkID' value='"+usID+"' type='text'  size=1 style='background:#dddddd; border:0px;'>)<br><br>Minimize by default?<input type='checkbox' id='min' name='min'"+minChecked+"><br><br><a id='theButton' href='#'>[Save Settings]</a><br><br><span style='font-size:9px;'>Script by CAVX, modified by jmh9072.<br>ModStalker and uStalk by jmh9072 and Firebird347.</span></center></div>";
if(GM_getValue("uStalker") == undefined){
document.getElementById("ctl00_forumSidebarPanel").innerHTML += "Please click the wrench to configure the uStalker."; }
	//reConfig();}
function reConfig()
{
document.getElementById("settingDiv").style.display = "";
document.getElementById("theButton").addEventListener('click', function(event) {
	if (document.getElementById("uS").checked)
	GM_setValue("uStalker", document.getElementById('uStalkID').value);
	else
	GM_setValue("uStalker", "no");
	if (document.getElementById("mS").checked)
	GM_setValue("modStalker", "yes");
	else
	GM_setValue("modStalker", "no");
	if (document.getElementById("min").checked)
	GM_setValue("minimize", "yes");
	else
	GM_setValue("minimize", "no");
location.reload(true);
}, true);

}
addGlobalScript(
'function closeConfig()'+
'{'+
'document.getElementById("settingDiv").style.display = "none";'+
'}'+
'function sOpt() {'+
'document.getElementById("scriptOptions").style.display = "none";'+
'document.getElementById("a34").style.display = "";'+
'document.getElementById("a35").style.display = "none";'+
'}'+
'function sCl() {'+
'document.getElementById("scriptOptions").style.display = "";'+
'document.getElementById("a34").style.display = "none";'+
'document.getElementById("a35").style.display = "";'+
'}');
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

    if (GM_getValue("modStalker") == "yes" && GM_getValue("uStalker") != "no")
      display = 2; //display 2 users
    else
      display = 4; //display 4 users

var divArray = document.getElementsByTagName("div");
for (var i = 0; i<divArray.length; i++){
	if(divArray[i].getAttribute("class") == "colLast forum_sidebar_col"){
		if(!(divArray[i].innerHTML.match(/Top Forum Topics/gi))){}
		else{
			divArray[i].innerHTML = "<a href='#' id='wrench' style='float:right; margin-right:5px;margin-top:1px;'><img src='http://www.bungie.net/images/spacer.gif' width='20' height='11'></a><a id='a34' href='#' onClick='sCl();' style='margin-bottom:5px;margin-left:5px;'><img src='http://www.bungie.net/images/spacer.gif' width='253' height='11'></a><a id='a35' href='#' onClick='sOpt();' style='margin-left:5px;'><img src='http://www.bungie.net/images/spacer.gif' width='253' height='11'></a><div id='scriptOptions'></div>"+divArray[i].innerHTML;
			document.getElementById("a34").style.display = "none";
document.getElementById("wrench").addEventListener('click',reConfig, true);
			if (!(GM_getValue("uStalker", "no") == "no"))
			{
GM_xmlhttpRequest({
    method: 'GET',
    url: 'http://ustalk.jmh9072.com/stalk.php?client=xml&uid='+GM_getValue('uStalker', '1')+'&display='+display+'&source=greasemonkey&version=1.1.1',
    headers: {
        'User-agent': 'Mozilla/4.0 (compatible) Greasemonkey',
	'Accept': 'application/atom+xml,application/xml,text/xml',
    },
    onload: function(responseDetails) {
        var temp = "<div id='uStalker'><div style='background:url(http://www.bungie.net/images/base_struct_images/contentBg/blueheader.jpg); width:271px; padding-top:2px; padding-left:5px; height:34px;'><span style='font-size:15px; font-weight:normal;'><a href='http://ustalk.jmh9072.com/uStalk.php?uid="+GM_getValue('uStalker', '1')+"' style='float:right; margin-right:5px;' target='_blank'>[+]</a>uStalk</span></div><TABLE cellpadding='5px' style='margin-top:-22px;'><TR><TH width='36'>Avatar</TH><TH width='110'>Name</TH><TH width='52'>Date</TH><TH>Time</TH></TR>";

        var parser = new DOMParser();
        var dom = parser.parseFromString(responseDetails.responseText,
            "application/xml");
        var user = dom.getElementsByTagName('user');

        for (var x = 0; x < user.length; x++) {
	    if (user[x].getElementsByTagName('online')[0].textContent == "1")
	      temp += "<tr style='background:url(http://i208.photobucket.com/albums/bb114/CavAvx/online.png) repeat;'><td>";
	    else
	      temp += "<tr><td>";
	    temp += "<a href=\"http://www.bungie.net/Account/Profile.aspx?uid=";
            temp += user[x].getElementsByTagName('uid')[0].textContent;
	    temp += "\"><img src=\"";
	    temp += user[x].getElementsByTagName('avatar')[0].textContent;
	    temp += "\"></a></td><td>";
	    temp += user[x].getElementsByTagName('name')[0].textContent;
	    temp += "</td><td>";
	    temp += user[x].getElementsByTagName('date')[0].textContent;
	    temp += "</td><td>";

            //parseInt() will make all the leading zeros in the hours place go away, as well as be explicit in string to Int conversions
            var time = user[x].getElementsByTagName('time')[0].textContent.split(":");
            if (parseInt(time[0], 10) == 0)
                temp += "12:" + time[1] + "A";
            else if (parseInt(time[0], 10) <= 12)
                temp += parseInt(time[0], 10) + ":" + time[1] + "A";
            else
                temp += (parseInt(time[0], 10) - 12) + ":" + time[1] + "P";

	    temp += "</td></tr>";
        }
	temp += "</table></div>";
	document.getElementById("scriptOptions").innerHTML += temp;
}
});
			}
			if (GM_getValue("modStalker") == "yes")
			{
GM_xmlhttpRequest({
    method: 'GET',
    url: 'http://ustalk.jmh9072.com/stalk.php?client=xml&uid=1&display='+display+'&source=greasemonkey&version=1.1.1',
    headers: {
        'User-agent': 'Mozilla/4.0 (compatible) Greasemonkey',
    },
    onload: function(responseDetails) {
        var temp2 = "<div id='modStalker'><div style='background:url(http://www.bungie.net/images/base_struct_images/contentBg/blueheader.jpg); width:271px; padding-top:2px; padding-left:5px; height:34px;'><span style='font-size:15px; font-weight:normal;'><a href='http://ustalk.jmh9072.com/uStalk.php?uid=1' style='float:right; margin-right:5px;' target='_blank'>[+]</a>Mod Stalker</span></div><TABLE cellpadding='5px' style='margin-top:-22px;'><TR><TH width='36'>Avatar</TH><TH width='110'>Name</TH><TH width='52'>Date</TH><TH>Time</TH></TR>";

        var parser2 = new DOMParser();
        var dom2 = parser2.parseFromString(responseDetails.responseText,
            "application/xml");
        var user2 = dom2.getElementsByTagName('user');

        for (var y = 0; y < user2.length; y++) {
	    if (user2[y].getElementsByTagName('online')[0].textContent == "1")
	      temp2 += "<tr style='background:url(http://i208.photobucket.com/albums/bb114/CavAvx/online.png) repeat;'><td>";
	    else
	      temp2 += "<tr><td>";
	    temp2 += "<a href=\"http://www.bungie.net/Account/Profile.aspx?uid=";
            temp2 += user2[y].getElementsByTagName('uid')[0].textContent;
	    temp2 += "\"><img src=\"";
	    temp2 += user2[y].getElementsByTagName('avatar')[0].textContent;
	    temp2 += "\"></a></td><td>";
	    temp2 += user2[y].getElementsByTagName('name')[0].textContent;
	    temp2 += "</td><td>";
	    temp2 += user2[y].getElementsByTagName('date')[0].textContent;
	    temp2 += "</td><td>";

            //parseInt() will make all the leading zeros in the hours place go away, as well as be explicit in string to Int conversions
            var time2 = user2[y].getElementsByTagName('time')[0].textContent.split(":");
            if (parseInt(time2[0], 10) == 0)
                temp2 += "12:" + time2[1] + "A";
            else if (parseInt(time2[0], 10) <= 12)
                temp2 += parseInt(time2[0], 10) + ":" + time2[1] + "A";
            else
                temp2 += (parseInt(time2[0], 10) - 12) + ":" + time2[1] + "P";

	    temp2 += "</td></tr>";
	}
	temp2 += "</table></div>";
	document.getElementById("scriptOptions").innerHTML += temp2;
    }
});
			}
	if(GM_getValue("minimize") == "yes"){
	document.getElementById("scriptOptions").style.display = "none";
	document.getElementById("a34").style.display = "";
	document.getElementById("a35").style.display = "none";}
	}
	}
	}


// v0.9 - 1.0
// o hai
// dis script iz messy, k?
// dont analiez 2 much
//
// v1.1
// o hai again
// dis script iz slighly less messy nao
// thx 4 not criticizin
