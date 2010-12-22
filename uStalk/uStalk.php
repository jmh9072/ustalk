<?PHP
$uid = $_GET['uid'];
if (!$uid)
$uid=1;
?>
<html>
<head>
<title>uStalk Test</title>
<script type="text/javascript">
function welcome()
{
	document.getElementById("status").innerHTML = "Welcome to uStalk v1.2!";
}

function loadXMLDoc(url)
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

        var parser = new DOMParser();
        var dom = parser.parseFromString(xmlhttp.responseText,
            "application/xml");
        var user = dom.getElementsByTagName('user');

        for (var x = 0; x < user.length; x++)
        {
	    if (user[x].getElementsByTagName('online')[0].textContent == "1")
	      temp += "<tr BGCOLOR='GOLD'><td>";
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
	    temp += user[x].getElementsByTagName('time')[0].textContent;
	    temp += "</td></tr>";
        }
		
		temp += "</table>";
		document.getElementById("uStalk").innerHTML = temp;
		if (dom.getElementsByTagName('ustalk'))
		{
				document.getElementById("status").innerHTML = "Weclome to uStalk v1.2!";
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
echo "<body onLoad=\"loadXMLDoc('stalk.php?uid=".$uid."&client=xml')\" background=\"/images/backgrounds/background.php?uid=".$uid."\">";
?>

<div id='status'>
Welcome to uStalk v1.2!
<BR />
<?PHP
echo "If your browser doesn't support AJAX, please go <a href=\"stalk.php?uid=".$uid."\">here</a>.";
?>
</div>
<div id='uStalk'>
</div>


</body>
</html>