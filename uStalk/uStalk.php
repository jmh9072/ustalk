<?PHP
$uid = $_GET['uid'];
if (!$uid)
$uid=1;
?>
<html>
<head>
<title>User's Stalk Page : uStalk</title>
<script type="text/javascript">
function welcome()
{
	document.getElementById("status").innerHTML = "Welcome to uStalk v1.4-devel!";
}

function getStalkData(url)
{
document.getElementById("status").innerHTML += "<br />Attemping to download stalking data...";
document.getElementById("status").innerHTML += "<br /><img src='images/ajax-loading.gif' />";
if (window.XMLHttpRequest)
  {
  xmlhttp = new XMLHttpRequest(); //modern browsers only
  }
else
  {
  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //compatibility with IE5 and IE6 (why use them anymore, really?)
  }
  
  xmlhttp.onreadystatechange=function()
  {
  	if (xmlhttp.readyState == 4 && xmlhttp.status==200)
    {
        var temp = "<TABLE BORDER='1' BGCOLOR='WHITE'><TR><TH>Avatar</TH><TH>Name</TH><TH>Date</TH><TH>Time</TH></TR>";

        var user = JSON.parse(xmlhttp.responseText);
	
	var allUsersUpToDate = true;

        for (var x = 0; x < user.length; x++)
        {
	    if (user[x].online)
	      temp += "<tr BGCOLOR='GOLD'><td>";
	    else if (!user[x].upToDate)
	    {
	      allUsersUpToDate = false;
	      temp += "<tr BGCOLOR='RED'><td>";
	    }
	    else
	      temp += "<tr><td>";
	    temp += "<a href=\"http://www.bungie.net/Account/Profile.aspx?uid=";
        temp += user[x].uid;
	    temp += "\"><img src=\"";
	    temp += user[x].avatar;
	    temp += "\"></a></td><td>";
	    temp += user[x].name;
	    temp += "<BR /><FONT SIZE=2><A HREF=\"http://www.bungie.net/Account/Profile.aspx?uid=" + user[x].uid + "\">Profile</A></FONT>";
	    temp += "</td><td>";
	    temp += user[x].date;
	    temp += "</td><td>";

	    //parseInt() will make all the leading zeros in the hours place go away, as well as be explicit in string to Int conversions
	    var time = user[x].time.split(":");
	    if (parseInt(time[0], 10) == 0)
		temp += "12:" + time[1] + " AM";
	    else if (parseInt(time[0], 10) <= 12)
		temp += parseInt(time[0], 10) + ":" + time[1] + " AM";
	    else
		temp += (parseInt(time[0], 10) - 12) + ":" + time[1] + " PM";
	    
	    temp += "</td></tr>";
        }
		
		temp += "</table>";
		document.getElementById("uStalk").innerHTML = temp;
		if (!allUsersUpToDate)
			document.getElementById("usersUpToDate").innerHTML = "Some users have outdated information in the database. We are now updating them and will reload them when this is complete.";
		if (user)
		{
				document.getElementById("status").innerHTML = "Weclome to uStalk v1.4-devel!";
				document.getElementById("status").innerHTML += "<br />Data successfully retrieved! It has been displayed below.";
				setTimeout("welcome()", 5000);
		}
		else
		{
    			document.getElementById("status").innerHTML += "<br />Request timed out. We will try again in one minute.";
    			setTimeout("location.reload()", 60000);
    	}
    }
    else
    if (xmlhttp.readyState == 4)
    {
    	document.getElementById("status").innerHTML += "<br />There was an error downloading the data. We will try again in one minute.";
    	setTimeout("location.reload()", 60000);
    }
  }

xmlhttp.open("GET",url,true);
xmlhttp.send();
}
</script>
</head>
<?PHP
echo "<body onLoad=\"getStalkData('stalk.php?uid=".$uid."&client=json')\" background=\"/images/backgrounds/background.php?uid=".$uid."\">";
?>

<div id='status'>
Welcome to uStalk v1.4-devel!
<BR />
<?PHP
echo "If your browser is having trouble loading this page, please go <a href=\"stalk.php?uid=".$uid."\">here</a>.";
?>
</div>
<div id='usersUpToDate'>
</div>
<div id='uStalk'>
</div>


</body>
</html>
